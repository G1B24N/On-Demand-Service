@extends('layouts.dofood')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="inner-banner" style="background-image:url({{ asset('img/profil/banner-profil.jpg') }})">
    <div class="container">
        <div class="inner-title">
            <h3>Profil</h3>
            <ul>
                <li>
                    <a href="{{ url('/') }}">Kembali</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Profil</li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <section class="py-5" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        <div class="card-body">
                            <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profil Saya</h1>

                            <form action="{{ url('my-profile-update')}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <label for="">Foto Profil</label>
                                    <br>
                                    <img src="{{ asset('uploads/profile/'.Auth::user()->image) }}" alt id="previewImage" style="max-width: 50%; border-radius: 50%  ;">
                                    <div class="form-group mt-2">
                                        <input type="file" name="image" id="inputCoverImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    {{-- <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama depan</label>
                                            <input type="text" name="nama_depan" class="form-control" placeholder="ex: John" style="font-size: 1.3rem"
                                                value="{{ Auth::user()->nama_depan }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama belakang</label>
                                            <input type="text" name="nama_belakang" class="form-control" placeholder="ex: Dhoe" style="font-size: 1.3rem"
                                                value="{{ Auth::user()->nama_belakang }}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input name="alamat" type="text" class="form-control" style="font-size: 1.3rem"
                                                value="{{ Auth::user()->alamat }}">
                                        </div>
                                        {{-- <div class="form-floating">
                                            <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 1.3rem"></textarea>
                                        </div> --}}
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kota</label>
                                            <input name="kota" type="text" class="form-control" placeholder="ex: Jakarta" style="font-size: 1.3rem"
                                                value="{{ Auth::user()->kota }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No Hp</label>
                                            <input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                value="{{ Auth::user()->no_hp }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label> <br>
                                            <select name="jenis_kelamin" id="jenisKelamin">
                                                <option selected disabled value="{{ Auth::user()->jenis_kelamin }}">Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            {{-- <input type="text"> --}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-end">
                                            <div>
                                            <button type="submit" class="btn btn-success" style="font-size:15px;">Update</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
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
@endpush