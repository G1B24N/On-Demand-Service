@extends('layouts.seller')

@section('content')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/style-scrollbar/style.css') }}">
@endsection

<div class="container">

    <section class="py-5" style="margin-bottom: 50px">
        <div class="container">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="card" style="border: none">
                        <div class="card-body">
                                <form action="{url('restaurant-update')}}" method="POST" enctype="multipart/form-data">
                                    @if(empty($tbl_restorans->nama_restoran))
                                    <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Ups Kamu Belum Melengkapi Data Restoranmu</h1>
                                    <a href="{{route("createResto")}}">Mulai</a>
                                    @else
                                    <h1 style="border-bottom: 1px solid #219150;" class="mb-5 pb-1">Profil Restaurant</h1>
                                    {{-- @endif --}}
                                    {{ csrf_field() }}
                                    {{-- @endif --}}
                                    @foreach ($tbl_restorans as $restoran )
                                    {{-- @if(Auth::user()->id) --}}
                                    @if ($restoran->user->id == Auth::user()->id)
                                    <div class="col-md-4">
                                        <label for="">Preview Foto</label>
                                        <br>
                                        <img src="{{ asset('uploads/restoran/'.$restoran->foto ) }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputFotoImage">Find Cover Image</label>
                                        <input type="file" name="foto" id="inputFotoImage" class="bg-success text-white" style="font-size: 13px">
                                    </div>
                                    
                                </div>

                                <div class="col-md-4">
                                    <label for="">Preview Cover</label>
                                    <br>
                                    <img src="{{ asset('uploads/restoran/'.$restoran->cover ) }}" alt id="previewCover" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                    <div class="form-group mt-2">
                                        <label for="inputCoverImage">Find Cover Image</label>
                                        <input type="file" name="cover" id="inputCoverImage" class="bg-success text-white" style="font-size: 13px">
                                    </div>
                                </div>

                                <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Restaurant</label>
                                                <input type="text" name="nama_restoran" class="form-control" placeholder="ex: KFC" style="font-size: 13px"
                                                value="{{ $restoran->nama_restoran }}"  
                                                >
                                            </div>
                                        </div>
    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estimasi Pemesanan</label>
                                                <input type="text" name="waktu_pemesanan" class="form-control" placeholder="ex: Dhoe" style="font-size: 13px"
                                                    value="{{ $restoran->waktu_pemesanan }}"
                                                    >
                                                </div>
                                            </div>
                                            
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <input name="alamat" type="text" class="form-control" style="font-size: 13px"
                                                value="{{ $restoran->alamat }}" 
                                                >
                                            </div>
                                            {{-- <div class="form-floating">
                                                <textarea class="form-control" value="{{ Auth::user()->alamat }}" placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John" style="font-size: 13px"></textarea>
                                            </div> --}}
                                        </div>
                                        
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select class="form-control" name="kategori" id="kategori"  required="required">
                                                    @foreach ($tbl_kategoris as $kategori)
                                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Kota</label>
                                                <input name="kota" type="text" class="form-control" placeholder="ex: Jakarta" style="font-size: 13px"
                                                value="{{ $restoran->kota }}" 
                                                >
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">No Hp</label>
                                                <input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->no_hp }}"  
                                                >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Zip Code</label>
                                                <input name="zipcode" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->zipcode }}"  
                                                >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Author</label>
                                                <input name="author" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ Auth::user()->id }}" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Jam Buka</label>
                                                <input name="jam_kerja" type="text" class="form-control" placeholder="ex: 08**********" style="font-size: 13px"
                                                value="{{ $restoran->jam_kerja }}" 
                                                >
                                            </div>
                                        </div>
                                        
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Latitude</label>
                                                <input type="text" class="form-control" placeholder="lat" name="latitude" id="lat" style="font-size: 13px"
                                                value="{{ $restoran->latitude }}"
                                                >
                                            </div>
                                        </div>
    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Longitude</label>
                                                <input type="text" class="form-control" placeholder="longitude" name="longitude" id="lng" style="font-size: 13px"
                                                value="{{ $restoran->longitude }}"
                                                >
                                            </div>
                                        </div> --}}
                                        
                                        <input type="hidden"
                                    <div id="map" style="height:400px; width: 800px;" class="my-3"></div>
                                        
                                        {{-- <script>
                                            var latToko = document.getElementById('lat');
                                            var lngToko = document.getElementById('lng');

                                            let map;
                                            function initMap() {
                                                map = new google.maps.Map(document.getElementById("map"), {
                                                    center: { lat: -2.655230390257819, lng: 120.9368947253499 },
                                                    zoom: 4,
                                                    scrollwheel: true,
                                                });
                                                
                                                const uluru = { lat: latToko, lng: lngToko };
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

                                        {{-- <div class="row">
                                            <div class="col text-end">
                                                <div>
                                                <button type="submit" class="btn btn-primary" style="font-size:15px;">Update</button>
                                                    
                                                </div>
                                            </div>
                                        </div> --}}
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
{{-- </div> --}}
{{-- @endif  --}}
                                @endif
                                @endforeach
                                {{-- @endif --}}
                                
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection