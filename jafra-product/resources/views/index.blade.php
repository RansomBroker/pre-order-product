<!Doctype html>
<html lang="en">
<head>
    @include('includes.meta')

    <title>Jafra Preorder - @yield('title')</title>

    @include('includes.css')
    @include('includes.js')
</head>
<body>
    @include('includes.navbar')
    {{--  content  --}}
    @yield('content')

    {{-- ajax for initials chart and notification --}}
    <script>
        // hide notif view
        $(".notif-detail").hide();
        $(".notification-count").hide();
        $.ajax({
            type: 'GET',
            url: "{{ route('totalCart') }}",
            success:function (data){
                if (data > 0 ){
                    $(".cart-count").show();
                    $(".cart-count").text(data);
                } else {
                    $(".cart-count").hide();
                }
            }
        })

        // get order
        $.ajax({
            type: 'GET',
            url: "{{ route('totalOrder') }}",
            success:function (data) {
                if (data > 0) {
                    $(".notification-count").show();
                    $(".notification-count").text(data);
                    // notification on click show
                    $(".notification-click").click(function () {
                        $(".notif-detail").toggle();
                    })
                    $(document).mouseup(function (e) {
                        let notif = $(".notif-detail");

                        if (!notif.is(e.target) && notif.has(e.target).length === 0) {
                            $(".notif-detail").hide('slow');
                        }
                    })
                }
            }
        })

        // get order detail
        $.ajax({
            type: 'GET',
            url: "{{ route('getOrder') }}",
            success:function (data) {
                data.forEach(function (index, item) {
                    $('<div class="d-flex align-items-center border-top border-bottom py-2"><a class="text-primary m-0">Order dengan kode order <b class="facture">'+index.order_facture+'</b> dengan total tagihan <b class="total">Rp.'+index.total+'</b> berhasil dibuat <a href="{{asset('assets/invoice/invoice.pdf')}}" class="text-primary" target="_blank"><b>klik untuk mengunduh invoice</b></a></a></div>').appendTo(".notif-item")
                })
            }
        })

        /*show user detail*/
        $('.profile').click(function () {
            swal.fire({
                title: '<span class="fw-bold text-center">PROFILE<span>',
                html: '<img src="{{asset('assets/img/user_logo.png')}}" width="48">'
                    + '<div class="row m-0 mb-3 mt-5 justify-content-center"> <label for="inputName" class="col-sm-2 col-form-label">Name</label> <div class="col-sm-6"> <input type="text"class="form-control" id="inputName" disabled value="Alif Al Mutawakil"></div></div>'
                    +'<div class="row m-0 mb-3 mt-2 justify-content-center"> <label for="inputMail" class="col-sm-2 col-form-label">Email</label> <div class="col-sm-6"> <input type="mail"class="form-control" id="inputName" disabled value="Alif@gmail.com"></div></div>'
                    +'<div class="row m-0 mb-3 mt-2 justify-content-center"> <label for="inputSeat" class="col-sm-2 col-form-label">seat</label> <div class="col-sm-6"> <input type="text"class="form-control" id="inputName" disabled value="25"></div></div>',
                confirmButtonText: 'HOME'
            })
        })

    </script>
</body>
</html>
