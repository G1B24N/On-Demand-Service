@extends('layouts.app')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-testimonial/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style-kategori/style.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection

@section('addJavascript')
    <script src="{{ asset('js/script-testimonial/script.js') }}"></script>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
@endsection

{{-- <div class="preloader">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="pre-img">
                <img src="assets/img/footer-logo.png" alt="Logo">
            </div>
            <div class="spinner">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="loader_bars">
            <span></span>
        </div>
    </div>
</div> --}}

@if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
    </div>
@endif
<div class="main-banner pb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content">
                    <h1>1 Platform on-Demand-Services Terkemuka.</h1>
                    <p>Di saat penuh ketidakpastian ini, kami pasti ada untuk melayanimu</p>
                </div>
            </div>
            <div class="col-lg-6 pe-0">
                <div class="banner-img">
                    <img src="{{ asset('img/home-banner/main-home-banner.jpg') }}" alt="Banner Images">
                    <div class="banner-into-slider owl-carousel owl-theme">
                        <div class="banner-item">
                            <img src="{{asset('img/home-banner/banner-1.png')}}" alt="Banner Images">
                        </div>
                        <div class="banner-item">
                            <img src="{{asset('img/home-banner/banner-2.png')}}" alt="Banner Images">
                        </div>
                        <div class="banner-item">
                            <img src="{{asset('img/home-banner/banner-3.png')}}" alt="Banner Images">
                        </div>
                        <div class="banner-item">
                            <img src="{{asset('img/home-banner/banner-4.png')}}" alt="Banner Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="service-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>layanan</span>
            <h2>Do-App Memberikan Layanan yang Terbaik</h2>
            <p>Kami membangun layanan untuk membantumu melewati halangan</p>
        </div>
        @if(Auth::guest())
        <div class="row pt-45">
            <div class="col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="blog-content" style="background-image: url({{asset('img/layanan-banner/dofood-banner.jpg')}}); background-size: cover; background-position: center center; border-radius: 20px;">
                        <a href="{{route('doFood')}}" style="padding-top: 20px; padding-bottom: 20px;">
                            <h3 style="color: #27ae60;">Do-Food</h3>
                        </a>
                        <p class="text-white fw-bolder" style="-webkit-text-stroke: .2px black;">Nikmati food dari restoran favoritmu tanpa keluar rumah.</p>
                        <a href="{{route('doFood')}}" class="read-more-btn">Selengkapnya <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="blog-content" style="background-image: url({{asset('img/layanan-banner/doride-banner.jpg')}}); background-size: cover; background-position: center center; border-radius: 20px;">
                        <a href="{{route('doRide')}}" style="padding-top: 20px; padding-bottom: 20px;">
                            <h3 style="color: #27ae60;">Do-Ride</h3>
                        </a>
                        <p class="text-white fw-bolder" style="-webkit-text-stroke: .2px black;">Mengantarmu dari titik A ke B dengan tarif yang transparan.</p>
                        <a href="{{route('doRide')}}" class="read-more-btn">Selengkapnya <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row pt-45">
            <div class="col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="blog-content" style="background-image: url({{asset('img/layanan-banner/dofood-banner.jpg')}}); background-size: cover; background-position: center center; border-radius: 20px;">
                        <a href="{{route('doFood')}}" style="padding-top: 20px; padding-bottom: 20px;">
                            <h3 style="color: #27ae60;">Do-Food</h3>
                        </a>
                        <p class="text-white fw-bolder" style="-webkit-text-stroke: .2px black;">Nikmati food dari restoran favoritmu tanpa keluar rumah.</p>
                        <a href="{{route('doFood')}}" class="read-more-btn">Selengkapnya <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="blog-content" style="background-image: url({{asset('img/layanan-banner/doride-banner.jpg')}}); background-size: cover; background-position: center center; border-radius: 20px;">
                        <a href="{{route('doRide')}}" style="padding-top: 20px; padding-bottom: 20px;">
                            <h3 style="color: #27ae60;">Do-Ride</h3>
                        </a>
                        <p class="text-white fw-bolder" style="-webkit-text-stroke: .2px black;">Mengantarmu dari titik A ke B dengan tarif yang transparan.</p>
                        <a href="{{route('doRide')}}" class="read-more-btn">Selengkapnya <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<section class="choose-area ptb-30">
    <div class="container">
        <div class="section-title text-center">
            <span>Kenapa Memilih Kami</span>
            <h2>Do-App adalah Layanan Jasa yang Tepercaya</h2>
            <p>Jadi penjaga amanah yang siap bantu selesaikan masalah</p>
        </div>
        <div class="row pt-45">
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bx-box'></i>
                    <h3>Perusahaan Tepercaya</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bxs-coin-stack'></i>
                    <h3>Pembayaran aman</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bxs-truck'></i>
                    <h3>Pelayanan Cepat</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bxl-creative-commons'></i>
                    <h3>Pekerjaan Berkualitas</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bx-brush'></i>
                    <h3>Pengalaman Super</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bx-paint'></i>
                    <h3>Komitmen Layanan</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bx-like'></i>
                    <h3>Pelayanan Kepuasan</h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <i class='bx bx-money'></i>
                    <h3>Garansi Uang Kembali</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="testimonial-area ptb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="testimonial-content">
                    <div class="section-title text-center">
                        <span>Testimonial</span>
                        <h2>Kata Orang Tentang Kami</h2>
                    </div>
                    <div class="testimonial-slider owl-carousel owl-theme pt-45">
                        <div class="testimonial-item">
                            <h3>John Smith</h3>
                            <p>
                                What indication best sick be project proposal in attempt, train of the showed
                                some a forth. That homeless, won't many of goals thoughts volumes felt with of as he
                                this.
                            </p>
                        </div>
                        <div class="testimonial-item">
                            <h3>John Doe</h3>
                            <p>
                                What indication best sick be project proposal in attempt, train of the showed
                                some a forth. That homeless, won't many of goals thoughts volumes felt with of as he
                                this.
                            </p>
                        </div>
                        <div class="testimonial-item">
                            <h3>Evanaa</h3>
                            <p>
                                What indication best sick be project proposal in attempt, train of the showed
                                some a forth. That homeless, won't many of goals thoughts volumes felt with of as he
                                this.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="testimonial-img">
                    <div class="testimonial-bg-shape">
                        <img src="{{ asset('img/testimonial/testi-bg-shape.png') }}" alt="Testimonial Images">
                    </div>
                    <div class="testimonial-man">
                        <img src="{{ asset('img/testimonial/testi-pic.png') }}" alt="Testimonial Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <section class="newsletter pb-70">

    <div class="content">
        <h1 class="heading">Subcribe now</h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam ipsam repellat nostrum esse officiis unde quisquam corporis doloremque adipisci similique!</p>
        <form action="">
            <input type="email" name="" placeholder="enter your email" id="" class="email">
            <input type="submit" value="subscirbe" class="btn">
        </form>
    </div>

</section> --}}

<section class="clients pb-70">

    <div class="">
        <div class="row">
            <div class="col swiper-slide silde"><img src="{{ asset('img/client/Logo-GameLab.png') }}" alt=""></div>
            <div class="col swiper-slide silde"><img src="{{ asset('img/client/Logo-Educa.png') }}" alt=""></div>
            <div class="col swiper-slide silde"><img src="{{ asset('img/client/Logo-jnt.png') }}" alt=""></div>
            <div class="col swiper-slide silde"><img src="{{ asset('img/client/Logo-fedex.png') }}" alt=""></div>
        </div>
    </div>

</section>


{{-- <div class="blog-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Blogs</span>
            <h2>Our Regular Blog Post</h2>
            <p>
                What indication best sick be project proposal in attempt, train of the showed
                some a forth. That homeless, won't many of goals thoughts volumes felt.
            </p>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="{{asset('img/blog1.jpg')}}" alt="Blog Images">
                    </a>
                    <div class="blog-content">
                        <a href="blog-details.html">
                            <h3>Work Once Print 100+</h3>
                        </a>
                        <ul class="blog-admin">
                            <li>
                                <a href="#">
                                    <i class='bx bxs-user'></i>Admin
                                </a>
                            </li>
                            <li>
                                <i class='bx bx-calendar-alt'></i>
                                18 May 2020
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consect is etur adipiscing elit.</p>
                        <a href="blog-details.html" class="read-more-btn">Read More <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="{{asset('img/blog2.jpg')}}" alt="Blog Images">
                    </a>
                    <div class="blog-content">
                        <a href="blog-details.html">
                            <h3>Keep Your Print Great</h3>
                        </a>
                        <ul class="blog-admin">
                            <li>
                                <a href="#">
                                    <i class='bx bxs-user'></i>Admin
                                </a>
                            </li>
                            <li>
                                <i class='bx bx-calendar-alt'></i>
                                18 May 2020
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consect is etur adipiscing elit.</p>
                        <a href="blog-details.html" class="read-more-btn">Read More <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="blog-card">
                    <a href="blog-details.html">
                        <img src="{{asset('img/blog3.jpg')}}" alt="Blog Images">
                    </a>
                    <div class="blog-content">
                        <a href="blog-details.html">
                            <h3>Digital Print is Science</h3>
                        </a>
                        <ul class="blog-admin">
                            <li>
                                <a href="#">
                                    <i class='bx bxs-user'></i>Admin
                                </a>
                            </li>
                            <li>
                                <i class='bx bx-calendar-alt'></i>
                                18 May 2020
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consect is etur adipiscing elit.</p>
                        <a href="blog-details.html" class="read-more-btn">Read More <i
                                class='bx bxs-chevrons-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @else
        {{route('login')}}
@endif --}}
@endsection
