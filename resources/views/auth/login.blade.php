<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asets/css/login.css">
    <link rel="stylesheet" href="../asets/css/bootstrap.min.css">
    <title>SISTEM INFORMASI EKSEKUTIF</title>
    <link rel="icon" href="../asets/images/logo svd.png">
</head>
    <body>
        <div class="limiter">
        <div class="container-login100" style="background-image: url('../asets/images/soverdi.jpeg');">
            <div class="wrap-login100">
                <form action="/postlogin" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-logo" style="background-image: url('../asets/images/Logo Soverdi Warna.png'); background-size: 120px; background-position: center;">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Sistem Informasi Eksekutif Peserta Didik SMAK Soverdi
                    </span>

                     <div class="wrap-input100">
                        <div class="form-label-group">
                        <input type="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="username" value="{{old('username')}}">
                        <label for="inputEmail">Username</label>
                        </div>
                    </div>

                     @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror

                     <div class="wrap-input100">
                        <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
                        <label for="inputPassword">Password</label>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="wrap-input100">
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" style="background-color: ##1d2f88; border-color: ##1d2f88;"type="submit">Log In</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

    <div id="dropDownSelect1"></div>
    
    <!--===============================================================================================-->
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendor/bootstrap/js/popper.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="../vendor/daterangepicker/moment.min.js"></script>
        <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="../vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="../js/main.js"></script>
    </body>
</html>