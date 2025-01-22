<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Aplikasi Persediaan Barang " />
    <meta name="author" content="Code Null" />
    <!-- Title -->
    <title>Aplikasi Persediaan Barang</title>
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />
    <!-- Fonts and icons -->
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
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugin/datepicker/css/bootstrap-datepicker.css') }}">
    <!-- Chosen CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugin/chosen/css/chosen.css') }}">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">
    <!-- jQuery Core -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            @include('layouts/header')
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            @include('layouts/navbar')
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        @include('layouts/sidebar')
        <!-- End Sidebar -->
        <div class="main-panel">
            <!-- Main Content -->
            <div class="content">
                <!-- panggil yeild "content" untuk menampilkan halaman konten -->
                @yield('content')
            </div>
            <!-- End Main Content -->
            <!-- Footer -->
            @include('layouts/footer')
            <!-- End Footer -->
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-out-alt mr-2"></i>Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin ingin logout?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Batal</button>
                    <a href="{{ route('auth.logout') }}" class="btn btn-danger btn-round"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Ya,
                        Logout</a>

                    <form id="logout-form" action="{{ route('auth.logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/js/plugin/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Chosen JS -->
    <script src="{{ asset('assets/js/plugin/chosen/js/chosen.jquery.js') }}"></script>
    <!-- Atlantis JS -->
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
    <!-- Custom Scripts -->
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    @stack('scripts')
</body>
</html>

