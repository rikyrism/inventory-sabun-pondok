<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add this after other CSS links if necessary -->
    <style>
        .table-responsive-custom {
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
            max-width: 100%;
            display: block;
        }

        @media screen and (max-width: 767px) {
            .table-responsive-custom table {
                min-width: 650px;
            }
        }
    </style>
</head>
<body>
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Add Notification Icon for Mobile -->
        <div class="d-sm-none d-flex align-items-center ml-auto mr-2">
            <div class="dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Notification Counter Badge -->
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Notification Menu -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notificationsDropdown">
                    <h6 class="dropdown-header">
                        Notifikasi
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">12 Des 2023</div>
                            <span class="font-weight-bold">Stok barang A hampir habis!</span>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">10 Des 2023</div>
                            Pengingat: Cek stok barang B
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
                </div>
            </div>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Content goes here -->
        </ul>

    </nav>
    <!-- End of Topbar -->
</body>
</html>