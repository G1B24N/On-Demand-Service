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
<script src="{{ asset('js/script-dashboard/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/script-dashboard/dataTables.bootstrap4.min.js') }}"></script>
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
@endsection


<div class="content-header">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Driver</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="admin-dashboard.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Driver</li>
					</ul>
				</div>
				<div class="col-auto float-end ms-auto">
					<a href="{{route('createDriver')}}" class="btn add-btn"{{--  data-toggle="modal" data-target="#addDriver" --}}><i
							class="fa fa-plus"></i> Tambah Driver</a>
					<div class="nav nav-tabs view-icons" id="nav-tab" style="border:none" role="tablist">
						<a href="" class="nav-link active mb-3 grid-view btn btn-link active" id="nav-home-tab"
							data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
							aria-controls="nav-home" aria-selected="true"><i class="fa fa-th"></i></a>
						<a href="" class="nav-link mb-3 list-view btn btn-link" id="nav-profile-tab"
							data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
							aria-controls="nav-profile" aria-selected="false"><i class="fa fa-bars"></i></a>
						{{-- <nav>
							<div class="nav nav-tabs" id="nav-tab" role="tablist">
							  <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
							  <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-shopping-bag me-2"></i>Pickup</button>
							</div>
						</nav> --}}
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDriver"
					data-whatever="@getbootstrap">tambah</button>
				<a href="{{route('createDriver')}}" class="btn btn-info" role="button"><i class="fa fa-plus-square"></i>add</a>
			</div> --}}
			<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row staff-grid-row">

							@foreach ($drivers as $driver)
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<a href="" class="avatar">
											@if ($driver->foto_driver)
											<img src="{{asset('uploads/driver/'.$driver->foto_driver)}}"  alt="">
											@else
											<img src="{{asset('img/default_img.png') }}" alt="">
											@endif
											{{-- <img alt=""src="{{ asset('uploads/driver/'.$driver->foto_driver) }}"> --}}
										</a>
									</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
											aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{route('editDriver', ['id'=> $driver->id])}}"><i
													class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item"
												href="{{ route('destroyDriver', ['id'=> $driver->id]) }}"><i
													class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis">
										<a href="client-profile.html">
											@if ($driver->nama_driver)
											<h5>{{ $driver->nama_driver }}</h5>
											@else
											<h5>Unknown</h5>
											@endif
										</a>
									</h4>
									<div class="small text-muted">Driver</div>
									{{-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> --}}
									{{-- <div class="small text-muted">CEO</div> --}}
									{{-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> --}}
									<a href="" class="btn btn-white btn-sm m-t-10">View Profile</a>
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
									<th>Driver</th>
									<th>Kendaraan</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>TTL</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($drivers as $driver)
								{{-- @if ($resto->author == Auth::user()->id) --}}
								<tr>
									<td>
										<div class="user-panel mt-3 pb-3 mb-3 d-flex">
											<div class="image">
												@if ($driver->foto_driver)
												<img src="{{asset('uploads/driver/'.$driver->foto_driver)}}" class="brand-image img-circle elevation-2 "  alt="">
												@else
												<img src="{{asset('img/default_img.png') }}" class="brand-image img-circle elevation-2 "  alt="">
												@endif
											</div>
											<div class="info">
												<a href="#" class="d-block">{{ $driver->nama_driver }}</a>
											</div>
										</div>
									</td>
									<td>
										<div class="user-panel mt-3 pb-3 mb-3 d-flex">
											<div class="image">
												<img src="{{asset('uploads/driver/'.$driver->foto_motor)}}"
													class="img-circle elevation-2 " alt="User Image">
											</div>
											<div class="info">
												<a href="#" class="d-block">{{ $driver->nama_motor }}</a>
											</div>
										</div>
									</td>
									<td>
										{{ $driver->user->email }}
									</td>
									<td>
										{{ $driver->alamat }}
									</td>
									<td>
										{{ $driver->ttl }}
									</td>
									<td>
										@if(empty($driver->alamat))
										<P class="btn btn-warning">Profil belum lengkap</p>
										@elseif(empty($driver->nik))
											<P class="btn btn-warning">Profil belum lengkap</p>
										@elseif(empty($driver->sim))
											<P class="btn btn-warning">Profil belum lengkap</p>
										@elseif(empty($driver->nama_motor))
											<P class="btn btn-warning">Profil belum lengkap</p>
										@elseif(empty($driver->ttl))
											<P class="btn btn-warning">Profil belum lengkap</p>
										@else
										<P class="btn btn-success">Profil sudah lengkap</P>
										@endif
									</td>
									<td>
										{{-- <div class="dropdown show">
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
										</div> --}}
										<a class="btn-primary" href="{{route('editDriver', ['id'=> $driver->id])}}"><i class="fa fa-edit"></i></a>
										|
										{{-- <a class="btn-danger" href="{{ route('destroyDriver', ['id'=> $driver->id]) }}"><i class="fa fa-trash"></i></a> --}}
										<a onclick="confirmDelete(this)"
											data-url="{{route('destroyDriver', ['id' => $driver->id ])}}"
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

{{-- @include('dashboard_admin.driver.create') --}}


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