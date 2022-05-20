<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function order()
    {
        /* TODO
         *  1. show all order and product items list
         * */
        $orderDetail = Orders::with('items.products', 'consultants')->paginate(2);

        return view('orderlist', [
            'orderList' => $orderDetail
        ]);
    }


    public function login()
    {
        if (Auth::check() && Auth::id()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'name' => 'User tidak ditemukan'
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/login');
    }

    public function showOrder()
    {

    }


}
