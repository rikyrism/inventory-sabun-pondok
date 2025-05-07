<nav class="navbar navbar-header navbar-expand-lg" data-background-color="purple2">
    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <!-- Notification Bell -->
            <li class="nav-item dropdown hidden-caret mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification" id="notification-badge" style="display: none;">0</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title d-flex justify-content-between">
                            <span>Notifikasi</span>
                            <a href="javascript:void(0)" class="clearNotifications text-danger">Hapus Semua</a>
                        </div>
                    </li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center" id="notification-list">
                                <!-- Notification items will be populated here -->
                                <div class="text-center py-3 notification-empty">
                                    <p>Tidak ada notifikasi</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- data user login -->
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="javascript:void(0)"
                    aria-expanded="false">
                    <div class="avatar-sm-top mt-1">
                        <img src="/assets/img/avatar-1.png" alt="image profile" class="avatar-img rounded-circle">
                        <i class="fas fa-angle-down avatar-title"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <li>
                        <div class="user-box">
                            <div class="avatar-lg"><img src="/assets/img/avatar-2.png" alt="image profile"
                                    class="avatar-img rounded"></div>
                            <div class="u-text pt-1">
                                <h4>{{ auth()->user()->nama_user }}</h4>
                                <p class="text-muted">{{ auth()->user()->role }}</p>
                            </div>
                        </div>
                    </li>
                    <!-- menu user -->
                    <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile.change-password') }}">
                            <i class="fas fa-user-lock mr-1"></i> Ubah Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalLogout">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

