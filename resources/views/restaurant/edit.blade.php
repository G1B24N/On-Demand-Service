@extends('layouts.seller')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="container">

    <div class="row pt-5">
        <div class="col-md-12">
            <a href="{{ url('/restaurant/index') }}" class="btn btn-success btn-lg" style="font-size: 15px">
                <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard_seller') }}" class="text-success">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Restaurant</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="py-5" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        {{-- <div class="card-header text-right">
                            <a href="/resto/create" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a>
                        </div> --}}
                        {{-- @foreach ($restorans as $resto) --}}
                        <div class="card-body">
                            <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profil Restaurant</h1>
                            <form action="{{ route('updateResto', ['id'=>$restoran->id_restoran]) }}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <label for="">Preview Foto</label>
                                    <br>
                                    <img src="{{ asset('uploads/resto/') }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputFotoImage">Find Cover Image</label>
                                        <input type="file" name="foto" id="inputFotoImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                </div>

                                <div class="col-md-4">
                                    <label for="">Preview Cover</label>
                                    <br>
                                    <img src="{{ asset('uploads/resto/') }}" alt id="previewCover" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="cover" id="inputCoverImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Restaurant</label>
                                            <input type="text" name="nama_restoran" class="form-control" placeholder="ex: KFC" style="font-size: 1.3rem"
                                            value="{{$restoran->nama_restoran}}"  >   
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estimasi Pemesanan</label>
                                            <input type="text" name="waktu_pemesanan" class="form-control" placeholder="ex: Dhoe" style="font-size: 1.3rem"
                                                value="{{ $restoran->waktu_pemesanan }}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" style="font-size: 1.3rem"
                                                value="{{ $restoran->alamat }}"  >
                                        </div>
                                        {{-- <div class="form-floating">
                                            <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 1.3rem"></textarea>
                                        </div> --}}
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori" required="required">
                                                @foreach ($tbl_kategoris as $kategori)
                                                <option value="{{$kategori->nama_kategori}}">{{$kategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kota</label>
                                            <input name="kota" type="text" class="form-control" placeholder="ex: Jakarta" style="font-size: 1.3rem"
                                                value="{{ $restoran->kota }}"  >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No Hp</label>
                                            <input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                value="{{ $restoran->no_hp }}"    >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input name="zipcode" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                value="{{ $restoran->zipcode }}"     >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input name="author" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                value="{{ $restoran->author }}"  >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jam Buka</label>
                                            <input name="jam_kerja" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                value="{{ $restoran->jam_kerja }}"   >
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label> <br>
                                            <select name="jenis_kelamin" id="jenisKelamin">
                                                <option selected disabled value="{{ Auth::user()->jenis_kelamin }}">Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col text-end">
                                            <div>
                                            <button type="submit" class="btn btn-primary" style="font-size:15px;">Update</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                        {{-- @endforeach --}}
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection