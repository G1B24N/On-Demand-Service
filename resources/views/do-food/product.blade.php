@extends('layouts.dofood')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-kategori/style.css') }}">

<style>
    :root {
        --rad: 0.7rem;
        --dur: 0.3s;
        --color-dark: #2f2f2f;
        --color-light: #fff;
        --color-brand: #57bd84;
        --font-fam: 'Lato', sans-serif;
        --height: 4rem;
        --btn-width: 6rem;
        --bez: cubic-bezier(0, 0, 0.43, 1.49);
    }

    html {
        scroll-behavior: smooth;
    }

    /* body {
        background: var(--color-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    html {
        box-sizing: border-box;
        height: 100%;
        font-size: 10px;
    }

    *,
    *::before,
    *::after {
        box-sizing: inherit;
    } */

    form {
        position: relative;
        width: 30rem;
        background: var(--color-brand);
        border-radius: var(--rad);
        border: 1.5px solid #57bd84;
        margin-left: auto;
        margin-right: auto;
    }

    input,
    button {
        height: var(--height);
        font-family: var(--font-fam);
        border: 0;
        color: var(--color-dark);
        font-size: 1.5rem;
    }

    input[type="search"] {
        outline: 0;
        width: 100%;
        background: var(--color-light);
        padding: 0 1.6rem;
        border-radius: var(--rad);
        appearance: none;
        transition: all var(--dur) var(--bez);
        transition-property: width, border-radius;
        z-index: 1;
        position: relative;
    }

    button {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        width: var(--btn-width);
        font-weight: bold;
        background: var(--color-brand);
        border-radius: 0 var(--rad) var(--rad) 0;
    }

    input:not(:placeholder-shown) {
        border-radius: var(--rad) 0 0 var(--rad);
        width: calc(100% - var(--btn-width));
    }

    input:not(:placeholder-shown)+button {
        display: block;
    }

    label {
        position: absolute;
        clip: rect(1px, 1px, 1px, 1px);
        padding: 0;
        border: 0;
        height: 1px;
        width: 1px;
        overflow: hidden;
    }
</style>
@endsection


<div class="inner-banner" style="background-image:url({{ asset('img/product/banner-food.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Product</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Product</li>
            </ul>
        </div>
    </div>
</div>


<section class="product-area pt-100">
    <div class="container">
        <div class="section-title text-center">
            <span>Product</span>
            <h2>Pesan Makanan Ke Pintu Anda</h2>
        </div>
    </div>
</section>

<section>
    <form action="{{route('search')}}" role="search" method="GET">
        <label for="search">Search for stuff</label>
        <input id="input" type="search" name="cari" autocomplete="off" placeholder="Cari Toko atau Makanan..."  value="{{$request->cari}}" autofocus />
        <button type="submit"><i class='bx bx-search'></i></button>
    </form>

    {{-- <form action="{{route('search')}}" role="search" method="GET">
        <div class="input-group rounded">
            <input type="text" id="input" name="cari" autocomplete="off" class="form-control rounded" placeholder="Search" value="{{$request->cari}}">
            <span class="input-group-text border-0" id="search-addon">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <i class="fas fa-search"></i>
                    <i class="fa-magnifying-glass"></i>
                </div>
            </span>
        </div>
    </form> --}}
</section>


<div class="product-images ptb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-6">
                {{-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5> --}}
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40"
                    data-aos="fade-right" data-aos-duration="1000">Kategori</h2>
            </div>
        </div>
    </div>
    <section class="category">
        <div class="row">
            <div class="col-2">
                <a href="{{url('category/minuman')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/minuman.png') }}" alt="">
                    <h3>Minuman</h3>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('category/jajanan')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/jajanan.png') }}" alt="">
                    <h3>Jajanan</h3>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('category/anekanasi')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/aneka-nasi.png') }}" alt="">
                    <h3>Aneka Nasi</h3>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('category/siapsaji')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/siap-saji.png') }}" alt="">
                    <h3>Siap Saji</h3>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('category/roti')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/roti.png') }}" alt="">
                    <h3>Roti</h3>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('category/makanansehat')}}" class="box">
                    <img src="{{ asset('img/kategori-makanan/makanan-sehat.png') }}" alt="">
                    <h3>Healty Food</h3>
                </a>
            </div>
        </div>
    </section>
</div>


<section id="testimonial" style="margin-bottom: 200px; padding-top: 70px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-6">
                {{-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5> --}}
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40"
                    data-aos="fade-right" data-aos-duration="1000">Semua Restoran</h2>
            </div>
        </div>
        <div class="row gx-2">
            @foreach ($tbl_restorans as $resto )
            <div class="col-sm-6 col-md-4 col-lg-3 h-100" style="margin-bottom: 50px; padding-right: 10px">
                <a href="{{ url('/do-food/detailRestoran') }}/{{ $resto->id_restoran }}">
                    <div class="card card-span h-100 text-white" style="border-style: none;">
                        <img class="img-fluid" style="border-radius: 20px; object-fit:cover;"
                            src="{{ url('uploads/restoran/') }}/{{ $resto->cover }}" alt="..." />
                        <div class="card-img-overlay ps-0">
                            {{-- <span class="badge bg-danger p-2 ms-3">
                                    <i class="fas fa-tag me-2 fs-0"></i>
                                    <span class="fs-0">20% off</span>
                                </span> --}}
                            <span class="badge bg-warning ms-4 me-1 p-2">
                                <i class='bx bx-time me-1 fs-0'></i>
                                <span class="fs-0">{{ $resto->waktu_pemesanan }}</span>
                            </span>
                        </div>

                        <div class="card-body ps-0">
                            <div class="d-flex align-items-center mb-3">
                                <img class="img-fluid" width="20%" style="border-radius: 50%"
                                    src="{{ url('uploads/restoran/') }}/{{ $resto->foto }}" alt="" />
                                <div class="flex-1 ms-3">
                                    <h3 class="mb-0 fw-bold text-1000">{{ $resto->nama_restoran}}</h3>
                                    {{-- <span class="text-warning fs--1 me-1">
                                        <i class='bx bxs-star'></i>
                                    </span>
                                    <span class="mb-0 text-warning">46</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            {{-- <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-primary" href="#!">View All
                    <i class="fas fa-chevron-right ms-2"> </i></a></div> --}}
        </div>
    </div>
</section>

@endsection

{{-- <div class=""> --}}
    {{-- <div class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40" data-aos="fade-right"
            data-aos-duration="1000">Semua Restoran</h2>
        <div class="row">
            @foreach ($tbl_restorans as $resto )
            <div class="col-lg-3 col-md-4">
                <div class="product-card">
                    <a href="{{ url('/do-food/detailRestoran') }}/{{ $resto->id_restoran }}">
                        <img height="200px" width="100%" style="object-fit: cover; position: center center;"
                            src="{{ url('uploads/barang/') }}/{{ $resto->foto }}" alt="Products Images">
                    </a>
                    <div class="product-content">
                        <a href="{{ url('/do-food/detailRestoran') }}/{{ $resto->id_restoran }}">
                            <h4 style="font-size: 19px;">{{ $resto->nama_restoran}}</h4>
                        </a>

                        <p style="font-size: 14px;"> {{ ($resto->deskripsi)}} </p>
                        <div class="product-cart">
                            <ul>

                                <li>
                                    <a href="{{ url('/do-food/detailRestoran') }}/{{ $resto->id_restoran }}">
                                        <i class='bx bx-search'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div> --}}

    {{-- <div id="minuman" class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40" data-aos="fade-right" data-aos-duration="1000">Minuman</h2>

        <div class="row">
            @foreach ($restorans as $barang )
            @if ($barang->kategori->nama_kategori == 'Minuman')
            <div class="col-lg-3 col-md-4">
                <div class="product-card"> 
                    <a href="">
                        <img height="200px" width="100%" style="object-fit: cover; background-size: cover; position: center;"  src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}"
    alt="Products Images">
    </a>
    <div class="product-content">
        <a href="product-details.html">
            <h4 style="font-size: 19px;">{{ $barang->nama_barang}}</h4>
        </a>

        <p style="font-size: 14px;"> Rp. {{ number_format($barang->harga)}} </p>
        <div class="product-cart">
            <ul>

                <li>
                    <a href="{{ url('pesan') }}/{{ $barang->id }}">
                        <i class='bx bx-cart'></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
@endif
@endforeach
</div>
</div> --}}


