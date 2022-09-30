@extends('layouts.driver')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-dashboard/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
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


<div class="inner-banner" style="background-image:url({{ asset('img/dashboard_driver/riwayat-banner.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Riwayat</h3>
            <ul>
                <li>
                    <a href="index.html">Dashboard Driver</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Riwayat</li>
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
					@if ($p->driver == Auth::user()->id)
					
					@elseif($p->status == 1)
					<tr>
						<td> {{ $loop->index + 1 }} </td>
						<td> {{ $p->user }} </td>
						<td> {{ $p->lokasi_awal }} </td>
						<td class=""> {{ $p->tujuan }} </td>
						<td> {{ $p->jarak }} </td>
						<td>Rp. {{ number_format($p->harga)}}</td>
						<td> {{ $p->durasi }} </td>
						<td>
                            @if($p->status == 1)
								Selesai
                            @endif
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