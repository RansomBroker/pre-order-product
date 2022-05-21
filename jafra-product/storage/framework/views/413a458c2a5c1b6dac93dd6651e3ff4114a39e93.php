<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid m-0 px-2">
        <div class="card shadow-sm border-radius-12">
            <div class="card-body row justify-content-center gap-5 px-5 m-0">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-2 col-md-4 card shadow-sm border-radius-16">
                        <a href="<?php echo e(route('productDetail', $product->product_id)); ?>">
                            <img src="<?php echo e($product->product_img); ?>" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <a href="<?php echo e(route('productDetail', $product->product_id)); ?>" class="product-link text-primary text-uppercase fw-bold text-center w-100">
                                <p><?php echo e($product->product_name); ?></p>
                            </a>
                            <p class="text-primary fw-bold text-center">Rp.<?php echo e(number_format($product->product_price, 2, '.', ',')); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-lg-2 col-md-4  d-flex justify-content-between align-items-center d-none">
                        <a href="#" class="btn btn-primary shadow-sm border-radius-12">Lihat Produk Lainya >></a>
                    </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/jafra-product/resources/views/home.blade.php ENDPATH**/ ?>