<!Doctype html>
<html lang="en">
<head>
    <?php echo $__env->make('includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <title>Jafra Preorder - <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH /var/www/jafra-seat/resources/views/index.blade.php ENDPATH**/ ?>