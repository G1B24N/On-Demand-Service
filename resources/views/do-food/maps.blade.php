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
                'text': 'Apakah Pesanan sudah sampai?',
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


<section class="container product-area pb-70" style="border-radius: 15px;">
    <div>
        
        <div class="row align-items-md-stretch">
            <div class="col-md-4">
                <div id="pesan" class="h-100 p-5 rounded-3" style="background-color: #27ae60">
                    
                    <form action={{route('storeDoride')}} method="POST">
                        {{ csrf_field() }}
                        <div class="form-group pb-5">
                            <label class="text-white"><i class='bx bx-current-location'></i> Lokasi Restoran</label>
                            <input disabled type="text" style="font-size: 13px" class="col-xs-10 form-control" id="start" name="lokasi_awal" value="{{ $pesanan_detail->restaurant->alamat }} {{ $pesanan_detail->restaurant->kota }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="text-white"><i class='bx bx-location-plus'></i> Masukkan Lokasi Anda / <button type="button" class="btn btn-light btn-cari-lokasi" id="find-state">Cari lokasi terkini</button></label>
                            <input type="text" style="font-size: 13px" class="form-control" id="end" name="tujuan"
                                placeholder="Jl. Semarang">
                            </div>
                            {{-- <input type="submit" class="btn btn-light btn-pesan" onclick="submitOrder()"  id="pesan-btn" value="Pesan"> --}}
                            <input type="button" class="btn btn-light btn-pesan" id="pesan-btn" value="Pesan">
                            
                            <div id="detail">
                                <hr />
                            <h4 class="text-white">Detail Pesanan</h4>
                            <div class="card-custom">
                                <table>
                                    <tr>
                                        <th>Jarak</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" style="font-size: 13px" class="form-control" id="jarak" name="jarak" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Durasi</th>
                                        <th>:</th>
                                        <td id="time" name="durasi">
                                            <input type="text" style="font-size: 13px" class="form-control" id="durasi" name="durasi" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" style="font-size: 13px" class="form-control"  id="hargaview" name="hargaview" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Driver</th>
                                        <th>:</th>
                                        @foreach ($driver as $d)
                                            @if ($d->nama_driver == 'Joko')
                                            <td id="driver" name="driver">
                                                <input type="hidden" name="driver" value="{{ $d->nama_driver }}">
                                                {{ $d->nama_driver }}
                                                </td>    
                                                @endif
                                                @endforeach
                                            </tr>
                                        </table>
                            </div>
                            <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                            <input type="hidden" style="font-size: 13px" class="form-control" id="harga" name="harga" value="">
                            
                            <button type="button" data-url="{{ url('konfirmasi') }}" class="btn btn-light btn-pesan" onclick="confirmCheckout(this)">
                                {{-- <a data-url="{{ url('konfirmasi') }}" class="btn btn-light btn-pesan" onclick="confirmCheckout(this)">
                                    Pesan Sekarang  --}}Selesai
                                </a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div id="map" class="h-100 p-5 bg-light border rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection