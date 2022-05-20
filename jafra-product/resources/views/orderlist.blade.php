@extends('indexadmin')

@section('title', 'Order List')

@section('content')
    {{-- breadcrumb--}}
    <div class="container-lg m-0">
            <ol class="breadcrumb p-2">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-primary">Dahsboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
        </nav>
    </div>

    {{--items--}}
    <div class="container-lg m-0">
        <div class="w-100 card shadow-sm">
            <div class="card-body">
                {{-- input search--}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ketikan nomor faktur" >
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                {{--items--}}
                <div class="accordion" id="accordionOder">
                    @foreach($orderList as $key => $data)
                    <div class="accordion-item">
                        <h2 class="accordion-header text-primary" id="heading-{{$key}}">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                Order Facture <span class="ms-2"><b>{{ $data->order_facture }}</b></span>
                            </button>
                        </h2>
                        <div id="order-{{$key}}" class="accordion-collapse collapse" aria-labelledby="heading-{{$key}}" data-bs-parent="#accordionOrder">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
