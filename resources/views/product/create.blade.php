@extends('layouts.seller')

@section('content')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tambah Barang</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_seller">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/product/indexSeller">Barang</a></li>
                    <li class="breadcrumb-item">Tambah Barang</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
                <form action={{route('storeProduct')}} method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        {{-- <label for="nama">Id Kategori</label>
                        <input type="number" name="id" id="id" class="form-control" required="required" placeholder=""> --}}

                        <label for="id">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori"  required="required">
                            @foreach ($tbl_kategoris as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
        
                    </div>
                    <div class="form-group">
                        <label for="id">Restaurant</label>
                        <select class="form-control" name="id_restoran" id="id_restoran"  required="required">
                            @foreach ($tbl_restorans as $resto)
                            @if (Auth::user()->id)
                            <option value="{{$resto->id_restoran}}">{{$resto->nama_restoran}}</option>    
                            @endif
                            @endforeach
                        </select>
                        {{-- <input type="file" name="id_restoran"  class="form-control" required="required" value="{{$tbl_restorans->id_restoran}}">{{$tbl_restorans->nama_restoran}}> --}}
                    </div>

                    {{-- <div class="form-group">
                        <label for="nama">Id Restauran</label>
                        @foreach ($restorans as $resto )    
                        <input type="text" name="id_restoran" id="nama" class="form-control" required="required" value="{{ $resto->id_restoran }}">
                        @endforeach
                    </div> --}}


                    <div class="form-group">
                        <label for="nama">Gambar</label>
                        <input type="file" name="gambar"  class="form-control" required="required" placeholder="Masukkan gambar barang">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama" class="form-control" required="required" placeholder="Masukkan nama barang">
                    </div>

                    {{-- <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" name="stok" id="stok" class="form-control" required="required" placeholder="Masukkan stok barang">
                    </div> --}}

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control" required="required" placeholder="Masukkan harga barang">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required="required" placeholder="Masukkan keterangan barang"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required="required" placeholder="Masukkan deskripsi barang"></textarea>
                    </div>

                    <div class="text-right">
                        <a href="/barang/indexSeller" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
@endsection