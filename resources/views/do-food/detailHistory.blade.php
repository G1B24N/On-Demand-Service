@extends('layouts.dofood')

@section('content')

<div class="inner-banner" style="background-image:url({{ asset('img/riwayat-pemesan/banner-detail-riwayat-pemesanan.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Detail Pemesanan</h3>
            <ul>
                <li>
                    <a href="{{ url('do-food') }}">Kembali</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Detail Pemesanan</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="card-history my-5">
        <div class="title">Riwayat Pemesanan</div>
        @if(!empty($pesanan))
            <div class="info">
                <div class="row">
                    <div class="col-7">
                        <span id="heading">tanggal:</span><br>
                        <span id="details"><strong>{{ $pesanan->tanggal }}</strong></span>
                    </div>
                    <div class="col-5 pull-right">
                        <span id="heading">pembayaran:</span><br>
                        <span id="details"><strong>Bayar Tunai</strong></span>
                    </div>
                </div>      
            </div>      
            @foreach($pesanan_details as $pesanan_detail)
            <div class="pricing">
                <div class="row">
                    <div class="col-9">
                        <span id="name" style="font-weight: bold">{{ $pesanan_detail->barang->nama_barang }} <small style="font-weight: lighter">(qty: {{ $pesanan_detail->jumlah }})</small></span>  
                    </div>
                    <div class="col-3">
                        <span id="price">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Ongkir</span>
                    </div>
                    <div class="col-3">
                        <span id="price">Rp.10,000</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <span id="name">Pajak</span>
                    </div>
                    <div class="col-3">
                        <span id="price">Rp. {{ number_format($pesanan->kode) }}</span>
                    </div>
                </div>
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4"><big>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga  + 10000) }}</big></div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
