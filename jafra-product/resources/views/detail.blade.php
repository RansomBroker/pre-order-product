@extends('index')

@section('title', $title)

@section('content')
    <div class="row gap-5 px-5 m-0 justify-content-center align-items-center">
        <div class="col-lg-8">
            @foreach($product as $data)
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{$data->product_img}}" alt="{{$data->product_name}}" class="img-fluid">
                    </div>
                    <div class="col-lg-8 py-4">
                        <p class="text-primary text-uppercase fw-bold fs-4">{{ $data->product_name }}</p>
                        <p class="text-primary fs-5 fw-bold">Rp.{{ number_format($data->product_price, 2, '.', ',') }}</p>
                        {{-- product desc --}}
                        <p class="text-gray">
                            @if(strlen($data->product_desc) > 100)
                                <span class="split-text">{{mb_substr($data->product_desc, 0, 100)}}</span>
                                <span class="split-text">...</span>
                                {{-- full text --}}
                                <span class="more-text">
                                    {{$data->product_desc}}
                                </span>
                            @else
                                {{$data->product_desc}}
                            @endif
                        </p>
                        @if(strlen($data->product_desc) > 100)
                            <a class="more-text-btn text-primary cursor-pointer">Tampilkan selengkapnya</a>
                            <a class="less-text-btn text-primary cursor-pointer">Tampilkan lebih sedikit</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="border-bottom">
                        <span class="btn btn-primary">Komposisi</span>
                    </div>
                    <p class="text-gray">
                        {{ $data->product_composition_desc }}
                    </p>
                </div>
            @endforeach
        </div>
        {{-- order view --}}
        <div class="col-lg-3 col-md-12 col-sm-12 card shadow-sm border-radius-12">
            <div class="card-body">
                <p class="text-primary">Atur Jumlah</p>
                <div class="d-flex justify-content-center">
                    <button class="border-radius-start-8 p-2 shadow-sm border border-1 me-5" disabled>
                        <i class="fa fa-minus text-muted" aria-hidden="true"></i>
                    </button>
                    <span class="d-flex justify-content-center align-items-center text-muted">
                        1
                    </span>
                    <button class="border-radius-end-8 p-2 shadow-sm border border-1 ms-5" disabled>
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="d-flex justify-content-between my-3">
                    <span class="text-primary">Subtotal</span>
                    <span class="text-primary fw-bold">Rp.{{ number_format($product[0]->product_price, 2, '.', ',') }}</span>
                </div>
                <div class="d-grid gap-3">
                    <button class="btn btn-primary fw-bold btn-add-to-cart btn-spinner"><i class="fa fa-plus" aria-hidden="true"></i> Keranjang
                    </button>
                    <a href="{{route('cart')."?id=".$product[0]->product_id}}" class="btn btn-outline-primary fw-bold">Order Langsung</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        /* show more text */
        $(".more-text").hide();
        $(".less-text-btn").hide();
        $('.more-text-btn').click(function () {
            $(".split-text").hide();
            $(".more-text").show();
            $(".less-text-btn").show();
            $(".more-text-btn").hide();
        });

        $(".less-text-btn").click(function () {
            $(".split-text").show();
            $(".more-text").hide();
            $(".less-text-btn").hide();
            $(".more-text-btn").show();
        });

        let url = new URL(window.location.href);
        let totalPath = url.pathname.split("/").length;
        let getCurrentId = url.pathname.split("/")[totalPath-1];

        $(".btn-add-to-cart").click(function () {
            // set csrf toke
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : '{{csrf_token()}}'
                }
            });

            // add new data
            $.ajax({
                type: 'POST',
                url: '{{ route('addNewCart') }}',
                data: {id:getCurrentId},
                beforeSend:function () {
                    $(".btn-spinner").html('<i class="spinner-border text-white spinner-border-sm"></i> loading...')
                },
                success:function (data) {
                    if(data.isDuplicate) {
                        $(".btn-add-to-cart").removeClass("btn-primary");
                        $(".btn-add-to-cart").addClass("btn-danger");
                        $(".btn-add-to-cart").html('<i class="fa fa-times" aria-hidden="true"></i> Maksimum Order 1 item');
                    } else if(data.isDuplicate === false && data.isInsert === true){
                        /* update cart view */
                        $.ajax({
                            type: 'GET',
                            url: "{{ route('totalCart') }}",
                            success:function (data){
                                $(".cart-count").show();
                                $(".cart-count").text(data);
                            }
                        })
                        $(".btn-add-to-cart").html('<i class="fa fa-check" aria-hidden="true"></i> ditambahkan ke kerajang');
                    }
                }
            })
        })


    </script>
@endsection
