<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!-- data user login -->
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/avatar-2.png') }}" alt="image profile"
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a>
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <ul class="nav nav-secondary">

                <!-- panggil file "sidebar_menu" untuk menampilkan menu -->
                @include('layouts.sidebar_menu')
            </ul>
        </div>
    </div>
</div>

