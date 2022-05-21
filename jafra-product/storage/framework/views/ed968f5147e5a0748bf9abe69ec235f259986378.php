<!Doctype html>
<html lang="en">
<head>
    <?php echo $__env->make('includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <title>Jafra Preorder - <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('includes.admincss', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body id="page-top">
    
    <div id="wrapper">
        <?php if(Route::currentRouteName() != 'login'): ?>
            <?php echo $__env->make('includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
            
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    
                    <?php if(Route::currentRouteName() != 'login'): ?>
                        <?php echo $__env->make('includes.adminnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
    </div>
    <?php echo $__env->make('includes.adminjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<?php /**PATH /var/www/jafra-product/resources/views/indexadmin.blade.php ENDPATH**/ ?>