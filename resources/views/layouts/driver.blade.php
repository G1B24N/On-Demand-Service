<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--- css --->
    
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/boxicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">

    <link rel="stylesheet" href="{{asset('css/nice-select.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('css/theme-dark.css')}}">

    <link rel="stylesheet" href="{{asset('css/style-map/style.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    {{-- <script src="https://unpkg.com/vue@3"></script> --}}

    @yield('addCss')

</head>
<body>
    <div id="notifDiv"></div>
    <div id="app">

        <!-- NAVBAR -->
        <div class="navbar-area">

            <div class="mobile-nav">
                <a href="{{route('home')}}" class="logo">
                    Do<span>Apps</span>
                </a>
            </div>
        
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="logo" href="/home">
                            Do<span>App</span>
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="/dashboard_driver" class="nav-link active">
                                        Home
                                    </a>
                                </li>
                                {{-- @if(Auth::guest())
                                <li class="nav-item">
                                    <a href="#" class="nav-link phone-btn">
                                        Layanan
                                        <i class='bx bx-plus'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{route('login')}}" class="nav-link">
                                                Do-Food
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('login')}}" class="nav-link">
                                                Do-Ride
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @else --}}
                                {{-- <li class="nav-item">
                                    <a href="#" class="nav-link phone-btn">
                                        Layanan
                                        <i class='bx bx-plus'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{route('doFood')}}" class="nav-link">
                                                Do-Food
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('doRide')}}" class="nav-link">
                                                Do-Ride
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @endif --}}
                                <li class="nav-item">
                                    <a href="{{route('pesan')}}" class="nav-link">
                                        Pesanan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('riwayat')}}" class="nav-link">
                                        History
                                    </a>
                                </li>
                            </ul>
                            
                            {{-- <div class="menu-btn">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <div>
                                            @if(Auth::guest())
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('register') }}" class="nav-link">Signup</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @else
                                        <a href="" class="phone-btn p-3">
                                            <i class='bx bxs-user'></i>
                                            <span class="text-white">{{ Auth::user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu"> --}}
                                            {{-- <li class="nav-item">
                                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="nav-link">Signup</a>
                                            </li> --}}
                                            {{-- <li class="nav-item">
                                                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="menu-btn">
                                <ul class="navbar-nav m-auto">
                                    @if (Auth::guest())
                                    <li class="nav-item">
                                        <a href="{{route('login')}}">login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('register')}}">register</a>
                                    </li>
                                    @elseif (Auth::user()->role == 'Driver')
                                    <li class="nav-item">
                                        <a class="phone-btn text-white p-3" href="{{url('/')}}">{{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu">
                                            {{-- <li class="nav-item">
                                                <a href="{{ url('dashboard_driver') }}" class="nav-link">Dashboard</a>
                                            </li>  --}}
                                            <li class="nav-item">
                                                <a href="{{ url('profile-driver') }}" class="nav-link">Profile</a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}" class="nav-link">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="phone-btn text-white p-3" href="{{url('/')}}">{{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="{{ url('my-profile') }}" class="nav-link">Profile</a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('logout') }}" class="nav-link">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endif
                                </ul>
                            </div>

                            
                            <div class='switch-box'>
                                <label id='switch' class='switch'>
                                    <input type='checkbox' onchange='toggleTheme()' id='slider'>
                                    <span class='slider round'></span>
                                </label>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

        @yield('content')

        <!-- FOOTER -->
        <footer class="footer-area">
            <div class="container">
                <div class="footer-contact">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-card">
                                <i class='bx bx-time'></i>
                                <h3>24/Hours</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-card">
                                <i class='bx bxs-map'></i>
                                <h3>Central Java, Indonesia</h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-card">
                                <i class='bx bxs-phone-call'></i>
                                <h3 class="media-tel">
                                    <a href="tel:+19876543210">+1 987 6543 210</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-top-list pb-70">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer-list">
                                <h3>Layanan</h3>
                                <ul>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="{{route('doFood')}}">Do-Food</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="{{route('doRide')}}">Do-Ride</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="footer-list">
                                <h3>Akses Cepat</h3>
                                <ul>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="{{route('home')}}">Home</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="{{route('about')}}">About Us</a>
                                    </li>
                                    <li>
                                        <i class='bx bxs-chevron-right'></i>
                                        <a href="{{route('contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="footer-side-list">
                                <h3>Hubungi Kami</h3>
                                <ul>
                                    <li>
                                        <i class='bx bxs-phone'></i>
                                        <a href="tel:+11234567891">+62 882 3865 3055</a>
                                    </li>
                                    {{-- <li>
                                        <i class='bx bxs-phone'></i>
                                        <a href="tel:+19876543210">+1 9876 543 210</a>
                                    </li> --}}
                                    <li>
                                        <i class='bx bxl-telegram'></i>
                                        <a href="/cdn-cgi/l/email-protection#adc8c0ccc4c1edddc4d5c4de83cec2c0"><span style="text-transform: none"
                                                {{-- class="__cf_email__"
                                                data-cfemail="f1949c90989db18198899882df929e9c" --}}
                                                >cs@doapps.com</span></a>
                                    </li>
                                    {{-- <li>
                                        <i class='bx bxl-telegram'></i>
                                        <a href="/cdn-cgi/l/email-protection#ef878a838380af9f8697869cc18c8082"><span
                                                class="__cf_email__"
                                                data-cfemail="630b060f0f0c23130a1b0a104d000c0e">[email&#160;protected]</span></a>
                                    </li> --}}
                                    <li>
                                        <i class='bx bxs-map'></i>
                                        <a  target="_blank" href="https://www.google.com/maps/place/Gamelab+Indonesia/@-7.3223703,110.5036376,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a791eea650a7b:0xa48e44ca27450c1b!8m2!3d-7.3223756!4d110.5058263">Jawa Tengah, Indonesia</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-3">
                            <div class="footer-logo">
                                Do<span>App</span>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-9">
                            <div class="bottom-text">
                                <p>
                                    Copyright @<script data-cfasync="false"
                                        src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> <span style="color: #27ae60">Do</span>App. All Rights Reserved 
                                    {{-- <a href="" target="_blank"></a> --}}
                                </p>
                                <ul class="social-bottom">
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i class='bx bxl-facebook'></i></a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/i/flow/login" target="_blank"><i class='bx bxl-twitter'></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/?hl=id" target="_blank"><i class='bx bxl-instagram'></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('js/meanmenu.js')}}"></script>

    <script src="{{asset('js/wow.min.js')}}"></script>

    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>

    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('js/form-validator.min.js')}}"></script>

    <script src="{{asset('js/contact-form-script.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1eGdP6hCYQ06z86dMEwoLNFMPYPbhgYs&amp;libraries=places&amp;callback=initMap"></script>
    
    <script src="{{asset('js/script-map/script.js')}}"></script>

    <script src="{{asset('js/custom.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script
    src="http://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    @yield('addJavascript')

</body>
</html>
