@extends('layouts.dofood')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-kategori/style.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/script-kategori/script.js') }}"></script>
@endsection

<div class="home-slider owl-carousel owl-theme">
    <div class="slider-item"
        style="background-image: url({{ asset('img/dofood-carousel/carousel-makanan-1.png') }}); max-height: 500px;">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Pesen DoFood = kontribusi buat bangsa</h1>
                        <p>Seluruh pesanan yang terjadi di DoFood telah membantu memperkuat perekonomian Indonesia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image: url({{ asset('img/dofood-carousel/carousel-makanan-2.png') }})">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>Beli makanan dari beragam mitra!</h1>
                        <p>Mitra merchant yang sudah terdaftar yang menawarkan beragam pilihan makanan dan
                            minuman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item" style="background-image: url({{ asset('img/dofood-carousel/carousel-makanan-3.png') }})">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="slider-content">
                        <h1>DoFood tersedia di banyak kota</h1>
                        <p>
                            Kami akan terus memperbanyak wilayah operasional DoFood, biar semua orang se-Indonesia makin
                            mudah kalau mau pesen makanan!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-0" style="margin-top: 60px">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                {{-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5> --}}
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40" data-aos="fade-right"
                data-aos-duration="1000">Menu Murah</h2>
            </div>
        </div>
        <div class="row h-100 gx-2 mt-7">
            @foreach ($barang as $b) 
            @if($b->harga < 20000)
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4" style="margin-bottom: 50px; padding-right: 10px">
                <div class="card card-span h-100" style="border-style: none">
                    <div class="position-relative"> <img class="img-fluid w-100" style="border-radius: 20px;"
                            src="{{ url('uploads/barang/') }}/{{ $b->gambar }}" alt="..." />
                        <div class="card-actions" style="position: absolute; bottom:0; z-index:1; width:100%;">
                            <div class="badge badge-foodwagon bg-warning p-4">
                                <div class="d-flex flex-between-center">
                                    <div class="text-white" style="font-size: 3.58318rem">15</div>
                                    <div class="d-block text-white" style="font-size: 1.44rem">% <br />
                                        <div class="mt-2" style="font-size: 1.2rem; font-weight: 400">Off</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h3 class="text-1000 text-truncate" style="font-weight: 700;">{{$b->nama_barang}}</h3>
                    </div><a class="stretched-link" href="#"></a>
                </div>
            </div>
            @endif
            @endforeach
            {{-- <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4" style="margin-bottom: 50px; padding-right: 10px">
                <div class="card card-span h-100" style="border-style: none">
                    <div class="position-relative"> <img class="img-fluid w-100" style="border-radius: 20px;"
                            src="{{ asset('img/discount-item-2.png') }}" alt="..." />
                        <div class="card-actions" style="position: absolute; bottom:0; z-index:1; width:100%;">
                            <div class="badge badge-foodwagon bg-warning p-4">
                                <div class="d-flex flex-between-center">
                                    <div class="text-white" style="font-size: 3.58318rem">10</div>
                                    <div class="d-block text-white" style="font-size: 1.44rem">% <br />
                                        <div class="mt-2" style="font-size: 1.2rem; font-weight: 400">Off</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h3 class="fw-bold text-1000 text-truncate">Ocean Blue Ring</h3>
                    </div><a class="stretched-link" href="#"></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4" style="margin-bottom: 50px; padding-right: 10px">
                <div class="card card-span h-100" style="border-style: none">
                    <div class="position-relative"> <img class="img-fluid w-100" style="border-radius: 20px;"
                            src="{{ asset('img/discount-item-3.png') }}" alt="..." />
                        <div class="card-actions" style="position: absolute; bottom:0; z-index:1; width:100%;">
                            <div class="badge badge-foodwagon bg-warning p-4">
                                <div class="d-flex flex-between-center">
                                    <div class="text-white" style="font-size: 3.58318rem">25</div>
                                    <div class="d-block text-white" style="font-size: 1.44rem">% <br />
                                        <div class="mt-2" style="font-size: 1.2rem; font-weight: 400">Off</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h3 class="fw-bold text-1000 text-truncate">Brown Leathered Wallet</h3>
                    </div><a class="stretched-link" href="#"></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3 mb-md-0 h-100 pb-4" style="margin-bottom: 50px; padding-right: 10px">
                <div class="card card-span h-100" style="border-style: none">
                    <div class="position-relative"> <img class="img-fluid w-100" style="border-radius: 20px;"
                            src="{{ asset('img/discount-item-4.png') }}" alt="..." />
                        <div class="card-actions" style="position: absolute; bottom:0; z-index:1; width:100%;">
                            <div class="badge badge-foodwagon bg-warning p-4">
                                <div class="d-flex flex-between-center">
                                    <div class="text-white" style="font-size: 3.58318rem">20</div>
                                    <div class="d-block text-white" style="font-size: 1.44rem">% <br />
                                        <div class="mt-2" style="font-size: 1.2rem; font-weight: 400">Off</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h3 class="fw-bold text-1000 text-truncate">Silverside Wristwatch</h3>
                    </div><a class="stretched-link" href="#"></a>
                </div>
            </div> --}}
        </div>
    </div><!-- end of .container-->

</section>


{{-- <section class="choose-area ptb-30" style="background: whitesmoke">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-start">Pilih berdasarkan Acara</h2>
        </div>
        <div class="row pt-20">
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-map-alt'></i>
                        <h3>Near Me</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-star'></i>
                        <h3>Best Sellers</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bxs-discount'></i>
                        <h3>Pasti Ada Promo</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bxs-bowl-rice'></i>
                        <h3>Healthy Food</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-bowl-hot'></i>
                        <h3>Ready to Cook</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-time'></i>
                        <h3>24 Hours</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-heart'></i>
                        <h3>Most Loved</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="choose-card">
                    <a href="">
                        <i class='bx bx-money'></i>
                        <h3>Budget Meal</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}


<section class="banner" style="background: whitesmoke; padding-bottom: 70px;">

    <div class="row-banner" style="background: url('{{ asset('img/ads-banner/row-banner.png') }}') no-repeat">
        <div class="content">
            <span>double cheese</span>
            <h3>burger</h3>
            <p>dengan cocacola and fries</p>
            <div class="menu-btn">
                <a href="/do-food/barang" class="phone-btn text-center" style="border-style: none">pesan sekarang</a>
            </div>
        </div>
    </div>

    <div class="grid-banner">
        <div class="grid">
            <img src="{{ asset('img/ads-banner/banner-1.png') }}" alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3>
                <div class="menu-btn">
                    <a href="/do-food/barang" class="phone-btn text-center" style="border-style: none">pesan
                        sekarang</a>
                </div>
            </div>
        </div>
        <div class="grid">
            <img src="{{ asset('img/ads-banner/banner-2.png') }}" alt="">
            <div class="content center">
                <span>special offer</span>
                <h3>upto 25% extra</h3>
                <div class="menu-btn">
                    <a href="/do-food/barang" class="phone-btn text-center" style="border-style: none">pesan
                        sekarang</a>
                </div>
            </div>
        </div>
        <div class="grid">
            <img src="{{ asset('img/ads-banner/banner-3.png') }}" alt="">
            <div class="content">
                <span>limited offer</span>
                <h3>100% cashback</h3>
                <div class="menu-btn">
                    <a href="/do-food/barang" class="phone-btn text-center" style="border-style: none">pesan
                        sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="product-shape">
        <img src="{{ asset('img/produk-shape.png') }}" alt="Products Shape">
    </div>

</section>


<section class="about ptb-30 mt-5 mb-5" id="about">

    <div class="image">
        <img src="{{ asset('img/choose-us/main-serv.png') }}" alt="">
    </div>

    <div class="content">
        <span>Kenapa memilih kami?</span>
        {{-- <h3 class="title">what's make our food delicious!</h3> --}}
        <p>Temukan restoran terbaik yang mengantarkan. Dapatkan pengiriman nirsentuh untuk takeout restoran, bahan
            makanan, dan banyak lagi</p>

        <div class="icons-container">
            <div class="icons">
                <img src="{{ asset('img/choose-us/serv-1.png') }}" alt="">
                <h3>pengiriman cepat</h3>
            </div>
            <div class="icons">
                <img src="{{ asset('img/choose-us/serv-2.png') }}" alt="">
                <h3>makanan segar</h3>
            </div>
            <div class="icons">
                <img src="{{ asset('img/choose-us/serv-3.png') }}" alt="">
                <h3>kualitas terbaik</h3>
            </div>
            <div class="icons">
                <img src="{{ asset('img/serv/serv-4.png') }}" alt="">
                <h3>Dukungan 24/7</h3>
            </div>
        </div>
    </div>

</section>


<div class="about-area pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-xxl-6">
                <div class="about-content about-width">
                    <span>Partner</span>
                    <h2>Kerjasama Menjadi Mitra Kami</h2>
                    <p>
                        Lebarkan Jangkauan Jualan, Dapatkan Lebih Banyak Pelanggan dengan Daftar DoFood sekarang!
                        Restoran Anda dapat dilihat oleh semua pengguna DoApp di seluruh Indonesia.
                    </p>
                    <div class="menu-btn">
                        <a href="/registerSeller" class="phone-btn text-center" style="border-style: none">
                            Daftar sekarang
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xxl-6">
                <div class="about-img-2">
                    <img src="{{ asset('img/partner/become-seller.png') }}" alt="About Images">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="service-item___2KwmB">
                    <h3>Dokumen</h3>
                    <div class="service-item-des___3lmt3">
                        <p></p>
                        <ul>
                            <li>Kartu Tanda Penduduk (eKTP)</li>
                            <li>Buku Rekening Bank</li>
                            <li>Informasi Usaha</li>
                            <li>Informasi Outlet</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-item___2KwmB">
                    <h3>Tata cara</h3>
                    <div class="service-item-des___3lmt3">
                        <p></p>
                        <ul>
                            <li>Pastikan dokumen Anda siap dan masih berlaku</li>
                            <li>Daftar secara online</li>
                            <li>Kunjungi Pusat Mitra DoFood untuk proses verifikasi. Klik detail lokasi: <a
                                    href="https://help.grab.com/driver/id-id/115007749408" target="_blank"
                                    rel="noopener">here</a></li>
                            <li>Datang dan lengkapi training mitra online Anda</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="faq-area-bg pt-45 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>FAQ</span>
            <h2>Pertanyaan yang Sering Diajukan</h2>
        </div>
        <div class="row align-items-center pt-45">
            <div class="col-lg-6">
                <div class="faq-accordion faq-accordion-width">
                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Cara menghubungi driver?
                            </a>
                            <div class="accordion-content">
                                <p>Ada dua cara untuk berkomunikasi dengan driver pada pesanan yang masih berlangsung,
                                    yakni melalui telepon atau fitur chat.</p>
                                <p>Telepon</p>
                                <p>- Klik ikon telepon pada halaman ‘Pesanan dalam proses’</p>
                                <p>- Atau klik ‘Telepon’ pada fitur ‘Pantau pesananmu’</p>
                                <p>- Konfirmasi dulu nomor telepon yang akan kamu gunakan untuk menghubungi driver. Jika
                                    nomor sudah benar, klik ‘Telepon sekarang’, atau klik ‘Update no. Hp’ untuk
                                    mengubahnya</p>

                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Saya dikenakan Biaya Bungkus.
                            </a>
                            <div class="accordion-content">
                                <p>
                                    Pesanan GoFood yang kamu lakukan di restoran tertentu akan dikenakan Biaya Bungkus
                                    dari Restoran. Biaya ini digunakan untuk membungkus pesanan agar kualitas dari
                                    makanan atau minuman yang telah dipesan dapat terjaga dengan baik.

                                    Besarnya biaya bungkus dapat berbeda-beda tergantung dari kebijakan masing-masing
                                    restoran.

                                    1
                                </p>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Cara mengatur metode pembayaran.
                            </a>
                            <div class="accordion-content">
                                <p>Pilih ‘Eksplor’ pada menu GoPay di beranda aplikasi Gojek.</p>
                                <p>- Klik 'Pengaturan' pada GoPay Feed</p>
                                <p>- Klik ‘Atur metode pembayaran’.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="faq-accordion faq-accordion-width">
                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Saya belum menerima voucher saya.
                            </a>
                            <div class="accordion-content">
                                <p>
                                    Silakan periksa kembali halaman 'Voucher' pada menu 'Promo' atau halaman 'Voucher
                                    Saya' pada menu 'Profil'.
                                </p>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Cara mendapatkan riwayat pesanan?
                            </a>
                            <div class="accordion-content">
                                <p>
                                    Temukan 15 pesanan terakhir Anda dalam 60 hari terakhir di halaman 'Riwayat
                                    Pesanan'* dengan mengeklik tab Pesanan di layar bawah beranda aplikasi Gojek, lalu
                                    pilih tab Riwayat. Anda juga dapat mengunduh tanda terima langsung di halaman
                                    pesanan.
                                </p>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Saya tidak dapat menemukan pengemudi.
                            </a>
                            <div class="accordion-content">
                                <p>
                                    Kesulitan mencari driver bisa disebabkan oleh tingginya permintaan layanan Gojek
                                    saat itu, misalnya pada jam sibuk, atau karena kondisi cuaca. Coba pesan lagi dalam
                                    beberapa menit dan kami akan melakukan yang terbaik untuk menemukan pengemudi untuk
                                    Anda.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection