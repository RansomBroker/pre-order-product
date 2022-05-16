@extends('index')

@section('title', 'Keranjang')

@section('content')
    <div class="row gap-5 px-5 m-0 justify-content-center align-items-center">
        <div class="card col-lg-12 shadow-sm">
            <div class="card-body table-responsive">
                <h4 class="text-primary fw-bold">Keranjang</h4>
                <table class="table table-sm table-borderless mt-3">
                    <thead>
                        <tr class="border-bottom">
                            <th class="text-uppercase text-primary">Products</th>
                            <th class="text-uppercase text-center text-primary">Price</th>
                            <th class="text-uppercase text-center text-primary">Qty</th>
                            <th class="text-uppercase text-center text-primary">Total</th>
                            <th class="text-uppercase text-center text-primary">action</th>
                        </tr>
                    </thead>
                    @if($totalCart > 0)
                        <tbody>
                        @foreach($cartItems as $data)
                            <tr>
                                <td class="text-primary">
                                    <img src="{{$data->products->product_img}}" alt="{{ $data->products->product_name }}" width="96px">
                                    {{ $data->products->product_name }}
                                </td>
                                <td class="text-center text-primary align-middle">Rp.{{ number_format($data->products->product_price, 2, '.', ',') }}</td>
                                <td class="text-center text-primary align-middle">{{$data->qty}}</td>
                                <td class="text-center text-primary align-middle">Rp.{{ number_format($data->products->product_price, 2, '.', ',') }}</td>
                                {{-- delete item --}}
                                <td class="align-middle text-center">
                                    <a href="{{route('cart')."?delItemId=".$data->cart_id}}"  class="btn btn-primary">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-center ">
                            <td colspan="3"></td>
                            <td colspan="1" class="fw-bold text-primary">subtotal</td>
                            <td colspan="1" class="fw-bold text-primary">Rp.{{ number_format($subTotal, 2, '.', ',') }}</td>
                        </tr>
                        <tr class="text-center ">
                            <td colspan="3"></td>
                            <td colspan="2" class="p-5">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button">Order</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
