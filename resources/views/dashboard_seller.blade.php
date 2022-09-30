@extends('layouts.seller')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-dashboard/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{ asset('js/script-dashboard/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/script-dashboard/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
<script src="{{ asset('js/script-dashboard/sweetalert.min.js') }}"></script>
<script>
    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            'title': 'Konfirmasi Hapus',
            'text': 'Anda yakin ingin menghapus data ini?',
            'dangerMode': true,
            'buttons': true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        })
    }
</script>
@endsection

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="content">
    <div class="container-fluid">
        <div>
            <div class="p-2 mb-4 bg-white" style="border-radius: 10px">
                <div class="container-fluid py-5">
                    <h1 class="fw-bold">Hai <label id="lblsapaan"></label>{{ Auth::user()->name }}, Apa kabar?</h1>
                    <p class="col-md-8 fs-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita quia non doloremque assumenda mollitia vero!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mr-4 col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{{$pesanan_details}}}</h3>
                        <p>Barang Yang Terjual</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <a href="" class="small-box-footer"><strong class="text-white">Selengkapnya
                            <i class="fa fa-angle-right"></i></strong></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Rp. {{number_format($jumlah)}}</h3>
                        <p>Pemasukan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="" class="small-box-footer"><strong
                            class="text-white">Selengkapnya <i class="fa fa-angle-right"></i></strong></a>
                </div>
            </div>

        </div>

        <div class="container">

            {{-- <div class="row pt-5">
                <div class="col-md-12">
                    <a href="{{ url('do-food') }}" class="btn btn-success btn-lg" style="font-size: 15px">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-md-12 mt-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard_seller') }}" class="text-success">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                        </ol>
                    </nav>
                </div>
            </div> --}}
        
            {{-- <section class="py-5" style="margin-bottom: 50px">
                <div class="container">
                    <div class="row pt-5">
                        <div class="col-md-12">
                            <div class="card" style="border-style: none">
                                <div class="card-body">
                                    <h3><i class="fa fa-history"></i> Riwayat Pemesanan</h3>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Pembeli</th>
                                                <th>Barang</th>
                                                <th>Jumlah Harga</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach($tbl_pesanans as $pesanan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $pesanan->tanggal }}</td>
                                                <td>
                                                    @if($pesanan->status == 1)
                                                        Sedang di proses
                                                        @else
                                                        Sudah di antar
                                                        @endif
                                                        {{ $pesanan->user->name }}
                                                    </td>
                                                <td></td>
                                                <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode + 10000) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                
                    </div>
                </div>
            </section> --}}
        
            
        
        </div>
        {{-- <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Launch demo modal
                    </button> --}}

        <!-- Modal -->

    </div>
</div>
@endsection
