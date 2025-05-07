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
    
    <!-- Notification CSS -->
    <style>
        .notification {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #67c963; /* Default hijau */
            color: #ffffff;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            line-height: 20px;
        }
        
        .notif-icon {
            min-width: 40px; /* Menggunakan min-width untuk mencegah penyusutan ikon */
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0; /* Mencegah ikon mengecil saat teks panjang */
        }
        
        .notif-content {
            flex: 1;
            word-break: break-word; /* Membuat teks panjang turun ke baris berikutnya */
            min-width: 0; /* Membantu flex container beradaptasi dengan konten yang panjang */
        }
        
        .notif-center .dropdown-item {
            display: flex;
            align-items: flex-start; /* Menyelaraskan item ke atas untuk teks multi-baris */
            padding: 15px;
            border-bottom: 1px solid #ebedf2;
            white-space: normal; /* Memungkinkan teks untuk wrap */
        }
        
        /* Memastikan block di dalam notif-content tidak membuat container terlalu lebar */
        .notif-content .block {
            display: block;
            word-break: break-word;
        }
        
        .notif-box {
            width: 350px;
            max-height: 450px;
        }
        
        .notif-scroll {
            max-height: 350px;
            overflow-y: auto;
        }
        
        .notif-center .dropdown-item.active {
            background-color: #f8faf8;
        }
        
        .notif-center .dropdown-item:hover {
            background-color: #edf7ee;
        }
        
        .dropdown-title {
            border-bottom: 1px solid #ebedf2;
            padding: 15px;
            font-weight: bold;
        }
        
        /* Override warna default untuk class Bootstrap */
        .bg-success, .bg-primary, .bg-info {
            background-color: #67c963 !important;
        }
        
        .bg-danger {
            background-color: #f25961 !important;
        }
        
        /* Tambahkan class spesifik untuk notifikasi */
        .notif-add {
            background-color: #67c963 !important;
        }
        
        .notif-delete {
            background-color: #f25961 !important;
        }
    </style>
    
    <!-- jQuery Core -->
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
</head>

<body data-user-role="{{ auth()->user()->role }}">
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
    
    <!-- Include Pop-up Notification Components -->
    @include('components.popup-notification')

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
    <!-- Notification System -->
    <script src="{{ asset('assets/js/notification.js') }}"></script>
    <script src="{{ asset('assets/js/popup-notification.js') }}"></script>
    
    @if(session('notification'))
    <script>
        // Transfer notification from session to localStorage notification system
        $(document).ready(function() {
            // Wait for notification system to initialize
            setTimeout(function() {
                const notification = @json(session('notification'));
                if (notification && window.addNotification) {
                    addNotification(notification.message, notification.type, notification.category);
                }
            }, 100);
        });
    </script>
    @endif
    
    @if(session('success'))
    <script>
        // Show success popup for flash messages
        $(document).ready(function() {
            showSuccessPopup("{{ session('success') }}");
        });
    </script>
    @endif
    
    @if(session('error'))
    <script>
        // Show error popup for flash messages
        $(document).ready(function() {
            showErrorPopup("{{ session('error') }}");
        });
    </script>
    @endif
    
    @if(session('just_logged_in'))
    <script>
        // Tampilkan popup selamat datang dengan warna dan ikon khusus
        $(document).ready(function() {
            // Tampilkan popup selamat datang dengan nama pengguna
            showSuccessPopup("{{ session('welcome_message') }}", "Selamat Datang!");
            
            // Hapus flag session agar popup tidak muncul lagi setelah refresh
            @php
                session()->forget(['just_logged_in', 'welcome_message']);
            @endphp
        });
    </script>
    @endif
    
    @stack('scripts')
</body>
</html>

