<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Items;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        // get 5 new data
        $productData = Products::orderBy('product_id', 'DESC')->paginate(4);

        return view('home', [
            'products' => $productData
        ]);
    }

    public function productDetail($id)
    {
        $detailedProduct = Products::where('product_id', $id)->get();

        return view('detail', [
            'product' => $detailedProduct,
            'title' => $detailedProduct[0]->product_name
        ]);
    }

    public function cart()
    {
        /*
         * TODO
         *  1. show all item in user cart
         *  2, count total price
         *  3. buy now check id if exist then no need to add to cart
         *  4. delete item
         * */

        // insert data from buy now
        if (isset($_GET['id'])) {
            $itemExist = Carts::with([
                'consultants',
                'products'
            ])
                ->where('consultant_id', 1)
                ->where('product_id', $_GET['id'])
                ->count();
            if ($itemExist == 0 ) {
                $cart = Carts::create([
                    'consultant_id' => 1,
                    'product_id' => $_GET['id'],
                    'qty' => 1
                ]);
            }
        }

        // delete selected item
        if (isset($_GET['delItemId'])) {
            $deletedItem = Carts::where('cart_id', $_GET['delItemId'])->delete();
        }

        $totalChart = Carts::with('consultants')->where('consultant_id', 1)->count();

        $cartList = Carts::with('consultants', 'products')
            ->where('consultant_id', 1)
            ->get();

        $subTotal = Carts::withSum('products','product_price')
            ->where('consultant_id', 1)
            ->get();


        return view('cart', [
            'totalCart' => $totalChart,
            'cartItems' => $cartList,
            'subTotal' => $subTotal->sum('products_sum_product_price')
        ]);
    }

    public function createOrder()
    {
        /*
         * TODO
         *  1. Get session data for matching consultant_id(still not created, manual getting consultant id for test)
         *  2. Get all cart items
         *  3. sum of total
         *  4. insert data into orders table
         *  5. insert product_id, order_id inside carts table into items
         *  6. when insert complete delete chart
         * */

        // check if consultant has order
        $orderExist = Orders::where('consultant_id', 1)->count();

        $cartList = Carts::with('consultants', 'products')
            ->where('consultant_id', 1)
            ->get();

        $subTotal = Carts::withSum('products','product_price')
            ->where('consultant_id', 1)
            ->get();

        if ($orderExist <= 0) {
            // insert data to order
            $orderId = Orders::insertGetId([
                'order_facture' => "JFR".rand(100000, 999999),
                'consultant_id' => 1,
                'total' => $subTotal->sum('products_sum_product_price'),
                'created_at' => Carbon::now()
            ]);
            // insert all product and order_id into items table
            $productItem = array();
            foreach ($cartList as $list) {
                $productItem[] = [
                    'order_id' => $orderId,
                    'product_id' => $list->products->product_id
                ];
            }
            // insert into items tables
            $item = Items::insert($productItem);
            // clear/delete carts
            Carts::where("consultant_id", 1)->delete();
        } else {
            $item = false;
        }

        return response()->json([
            'successOrder' => $item
        ]);
    }

    public function totalOrder()
    {
        /*
         * TODO
         *  1. count user notification to show in pill bar
         * */

        return response()->json(Orders::where('consultant_id', 1)->count());
    }

    public function totalCart()
    {
        /*
         * TODO
         *  1. count user cart to show in pill bar
         * */

        $consultantCarts = Carts::with('consultants')->where('consultant_id', 1)->count();

        return json_decode($consultantCarts);
    }

    public function getOrder()
    {
        $order = array();
        foreach (Orders::where("consultant_id", 1)->get() as $data) {
            $order["order_facture"] = $data->order_facture;
            $order["total"] = $data->total;
        }

        return response()->json($order);

    }

    public function insertOrIgnoreCart(Request $request)
    {
        /*
         * TODO
         *  1. check if data duplicate or not
         *  2. if not insert to chart
         *  3. else make allert
         *  4. return true if table duplicate false either and success
         * */
        $duplicate = Carts::with([
            'consultants',
            'products'
        ])
        ->where('consultant_id', 1)
        ->where('product_id', $request->id)
        ->count();

        if ($duplicate > 0 ) {
            $isDuplicate = true;
            $isInsert = false;
        } else {
            $isDuplicate = false;
            $cart = Carts::create([
                'consultant_id' => 1,
                'product_id' => $request->id,
                'qty' => 1
            ])->count();
            if ($cart > 0) {
                $isInsert = true;
            }
        }
        return response()->json(['isDuplicate' => $isDuplicate, 'isInsert' => $isInsert]);
    }

}
