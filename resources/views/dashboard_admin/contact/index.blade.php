@extends('layouts.admin')

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
				<h1 class="m-0 text-dark">Contact</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_admin.dashboard">Dashboard</a></li>
					<li class="breadcrumb-item active">Messege</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container my-5 ml-3 mr-5 table-responsive">
		<div class="card">
			<div class="card-header text-right">
				{{-- <a href="/category/create" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a> --}}
                {{-- <a href="/edit_kategori_seller" class="btn btn-info" role="button"><i class="fa fa-print"></i></a> --}}
			</div>
			<div class="card-body">
				<table class="table table-striped table-hover mb-0" id="data-table">
					<thead class="thead-dark">
						<tr>
							<th>NO</th>
							{{-- <th>User Pengirim</th> --}}
							<th>Nama Lengkap</th>
							<th>Email</th>
							<th>Nomor Hp</th>
							<th>Subjek</th>
							<th>Pesan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($pesan as $p)
						<tr>
							<td> {{ $loop->index + 1 }} </td>
                            {{-- <td> {{ $p->user_id }} </td> --}}
                            <td> {{ $p->nama_lengkap }} </td>
                            <td><a target="_blank" href="https://mail.google.com/mail/u/0/#inbox?compose={{ $p->email }}">{{ $p->email }}</a></td>
                            <td> {{ $p->phone_number }} </td>
                            <td> {{ $p->msg_subject }} </td>
                            <td> {{ $p->message }} </td>
							<td>
								{{-- <a href="{{route('editCategory', ['id' => $p->id ])}}" class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
								| --}}
								<a onclick="confirmDelete(this)" data-url="{{route('hapusContact', ['id' => $p->id ])}}" class="btn btn-sm text-danger" role="button"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
@endsection