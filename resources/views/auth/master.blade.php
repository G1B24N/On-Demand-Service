<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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

    <link rel="stylesheet" href="{{ asset('css/style-vid/style.css') }}">


    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    @yield('addCss')
</head>

<body class="hold-transition login-page banner-vid">
    <video autoplay loop muted
        src="{{ asset('img/video/sign-in-vid.mp4') }}">
    </video>
    <div class="login-box d-block text-center pt-5 ">
        <div class="login-logo">
         {{-- <strong> {{config('app.name')}} </strong> --}}
        </div>
        
        @yield('content')
    </div>
    <!-- /.login-box -->

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
</body>

</html>