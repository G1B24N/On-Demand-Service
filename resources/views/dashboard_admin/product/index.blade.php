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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
<script>

$(document).ready(function () {
		// alert('p')
		// console.log('p');
  $("#findBtn").click(function(){
    var cat = $("#catID").val();
    // var price = $('#priceID').val();
    alert(cat)
    $.ajax({	
      type: 'get',
      dataType: 'html',
      url: '{{url('/productsCat')}}',
      data: 'cat_id=' + cat,
      success:function(response){
        console.log(response);
        $("#productData").html(response);
      }
    });
  });
});



function filter (){
	table.ajax.reload(null,false)
}
</script> --}}
@endsection


<div class="content-header">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Product</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('dashboard_admin')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Porduct</li>
					</ul>
				</div>
				<div class="col-auto float-end ms-auto">
					<a href="{{route('createproduct')}}" class="btn add-btn"{{--  data-toggle="modal" data-target="#addDriver" --}}><i
							class="fa fa-plus"></i> Tambah Product</a>
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



{{-- <div class="row p-2">
	<div class="col-md-3">
		<label>Harga</label>
		<select id="catID">
			<option value="">Categori</option>
			@foreach ($products as $clist)
				<option id="cat{{$clist->nama_barang}}" value="{{$clist->id}}">{{$clist->nama_barang}}</option>
			@endforeach
		</select>
		<select class="form-control" id="priceID">
			<option value="">Categori</option>
			<option value=">50000"> > 50000 </option>
			<option value="<50000"> < 50000 </option>
		</select>
		<button id="findBtn">Search</button>
	</div>
</div> --}}

<div class="content">
	<div class="container-fluid">
		<div class="card">
			<div class="card-header text-right">
				{{-- <a href="{{route('createproduct')}}" class="btn btn-success" role="button"><i class="fa fa-plus-square"></i></a>
                <a href="/edit_product_seller" class="btn btn-info" role="button"><i class="fa fa-print"></i></a> --}}
			</div>
			<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="row staff-grid-row">

							@foreach ($products as $barang)
							<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
								<div class="profile-widget">
									<div class="profile-img">
										<div class="avatar">
											<img alt="" src="{{ asset('uploads/barang/'.$barang->gambar) }}">
										</div>
									</div>
									<div class="dropdown profile-action">
										<a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
											aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{route('editproduct', ['id' => $barang->id ])}}"><i
													class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item"
											onclick="confirmDelete(this)" data-url="{{route('destroyproduct', ['id' => $barang->id ])}}"><i
													class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
									<h4 class="user-name m-t-10 mb-0 text-ellipsis">
										<a href="client-profile.html">
											<h5>{{ $barang->nama_barang }}</h5>
										</a>
									</h4>
									<div class="small text-muted">{{$barang->restaurant->nama_restoran}}</div>
									{{-- <h5 class="user-name m-t-10 mb-0 text-ellipsis"><a href="client-profile.html">Barry Cuda</a></h5> --}}
									{{-- <div class="small text-muted">CEO</div> --}}
									{{-- <a href="chat.html" class="btn btn-white btn-sm m-t-10">Message</a> --}}
									{{-- <a href="{{ url('dashboard_admin/restaurant/detail')}}/{{$resto->id_restoran }}" class="btn btn-white btn-sm m-t-10">View Profile</a> --}}
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
						<table class="table table-striped table-hover mb-0" id="data-table">
							<thead class="thead-dark">
								<tr>
									<th>NO</th>
									<th>Nama Barang</th>
									<th>Restaurant</th>
									<th>Harga</th>
									{{-- <th>
										<select class="form-control" name="catgeory">
											<option value="">Categori</option>
											<option value=">50000"> > 50000 </option>
											<option value="<50000"> < 50000 </option>
										</select>
									</th> --}}
									{{-- <th>Deskripsi</th> --}}
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($products as $barang)
							<tr>
								<td> {{ $loop->index + 1 }} </td>
								<td><img src="{{ asset('uploads/barang/'.$barang->gambar) }}" alt="" style="width: 50px; height: 50ox; border-radius: 50%;"> {{ $barang->nama_barang }} </td>
								<td> {{ $barang->restaurant->nama_restoran }} </td>
								<td> {{ $barang->harga }} </td>
								<td>
									<a href="{{route('editproduct', ['id' => $barang->id ])}}" class="btn btn-sm text-primary" role="button"><i class="fa fa-edit"></i></a>
									|
									<a onclick="confirmDelete(this)" data-url="{{route('destroyproduct', ['id' => $barang->id ])}}" class="btn btn-sm text-danger" role="button"><i class="fa fa-trash"></i></a>
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


@endsection
<script>
// const data2 = {
// 	columns: ['Name', 'Position', 'Office', 'Age', 'Start date', 'Salary'],
// 	rows: [
// 	  ['Tiger Nixon', 'System Architect', '	Edinburgh', 61, '2011/04/25', '$320,800'],
// 	  ['Sonya Frost', 'Software Engineer', 'Edinburgh', 23, '2008/12/13', '$103,600'],
// 	  ['Jena Gaines', 'Office Manager', 'London', 30, '2008/12/19', '$90,560'],
// 	  ['Quinn Flynn', 'Support Lead', 'Edinburgh', 22, '2013/03/03', '$342,000'],
// 	  ['Charde Marshall', 'Regional Director', 'San Francisco', 36, '2008/10/16', '$470,600'],
// 	  ['Haley Kennedy', 'Senior Marketing Designer', 'London', 43, '2012/12/18', '$313,500'],
// 	  ['Tatyana Fitzpatrick', 'Regional Director', 'London', 19, '2010/03/17', '$385,750'],
// 	  ['Michael Silva', 'Marketing Designer', 'London', 66, '2012/11/27', '$198,500'],
// 	  ['Paul Byrd', 'Chief Financial Officer (CFO)', 'New York', 64, '2010/06/09', '$725,000'],
// 	  ['Gloria Little', 'Systems Administrator', 'New York', 59, '2009/04/10', '$237,500'],
// 	],
//   };
  
//   const instance = new mdb.Datatable(document.getElementById('datatable'), data2)
  
//   document.getElementById('datatable-search-input').addEventListener('input', (e) => {
// 	instance.input-group(e.target.value);
//   });
</script>
{{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
<script>

	$(document).ready(function () {
		// alert('p')
		// console.log('p');
  $("#findBtn").click(function(){
    var cat = $("#catID").val();
    var price = $('#priceID').val();
	alert(cat)
    $.ajax({
      type: 'get',
      dataType: 'html',
      url: '{{url('/productsCat')}}',
      data: 'cat_id=' + cat + '&price=' + price,
      success:function(response){
        console.log(response);
        $("#productData").html(response);
      }
    });
  });
});



function filter (){
	table.ajax.reload(null,false)
}
</script>
