<!Doctype html>
<html lang="en">
    <head>
        <?php echo $__env->make('includes.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <?php echo $__env->make('includes.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('includes.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body>
        <h1>hello</h1>
    </body>
</html>
<?php /**PATH /var/www/jafra-product/resources/views/admin/index.blade.php ENDPATH**/ ?>