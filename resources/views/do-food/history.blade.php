@extends('layouts.dofood')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="inner-banner" style="background-image:url({{ asset('img/riwayat-pemesan/banner-riwayat-pemesanan.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Riwayat Pemesanan</h3>
            <ul>
                <li>
                    <a href="{{ url('do-food') }}">Kembali</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Riwayat Pemesanan</li>
            </ul>
        </div>
    </div>
</div>

<div class="container"> 
    <section class="py-5" style="margin-bottom: 50px">
        <div class="">
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1 text-light">#</div>
                    <div class="col col-3 text-light">Barang</div>
                    <div class="col col-3 text-light">Status</div>
                    <div class="col col-2 text-light">Tanggal</div>
                    <div class="col col-2 text-light">Jumlah Harga</div>
                    <div class="col col-1 text-light">Detail</div>
                </li>
                <?php $no = 1; ?>
                @foreach($tbl_pesanans as $pesanan)
                <li class="table-row">
                    <div class="col col-1" data-label="Job Id">{{ $no++ }}</div>
                    <div class="col col-3" data-label="Customer Name"></div>
                    <div class="col col-3" data-label="Amount">
                        @if($pesanan->status == 1)
                        pesanan sudah diantar
                        {{-- @else
                        Sudah di antar --}}
                        @endif
                    </div>
                    <div class="col col-2" data-label="Payment Status">{{ $pesanan->tanggal }}</div>
                    <div class="col col-2" data-label="Payment Status">Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode + 10000) }}</div>
                    <div class="col col-1" data-label="Payment Status">
                        <a href="{{ url('do-food/detailHistory') }}/{{ $pesanan->id }}" class="btn btn-success" style="font-size: 12px"><i class="fa fa-info"></i> Detail</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- <div class="container my-5 d-sm-flex justify-content-center">
        <div class="card-history">
            <div class="title">Riwayat Pemesanan</div>
            <div class="info">
                <div class="row">
                    <div class="col-7">
                        <span id="heading">Date</span><br>
                        <span id="details">10 October 2018</span>
                    </div>
                    <div class="col-5 pull-right">
                        <span id="heading">Order No.</span><br>
                        <span id="details">012j1gvs356c</span>
                    </div>
                </div>      
            </div>      
            <div class="pricing">
                <div class="row">
                    <div class="col-9">
                        <span id="name">BEATS Solo 3 Wireless Headphones</span>  
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;299.99</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Shipping</span>
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;33.00</span>
                    </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3"><big>&pound;262.99</big></div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
@endsection