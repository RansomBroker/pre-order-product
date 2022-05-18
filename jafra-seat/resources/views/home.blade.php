@extends('index')

@section('title', 'seat order')

@section('content')
    <h1 class="fs-4 text-primary text-uppercase text-center fw-bold">Seat Reservation</h1>
    <div class="container-fluid m-0 px-4">
        <div class="card shadow-sm row gap-5">
            <div class="card-body row justify-content-center">
                <div class="col-lg-12 row justify-content-center">
                    {{-- stage --}}
                    <div class="col-lg-6 bg-primary text-white text-center fs-4 py-5 border-radius-12">
                        Stage
                    </div>
                </div>
                <div class="col-lg-12 row justify-content-center mt-5">
                    {{-- seat selection --}}
                    <div class="col-lg-6 row justify-content-center">
                        <div class="col-lg-11 row-cols-10 gap-2 row justify-content-center">
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="1">1</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="2">2</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="3">3</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="4">4</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="5">5</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="6">6</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="7">7</button>
                            <button class="seat-booked col-sm-1 bg-primary text-white fs-5 text-center border-radius-8" id="8">8</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="9">9</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="10">10</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="11">11</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="12">12</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="13">13</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="14">14</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="15">15</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="16">16</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="17">17</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="18">18</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="19">19</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="20">20</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="21">21</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="22">22</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="23">23</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="24">24</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="25">25</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="26">26</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="27">27</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="28">28</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="29">29</button>
                            <button class="seat col-sm-1 bg-gray fs-5 text-center border-radius-8" id="30">30</button>
                        </div>
                    </div>
                </div>
                {{-- legend --}}
                <div class="col-lg-6 row row-col-3 justify-content-between mt-5">
                    <div class="col-sm-2 text-center bg-gray fs-6  border-radius-8 p-2 d-flex align-items-center justify-content-center">
                        Available
                    </div>
                    <div class="col-sm-2 text-center bg-primary fs-6 text-white border-radius-8 p-2 d-flex align-items-center justify-content-center">
                        Booked
                    </div>
                    <div class="col-sm-2 text-center bg-secondary text-white fs-6  border-radius-8 p-2 d-flex align-items-center justify-content-center">
                        Selected
                    </div>
                </div>
                {{-- button --}}
                <div class="col-lg-12 row justify-content-center mt-5">
                    <button class="col-sm-2 btn btn-primary text-uppercase border-radius-8 fw-bold" id="btn-confirm">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currSeat = 0;
        $(".seat").click(function() {
            let seatNum = $(this).attr("id");
            $("#"+currSeat).removeClass("text-white")
            $("#"+currSeat).removeClass("bg-primary")
            $("#"+currSeat).addClass("bg-gray")
            if (currSeat != seatNum) {
                $(this).addClass("text-white")
                $(this).addClass("bg-secondary")
                $(this).removeClass("bg-gray")
                currSeat = seatNum;
            } else if ( currSeat == seatNum) {
                $(this).removeClass("text-white")
                $(this).removeClass("bg-primary")
                $(this).addClass("bg-gray")
                currSeat = 0;
            }
        })

        $("#btn-confirm").click(function () {
            if(currSeat == 0) {
                swal.fire({
                    icon: 'error',
                    title: '<span class="text-primary text-uppercase">Silahkan Pilih Kursi</span>'
                })
            } else {
                swal.fire({
                    title: '<span class="text-primary text-uppercase">Seat Confirmation</span>',
                    html: '<div class="row justify-content-center m-0 mb-3"> <label for="inputVenue" class="col-sm-4 col-form-label fw-bold text-primary">Venue</label> <div class="col-sm-6"><input type="text" class="form-control" id="inputVenue" value="1" disabled></div></div></div>'+ '<div class="row justify-content-center m-0 mb-3"> <label for="inputTime" class="col-sm-4 col-form-label fw-bold text-primary">Time</label> <div class="col-sm-6"><input type="text" class="form-control" id="inputVenue" value="15.00 WIB" disabled></div></div></div>'+'<div class="row justify-content-center m-0 mb-3"> <label for="inputSeat" class="col-sm-4 col-form-label fw-bold text-primary">Seat</label> <div class="col-sm-6"><input type="text" class="form-control" id="inputSeat" value="'+currSeat+'" disabled></div></div></div>'
                }).then((result) => {
                    if(result.isConfirmed) {
                        let seatAvail= true;
                        if (seatAvail) {
                            swal.fire({
                                icon: 'success',
                                title: '<span>Terimakasih telah melakukan pemilihan kursi</span>'
                            })
                        } else {
                            swal.fire({
                                icon: 'error',
                                title: '<span>Maaf Kursi telah di-booking pada system</span>'
                            })
                        }
                    }
                })
            }
        })
    </script>
@endsection
