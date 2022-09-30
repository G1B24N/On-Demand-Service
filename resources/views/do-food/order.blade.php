@extends('layouts.dofood')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-btn-num/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style-img/style.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/script-btn-num/script.js') }}"></script>

    <script>
        PesanSekarang = function(button) {
            swal(
                "Success!",
                "Pesanan Anda berhasil masuk keranjang!",
                "success");
        }
    </script>
@endsection

<div class="inner-banner" style="background-image: url({{ url('uploads/barang/') }}/{{ $barang->gambar }})">
    <div class="container">
        <div class="inner-title">
            <h3>{{ $barang->restaurant->nama_restoran }}</h3>
            <ul>
                <li>
                    <a href="{{ url('do-food/product') }}">Produk</a>
                </li>
                <i class='bx bxs-chevrons-right'></i>
                <li>{{ $barang->nama_barang }}</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">

    <section class="product-detls ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="product-detls-image">
                        <img src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="product-desc">
                        <h3>{{ $barang->nama_barang }}</h3>
                        <div class="price">
                            <span class="new-price">Rp. {{ number_format($barang->harga) }}</span>
                            <span class="old-price">Rp. {{ number_format($barang->harga + 10000) }}</span>
                        </div>
                        {{-- <p name="id_restoran">{{$barang->restaurant->nama_restoran}}</p> --}}
                        {{-- <div class="product-review">
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                            <a href="#" class="rating-count">3 reviews</a>
                        </div> --}}
                        <p> {{$barang->keterangan}} </p>
                        <form method="post" action="{{ url('order') }}/{{ $barang->id }}">
                        {{csrf_field()}}
                        <div class="input-count-area">
                            <h3>Quantity</h3>
                            <div class="input-counter">
                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                <input type="text" name="jumlah_pesan" required="" min="1" value="1">
                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                            </div>
                        </div>
                        {{-- <select>
                            @foreach ($payment as $p)
                            <option  value="{{$p->metode_pembayaran}}">{{$p->metode_pembayaran}}</option> 
                            @endforeach
                            
                        </select> --}}
                        <div class="product-add menu-btn">
                            {{-- <button type="submit" class="default-btn">
                                <i class="fas fa-cart-plus"></i> Buy Now!
                            </button> --}}
                            <button type="submit" class="phone-btn" style="border-style: none" onclick="PesanSekarang(this)" >
                                <i class="fas fa-cart-plus"></i> Beli Sekarang
                            </button>
                        </div>
                        </form>
                        <div class="product-share">
                            <ul>
                                <li>
                                    <span>Share:</span>
                                </li>
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

                <div class="col-lg-12 col-md-12">
                    <div class="tab product-detls-tab">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs">
                                    <li>
                                        <a href="#"> Description</a>
                                    </li>
                                    {{-- <li>
                                        <a href="#">Additional information </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="#"> Reviews </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content current active">
                                    <div class="tabs_item current">
                                        <div class="product-detls-tab-content">
                                            <p>{{$barang->deskripsi}}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="tabs_item">
                                        <div class="product-detls-tab-content">
                                            <div class="product-review-form">
                                                <h3>Customer Reviews</h3>
                                                <div class="review-title">
                                                    <div class="rating">
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star-half'></i>
                                                    </div>
                                                    <p>Based on 3 reviews</p>
                                                </div>
                                                <div class="review-comments">
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star-half'></i>
                                                        </div>
                                                        <h3>Good</h3>
                                                        <span><strong>Admin</strong> on <strong>June 21,
                                                                2020</strong></span>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                            sed do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua.
                                                            Ut enim ad minim veniam, quis nostrud exercitation.
                                                        </p>
                                                    </div>
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star-half'></i>
                                                        </div>
                                                        <h3>Good</h3>
                                                        <span><strong>Admin</strong> on <strong>June 21,
                                                                2020</strong></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                                        </p>
                                                    </div>
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star-half'></i>
                                                        </div>
                                                        <h3>Good</h3>
                                                        <span><strong>Admin</strong> on <strong>June 21,
                                                                2020</strong></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="review-form">
                                                    <h3>Write a Review</h3>
                                                    <div class="contact-wrap-form">
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" id="name"
                                                                            class="form-control" required
                                                                            data-error="Please enter your name"
                                                                            placeholder="Your Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input type="email" name="email" id="email"
                                                                            class="form-control" required
                                                                            data-error="Please enter your email"
                                                                            placeholder="Your Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-sm-12">
                                                                    <div class="form-group">
                                                                        <input type="text" name="msg_subject"
                                                                            id="msg_subject" class="form-control"
                                                                            required
                                                                            data-error="Please enter your subject"
                                                                            placeholder="Your Subject">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea name="message" class="form-control"
                                                                            id="message" cols="30" rows="8" required
                                                                            data-error="Write your message"
                                                                            placeholder="Your Message"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <button type="submit" class="default-btn page-btn">
                                                                        Submit Review
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection