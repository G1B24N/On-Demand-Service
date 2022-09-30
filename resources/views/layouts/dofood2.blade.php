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

    {{-- <link rel="stylesheet" href="{{asset('css/style-2.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('css/style-map/style.css')}}">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    @yield('addCss')

</head>
<body>
    <div id="app">

        <!-- NAVBAR -->
        <div class="navbar-area">

            <div class="mobile-nav">
                <a href="{{route('doFood')}}" class="logo">
                    Do<span>App</span>
                </a>
            </div>
        
            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light ">
                        <a class="logo" href="{{route('home')}}">
                            Do<span>App</span>
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{route('doFood')}}" class="nav-link active">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
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
                                <li class="nav-item">
                                    <a href="{{route('product')}}" class="nav-link">
                                        Belanja
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('contact')}}" class="nav-link">
                                        Contact
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about')}}" class="nav-link">
                                        About
                                    </a>
                                </li>
                            </ul>
                            {{-- <div class="search-bar">
                                <div class="input-group ">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                    <input type="search" id="data-table" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div> --}}
                           
                            {{-- <div class="cart-area">
                                <a href="{{route('cart')}}">
                                    <i class='bx bx-cart'></i>
                                    @if (!empty($notif))
                                    <span>{{ $notif }}</span>
                                    @endif
                                </a>
                            </div> --}}
                            <div class="menu-btn">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a href="#" class="phone-btn p-3">
                                            <i class='bx bxs-user'></i>
                                            <span class="text-white">{{ Auth::user()->name }}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            {{-- <li class="nav-item">
                                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="nav-link">Signup</a>
                                            </li> --}}
                                            @if (Auth::user()->role == 'Seller')
                                            <li class="nav-item">
                                                {{-- <a href="{{ url('dashboard_seller') }}" class="nav-link">Dashboard</a> --}}
                                                @if (Auth::user()->role == 'Seller')
                                                     <a href="/restaurant/create" class="btn btn-success" role="button">Dashboard</a>
                                                @else
                                                    <a href="/restaurant/index" class="btn btn-success" role="button">Dashboard</a>
                                                @endif
                                            </li> 
                                            @endif
                                            <li class="nav-item">
                                                <a href="{{ url('my-profile') }}" class="nav-link">Profile</a>
                                            </li> 
                                            <li class="nav-item">
                                                <a href="{{ url('/do-food/history') }}" class="nav-link">Riwayat Pemesanan</a>
                                            </li>   
                                            <li class="nav-item">
                                                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                                            </li>
                                        </ul>
                                    </li>
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
        
        {{-- @if (($cekPesanan))
        <div>
            <a href='do-food/orderNow' type='button' class='buy-now-btn'><i class="bx bx-cart"></i></a>
            <a href='do-food/orderNow' type='button' class='buy-now-btn'>><i class="bx bx-cart"></i></a>
        </div>
        @endif --}}
        
        <!--footer-->
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

    <script src="{{asset('js/custom.js')}}"></script>

    <script src="{{asset('js/custom-2.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1eGdP6hCYQ06z86dMEwoLNFMPYPbhgYs&amp;libraries=places&amp;callback=initMap"></script>
    
    <script src="{{asset('js/script-map/script-map-dofood.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>



    @yield('addJavascript')
</body>
</html>

{{-- <script>
    // $(document).ready(function() {
    //     readData()
    //     $("#input").keyup(function(){
    //         var strcari = $("#input").val();
    //         if (strcari != ""){
    //             $(#read).html('<center><p class="text-muted">waiting fir Search Products</p></center>');
    //             $.get("{{ url('ajax') }}", "name" + strcari,
    //                 function (data) {

    //                     $("#read").html(data);

    //                 },
    //             );
    //         }else{
    //             readData()
    //         }
    //     });
    // });

    // function readData(){
    //     $.get("{{ url('read')}}",{},
    //     function(data){
    //         $("#read").html(data);
    //     })
    // }
</script> --}}
