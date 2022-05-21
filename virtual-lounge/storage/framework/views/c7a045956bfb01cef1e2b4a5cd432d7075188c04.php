<?php $__env->startSection('title', 'seat order'); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container-fluid m-0 p-5 d-flex justify-content-between">
        <img src="<?php echo e(asset('assets/img/jafra_logo.png')); ?>" width="131" height="57">
        <div class="text-center">
            <h1 class="fw-bold">JAFRA</h1>
            <h2 class="fw-bold">ANNUAL CONFERENCE 2022</h2>
        </div>
        <i class="fa fa-user fs-1 " aria-hidden="true"></i>
    </div>

    
    <div class="container-lg">
        <p class="m-0 fs-5">Good Morning, Alif al mutawakkil</p>
        <p class="fs-5">Welcome to jafra Annual Conference 2022</p>
    </div>

    
    <div class="container-lg mt-5 ">
        <div class="row justify-content-center gap-3">
            <div class=" wy-16 hx-16">
                <div class="w-100 d-flex justify-content-center">
                    <a href="#"><img class="" src="<?php echo e(asset('assets/img/order_product.png')); ?>" width="128"></a>
                </div>
                <a href="#" class="text-black text-decoration-none text-center"><h4 class="fw-bold">Product pre Order</h4></a>
            </div>
            <div class=" wy-16 hx-16">
                <div class="w-100 d-flex justify-content-center">
                    <a href="#"><img class="" src="<?php echo e(asset('assets/img/lounge.png')); ?>" width="128"></a>
                </div>
                <a href="#" class="text-black text-decoration-none text-center"><h4 class="fw-bold">Vritual Lounge</h4></a>
            </div>
        </div>
    </div>

    
    <div class="container-lg d-flex justify-content-end mt-5">
        <a href="https://wa.me/6285811326661" target="_blank"><img src="<?php echo e(asset('assets/img/cs_help_logo.png')); ?>"></a>
    </div>

    <script>
        $('.fa-user').click(function () {
            swal.fire({
                title: '<span class="fw-bold text-center">PROFILE<span>',
                html: '<img src="<?php echo e(asset('assets/img/user_logo.png')); ?>" width="48">'
                    + '<div class="row m-0 mb-3 mt-5 justify-content-center"> <label for="inputName" class="col-sm-2 col-form-label">Name</label> <div class="col-sm-6"> <input type="text"class="form-control" id="inputName" disabled value="Alif Al Mutawakil"></div></div>'
                    +'<div class="row m-0 mb-3 mt-2 justify-content-center"> <label for="inputMail" class="col-sm-2 col-form-label">Email</label> <div class="col-sm-6"> <input type="mail"class="form-control" id="inputName" disabled value="Alif@gmail.com"></div></div>'
                    +'<div class="row m-0 mb-3 mt-2 justify-content-center"> <label for="inputSeat" class="col-sm-2 col-form-label">seat</label> <div class="col-sm-6"> <input type="text"class="form-control" id="inputName" disabled value="25"></div></div>',
                confirmButtonText: 'HOME'
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/virtual-lounge/resources/views/home.blade.php ENDPATH**/ ?>