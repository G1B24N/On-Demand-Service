@extends('layouts.driver')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link href="{{ asset('css/style-toogle/bootstrap-toggle.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style-dashboard/adminlte.min.css')}}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/script-toogle/bootstrap-toggle.min.js') }}"></script>
@endsection


<div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$pesanan}}</h3>
            <p>Total Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3>Rp. {{number_Format($jumlah)}}<sup style="font-size: 20px"></sup></h3>
            <p>Income</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <i href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></i>
        </div>
      </div>
    </div>
</div>
<section class="product-area pb-70" style="border-radius: 15px; padding-top: 70px;">
    <div class="container">
        <div class="section-title text-center">
            <span>Do-ride</span>
            <h2>Request a ride now</h2>
            {{-- <p>
                What indication best sick be project proposal in attempt, train of the showed
                some a forth. That homeless, won't many of goals thoughts volumes felt.
            </p> --}}
        </div>
    </div>
</section>


<section class="container pb-70">
    <div class="row align-items-md-stretch">
        <div class="col-md-4">
            <div id="pesan" class="h-100 p-5 rounded-3" style="background-color: #27ae60">
                <h2 id="title">Pesan GoRide</h2>
                <form>
                    <div class="form-group pb-5">
                        <label class="text-white"><i class='bx bx-current-location'></i> Masukkan Lokasi Awal / <button type="button" class="btn btn-light btn-cari-lokasi" id="find-state">Cari lokasi terkini</button></label>
                        <input type="text" style="font-size: 13px" class="col-xs-10 form-control" id="start"
                            placeholder="Jl. Mayjend Ahmad Yani">
                    </div>

                    <div class="form-group">
                        <label class="text-white"><i class='bx bx-location-plus'></i> Masukkan Lokasi Tujuan</label>
                        <input type="text" style="font-size: 13px" class="form-control" id="end"
                            placeholder="Jl. Semarang">
                    </div>
                    <input type="submit" class="btn btn-light btn-pesan" id="pesan-btn" value="Pesan">
                </form>

                <div id="detail">
                    <hr />
                    <h4 class="text-white">Detail Pesanan</h4>
                    <div class="card-custom">
                        <table>
                            <tr>
                                <th>Jarak</th>
                                <th>:</th>
                                <td id="distance"></td>
                            </tr>
                            <tr>
                                <th>Durasi</th>
                                <th>:</th>
                                <td id="duration"></td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <th>:</th>
                                <td id="price"></td>
                            </tr>
                        </table>
                    </div>

                    <button type="button" class="btn btn-light btn-pesan" onClick="window.location.reload()">
                        Selesai
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="map" class="h-100 p-5 bg-light border rounded-3">
            </div>
        </div>
    </div>
</section>

{{-- <div class="faq-area-bg pt-45 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span>FAQ</span>
            <h2>Frequently Asked Questions</h2>
            <p>
                It is a long established fact that a reader will be distracted by
                the readable content of a page when looking at its layout.
            </p>
        </div>
        <div class="row align-items-center pt-45">
            <div class="col-lg-6">
                <div class="faq-accordion faq-accordion-width">
                    <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Cara pemesanan GoRide?
                            </a>
                            <div class="accordion-content">
                                <p>- Pilih GoRide di halaman beranda aplikasi Gojek</p>
                                <p>- Pilih tujuan dan lokasi penjemputan Anda</p>
                                <p>- Pilih metode pembayaran yang Anda inginkan</p>
                                <p>- Pastikan anda sudah siap dan di lokasi penjemputan karena driver akan langsung
                                    datang ke lokasi penjemputan setelah menerima pesanan anda
                                </p>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Voucher Jaminan Penjemputan Tepat Waktu.
                            </a>
                            <div class="accordion-content">
                                <p>
                                    Pelanggan GoRide dan GoCar dapat menikmati keuntungan tambahan berupa Jaminan
                                    Penjemputan Tepat Waktu dengan mengaktifkan fitur asuransi SafeTrip+ di halaman
                                    pemesanan GoRide/GoCar. Setelah ditanggung oleh asuransi SafeTrip, Anda akan
                                    mendapatkan santunan senilai Rp5.000 dan diskon Rp10.000 untuk layanan GoRide dan
                                    GoCar jika pengemudi menjemput Anda lebih dari 10 menit dari perkiraan waktu yang
                                    tertera di aplikasi. Anda dapat menggunakan voucher untuk GoRide berikutnya
                                </p>
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class='bx bx-chevron-down'></i>
                                Fitur Bagikan Lokasi.
                            </a>
                            <div class="accordion-content">
                                <p>- Klik ikon “Bagikan lokasi” pada halaman pemesanan untuk mengaktifkan fitur</p>
                                <p>- Klik ‘Bagikan lokasi’</p>
                                <p>- Selesai! Anda telah membagikan lokasi Anda kepada pengemudi.</p>
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
</div> --}}
@section('addJavascript')

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        const app = Vue.createApp ({
            data() {
                return {
                    color: ''
                }
            },

            methods: {
                toggleColor() {
                this.color = this.color === 'green' ? 'blue' : 'green'
                }
            }
        }).mount('#app')
    </script>
@endsection
@endsection