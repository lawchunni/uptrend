<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fa fa-tachometer fa-fw me-3"></i>
                    <span>Dashboard</span>
                </a>
                <a href="/admin/order" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-clipboard fa-fw me-3"></i>
                    <span>Orders</span>
                </a>
                <a href="/admin/product" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-shirt fa-fw me-3"></i>
                    <span>Products</span>
                </a>
                <a href="/admin/category" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-bar fa-fw me-3"></i>
                    <span>Categories</span>
                </a>
                <a href="/admin/advertisement" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-rectangle-ad fa-fw me-3"></i>
                    <span>Advertisements</span>
                </a>
                <a href="/admin/inquiry" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-question fa-fw me-3"></i>
                    <span>Inquiry</span>
                </a>
                <a href="/admin/user" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-user fa-fw me-3"></i>
                    <span>Users</span>
                </a>
                {{-- <a href="/admin/address" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-location-dot fa-fw me-3"></i>
                    <span>Addresses</span>
                </a> --}}
                <a href="/admin/tax" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-sack-dollar fa-fw me-3"></i>
                    <span>Taxes</span>
                </a>
                <a href="/admin/shipping-charge" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-truck-fast fa-fw me-3"></i>
                    <span>Shipping Charge</span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MobileNavBar"
                aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand" href="/admin/dashboard">
                <img src="/images/logo-uptrend.svg" width="70" height="70" alt="UPtrend logo"
                    class="d-none d-lg-inline" />
                <span class="d-none d-lg-inline">Admin Panel</span>
            </a>

            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
                <li class="nav-item me-2">
                    <a class="nav-link btn text-success" href="/" target="_blank"
                        role="button">Customer Site</a>
                </li>
                <!-- User -->
                <li class="nav-item me-2">
                    <a class="nav-link btn" href="{{ route('profile') }}"
                        target="_blank"
                        >{{ Auth::user()->first_name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn text-danger" href="/logout"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <!-- Mobile Navbar -->
            <div class="collapse flex-grow-1 d-lg-none" id="MobileNavBar" style="flex-basis: 100%">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/order">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/category">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/advertisement">Advertisements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/inquiry">Inquiry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/user">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/tax">Taxes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-center" href="/admin/shipping-charge">Shipping Charge</a>
                    </li>
                </ul>
            </div>
            <!-- Mobile Navbar -->

        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->
