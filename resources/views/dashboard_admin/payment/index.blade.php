@extends('layouts.admin2')

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
				<h1 class="m-0 text-dark">Payment</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_admin.dashboard">Dashboard</a></li>
					<li class="breadcrumb-item active">List metode pembayaran</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container my-5 ml-3 mr-5 table-responsive">
		<div class="card">
			<div class="card-header text-right">
				{{-- <a href="/createUser" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a> --}}
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPayment" data-whatever="@getbootstrap">tambah</button>
                <a href="/edit_kategori_seller" class="btn btn-info" role="button"><i class="fa fa-print"></i></a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-hover mb-0" id="data-table">
					<thead class="thead-dark">
						<tr>
							<th>NO</th>
							<th>Metode Pembayaran</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($payment as $p)
						<tr>
							<td> {{ $loop->index + 1 }} </td>
                            <td> {{ $p->metode_pembayaran }}</td>
							<td>
							<a href="{{route('editPayment', ['id' => $p->id ])}}" data-toggle="modal" data-target="#editPayment{{$p->id}}" class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
								|
							<a onclick="confirmDelete(this)" data-url="{{route('destroyPayment', ['id' =>$p->id ])}}" class="btn btn-sm text-danger" role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
						@include('dashboard_admin.payment.edit')

					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>

@include('dashboard_admin.payment.create')

  <!-- jQuery -->
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
		
<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/app.js')}}"></script>
@endsection