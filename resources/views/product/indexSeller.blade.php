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
				<h1 class="m-0 text-dark">Barang</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_seller">Dashboard</a></li>
					<li class="breadcrumb-item active">Barang</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
{{-- <select id="catID">
	<option value="">Categori</option>
	@foreach ($barangs as $clist)
		<option id="cat{{$clist->nama_barang}}" value="{{$clist->id}}">{{$clist->nama_barang}}</option>
	@endforeach
</select> --}}
<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header text-right">
				<a href="/product/create" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a>
                <a href="/edit_product_seller" class="btn btn-info" role="button"><i class="fa fa-print"></i></a>
		</div>
			<div class="card-body">
				<table class="table table-striped table-hover mb-0" id="data-table">
					<thead>
						<tr>
							<th>NO</th>
							<th>Gambar</th>
							<th>Nama Barang</th>
                            {{-- <th>Stok</th> --}}
                            <th>Harga</th>
							<th>Keterangan</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($barangs as $barang)
					@if ($barang->restaurant->id_user == Auth::user()->id)
						
					<tr>
						<td> {{ $loop->index + 1 }} </td>
						<td>
							<img src="{{ asset('uploads/barang/'.$barang->gambar) }}" alt=""	 style="width: 40px;" >
						</td>
						<td> {{ $barang->nama_barang }} </td>
						{{-- <td> {{ $barang->stok }} </td> --}}
						<td> {{ $barang->harga }} </td>
						{{-- <td>{{ $barang->where('id_restoran', Auth::user()->id	)->count() }}</td> --}}
						<td>{{$barang->keterangan}}</td>
						<td>{{ $barang->deskripsi }}</td>
						<td>
							<a href="{{route('editProduct', ['id' => $barang->id ])}}" class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
							|
							<a onclick="confirmDelete(this)" data-url="{{route('deleteProduct', ['id' => $barang->id ])}}" class="btn btn-sm text-danger" role="button"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endif
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
@endsection