@extends('index')

@section('title', 'Home')

@section('content')
    <div class="container-fluid m-0 px-2">
        <div class="card shadow-sm border-radius-12">
            <div class="card-body row justify-content-center gap-5 px-5 m-0">
                @foreach($products as $key => $product)
                    <div class="col-lg-2 col-md-4 card shadow-sm border-radius-16">
                        <a href="{{route('productDetail', $product->product_id)}}">
                            <img src="{{$product->product_img}}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <a href="{{route('productDetail', $product->product_id)}}" class="product-link text-primary text-uppercase fw-bold text-center w-100">
                                <p>{{ $product->product_name }}</p>
                            </a>
                            <p class="text-primary fw-bold text-center">Rp.{{number_format($product->product_price, 2, '.', ',')}}</p>
                        </div>
                    </div>
                @endforeach
                    {{-- top --}}
                    <div class="col-lg-2 col-md-4  d-flex justify-content-between align-items-center d-none">
                        <a href="#" class="btn btn-primary shadow-sm border-radius-12">Lihat Produk Lainya >></a>
                    </div>
            </div>
        </div>
    </div>

@endsection
