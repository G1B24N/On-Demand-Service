@extends('layouts.app')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="inner-banner" style="background-image: url({{asset('img/about/about-banner.jpg')}})">
    <div class="container">
        <div class="inner-title">
            <h3>About Us</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>


<div class="about-area pt-100 pb-70">
    
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="about-img">
                    <img src="{{ asset('img/about/about-main.png') }}" alt="About Images">
                    {{-- <div class="about-bg-shape">
                        <img src="{{ asset('img/bg-shape.png') }}" alt="About Shape">
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7">
                <div class="about-content">
                    <span>About Us</span>
                    <h2>Kami membayangkan kembali cara dunia bergerak menjadi lebih baik</h2>
                    <p>
                        Gerakan adalah apa yang kita kuasai. Ini adalah sumber kehidupan kami. Itu mengalir melalui pembuluh darah kita. Itu yang membuat kita bangun dari tempat tidur setiap pagi. Ini mendorong kita untuk terus-menerus memikirkan kembali bagaimana kita bisa bergerak lebih baik. Untukmu. Untuk semua tempat yang ingin Anda kunjungi. Untuk semua hal yang ingin Anda dapatkan. Untuk semua cara yang ingin Anda hasilkan. Di seluruh dunia. Dalam waktu nyata. Dengan kecepatan luar biasa sekarang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-shape">
    <img src="{{ asset('img/produk-shape.png') }}" alt="Products Shape">
</div>

<div class="designer-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>Developer kami</span>
            <h2>Website Ini Dibuat Oleh Kami</h2>
        </div>
        <div class="row justify-content-center align-content-center pt-45">
            <div class="col-lg-3 col-sm-6">
                <div class="designer-card">
                    <div class="designer-img">
                        <img src="{{asset('img/about/designer-1.jpg')}}" alt="Designer Images">
                    </div>
                    <div class="designer-content">
                        <h3>Muhammad Gibran</h3>
                        {{-- <span>Frontend Developer</span> --}}
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?hl=id" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="designer-card">
                    <div class="designer-img">
                        <img src="{{asset('img/about/designer-2.jpg')}}" alt="Designer Images">
                    </div>
                    <div class="designer-content">
                        <h3>Sukma Indah</h3>
                        {{-- <span>Backend Designer</span> --}}
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?hl=id" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="designer-card">
                    <div class="designer-img">
                        <img src="{{asset('img/about/designer-3.jpg')}}" alt="Designer Images">
                    </div>
                    <div class="designer-content">
                        <h3>Muhamad Ilham</h3>
                        {{-- <span>Frontend Developer</span> --}}
                        <div class="social-icon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/i/flow/login" target="_blank">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/?hl=id" target="_blank">
                                        <i class='bx bxl-instagram'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
