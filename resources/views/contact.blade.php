@extends('layouts.app')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/contact-form-script.js') }}"></script>    
@endsection

<div class="inner-banner" style="background-image: url({{asset('img/contact/contant-banner.jpg')}})">
    <div class="container">
        <div class="inner-title">
            <h3>Contact Us</h3>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>

<div class="product-shape">
    <img src="{{ asset('img/produk-shape.png') }}" alt="Products Shape">
</div>


<div class="contact-area ptb-100">
    <div class="section-title text-center">
        <span>Hubungi Kami</span>
        <h2>Kirim Pesan Anda</h2>
        <p>Beri kami saran dan kritik untuk lebih baik kedepannya</p>
    </div>

    

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="contact-wrap pt-45">
                    <div class="contact-wrap-form">
                        @if (Session::has('message_sent'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message_sent') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('contact-send') }}" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="nama_lengkap" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Nama Anda">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="Email Anda">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="phone_number" id="phone_number" required
                                            data-error="Please enter your number" class="form-control"
                                            placeholder="Nomor Telepon">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                            required data-error="Please enter your subject" placeholder="Subyek">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8"
                                            required data-error="Write your message" placeholder="Pesan"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 text-center menu-btn">
                                    <button type="submit" class="phone-btn text-center" style="border-style: none">
                                        Kirim Pesan
                                    </button>
                                    {{-- <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="ptb-100">
                    <ul class="list-unstyled mb-0 text-end">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Jawa Tengah, Indonesia</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>+1 987 6543 210</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>cs@doapps.com</p>
                        </li>
                    </ul>
                    <div class="text-end mt-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.280380527639!2d110.50363761400705!3d-7.322370274037209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a791eea650a7b%3A0xa48e44ca27450c1b!2sGamelab%20Indonesia!5e0!3m2!1sid!2sid!4v1660278197434!5m2!1sid!2sid" width="auto" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection