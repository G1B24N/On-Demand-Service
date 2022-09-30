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
					<h3 class="page-title">Edit Restaurant</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="/dashboard_admin/restaurant/index">Restaurant</a></li>
						<li class="breadcrumb-item active">Edit Restaurant</li>
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
                <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profile Restaurant</h1>
                            <form action="{{ route('updateRestaurant', ['id' =>  $restoran->id_restoran])}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <label for="">Foto Restaurant</label>
                                    <br>
                                    <img src="{{ asset('uploads/restoran/' . $restoran->foto) }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputFotoImage">Find Cover Image</label>
                                        <input type="file" name="foto" id="inputFotoImage" class="bg-success text-white" style="font-size: 13px"
                                        value="{{$restoran->foto}}"
                                        >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Cover Restaurant</label>
                                    <br>
                                    <img src="{{ asset('uploads/restoran/' . $restoran->cover) }}" alt id="previewCover" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="cover" id="inputCoverImage" class="bg-success text-white" style="font-size: 13px"
                                        value="{{$restoran->cover}}">
                                    </div>
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <label for="id">User</label>
                                        <select class="form-control" name="id_user" id="id_user" required="required">
                                            @foreach ($users as $u)
                                            @if ($u->role == 'Seller')
                                            <option selected value="{{$u->id}}">{{$u->id}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Restaurant</label>
                                            <input type="text" name="nama_restoran" class="form-control" placeholder="ex: KFC" style="font-size: 13px"
                                            value="{{$restoran->nama_restoran}}"  >   
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estimasi Pemesanan</label>
                                            <input type="text" name="waktu_pemesanan" class="form-control" placeholder="ex: Dhoe" style="font-size: 13px"
                                                value="{{ $restoran->waktu_pemesanan }}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" style="font-size: 13px"
                                                value="{{ $restoran->alamat }}"  >
                                        </div>
                                        {{-- <div class="form-floating">
                                            <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 13px"></textarea>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input name="email" type="text" class="form-control" style="font-size: 13px"
                                                value="{{ $restoran->email }}"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori" required="required">
                                                @foreach ($kategori as $kategori)
                                                <option selected value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kota</label>
                                            <input name="kota" type="text" class="form-control" placeholder="ex: Jakarta" style="font-size: 13px"
                                                value="{{ $restoran->kota }}"  >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No Hp</label>
                                            <input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->no_hp }}"    >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input name="zipcode" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->zipcode }}"     >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input name="author" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->author }}"  >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jam Buka</label>
                                            <input name="jam_kerja" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->jam_kerja }}"   >
                                        </div>
                                    </div>

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
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div>
                                        <button type="submit" class="btn btn-primary" style="font-size:15px;">Update</button>
                                            
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</div>
@endsection