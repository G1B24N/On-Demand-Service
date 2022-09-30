@extends('layouts.admin')

@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@endsection

<div class="content-header">
	<div class="container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Edit Driver</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/dashboard_admin/driver/index">Driver</a></li>
						<li class="breadcrumb-item active">Edit Driver</li>
					</ul>
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
                <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profil driver</h1>

                <form action="{{ route('updateDriver', ['id'=>$driver->id])}}" method="POST"
                    enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <label for="">Foto Profile</label>
                        <br>
                        <img src="{{ asset('uploads/driver/' . $driver->foto_driver) }}" alt id="previewFoto"
                            style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                        <div class="form-group mt-2">
                            {{-- <label for="inputFotoImage">Find Cover Image</label> --}}
                            <input type="file" name="foto_driver" id="inputFotoImage"
                                class="bg-success text-white" style="font-size: 13px"
                                value="{{ $driver->foto_driver }}">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="">Foto Motor</label>
                        <br>
                        <img src="{{ asset('uploads/driver/' . $driver->foto_motor) }}" alt id="previewCover"
                            style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                        {{-- <div class="form-group mt-2"> --}}
                        {{-- <label for="inputCoverImage">Find Cover Image</label> --}}
                        <input type="file" name="foto_motor" id="inputCoverImage" class="bg-success text-white"
                            style="font-size: 13px" value="{{ $driver->foto_motor }}">
                        {{-- </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-md-6 pt-5">
                            <div class="form-group">
                                <label for="">Nama driver</label>
                                <input type="text" name="nama_driver" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver->nama_driver }}">
                            </div>
                        </div>

                        <div class="col-md-6 pt-5">
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input name="nik" type="text" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver->nik }}">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">SIM</label>
                                <input name="sim" type="text" class="form-control" style="font-size: 13px"
                                    value="{{ $driver->sim }}">
                            </div>
                            {{-- <div class="form-floating">
                                    <textarea class="form-control" value="{{ Auth::user()->alamat }}"
                            placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John"
                            style="font-size: 13px"></textarea>
                        </div> --}}
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input name="alamat" type="text" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver->alamat }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input name="nohp" type="text" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver-> nohp }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tempat Tanggal Lahir</label>
                                <input name="ttl" type="text" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver-> ttl }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Motor</label>
                                <input name="nama_motor" type="text" class="form-control" placeholder=""
                                    style="font-size: 13px" value="{{ $driver-> nama_motor }}">
                            </div>
                        </div>

                        {{-- @foreach ($drivers as $driver ) --}}
                        @if ($driver->user_id == Auth::user()->id)
                            <input name="user_id" {{-- type="hidden" --}} class="form-control"
                                placeholder="ex: 08**********" style="font-size: 13px"
                                value="{{ $driver-> user_id }}">
                        @endif
                        {{-- @endforeach --}}


                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label> <br>
                                <select name="jenis_kelamin" id="jenisKelamin">
                                    <option selected disabled value="{{ Auth::user()->jenis_kelamin }}">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="text-right">
                                <a href="/dashboard_admin/driver/index" class="btn btn-outline-success mr-2" role="button"><i
                                        class="fa fa-ban"></i></a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
@endsection