<!-- Header -->

<header class="header">
    <!-- Top Bar -->
    <div class="top_bar">
        <div class="top_bar_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                            <ul class="top_bar_contact_list">
                                <li><div class="question">Have any questions?</div></li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <a class="text-white" href="tel:+94717275539">(+94)71-727-5539</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <a class="text-white" href="mailto:hpbandara94@gmail.com">hpbandara94@gmail.com</a>
                                </li>
                            </ul>
                            {{--<div class="top_bar_login ml-auto">--}}
                                {{--<div class="login_button"><a href="#">Register or Login</a></div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Content -->
    <div class="header_container" >
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="header_content d-flex flex-row align-items-center justify-content-start">
                        <div class="logo_container">
                            <a href="{{route('home')}}">
                                <div class="logo_text">Best <span>Tuition Teacher</span></div>
                            </a>
                        </div>
                        <nav class="main_nav_contaner ml-auto">
                            <ul class="main_nav">
                                <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'home' ? 'active' : '' }}"><a id="home" href="{{route('home')}}">Home</a></li>
                                <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'search' ? 'active' : '' }}"><a href="{{route('search')}}">Search</a></li>

                                @if(\Illuminate\Support\Facades\Auth::check())


                                    @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role <= 3)
                                    <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'myProfile' ? 'active' : '' }}"><a href="{{route('myProfile')}}">My Profile</a></li>
                                    @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role <= 2)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                                    Admin
                                                </a>
                                                <ul style="width: 200%;" class="dropdown-menu {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'adminViewComments' ||  \Illuminate\Support\Facades\Route::currentRouteName() == 'addCategory' ? 'active' : '' }}">
                                                    <li  class="ml-2"><a href="{{route('addCategory')}}">Add Category</a></li>
                                                    <li  class="ml-2"><a href="{{route('adminViewComments')}}">Comments</a></li>
                                                </ul>
                                            </li>

                                        @endif


                                @endif

                                {{--<li><a href="contact.html">Contact</a></li>--}}
                                @if(\Illuminate\Support\Facades\Auth::check())

                                <li>
                                    <a  href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                                    @else
                                    <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'signUp' ? 'active' : '' }}"><a href="{{route('signUp')}}">Sign up</a></li>
                                    <li class="{{ \Illuminate\Support\Facades\Route::currentRouteName() == 'login' ? 'active' : '' }}"><a href="{{route('login')}}">Login</a></li>

                                @endif
                                @if( \Illuminate\Support\Facades\Auth::guest() || \Illuminate\Support\Facades\Auth::user()->user_role_iduser_role <= 3 )
                                <li><a class="btn addClassBtn text-white" href="{{route('myProfile',['classes'])}}">Add Class</a></li>
                                @endif


                            </ul>

                            <!-- Hamburger -->

                            <div class="hamburger menu_mm" >
                                <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Search Panel -->
    <div class="header_search_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                        <form action="#" class="header_search_form">
                            <input type="search" class="search_input" placeholder="Search" required="required">
                            <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Menu mobile view-->

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="search">
        <form action="#" class="header_search_form menu_mm">
            <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
            <button class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                <i class="fa fa-search menu_mm" aria-hidden="true"></i>
            </button>
        </form>
    </div>
    <nav class="menu_nav">
        <ul class="menu_mm">
            <li class="active"><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('search')}}">Search</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())
                @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role <= 2)
                    <li><a href="{{route('addCategory')}}">Add Category</a></li>

                @endif

                @if(\Illuminate\Support\Facades\Auth::user()->user_role_iduser_role <= 3)
                    <li><a href="{{route('myProfile')}}">My Profile</a></li>
                @endif
            @endif

            <li><a href="contact.html">Contact</a></li>
            @if(\Illuminate\Support\Facades\Auth::check())

                <li><a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
            @else
                <li><a href="{{route('signUp')}}">Sign up</a></li>
                <li><a href="{{route('login')}}">Login</a></li>

            @endif
        </ul>
    </nav>
</div>