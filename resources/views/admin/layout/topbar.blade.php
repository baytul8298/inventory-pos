<div class="app-header header sticky">
    <div class="container-fluid main-container">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
               href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round"
                     class="feather feather-grid status_toggle middle sidebar-toggle">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
            </a>
            <!-- sidebar-toggle-->
            <a class="logo-horizontal " href="index.html">
                <img src="{{ asset('admin/assets/images/brand/logo-white.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('admin/assets/images/brand/logo-dark.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
            <div class="main-header-center ms-3 d-none d-lg-block">
                <span style="font-size: 18px !important; font-weight: 600">{{ Auth::check() ? Auth::user()->name : 'Guest' }} - Dashboard</span>
            </div>
            <div class="d-flex order-lg-2 ms-auto header-right-icons">
                <!-- SEARCH -->
                <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                        aria-controls="navbarSupportedContent-4" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical"></span>
                </button>
                <div class="navbar navbar-collapse responsive-navbar p-0">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <div class="d-flex order-lg-2">
                            <div class="dropdown d-lg-none d-flex">
                                <a href="javascript:void(0)" class="nav-link icon"
                                   data-bs-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-start">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control" placeholder="Search....">
                                        <div class="input-group-text btn btn-primary">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- COUNTRY -->
                            
                            <div class="topbar-item d-flex align-items-center country">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle branch-dropdown" href="#" id="branchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <big>Branch Access</big>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="branchDropdown">
                                        @foreach (\App\Models\Branch::where('status', 'a')->orderBy('branch_name', 'asc')->get() as $branch)
                                            <li>
                                                <a class="dropdown-item branch-link d-flex align-items-center"
                                                    data-bs-toggle="modal"
                                                    href="#modaldemo8"
                                                    data-id="{{ $branch->id }}"
                                                    data-name="{{ $branch->branch_name }}">
                                                    <i class="fa fa-landmark me-2"></i> {{ $branch->branch_name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="demo-icon nav-link icon">
                                <i class="fe fe-settings text_primary"></i>
                            </div>
                            <!-- SIDE-MENU -->
                            <div class="dropdown d-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-minimize fullscreen-button"></i>
                                </a>
                            </div>
                            <!-- FULL-SCREEN -->
                            <div class="dropdown d-flex profile-1">
                                <a href="javascript:void(0)" data-bs-toggle="dropdown" class="nav-link user-dropdown">
                                    <img src="{{ asset('admin/assets/images/profiles/5.jpg') }}" alt="profile-user" class="profile-user avatar  cover-image">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-0 fs-14 fw-semibold">Aashvi Monroe</h5>
                                            <small class="text-muted">Super Admin</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="user-account-view.html">
                                        <i class="dropdown-icon fe fe-user"></i> Profile
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <i class="dropdown-icon fe fe-alert-circle"></i> Sign out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .branch-dropdown {
        background-color: #01C0C8;
        color: white !important;
        padding: 8px 15px;
        border-radius: 5px;
    }
    .branch-dropdown:hover {
        background-color: #01C0C8;
    }
    .dropdown-item {
        background-color: white !important;
        color: black !important;
        border-radius: 5px;
        padding: 10px;
    }
    .dropdown-item:hover {
        background-color: #f0f0f0 !important;
    }
    .dropdown-menu {
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .dropdown-menu::before {
        content: "";
        position: absolute;
        top: -5px;
        right: 15px;
        width: 10px;
        height: 10px;
        background-color: white;
        transform: rotate(45deg);
        box-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
    }
</style>
