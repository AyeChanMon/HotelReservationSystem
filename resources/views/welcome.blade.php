<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center vh-100">
            <div class="col-12 col-lg-7">
                <div class="card rounded-3 shadow">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-5">
                                <p class="fs-4 fw-bolder">Hotel Reservation</p>
                                <p>A hotel reservation system is the mechanism through which guests can create secure online reservations.</p>
                                <div class="text-center"><a href="{{ route('login') }}" class="btn btn-danger">Login</a></div>
                            </div>
                            <div class="col-7">
                            <img src="{{ asset('images/hotel.jpg') }}" class="img-responsive img-rounded img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
