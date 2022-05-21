<?php $__env->startSection('title', 'Keranjang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row gap-5 px-5 m-0 justify-content-center align-items-center">
        <div class="card col-lg-12 shadow-sm">
            <div class="card-body table-responsive">
                <h4 class="text-primary fw-bold">Keranjang</h4>
                <?php if($totalCart > 0): ?>
                <table class="table table-sm table-borderless mt-3">
                    <thead>
                        <tr class="border-bottom">
                            <th class="text-uppercase text-primary">Products</th>
                            <th class="text-uppercase text-center text-primary">Price</th>
                            <th class="text-uppercase text-center text-primary">Qty</th>
                            <th class="text-uppercase text-center text-primary">Total</th>
                            <th class="text-uppercase text-center text-primary">action</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-primary">
                                    <img src="<?php echo e($data->products->product_img); ?>" alt="<?php echo e($data->products->product_name); ?>" width="96px">
                                    <?php echo e($data->products->product_name); ?>

                                </td>
                                <td class="text-center text-primary align-middle">Rp.<?php echo e(number_format($data->products->product_price, 2, '.', ',')); ?></td>
                                <td class="text-center text-primary align-middle"><?php echo e($data->qty); ?></td>
                                <td class="text-center text-primary align-middle">Rp.<?php echo e(number_format($data->products->product_price, 2, '.', ',')); ?></td>
                                
                                <td class="align-middle text-center">
                                    <a href="<?php echo e(route('cart')."?delItemId=".$data->cart_id); ?>"  class="btn btn-primary">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center ">
                            <td colspan="3"></td>
                            <td colspan="1" class="fw-bold text-primary">subtotal</td>
                            <td colspan="1" class="fw-bold text-primary">Rp.<?php echo e(number_format($subTotal, 2, '.', ',')); ?></td>
                        </tr>
                        <tr class="text-center ">
                            <td colspan="3"></td>
                            <td colspan="2" class="p-5">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-create-order">CONFIRM</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
                <?php else: ?>
                    <p class="text-muted text-center">Tidak ada Produk dalam Keranjang</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        // for ajax request to insert data
        $(".btn-create-order").click(function () {
            swal.fire({
                iconHtml: '<img src="<?php echo e(asset('assets/img/jafra_logo.png')); ?>"  width="200">',
                width: "50%",
                html: '<p class="text-center text-uppercase fs-4 fw-bold">Are you sure the product you'+''+'ve chosen for your preorder is already right ?<p>',
                confirmButtonClass: "btn btn-primary",
                confirmButtonText: "CONFIRM",
                cancelButtonText: "CANCEL",
                showCancelButton: true,
                reverseButtons: true,
                customClass: {
                    icon: 'no-border'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(route('createOrder')); ?>",
                        beforeSend:function () {
                            $(".btn-create-order").prop('disabled', true);
                            $(".btn-create-order").html('<i class="spinner-border text-white spinner-border-sm"></i> loading...')
                        },
                        success:function (data){
                            if (data.successOrder === true ){
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thankyou For Your Pre-Order',
                                    html: '<span class="text-primary fw-bold">Click the link down below to download invoice on your preorder! or you can download it on preorder hitory on your profile menu</span>',
                                    confirmButtonText: 'Download',
                                    cancelButtonText: 'home',
                                    showCancelButton: true,
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if(result.isConfirmed) {
                                        var anchor = document.createElement('a');
                                        anchor.href = '<?php echo e(asset('assets/invoice/invoice.pdf')); ?>';
                                        anchor.target="_blank";
                                        anchor.click();
                                        window.location.replace('/');
                                    } else if(result.isDismissed) {
                                        window.location.replace('https://jac2022.evorty.com/');
                                    }
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    tittle: 'Order Gagal Dibuat',
                                    html: '<span class="text-primary fw-bold">Hanya bisa melakukan satu kali order</span>',
                                    confirmButtonText: 'Kembali',
                                    allowOutsideClick: false,
                                }).then((result) => {
                                    if(result.isConfirmed) {
                                        window.location.replace('/');
                                    }
                                })
                            }
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/jafra-product/resources/views/cart.blade.php ENDPATH**/ ?>