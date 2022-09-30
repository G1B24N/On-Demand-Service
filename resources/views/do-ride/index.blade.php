@extends('layouts.doride')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">

<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

<link rel="stylesheet" href="{{ asset('css/style-map/style.css') }}">

{{-- <script src="https://unpkg.com/vue@3"></script> --}}

@endsection

<div class="main-banner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="banner-content banner-width">
                    <h1>Do-Ride</h1>
                    <p style="margin-bottom: 5px">
                        Mitra driver kami selalu menjadikan keamanan dan kenyamananmu dalam perjalanan sebagai
                        prioritas.
                    </p>
                    <div class="menu-btn">
                        <a href="{{route('pesanDoride')}}" class="phone-btn text-center" style="border-style: none">
                            Pesan sekarang
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 pe-0">
                <div class="">
                    <div class="banner-into-img">
                        <img src="{{ asset('img/doride-home-banner/main-home-banner.jpg') }}"
                            alt="Banner Images">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about-area pt-45 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-xxl-6">
                <div class="about-img-2">
                    <img src="{{ asset('img/partner/become-driver.jpg') }}" alt="About Images">
                </div>
            </div>
            <div class="col-lg-7 col-xxl-6">
                <div class="about-content text-right about-width">
                    <span>Partner</span>
                    <h2>Kerjasama Menjadi Driver Kami</h2>
                    <p>Ayo, awali perjalanan Anda bersama kami! Mari bermitra dengan kami untuk dapatkan fleksibilitas
                        dalam mencari penghasilan sendiri.
                    </p>
                    <div class="menu-btn">
                        <a href="/registerDriver" class="phone-btn text-center" style="border-style: none">
                            Daftar sekarang
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        {{-- <div class="row mt-5">
            <div class="col">
                <div class="service-item___2KwmB uk-first-column">
                    <h3>Persyaratan</h3>
                    <div class="service-item-des___3lmt3">
                        <p></p>
                        <p><strong>Persyaratan Administrasi</strong></p>
                        <ul>
                            <li>WNI</li>
                            <li>Mampu membaca dan menulis</li>
                            <li>Memiliki SIM C/D</li>
                            <li>Setidaknya berusia 18 tahun</li>
                            <li>Maksimal berusia 55th</li>
                            <li>Usia kendaraan maksimal 5 tahun pada saat pendaftaran di Grab</li>
                            <li>Lulus ujian berkendara dan training daring yang diselenggarakan oleh Grab</li>
                            <li>Mengisi saldo aplikasi sesuai dengan nominal yang ditetapkan oleh masing-masing kota
                            </li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-item___2KwmB">
                    <h3>Dokumen</h3>
                    <div class="service-item-des___3lmt3">
                        <p></p>
                        <ul>
                            <li>Kartu Tanda Penduduk (eKTP)</li>
                            <li>Surat Izin Mengemudi (SIM)</li>
                            <li>Surat Tanda Nomor Kendaraan (STNK)</li>
                            <li>Buku Rekening</li>
                            <li>Surat Keterangan Catatan Kepolisian (SKCK)</li>
                            <li>Surat Keterangan Sehat (Khusus bagi calon mitra usia 50 Tahun keatas)</li>
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
                            <li>Kunjungi Pusat Mitra Do-Ride untuk proses verifikasi. Klik detail lokasi: <a
                                    href="https://help.grab.com/driver/id-id/115007749408" target="_blank"
                                    rel="noopener">here</a></li>
                            <li>Datang dan lengkapi training mitra online Anda</li>
                        </ul>
                        <p></p>
                    </div>
                </div>
            </div>
        </div> --}}
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
</div>

@endsection