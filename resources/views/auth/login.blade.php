
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Persediaan Barang</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        .form-floating-label .user-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .form-floating-label .show-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            padding-left: 40px;
        }
    </style>
</head>

<body class="login">
    @session('success')
        <div class="alert alert-notify alert-secondary alert-dismissible fade show" role="alert">
            <span data-notify="icon" class="fas fa-check"></span>
            <span data-notify="title" class="text-secondary">Sukses!</span>
            <span data-notify="message">{{ $value }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsession
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <div class="text-center mb-4">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="95px">
            </div>
            <h3 class="text-center">Aplikasi Persediaan Barang<br>{{ config('app.name') }}</h3>
            <form action="{{ route('auth.login') }}" method="post" class="needs-validation" novalidate>
                @csrf

                @session('error')
                    <div class="alert alert-danger" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <div class="form-group form-floating-label">
                    <i class="fas fa-user user-icon"></i>
                    <input type="email" id="email" name="email" class="form-control input-border-bottom"
                        autocomplete="off" required placeholder="Email">

                    <div class="invalid-feedback">Email tidak boleh kosong.</div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group form-floating-label">
                    <i class="fas fa-lock user-icon"></i>
                    <i class="flaticon-interface show-password"></i>
                    <input type="password" id="password" name="password" class="form-control input-border-bottom"
                        autocomplete="off" required placeholder="Password">
                    <div class="invalid-feedback">Password tidak boleh kosong.</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-action mt-2">
                    <input type="submit" name="login" value="LOGIN"
                        class="btn btn-secondary btn-rounded btn-login btn-block">
                </div>

                <div class="login-footer mt-4">
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/ready.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
</body>

</html>

