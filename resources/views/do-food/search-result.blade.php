@extends('layouts.dofood2')

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

@section('addJavascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>

<script>
    $(document).ready(function () {
        // alert('p')
        // console.log('p');
        //   $("#findBtn").click(function(){
        @foreach(App\ Category::All() as $clist)

        $("#cat{{$clist->nama_kategori}}").click(function () {
            var cat = $("#cat{{$clist->nama_kategori}}").val();
            // var price = $('#priceID').val();
            alert(cat)
            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '{{url(' / search ')}}',
                data: 'cat_id=' + cat + '&price=' + price,
                success: function (response) {
                    console.log(response);
                    $("#productData").html(response);
                }
            });
        });
        @endforeach
    });

    function filter() {
        table.ajax.reload(null, false)
    }
</script>
@endsection


<div class="inner-banner" style="background-image:url({{ asset('img/product/banner-food.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Search</h3>
            <ul>
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Search</li>
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
        <input id="input" type="search" name="cari" autocomplete="off" placeholder="Cari Toko atau Makanan..."
            value="{{ request()->input('cari') }}" autofocus />
        <button type="submit"><i class='bx bx-search'></i></button>
    </form>

    {{-- <form action="{{route('search')}}" role="search" method="GET">
    <div class="input-group rounded">
        <input type="text" id="input" name="cari" autocomplete="off" class="form-control rounded" placeholder="Search"
            value="{{$request->cari}}">
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


<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-6">
                {{-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5> --}}
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40"
                    data-aos="fade-right" data-aos-duration="1000">Semua Restoran <span style="font-size: 15px; font-weight:lighter"><p>{{ $restorans->count() }} result for '{{ request()->input('cari') }}'</p></span></h2>
            </div>
        </div>
        <div class="row gx-2">
            @foreach ($restorans as $resto)
            {{-- <div>{{ $resto->nama_resto }}</div> --}}
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


<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-6">
                {{-- <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5> --}}
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40"
                    data-aos="fade-right" data-aos-duration="1000">Semua makanan <span style="font-size: 15px; font-weight:lighter"><p>{{ $barangs->count() }} result for '{{ request()->input('cari') }}'</p></span></h2>
            </div>
        </div>
        <div class="row gx-2">
            @foreach ($barangs as $barang )
            <div class="col-lg-3 col-md-4">
                <div class="product-card">
                    <a href="{{url('order')}}/{{ $barang->id }}">
                        <img style="object-fit: cover; position: center center;"
                            src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Products Images">
                    </a>
                    <div class="product-content">
                        <a href="{{url('order')}}/{{ $barang->id }}">
                            <h4 style="font-size: 19px;">{{ $barang->nama_barang}}</h4>
                        </a>

                        <p style="font-size: 13px; font-weight:lighter;"> Rp. {{ number_format($barang->harga)}} </p>
                        <div class="product-cart">
                            <ul>

                                <li>
                                    <a href="{{ url('order') }}/{{ $barang->id }}">
                                        <i class='bx bx-cart'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-primary" href="#!">View All
                    <i class="fas fa-chevron-right ms-2"> </i></a></div> --}}
        </div>
    </div>
</section>
@endsection