<!-- Navigation bar start -->
<div class="nav_bar">
    <div class="wrapper">

        <div class="hamburger">
            <a href="javascript:;">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>

        <div class="logo">
            <a href="/">
                <img src="/images/logo-uptrend.svg" alt="Uptrend logo" width="100" height="100" />
            </a>
        </div>

        <!-- Mobile Icon Start -->
        <div class="utils at_bar mobile">            
            <!-- Profile start-->
            <div class="icon profile">
                <a href="javascript:;">
                    <img src="/images/icon-profile.svg" alt="profile icon" width="30" height="30" />
                </a>
                <div class="profile_dropdown">
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <ul>
                        @guest

                            @if (Route::has('register'))
                                <li><a class="btn btn_black" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @if (Route::has('login'))
                                <li><a class="btn btn_white_no_border" href="{{ route('login') }}">Login</a></li>
                            @endif
                        @else
                            @if(Auth::user()->admin)
                                <li>
                                    <a class="btn btn_white_no_border"
                                    href="{{ route('admin_dashboard') }}">Admin Dashboard</a>
                                </li>
                            @endif

                            <li>
                                <a class="btn btn_white_no_border"
                                href="{{ route('profile') }}">Profile</a>
                            </li>
                            
                            
                            <li>
                                <a class="btn btn_black" href="/logout"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form-mobile').submit();">Logout</a>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
            <!-- Profile ended-->
            <div class="icon cart">
                <a href="{{ route('cartIndex') }}">
                    @if($count_cart && !empty($count_cart) )
                    <span class="count">{{ count($count_cart) }}</span>
                    @endif
                    <img src="/images/icon-cart.svg" alt="cart icon" width="30" height="30" />
                </a>
            </div>
        </div><!-- Mobile Icon End -->
        
        <div class="black_layer"></div>

        
        <!-- Menu Start -->
        <div class="menu">

            <a href="javascript:;" class="mobile_close_btn"></a>

            <div class="utils at_menu mobile">
                <div class="icon search">
                    <a href="javascript:;">
                        <img src="/images/icon-magnifier.svg" alt="search icon" width="30" height="30" />
                    </a>

                    <div class="search_bar">
                        <form action="{{ route('product_list') }}" method="get" autocomplete="off" novalidate class="d-flex">
                            <input class="form-control me-2 search" type="search" name="search" placeholder="Search Outfit" aria-label="Search" maxlength="255">
                            <input type="submit" value="" style="background-image: url(/images/icon-magnifier.svg)" />
                        </form>
                    </div>
                </div>
            </div>

            <div class="utils desktop">
                <!-- Search button & search bar for product search -->
                <div class="icon search">
                    <a href="javascript:;">
                        <img src="/images/icon-magnifier.svg" alt="search icon" width="30" height="30" />
                    </a>

                    <div class="search_bar">
                        <form action="{{ route('product_list') }}" method="get" autocomplete="off" novalidate class="d-flex">
                            <input class="form-control me-2 search" type="search" name="search" placeholder="Search Outfit" aria-label="Search" maxlength="255">
                            <input type="submit" value="" style="background-image: url(/images/icon-magnifier.svg)" />
                        </form>
                    </div>
                </div>
                
                <!-- Profile start-->
                <div class="icon profile">
                    <a href="javascript:;">
                        <img src="/images/icon-profile.svg" alt="profile icon" width="30" height="30" />
                    </a>
                    <div class="profile_dropdown">
                        <form id="logout-form-desktop" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <ul>
                            @guest

                                @if (Route::has('register'))
                                    <li><a class="btn btn_black" href="{{ route('register') }}">Register</a></li>
                                @endif
                                @if (Route::has('login'))
                                    <li><a class="btn btn_white_no_border" href="{{ route('login') }}">Login</a></li>
                                @endif
                            @else
                                @if(Auth::user()->admin)
                                    <li>
                                        <a class="btn btn_white_no_border"
                                        href="{{ route('admin_dashboard') }}">Admin Dashboard</a>
                                    </li>
                                @endif

                                <li>
                                    <a class="btn btn_white_no_border"
                                    href="{{ route('profile') }}">Profile</a>
                                </li>
                                
                                <li>
                                    <a class="btn btn_black" href="/logout"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form-desktop').submit();">Logout</a>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </div>
                <!-- Profile ended-->
                <div class="icon cart">
                    <a href="{{ route('cartIndex') }}">
                        @if($count_cart && !empty($count_cart) )
                        <span class="count">{{ count($count_cart) }}</span>
                        @endif
                        <img src="/images/icon-cart.svg" alt="cart icon" width="30" height="30" />
                    </a>
                </div>
            </div>

            <nav>
                <ul>
                    <li>
                        <a class="active" href="/product">All Outfits</a>
                    </li>
                    @foreach ($genders as $gender)
                        <li>
                            <a href="/{{ $gender->name }}/product" class="text-transform-capitalize">{{ $gender->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            
        </div><!-- Menu End -->

    </div>
</div><!-- Navigation bar end -->
