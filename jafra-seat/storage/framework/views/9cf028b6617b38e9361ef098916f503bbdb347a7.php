<nav class="container-fluid px-2 py-2 m-0 mb-4 bg-clear-white shadow">
    <div class="row align-items-center justify-content-between m-0 gap-4">
        <a class="navbar-brand col-lg-1 col-md-2 m-0" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('assets/img/jafra_logo.png')); ?>" alt="jafra logo" width="98" height="36">
        </a>
        
        <div class="col-auto justify-content-between">
            <div class="vr me-2" style="width: 1px;"></div>
            <img src="<?php echo e(asset("assets/img/user_logo.png")); ?>" alt="user logo">
            <span class="px-2 text-primary">John Doe</span>
            <i class="fa fa-power-off" aria-hidden="true" style="transform: rotate(270deg)"></i>
        </div>
    </div>
</nav>
<?php /**PATH /var/www/jafra-seat/resources/views/includes/navbar.blade.php ENDPATH**/ ?>