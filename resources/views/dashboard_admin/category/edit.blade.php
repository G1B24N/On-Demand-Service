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
				<h1 class="m-0 text-dark">Edit Category</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('indexCategory')}}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="/kategori">Category</a></li>
					<li class="breadcrumb-item active">Edit Category</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container-fluid">

		<div class="card">
            <div class="card-body">
                <form action="{{ route('updateCategory', ['id'=>$kategori->id]) }}" method="POST">
                    {{ csrf_field('updateCategory') }}

                    <div class="form-group">
                        <label for="nama">Nama Category</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required="required" value="{{ $kategori->nama_kategori}}" placeholder="Masukkan nama kategori">
                    </div>

                    <div class="text-right">
                        <a href="{{route('indexCategory')}}" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
                        <button onclick="confirmEdit(this)" type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
@endsection