<header id="page-topbar">
    <div class="navbar-header mx-auto">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box d-block d-lg-none">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('vendor/foxia/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm me-2 font-size-24 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search">
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('vendor/foxia/images/users/avatar-6.jpg') }}" alt="Header Avatar">
                    <span
                        class="d-none d-md-inline-block ms-1">{{ Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name }}<i
                            class="mdi mdi-chevron-down"></i> </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    {{-- <a class="dropdown-item" href="{{ route('employee.profile') }}"><i class="dripicons-user font-size-16 align-middle me-2 text-muted"></i> Profile</a> --}}
                    {{-- <a class="dropdown-item" href="{{ route('employee.change_password') }}"><i class="dripicons-user font-size-16 align-middle me-2 text-muted"></i>Change Password</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i
                            class="dripicons-exit font-size-16 align-middle me-2 text-muted"></i> Logout</a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="mdi mdi-spin mdi-cog"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="topnav">
        <div class="container-fluid">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box d-none d-lg-block">
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('vendor/foxia/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ asset('vendor/foxia/images/logo.png') }}" alt="" height="20">
                        </span>
                    </a>
                </div>
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="dripicons-meter me-2"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.new_employee') }}">
                                    <i class="dripicons-plus me-2"></i>New Employee
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.employee_leave') }}">
                                    <i class=" dripicons-calendar me-2"></i>Employee Leave
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{route('employee.apply_leave')}}">
                                    <i class="dripicons-meter me-2"></i>Apply Leave
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>



</header>
