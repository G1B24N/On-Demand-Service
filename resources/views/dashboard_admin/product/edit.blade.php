@extends('layouts.admin')

@section('content')

@section('addJavascript')
    <script>
        confirmEdit = function(button) {
            swal(
                "Success!",
                "Data berhasil diedit!",
                "success");
        }
    </script>
@endsection

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Barang</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_seller">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/barang_seller">Barang</a></li>
					<li class="breadcrumb-item active">Edit Barang</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
                <form action="{{ route('updateproduct', ['id'=>$barang->id]) }}" method="POST">
               {{ csrf_field() }}

               <div class="form-group">
                    {{-- <label for="nama">Id Kategori</label>
                    <input type="number" name="id" id="id" class="form-control" required="required" placeholder=""> --}}

                    {{-- {{-- <label for="id">Kategori</label>
                    <select class="form-control" name="id" id="id"  required="required">
                        @foreach ($kategoris as $kategori)
                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                        @endforeach
                    </select>
                    </div> --}}

                <div class="form-group">
                    <label for="nama">Gambar</label> <br>
                    <img src="{{ url('uploads/barang/') }}/{{$barang->gambar}}" alt id="previewImage" style="max-width: 10%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                    <input type="file" name="gambar" id="gambar" class="form-control" value="{{ $barang->gambar}}" placeholder="Masukkan gambar barang">
                </div>

                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control"  value="{{ $barang->nama_barang}}" placeholder="Masukkan nama barang">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori">
                            @foreach ($kategori as $kategori)
                                <option selected value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Restoran</label>
                        <select class="form-control" name="id_restoran" id="id_restoran">
                            @foreach ($restoran as $restoran)
                                <option selected value="{{$restoran->id_restoran}}">{{$restoran->nama_restoran}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control"  value="{{ $barang->harga}}" placeholder="Masukkan harga barang">
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    {{-- <textarea name="keterangan" id="keterangan" rows="3" class="form-control" required="required"  value="{{ $barang->keterangan}}" placeholder="Masukkan deskripsi jurusan"></textarea> --}}
                    <input name="keterangan" id="keterangan" rows="3" class="form-control"  value="{{ $barang->keterangan}}">
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    @isset($barang)
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"  required>{{$barang->deskripsi}} </textarea>
                    @else
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"  required></textarea>      
                    @endif              
                </div>

                    <div class="text-right">
                        <a href="{{route('indexproduct')}}" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
                        <button onclick="confirmEdit(this)" type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
@endsection