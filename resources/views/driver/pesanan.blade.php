@extends('layouts.driver')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-dashboard/dataTables.bootstrap4.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
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

<script>
	$(function() {
	  $('#toggle-two').bootstrapToggle({
		on: 'Enabled',
		off: 'Disabled'
	  });
	})
  </script>
  
  
  <script>
	  $('.toggle-class').on('change', function() {
		  var status = $(this).prop('checked') == true ? 1 : 0;
		  var user_id = $(this).data('id');
		  $.ajax({
			  type: 'GET',
			  dataType: 'JSON',
			  url: '{{ route('changeStatus') }}',
			  data: {
				  'status': status,
				  'user_id': user_id
			  },
			  success:function(data) {
				  $('#notifDiv').fadeIn();
				  $('#notifDiv').css('background', 'green');
				  $('#notifDiv').text('Status Updated Successfully');
				  setTimeout(() => {
					  $('#notifDiv').fadeOut();
				  }, 3000);
			  }
		  });
	  });
  </script>
@endsection

<div class="inner-banner" style="background-image:url({{ asset('img/dashboard_driver/banner-pesanan.jpeg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Pesanan</h3>
            <ul>
                <li>
                    <a href="index.html">Dashboard Driver</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Pesanan</li>
            </ul>
        </div>
    </div>
</div>

<div class="content ptb-30">
	<div class="container-fluid">
		<div class="card">
			<div class="card-body">
				<table class="table table-striped table-hover mb-0" id="data-table">
					<thead>
						<tr>
							<th>NO</th>
							<th>Penumpang</th>
							<th>Lokasi Awal</th>
                            <th>Tujuan</th>
                            <th>Jarak</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>status</th>
							{{-- <th>Aksi</th> --}}
						</tr>
					</thead>
					<tbody>
					@foreach ($pesanan as $p)
					@if ( $p->status == 0)
						
					<tr>
						<td> {{ $loop->index + 1 }} </td>
						<td> {{ $p->user }} </td>
						<td> {{ $p->lokasi_awal }} </td>
						<td> {{ $p->tujuan }} </td>
						<td> {{ $p->jarak }} </td>
						<td>Rp. {{ number_format($p->harga)}}</td>
						<td> {{ $p->durasi }} </td>
						<td>
							<input type="checkbox" class="toggle-class" data-id="{{ $p->id }}" data-toggle="toggle" data-style="slow" data-on="Enabled" data-off="Disabled" {{ $p->status == true ? 'checked' : ''}}>
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