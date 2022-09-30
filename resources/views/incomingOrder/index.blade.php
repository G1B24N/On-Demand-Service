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
<script src="https://unpkg.com/vue@3"></script>
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

<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header text-right">
				{{-- <a href="/incomingOrder/create" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a>
                <a href="/edit_product_seller" class="btn btn-info" role="button"><i class="fa fa-print"></i></a> --}}
			</div>
			<div class="card-body">
				<table class="table table-striped table-hover mb-0" id="data-table">
					<thead>
						<tr>
							<th>NO</th>
							{{-- <th>Nama Barang</th> --}}
							<th>Pembeli</th>
                            <th>Jumlah Harga</th>
                            <th>status</th>
							{{-- <th>Aksi</th> --}}
						</tr>
					</thead>
					<tbody>
					@foreach ($pesanan as $p)
					{{-- @if ($p->pesanan_detail->id_restoran == Auth::user()->id) --}}
						
					<tr>
						<td> {{ $loop->index + 1 }} </td>
						{{-- <td> {{ $p->product->nama_barang }} </td> --}}
						<td> {{ $p->user->name }} </td>
						<td>Rp. {{number_format( $p->jumlah_harga) }}</td>
						<td>
                            @if($p->status == 1)
								Selesai
							@else
								Proses
                            @endif
                        </td>
						<td>
							{{-- <a href="{{route('editOrder', ['id' => $p->id ])}}" class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
							|
							<a onclick="confirmDelete(this)" data-url="{{route('deleteOrder', ['id' => $p->id ])}}" class="btn btn-sm text-danger" role="button"><i class="fa fa-trash"></i></a> --}}
						</td>
					</tr>
					{{-- @endif --}}
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
@endsection