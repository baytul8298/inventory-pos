<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('admin/assets/images/brand/logo-white.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('admin/assets/images/brand/icon-dark.png') }}" class="header-brand-img toggle-logo" alt="logo">
                <img src="{{ asset('admin/assets/images/brand/icon-dark.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('admin/assets/images/brand/logo-dark.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main Navigation</h3>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                        <i class="side-menu__icon  fe fe-home"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fa fa-shopping-cart"></i>
                        <span class="side-menu__label">Purchase Entry</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">
                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Category</a></li>
                                            <li><a href="app-kanban.html" class="slide-item">Unit</a></li>
                                            <li><a href="calendar.html" class="slide-item">Product</a></li>
                                            <li><a href="app-calendar.html" class="slide-item">Supplier</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-rotate-right"></i>
                        <span class="side-menu__label">Purchase Return</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-file-text-o"></i>
                        <span class="side-menu__label">Purchase Record</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-line-chart"></i>
                        <span class="side-menu__label">Asset Entry</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-print"></i>
                        <span class="side-menu__label">Purchase Invoice</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-th-list"></i>
                        <span class="side-menu__label">Supplier Due Report</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-credit-card-alt"></i>
                        <span class="side-menu__label">Supplier Payment Report</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-list"></i>
                        <span class="side-menu__label">Supplier List</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-list-ul"></i>
                        <span class="side-menu__label">Purchase Return List</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-list-alt"></i>
                        <span class="side-menu__label">Purchase Return details</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="sidenav-menu-item" href="{{ route('products.index') }}">
                        <i class="side-menu__icon fa fa-tasks"></i>
                        <span class="side-menu__label">Re-Order List</span>
                    </a>
                </li>
            </ul>

            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </div>
</div>