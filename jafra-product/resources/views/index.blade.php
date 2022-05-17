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
                } else {
                    $(".notifcation-count").hide();
                    $(".notif-detail").hide();
                }
            }
        })

        // get order detail
        $.ajax({
            type: 'GET',
            url: "{{ route('getOrder') }}",
            success:function (data) {
                $(".facture").text(data.order_facture)
                $(".total").text("Rp."+data.total)
            }
        })

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


    </script>
</body>
</html>
