@extends('layouts.driver')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="container">

    <div class="row pt-5">
        <div class="col-md-12">
            <a href="{{ url('do-ride') }}" class="btn btn-success btn-lg" style="font-size: 15px">
                <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('do-food') }}" class="text-success">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="py-5" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        <div class="card-body">
                            <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Lengkapi Data Dirimu Dulu Ya>.< </h1>
                            {{-- <button type="" class="btn btn-primary"></button> --}}
                                                          

                            
                            
                            @if (count($driver)>0)
                            
                            <form action="/driver-profile-update" method="post" enctype="multipart/form-data">
                                @foreach ($driver as $driver)                                

                                {{ csrf_field() }}
                                {{-- < class="col-md-4"> --}}
                                    <label for="">Profile</label>
                                    <br>
                                    {{-- @foreach ($drivers as $driver) --}}
                                    <img src="{{ asset('uploads/driver/'.$driver->foto_driver) }}" alt id="previewImage" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="foto_driver" id="inputCoverImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    {{-- @endforeach --}}
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                
                                    <label for="">Foto Kendaraan</label>
                                    <br>
                                    <img src="{{ asset('uploads/driver/'.$driver->foto_motor) }}" alt id="previewImage" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="foto_motor" id="inputCoverImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                </div>

                                <div class="row">

                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Foto Profile</label>
                                            <input type="text" name="foto_driver" class="form-control" placeholder="NIK" style="font-size: 1.3rem">
                                                value="$driver->nik">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Foto Motor</label>
                                            <input type="text" name="foto_motor" class="form-control" placeholder="NIK" style="font-size: 1.3rem">
                                                value="$driver->nik }}">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-6"> --}}
                                        {{-- <div class="form-group"> --}}
                                            {{-- <label for="">User Id</label> --}}
                                            <input type="hidden"  name="user_id" class="form-control" placeholder="" style="font-size: 1.3rem"
                                           value="{{Auth::user()->id}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" name="nik" class="form-control" placeholder="" style="font-size: 1.3rem"
                                            value="{{$driver -> nik}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">sim</label>
                                            <input type="text" name="sim" class="form-control" placeholder="" style="font-size: 1.3rem"
                                            value="{{$driver -> sim}}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input name="nama_driver" type="text" class="form-control" style="font-size: 1.3rem"
                                            value="{{$driver -> nama_driver}}">
                                        </div>
                                        {{-- <div class="form-floating">
                                            <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 1.3rem"></textarea>
                                        </div> --}}
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" placeholder="" style="font-size: 1.3rem"
                                            value="{{$driver -> alamat}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tempat Tanggal Lahir</label>
                                            <input name="ttl" type="text" class="form-control" placeholder="" style="font-size: 1.3rem"
                                            value="{{$driver -> ttl}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nama Motor</label>
                                            <input name="nama_motor" type="text" class="form-control" placeholder="" style="font-size: 1.3rem"
                                            value="{{$driver -> nama_motor}}">
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
                                            <input type="text">
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col text-end">
                                            <div>
                                            <button type="submit" class="btn btn-primary" style="font-size:15px;">Update</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                @endforeach
                            </form>
                            @else
                            
                            <a href="{{route('tambahUser')}}" >mulai</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

{{-- @push('scripts')
    <script>
        $('#inputCoverImage').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        });
    </script>
@endpush --}}