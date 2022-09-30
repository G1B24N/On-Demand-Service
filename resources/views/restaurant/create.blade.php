@extends('layouts.seller')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="container">

    {{-- <div class="row pt-5">
        <div class="col-md-12">
            <a href="{{ url('dashboard_seller') }}" class="btn btn-success btn-lg" style="font-size: 15px">
                <i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard_seller') }}" class="text-success">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Restaurant</li>
                </ol>
            </nav>
        </div>
    </div> --}}

    <section class="py-5" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        <div class="card-body">
                            <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profil Restaurant</h1>
                            <form action="{{ route('storeResto')}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                {{-- <div class="col-md-4">
                                    <label for="">Preview Foto</label>
                                    <br>
                                    <img src="{{ asset('uploads/resto/') }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputFotoImage">Find Cover Image</label>
                                        <input type="file" name="foto" id="inputFotoImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                    
                                </div>

                                <div class="col-md-4">
                                    <label for="">Preview Cover</label>
                                    <br>
                                    <img src="{{ asset('uploads/resto/') }}" alt id="previewCover" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="cover" id="inputCoverImage" class="bg-success text-white" style="font-size: 1.5rem;">
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="form-group">
                                        {{-- <label for="id">User</label> --}}
                                        {{-- <select class="form-control" name="id_user" id="id_user" required="required"> --}}
                                            <select hidden class="form-control" name="id_user" id="id_user" required="required" value="{{Auth::user()->id}}">
                                                @foreach ($users as $u)
                                                @if ($u->role == 'Seller')
                                                <option selected value="{{Auth::user()->id}}">{{$u->id}}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        {{-- </select> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama Restaurant</label>
                                            <input type="text" name="nama_restoran" style="font-size: 13px" class="form-control" placeholder="ex: KFC" style="font-size: 1.3rem"
                                            {{-- value="{{ $restorans->nama_restoran }}"   --}}
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estimasi Pemesanan</label>
                                            <input type="text" name="waktu_pemesanan" style="font-size: 13px" class="form-control" placeholder="ex: Dhoe" style="font-size: 1.3rem"
                                                {{-- value="{{ $restorans->waktu_pemesanan }}" --}}
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" style="font-size: 13px" class="col-xs-10 form-control" id="start" name="alamat"
                                placeholder="Jl. Mayjend Ahmad Yani">
                                        </div>
                                        {{-- <div class="form-floating">
                                            <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 1.3rem"></textarea>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input name="email" type="text" style="font-size: 13px" class="form-control" style="font-size: 1.3rem"
                                                {{-- value="{{ $resto->alamat }}" --}}
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori"  required="required">
                                                @foreach ($tbl_kategoris as $kategori)
                                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Kota</label>
                                            <input name="kota" type="text" style="font-size: 13px" class="form-control" placeholder="ex: Jakarta" style="font-size: 1.3rem"
                                                {{-- value="{{ $restorans->kota }}"  --}}
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">No Hp</label>
                                            <input name="no_hp" type="text" style="font-size: 13px" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                {{-- value="{{ $restorans->no_hp }}"   --}}
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input name="zipcode" type="text" style="font-size: 13px" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                {{-- value="{{ $restorans->zipcode }}"   --}}
                                                >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Author</label>
                                            <input name="author" type="text" style="font-size: 13px" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                            value="{{ Auth::user()->id }}" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Jam Buka</label>
                                            <input name="jam_kerja" type="text" style="font-size: 13px" class="form-control" placeholder="ex: 08**********" style="font-size: 1.3rem"
                                                {{-- value="{{ $restorans->jam_kerja }}"  --}}
                                                >
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Latitude</label>
                                            <input type="text" class="form-control" placeholder="lat" name="latitude" id="lat" style="font-size: 1.3rem">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Longitude</label>
                                            <input type="text" class="form-control" placeholder="longitude" name="longitude" id="lng" style="font-size: 1.3rem">
                                        </div>
                                    </div> --}}
                                    <input type="hidden"
                                    <div id="map" style="height:400px; width: 800px;" class="my-3"></div>
                                    
                                    {{-- <script>
                                        let map;
                                        function initMap() {
                                            map = new google.maps.Map(document.getElementById("map"), {
                                                center: { lat: -2.655230390257819, lng: 120.9368947253499 },
                                                zoom: 4,
                                                scrollwheel: true,
                                            });
                    
                                            const uluru = { lat: lat, lng: lng };
                                            let marker = new google.maps.Marker({
                                                position: uluru,
                                                map: map,
                                                draggable: true
                                            });
                    
                                            google.maps.event.addListener(marker,'position_changed',
                                                function (){
                                                    let lat = marker.position.lat()
                                                    let lng = marker.position.lng()
                                                    $('#lat').val(lat)
                                                    $('#lng').val(lng)
                                                })
                    
                                            google.maps.event.addListener(map,'click',
                                            function (event){
                                                pos = event.latLng
                                                marker.setPosition(pos)
                                            })
                                        }
                                    </script> --}}

                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1eGdP6hCYQ06z86dMEwoLNFMPYPbhgYs&amp;libraries=places&amp;callback=initMap"></script>

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
                                            <a href="/restaurant/index" class="btn btn-outline-success mr-2" role="button"><i class="fa fa-ban"></i></a>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
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