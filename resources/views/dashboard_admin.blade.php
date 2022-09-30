@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard Admin</h1>
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
                        {{-- <h3>{{$countbarang}}</h3> --}}
                        <p>Barang</p>
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
                        <h3>6</h3>
                        <p>Kategori</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus"></i>
                    </div>
                    <a href="" class="small-box-footer"><strong
                            class="text-white">Selengkapnya <i class="fa fa-angle-right"></i></strong></a>
                </div>
            </div>

        </div>
        {{-- <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Launch demo modal
                    </button> --}}

        <!-- Modal -->

    </div>
</div>
@endsection
