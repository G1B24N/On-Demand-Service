@extends('layouts.admin2')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-dashboard/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

<!-- Main CSS -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@endsection

@section('addJavascript')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/script-dashboard/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/script-dashboard/dataTables.bootstrap4.min.js') }}"></script>
<script>
	$(document).ready(function () {
		$('#myTable').DataTable();
	});
</script>
<script>
	$(function () {
		$("#data-table").DataTable();
	})
</script>
<script src="{{ asset('js/script-dashboard/sweetalert.min.js') }}"></script>
<script>
	confirmDelete = function (button) {
		var url = $(button).data('url');
		swal({
			'title': 'Konfirmasi Hapus',
			'text': 'Anda yakin ingin menghapus data ini?',
			'dangerMode': true,
			'buttons': true
		}).then(function (value) {
			if (value) {
				window.location = url;
			}
		})
	}
</script>
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
{{-- <<<<<<<<<<< MODAL ADD DRIVER >>>>>>>>>>	 --}}
@endsection


<div class="content-header">
	<div class="container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Restaurant</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/dashboard_seller">Dashboard</a></li>
						<li class="breadcrumb-item active">Restaurant</li>
					</ul>
				</div>
				<div class="col-auto float-end ms-auto">
					<a href="#addResto" class="btn add-btn" data-toggle="modal" data-target="#addResto"><i
							class="fa fa-plus"></i> Tambah Restaurant</a>
					<div class="nav nav-tabs view-icons" id="nav-tab" style="border:none" role="tablist">
						<a href="" class="nav-link active mb-3 grid-view btn btn-link active" id="nav-home-tab"
							data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
							aria-controls="nav-home" aria-selected="true"><i class="fa fa-th"></i></a>
						<a href="" class="nav-link mb-3 list-view btn btn-link" id="nav-profile-tab"
							data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
							aria-controls="nav-profile" aria-selected="false"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>

<div class="content">
	<div class="container table-responsive">
		<div class="card">
			{{-- <div class="card-header text-right">
				<a type="button" class="btn btn-success" data-toggle="modal" data-target="#addResto"><i
						class="fa fa-plus-square"></i>Add</a>
				<a href="{{route('createRestaurant')}}" type="button" class="btn btn-success"><i
					class="fa fa-plus-square"></i>Add</a>
			</div> --}}
			<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row staff-grid-row">

							@foreach ($restoran as $resto)
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<a href="{{ url('dashboard_admin/restaurant/detail')}}/{{$resto->id_restoran }}" class="avatar"><img alt=""
												src="	{{ asset('uploads/restoran/'.$resto->foto) }}"></a>
									</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
											aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{route('editRestaurant', ['id'=> $resto->id_restoran])}}"><i
													class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item"
												href="{{ route('destroyRestaurant', ['id'=> $resto->id_restoran]) }}"><i
													class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis">
										<a href="client-profile.html">
											<h5>{{ $resto->nama_restoran }}</h5>
										</a>
									</h4>
									<div class="small text-muted">Restaurant</div>
									{{-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> --}}
									{{-- <div class="small text-muted">CEO</div> --}}
									{{-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> --}}
									<a href="{{ url('dashboard_admin/restaurant/detail')}}/{{$resto->id_restoran }}" class="btn btn-white btn-sm m-t-10">View Profile</a>
								</div>
							</div>
							@endforeach

						</div>
					</div>
					
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						{{-- <div class="card-header text-right">
							<a type="button" class="btn btn-success" data-toggle="modal" data-target="#addResto"><i
									class="fa fa-plus-square"></i>Add</a>
							<a href="{{route('createRestaurant')}}" type="button" class="btn btn-success"><i
								class="fa fa-plus-square"></i>Add</a>
						</div> --}}
						<table id="data-table" class="table table-bordered table-striped">
							<thead class="thead-dark">
								<tr>
									<th>No</th>
									<th>Nama Restaurant</th>
									<th>Author</th>
									{{-- <th>Menu</th> --}}
									{{-- <th>Kategori</th> --}}
									{{-- <th>Status</th> --}}
									<th>Detail</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($restoran as $resto)
								{{-- @if ($resto->author == Auth::user()->id) --}}
		
								<tr>
									<td> {{ $loop->index + 1 }} </td>
		
									<td>
										{{-- <img src="{{ asset('uploads/restoran/'.$resto->foto) }}" alt=""
										style="width: 40px;">{{ $resto->nama_restoran }} --}}
										<div class="user-panel mt-3 pb-3 mb-3 d-flex">
											<div class="image">
												<img src="{{asset('uploads/restoran/'.$resto->foto)}}"
													class="img-circle elevation-2 " alt="User Image">
											</div>
											<div class="info">
												<a href="#" class="d-block">{{ $resto->nama_restoran }}</a>
											</div>
										</div>
									</td>
									{{-- <td> {{ $resto->waktu_pemesanan }} </td> --}}
									<td> {{ $resto->author }} </td>
									{{-- <td>{{ $resto->kategori }}</td> --}}
									{{-- <td>{{ $resto->author }}</td> --}}
									{{-- <td>
										<div class="dropdown action-label">
											<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
												<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
											</div>
										</div>
										<div class="dropdown show">
											<a class="btn btn-secondary dropdown-toggle" href="#" role="button"
												id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
												aria-expanded="false">
												Dropdown link
											</a>
		
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
										<button class="btn btn primary"></button>
									</td> --}}
									{{-- <td>{{ $resto->kota }}</td> --}}
									{{-- <td>{{ $resto->no_hp }}</td> --}}
									<td>
										<a href="{{ url('dashboard_admin/restaurant/detail')}}/{{$resto->id_restoran }}"
											class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
									</td>
									<td>
										<a href="{{route('editRestaurant', ['id' => $resto->id_restoran ])}}"
											class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
										|
										<a onclick="confirmDelete(this)"
											data-url="{{route('destroyRestaurant', ['id' => $resto->id_restoran ])}}"
											class="btn btn-sm text-danger" role="button"><i class="fa fa-trash"></i></a>
									</td>
		
								</tr>
								{{-- @endif --}}
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>


{{-- MODAL ADD RESTAURANT --}}
@include('dashboard_admin.restaurant.create')
{{-- CLOSE MODAL ADD RESTAURANT --}}

{{-- MODAL EDIT RESTAURANT --}}
{{-- @section('addJavascript') --}}
{{-- <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/app.js')}}"></script> --}}
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
{{-- <script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
@endsection --}}
@endsection