@extends('layouts.admin')

@section('content')

@section('addJavascript')
    <script>
        confirmCreate = function(button) {
            swal(
                "Success!",
                "Data berhasil ditambah!",
                "succes");
        }
    </script>
@endsection

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Tambah Kategori</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('indexCategory')}}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/category/indexSeller">Kategori</a></li>
                    <li class="breadcrumb-item">Tambah Kategori</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
                <form action="/category-store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field('/kategori-store') }}
                    
                    {{-- <div class="form-group">
                        <label for="nama">Id Kategori</label>
                        <input type="number" name="id" id="id" class="form-control" required="required" placeholder="">
                    </div> --}}

                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama" class="form-control" required="required" placeholder="Masukkan nama kategori">
                    </div>

                    <div class="text-right">
                        <a href="/category/index" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
                        <button onclick="confirmCreate(this)" type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
@endsection