<!doctype html>
<html lang="en" dir="ltr">


<!-- Mirrored from dev.techneinfosys.com/html/adminixor/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 20:39:02 GMT -->
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Adminixor – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Techne Infosys">
    <meta name="keywords"
        content="admin template, Adminixor admin template, dashboard template, flat admin template, responsive admin template, web app">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="https://dev.techneinfosys.com/html/adminixor/assets/images/brand/favicon.ico">

    <!-- TITLE -->
    <title>Login | {{ config('app.name') }}</title>
        
    <link id="style" href="{{ asset('admin/assets/css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    <!-- STYLE CSS -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet" />
    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('admin/assets/switcher/css/switcher.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/switcher/demo.css') }}" rel="stylesheet" />
</head>

<body class="app sidebar-mini ltr light-mode login-img">
    <div class="">
        <!-- PAGE -->
        <div class="page auth-page">
            <div class="">
                <!-- Theme-Layout -->

                <!-- CONTAINER OPEN -->
                <div class="login-container">
                    <div class="card login-wrap-main  p-6">
                        <div class="text-center mb-5 auth-logo">
                            <a href="index.html">
                                <img src="{{ asset('admin/assets/images/brand/logo-white.png') }}" class="header-brand-img light-logo" alt="">
                                <img src="{{ asset('admin/assets/images/brand/logo-dark.png') }}" class="header-brand-img dark-logo" alt="">
                            </a>
                        </div>
                        <span class="login-form-title"> Login </span>
                        @if ($errors->any())
                            <div class="alert alert-primary alert-dismissible fade show text-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x"></i></button>
                            </div>
                        @endif
                        <form class="login-form validate-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="wrap-input validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="wrap-input validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye-off" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <label class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Agree the <a href="#">terms and policy</a></span>
                            </label>
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn btn-primary">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0 d-inline-flex">Already have account ?<a href="authentication-signin.html" class="text-primary ms-1">Sign In</a></p>
                            </div>
                            <label class="login-social-icon"><span>Register with Social</span></label>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0)">
                                    <div class="social-login me-4 text-center">
                                        <i class="fa fa-google"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="social-login me-4 text-center">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="social-login text-center">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>


    <!--{ JQUERY JS }-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!--{ BOOTSTRAP JS }-->
    <script src="{{ asset('admin/assets/js/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('admin/assets/js/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <!--{ Color Theme js }-->
    <script src="{{ asset('admin/assets/js/themeColors.js') }}"></script>
    <!-- { Show Password js } -->
    <script src="{{ asset('admin/assets/js/show-password.min.js') }}"></script>
    <!--{ Custom-switcher }-->
    <script src="{{ asset('admin/assets/js/custom-swicher.js') }}"></script>
    <!--{ Switcher js }-->
    <script src="{{ asset('admin/assets/switcher/js/switcher.js') }}"></script>
    <script src="{{ asset('admin/assets/switcher/js/fontawesome.js') }}"></script>
    <script>
        $('#branch').select2({
            placeholder: "Select Branch",
            allowClear: true
        });
    </script>
</body>


<!-- Mirrored from dev.techneinfosys.com/html/adminixor/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2025 20:39:02 GMT -->
</html>