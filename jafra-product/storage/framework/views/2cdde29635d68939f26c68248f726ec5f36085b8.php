<nav class="container-fluid px-2 py-2 m-0 mb-4 bg-clear-white shadow">
    <div class="row align-items-center m-0 gap-2">
        <a class="navbar-brand col-lg-1 col-md-2 m-0" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('assets/img/jafra_logo.png')); ?>" alt="jafra logo" width="98" height="36">
        </a>
        <form method="GET" action="<?php echo e(route('home')); ?>" class="col-lg-8">
            <?php echo csrf_field(); ?>
            <div class="input-group">
                <input type="text" class="form-control border-secondary" placeholder="cari Produk...." aria-label="search" aria-describedby="search-btn" name="searc">
                <button class="btn btn-secondary" type="button" id="search-btn"><i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </form>
        
        <div class="col-auto py-4">
            <div class="position-relative">
                <a href="<?php echo e(route('cart')); ?>">
                    <i class="fa fa-shopping-cart fs-3 text-primary" aria-hidden="true" ></i>
                    
                    <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary" style="font-size: 10px">
                </span>
                </a>
            </div>
            <div class="col-lg-4 col-11 col-md-6 card shadow border-radius-8 position-absolute translate-float i-10 d-none">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span class="text-primary fw-bold">Keranjang</span>
                        <a href="<?php echo e(route('cart')); ?>" class="text-primary"><small>selengkapnya</small></a>
                    </div>
                    <div class="row justify-content-start gap-3 content">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="position-relative">
                <i class="fa fa-bell fs-3 text-primary notification-click" aria-hidden="true"></i>
                
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary notification-count" style="font-size: 10px">
            </span>
            </div>
            <div class="notif-detail col-lg-3 col-sm-4 col-md-4 card shadow border-radius-8 position-absolute translate-float i-10">
                <div class="card-body notif-item">
                    <p class="text-primary fw-bold">Notifikasi</p>

                </div>
            </div>
        </div>
        
        <div class="col-auto justify-content-between profile">
            <div class="vr me-2" style="width: 1px;"></div>
            <img src="<?php echo e(asset("assets/img/user_logo.png")); ?>" alt="user logo">
            <span class="px-2 text-primary">Alif Al Mutawakil </span>
            <i class="fa fa-power-off" aria-hidden="true" style="transform: rotate(270deg)"></i>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/jafra-product/resources/views/includes/navbar.blade.php ENDPATH**/ ?>