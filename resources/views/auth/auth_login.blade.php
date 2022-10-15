<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login : TalentInCloud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @if (Session::has('dark-mode'))
        <link rel="stylesheet" href="{{ asset('registration/bootstrap-dark.min.css') }}">
        <link rel="stylesheet" href="{{ asset('registration/app-dark.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('registration/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('registration/app.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    
    <style>
        @import url(https://fonts.googleapis.com/css?family=opensans:500);

        body {
            /* background: #33cc99; */
            /* color: #fff; */
            font-family: 'Open Sans', sans-serif;
            max-height: 700px;
            overflow: hidden;
        }


        ._404 {
            font-size: 220px;
            position: relative;
            display: inline-block;
            z-index: 2;
            height: 250px;
            letter-spacing: 15px;
        }

        ._1 {
            text-align: center;
            display: block;
            position: relative;
            letter-spacing: 12px;
            font-size: 4em;
            line-height: 80%;
        }

        ._2 {
            text-align: center;
            display: block;
            position: relative;
            font-size: 20px;
        }








        hr {
            padding: 0;
            border: none;
            border-top: 5px solid #fff;
            color: #fff;
            text-align: center;
            margin: 0px auto;
            width: 420px;
            height: 10px;
            z-index: -10;
        }

        hr:after {
            content: "\2022";
            display: inline-block;
            position: relative;
            top: -0.75em;
            font-size: 2em;
            padding: 0 0.2em;
            background: #33cc99;
        }

        .cloud {
            width: 350px;
            height: 120px;

            background: #FFF;
            background: linear-gradient(top, #FFF 100%);
            background: -webkit-linear-gradient(top, #FFF 100%);
            background: -moz-linear-gradient(top, #FFF 100%);
            background: -ms-linear-gradient(top, #FFF 100%);
            background: -o-linear-gradient(top, #FFF 100%);

            border-radius: 100px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;

            position: absolute;
            margin: 120px auto 20px;
            z-index: -1;
            transition: ease 1s;
        }

        .cloud:after,
        .cloud:before {
            content: '';
            position: absolute;
            background: #FFF;
            z-index: -1
        }

        .cloud:after {
            width: 100px;
            height: 100px;
            top: -50px;
            left: 50px;

            border-radius: 100px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
        }

        .cloud:before {
            width: 180px;
            height: 180px;
            top: -90px;
            right: 50px;

            border-radius: 200px;
            -webkit-border-radius: 200px;
            -moz-border-radius: 200px;
        }

        .x1 {
            top: -50px;
            left: 100px;
            -webkit-transform: scale(0.3);
            -moz-transform: scale(0.3);
            transform: scale(0.3);
            opacity: 0.9;
            -webkit-animation: moveclouds 15s linear infinite;
            -moz-animation: moveclouds 15s linear infinite;
            -o-animation: moveclouds 15s linear infinite;
        }

        .x1_5 {
            top: -80px;
            left: 250px;
            -webkit-transform: scale(0.3);
            -moz-transform: scale(0.3);
            transform: scale(0.3);
            -webkit-animation: moveclouds 17s linear infinite;
            -moz-animation: moveclouds 17s linear infinite;
            -o-animation: moveclouds 17s linear infinite;
        }

        .x2 {
            left: 250px;
            top: 30px;
            -webkit-transform: scale(0.6);
            -moz-transform: scale(0.6);
            transform: scale(0.6);
            opacity: 0.6;
            -webkit-animation: moveclouds 25s linear infinite;
            -moz-animation: moveclouds 25s linear infinite;
            -o-animation: moveclouds 25s linear infinite;
        }

        .x3 {
            left: 250px;
            bottom: -70px;

            -webkit-transform: scale(0.6);
            -moz-transform: scale(0.6);
            transform: scale(0.6);
            opacity: 0.8;

            -webkit-animation: moveclouds 25s linear infinite;
            -moz-animation: moveclouds 25s linear infinite;
            -o-animation: moveclouds 25s linear infinite;
        }

        .x4 {
            left: 470px;
            botttom: 20px;

            -webkit-transform: scale(0.75);
            -moz-transform: scale(0.75);
            transform: scale(0.75);
            opacity: 0.75;

            -webkit-animation: moveclouds 18s linear infinite;
            -moz-animation: moveclouds 18s linear infinite;
            -o-animation: moveclouds 18s linear infinite;
        }

        .x5 {
            left: 200px;
            top: 300px;

            -webkit-transform: scale(0.5);
            -moz-transform: scale(0.5);
            transform: scale(0.5);
            opacity: 0.8;

            -webkit-animation: moveclouds 20s linear infinite;
            -moz-animation: moveclouds 20s linear infinite;
            -o-animation: moveclouds 20s linear infinite;
        }

        .x6 {
            left: 500px;
            top: 400px;

            -webkit-transform: scale(0.5);
            -moz-transform: scale(0.5);
            transform: scale(0.5);
            opacity: 0.8;

            -webkit-animation: moveclouds 20s linear infinite;
            -moz-animation: moveclouds 20s linear infinite;
            -o-animation: moveclouds 20s linear infinite;
        }

        .x7 {
            left: 350px;
            top: 500px;

            -webkit-transform: scale(0.5);
            -moz-transform: scale(0.5);
            transform: scale(0.5);
            opacity: 0.8;

            -webkit-animation: moveclouds 20s linear infinite;
            -moz-animation: moveclouds 20s linear infinite;
            -o-animation: moveclouds 20s linear infinite;
        }

        @-webkit-keyframes moveclouds {
            0% {
                margin-left: 1000px;
            }

            100% {
                margin-left: -1000px;
            }
        }

        @-moz-keyframes moveclouds {
            0% {
                margin-left: 1000px;
            }

            100% {
                margin-left: -1000px;
            }
        }

        @-o-keyframes moveclouds {
            0% {
                margin-left: 1000px;
            }

            100% {
                margin-left: -1000px;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('registration/icons.min.css') }}">
</head>

<body class="loading authentication-bg authentication-bg-pattern"
    style="background-image: url({{ Session::has('dark-mode') ? asset('assets/images/bck-dark.jpg') : asset('assets/images/bck1.jpg') }})">
    <div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x1_5"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
        <div class="cloud x6"></div>
        <div class="cloud x7"></div>

    </div>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern" style="height: 500px">

                        <div class="d-flex flex-row-reverse pt-2 pe-2">
                            @if (Session::has('dark-mode'))
                                <button type="button" id="light-mode"
                                    class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode text-center">
                                    <i class='bx bx-sun fs-22' style="margin-left: -7px"></i>
                                </button>
                            @else
                                <button type="button" id="dark-mode"
                                    class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode text-center">
                                    <i class='bx bx-moon fs-22' style="margin-left: -7px"></i>
                                </button>
                            @endif

                        </div>
                        <div class="card-body pt-3 ps-3 pe-3" style="padding-top:0 !important">
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="#" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-dark.png" alt=""
                                                style="width: 253px;height:86px;">
                                        </span>
                                    </a>

                                    <a href="#" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="assets/images/logo-light.png" alt=""
                                                style="width: 253px;height:86px;">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mt-3" style="margin-bottom:10px">Enter your email address and
                                    password to access admin panel.</p>
                            </div>
                            <form action="{{ route('authenticate_process_login') }}" method="post">
                                @csrf
                                <label for="username" class="form-label">Username</label>
                                <div class="mb-1 col-34">
                                    <input class="form-control effect-9" type="email" id="username" name="email"
                                        required="" placeholder="Enter your Username"
                                        value="">
                                    <span class="focus-border">
                                        <i></i>
                                    </span>
                                </div>
                                {{-- <div class="col-34">
                                    <input class="effect-9" type="text" placeholder="Placeholder Text">
                                    <span class="focus-border">
                                        <i></i>
                                    </span>
                                </div> --}}
                                <label for="password" class="form-label">Password</label>
                                <div class="mb-3 col-34">
                                    <input class="form-control effect-9" type="password" name="password" required=""
                                        placeholder="Enter your Password" value="">
                                    <span class="focus-border">
                                        <i></i>
                                    </span>
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Sign In </button>
                                </div>
                            </form>
                            {{-- <div class="row ">
                                <div class="col-12 text-center">
                                    <p class="text-danger"> 
                                        Wrong crediantals 
                                    </p>
                                </div>
                            </div> --}}
                            <div class="row mt-1">
                                <div class="col-12 text-center">
                                    <p> 
                                        <a href="{{ route('reset_password') }}" class=" ms-1"
                                            id="reset_password">Forgot your password?</a>
                                           
                                    </p>

                                </div> <!-- end col -->
                            </div>



                        </div> <!-- end card-body  -->
                    </div>
                    <!-- end card -->


                    <!-- end row -->

                </div> <!-- end col -->
            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; Powered by <a href="" class="text-white-50"><img
                src="{{ asset('assets/images/quacklabslogo.png') }}" style="width:100px"></a>
    </footer>

    <!-- Vendor js -->
    <script src="{{ asset('registration/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('registration/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/topbar.js') }}"></script>
    <script>
        $(document).ready(function () {
            
            var today = new Date()
            var curHr = today.getHours()
    
            if (curHr < 18) {
                $('#light-mode').trigger("click");
            } else {
                $('#dark-mode').trigger("click");
                
            }
        });
    </script>
    <script>
        topbar.config({
            autoRun: true,
            barThickness: 5,
            barColors: {
                '0': 'rgba(26,  188, 156, .9)',
                '.25': 'rgba(52,  152, 219, .9)',
                '.50': 'rgba(241, 196, 15,  .9)',
                '.75': 'rgba(230, 126, 34,  .9)',
                '1.0': 'rgba(211, 84,  0,   .9)'
            },
            shadowBlur: 10,
            shadowColor: 'rgba(0,   0,   0,   .6)'
        })
        $(document).ready(function() {
            $('#dark-mode').click(function(e) {
                e.preventDefault();
                topbar.show();
                $.ajax({
                    type: "get",
                    url: "{{ route('switch_mode') }}",
                    success: function(response) {
                        topbar.hide();
                        location.reload();
                    }
                });
            });
            $('#light-mode').click(function(e) {
                e.preventDefault();
                topbar.show();
                $.ajax({
                    type: "get",
                    url: "{{ route('switch_mode_to_light') }}",
                    success: function(response) {
                        topbar.hide();
                        location.reload();
                    }
                });
            });
            $('#reset_password').click(function(e) {
                e.preventDefault();
                topbar.show();
                location.href = 'reset-password-email/' + $('#username').val();
                topbar.hide();
            });
        });
    </script>
</body>

</html>
