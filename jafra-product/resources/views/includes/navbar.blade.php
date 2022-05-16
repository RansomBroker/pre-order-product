<nav class="container-fluid px-2 py-2 m-0 mb-4 bg-clear-white shadow">
    <div class="row align-items-center m-0 gap-4">
        <a class="navbar-brand col-lg-1 col-md-2 m-0" href="{{ route('home') }}">
            <img src="{{ asset('assets/img/jafra_logo.png') }}" alt="jafra logo" width="98" height="36">
        </a>
        <form method="GET" action="{{ route('home') }}" class="col-lg-8">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control border-secondary" placeholder="cari Produk...." aria-label="search" aria-describedby="search-btn" name="searc">
                <button class="btn btn-secondary" type="button" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </form>
        {{-- chart and notification --}}
        <div class="col-auto py-4">
            <div class="position-relative">
                <a href="{{route('cart')}}">
                    <i class="fa fa-shopping-cart fs-3 text-primary" aria-hidden="true" ></i>
                    {{-- cart--}}
                    <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" style="font-size: 10px">
                    99+
                    </span>
                </a>
            </div>
        </div>
        <div class="col-auto">
            <div class="position-relative">
                <i class="fa fa-bell fs-3 text-primary" aria-hidden="true"></i>
                {{-- notification --}}
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" style="font-size: 10px">
                99+
            </span>
            </div>
        </div>
        {{--    user    --}}
        <div class="col-auto justify-content-between">
            <div class="vr me-2" style="width: 1px;"></div>
            <img src="{{ asset("assets/img/user_logo.png") }}" alt="user logo">
            <span class="px-2 text-primary">John Doe</span>
            <i class="fa fa-power-off" aria-hidden="true" style="transform: rotate(270deg)"></i>
        </div>
    </div>
</nav>
