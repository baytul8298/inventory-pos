<!doctype html>
<html lang="en" dir="ltr">
<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sindabad.com limited">
    <meta name="author" content="Sindabad.com Ltd.">
    <meta name="keywords"
          content="Distributor portal, Seller portal, Sindabad">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">
    <title>Login | {{ config('app.name') }}</title>
    <link id="style" href="{{ asset('admin/assets/css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/plugins.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/switcher/css/switcher.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/switcher/demo.css') }}" rel="stylesheet"/>

    <style>
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #f5f7fa;
        }
        .login-card {
            background: #fdfdfd;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 60px 40px 120px 40px;
            animation: fadeIn 0.8s ease-in-out;
            border: none !important;
        }

        .logo {
            width: 220px;
            margin-bottom: 50px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }

        .input-icon input {
            padding-left: 45px;
            height: 48px;
            border-radius: 10px;
            background: #f9f9f9;
            transition: 0.3s;
        }

        .input-icon input:focus {
            background: #fff;
            border-color: #2F89A1;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #999;
            font-size: 20px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="app sidebar-mini ltr light-mode">
<div class="auth-wrapper">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">

                <div class="card login-card">

                    <div class="text-center mb-4">
                        <a href="index.html">
                            <img src="{{ asset('admin/assets/images/brand/logo-white.png') }}" class="header-brand-img light-logo" alt="">
                            <img src="{{ asset('admin/assets/images/brand/logo-dark.png') }}" class="header-brand-img dark-logo" alt="">
                        </a>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h6 class="text-center" style="color: #c8c8c8; margin-bottom: 20px">Sign In</h6>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="zmdi zmdi-email"></i>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="input-icon">
                                <i class="zmdi zmdi-lock"></i>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                <span toggle="#password" class="toggle-password zmdi zmdi-eye"></span>
                            </div>
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <button type="submit" id="login-button" class="btn w-100 mt-3 py-1" style="background: #2F89A1; color: white;">
                            <span class="button-text" style="font-size: 14px">Log In</span>
                            <span class="button-loading" style="display: none;">Processing...</span>
                            <i class="fas fa-sign-in-alt ms-1"></i>
                        </button>

                        @if (session('message'))
                            <small class="text-{{ session('error') ? 'danger' : 'success' }}">
                                {{ session('message') }}
                            </small>
                        @endif

                        <div class="text-center pt-2">
                            <p class="text-muted mb-0">New Here? <a href="#" style="color: #2F89A1; font-weight: bold">Create a Seller Account</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/notifier/notifier.js') }}"></script>
<script src="{{ asset('admin/assets/js/notification.js') }}"></script>
<script src="{{ asset('admin/assets/js/themeColors.js') }}"></script>
<script src="{{ asset('admin/assets/js/show-password.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom-swicher.js') }}"></script>
<script src="{{ asset('admin/assets/switcher/js/switcher.js') }}"></script>
<script src="{{ asset('admin/assets/switcher/js/fontawesome.js') }}"></script>
<script>
    // $('#branch').select2({
    //     placeholder: "Select Branch",
    //     allowClear: true
    // });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.classList.toggle('zmdi-eye');
            this.classList.toggle('zmdi-eye-off');
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const button = document.querySelector('#login-button');
        const buttonText = button.querySelector('.button-text');
        const buttonLoading = button.querySelector('.button-loading');

        form.addEventListener('submit', function () {
            button.disabled = true;
            buttonText.style.display = 'none';
            buttonLoading.style.display = 'inline-block';
        });
    });
</script>

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var message = "{{ session('message') }}";
        var isError = "{{ session('error') }}";

        if (!window.performance || window.performance.navigation.type !== window.performance.navigation.TYPE_BACK_FORWARD) {
            if (message !== "") {
                if (isError === "1" || isError === "true") {
                    notifier.show('Oops!', message, 'danger', "{{ asset('admin/assets/images/notification/high_priority-48.png') }}", 10000);
                } else {
                    notifier.show('Success!', message, 'success', "{{ asset('admin/assets/images/notification/ok-48.png') }}", 10000);
                }
            }
        }
    });
</script>
</body>
</html>
