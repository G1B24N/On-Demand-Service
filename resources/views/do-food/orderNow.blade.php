@extends('layouts.dofood2')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

@section('addJavascript')
    <script>
        confirmCheckout = function(button) {
            var url = $(button).data('url');
            swal({
                'title': 'Konfirmasi Pesan',
                'text': 'Anda yakin ingin checkout?',
                'successMode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    window.location = url;
                }
            })
        }
    </script>
@endsection

<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <h3>Pesanan</h3>
            <ul>
                <li>
                    <a href="/do-food">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                   
                <li>Pesanan</li>
            </ul>
        </div>
    </div>
</div>


<section class="cart-wraps-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h3><i class="fa fa-shopping-cart"></i>Detail Pesanan</h3>
                                @if(!empty($pesanan ))
                                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th align="center">Gambar</th>
                                            <th align="center">Nama Barang</th>
                                            <th align="center">Jumlah</th>
                                            <th align="center">Harga</th>
                                            <th align="center">Total Harga</th>
                                            <th align="center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($tbl_pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <img src="{{ url('uploads/barang/') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                            </td>
                                            <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                            <td>{{ $pesanan_detail->jumlah }}</td>
                                            <td align="left">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                            <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                            <td>
                                                {{-- <form action="{{ url('do-food/orderNow') }}/{{ $pesanan_detail->id }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn text-light" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                        <img src="{{ url('img/trash.png') }}"  width="20px" alt="">
                                                        <i class='bx bxs-trash text-danger'></i>
                                                    </button>
                                                </form> --}}

                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                            <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                            <td>
                                                {{-- <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                                    <i class="fa fa-shopping-cart"></i> Check Out
                                                </a> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cart-calc">
                                <div class="cart-wraps-form">
                                    <h3>Metode Pembayaran</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                {{-- <input class="form-control" type="text" value="Bayar" aria-label="Disabled input example" disabled readonly> --}}
                                                <select>
                                                    @foreach ($payment as $p)
                                                    <option  value="{{$p->metode_pembayaran}}">{{$p->metode_pembayaran}}</option> 
                                                    @endforeach
                                                    {{-- <option value="">Bayar Tunai</option>
                                                    <option value="">A option</option> --}}
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div  class="form-group col-lg-6">
                                            <input type="text" class="form-control"
                                                placeholder="Masukkan nomor Gopay">
                                        </div>
                                        <div class="form-group col-12">
                                            <input type="text" class="form-control"
                                                placeholder="  verifikasi">
                                        </div> --}}
                                    </div>
                                    {{-- <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Coupon Code">
                                    </div> --}}
                                    {{-- <a href="#" class="default-btn">
                                        Apply Coupon
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="cart-totals">
                                <h3>Total Pembayaran</h3>
                                <ul>
                                    <li>Subtotal <span>Rp. {{ number_format($pesanan->jumlah_harga) }}</span></li>
                                    <li>Ongkir <span id="harga"></span></li>
                                    <li>Pajak <span>Rp. {{$pesanan->kode}}</span></li>
                                    <li>Total <span><b id="harga">Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode + '#harga') }}</b></span></li>
                                </ul>
                                <a href="{{url('do-food/maps')}}/{{$pesanan_detail->id}}" class="default-btn" onclick="confirmCheckout(this)">
                                    Pesan Sekarang 
                                </a>
                            </div>
                        </div>
                        {{-- <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th align="center">Restoran</th>
                                    <th align="center">Metode Pembayaran</th>
                                    <th align="center">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach($tbl_pesanan_details as $pesanan_detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan_detail->id_restoran }}</td>
                                    <td>{{ $pesanan_detail->metode_pembayaran }}</td>
                                    <td align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                    </div>
                </form>
                @endif
            </div>
        </div>
    
    </div>
</section>
@endsection