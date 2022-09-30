@extends('layouts.doride')

@section('content')

@section('addJavascript')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="{{ asset('js/script-map/script.js') }}"></script>

<script type="text/javascript">
    $("#form-submit-doride").on("submit",  function(e){
        e.preventDefault();
        // console.log($(this));

        let start = $("#start").val();
        let end = $("#end").val();
        // let driver = $("#driver").val();
        let distance = $("#distance").val();
        let time = $("#time").val();
        let price = $("#price").val();
        // let _token = $("input[name=_token]").val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        })

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('storeDoride') }}",
            method: 'POST',
            datatype: "json",
            data: {
                lokasi_awal: start,
                tujuan: end,
                // driver: driver,
                jarak: distance,
                durasi: time,
                harga: price,

                // lokasi_awal: $("#start").val(),
                // tujuan: $("#end").val(),
                // jarak: $("#distance").val(),
                // durasi: $("#time").val(),
                // harga: $("#price").val(),
                
                // jarak: $('input[name="jarak"]').val(),
                // harga: $('input[name="harga"]').val(),
                // durasi: $('input[name="durasi"]').val(),
            
            },
            success: function(response){ 
                console.log(response);
                }
        })
        // .done(function() {
        //     $( this ).addClass( "done" );
        // });
        // return false;
    });

    // submitOrder = function(){
        
    // }
</script>
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="container product-area pb-70" style="border-radius: 15px; margin-bottom: 100px">
    <div class="">
        {{-- <div class="section-title text-center pb-30">
            <span>DoRide</span>
            <h2>Minta tumpangan sekarang</h2>
        </div> --}}

        <div class="row align-items-md-stretch">
            <div class="col-md-4">
                <div id="pesan" class="h-100 p-5 rounded-3" style="background-color: #27ae60">
                    <h2 id="title">Pesan GoRide</h2>
                    {{-- <form action="{{route('storeDoride')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{ Auth::user()->id }}">
                            <input type="text" placeholder="lokasiawal" id="start" name="lokasi_awal">
                            <input type="text" placeholder="tujuan" name="tujuan">
                            <input type="text" placeholder="jarak" name="jarak">
                            <input type="text" placeholder="durasi" name="durasi">
                            <input type="text" placeholder="harga" name="harga">
                            <input type="text" placeholder="driver" name="driver">
                        <button type="submit"
                        class="btn btn-light btn-pesan">
                            Selesai
                        </button>
                    </form> --}}
                    <form action={{route('storeDoride')}} method="post" {{-- id="form-submit-doride" --}}>
                        {{ csrf_field() }}
                        <div class="form-group pb-5">
                            <label class="text-white"><i class='bx bx-current-location'></i> Masukkan Lokasi Awal / <button type="button" class="btn btn-light btn-cari-lokasi" id="find-state">Cari lokasi terkini</button></label>
                            <input type="text" style="font-size: 13px" class="col-xs-10 form-control" id="start" name="lokasi_awal"
                                placeholder="Jl. Mayjend Ahmad Yani">
                        </div>
    
                        <div class="form-group">
                            <label class="text-white"><i class='bx bx-location-plus'></i> Masukkan Lokasi Tujuan</label>
                            <input type="text" style="font-size: 13px" class="form-control" id="end" name="tujuan"
                                placeholder="Jl. Semarang">
                        </div>
                        <input type="button" class="btn btn-light btn-pesan" id="pesan-btn" value="Pesan">

                        <div id="detail">
                            <hr />
                            <h4 class="text-white">Detail Pesanan</h4>
                            <div class="card-custom">
                                <table>
                                    <tr>
                                        <th>Jarak</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" style="font-size: 13px" class="form-control" id="jarak" name="jarak" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Durasi</th>
                                        <th>:</th>
                                        <td id="time" name="durasi">
                                            <input type="text" style="font-size: 13px" class="form-control" id="durasi" name="durasi" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <th>:</th>
                                        <td>
                                            <input type="text" style="font-size: 13px" class="form-control"  id="hargaview" name="hargaview" value="">
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>User</th>
                                        <th>:</th>
                                        <td id="price" name="harga">{{ Auth::user()->name }}</td>
                                    </tr> --}}
                                    <tr>
                                        <th>Driver</th>
                                        <th>:</th>
                                        @foreach ($driver as $d)
                                            @if ($d->nama_driver == 'Joko')
                                                <td id="driver" name="driver">
                                                    <input type="hidden" name="driver" value="{{ $d->nama_driver }}">
                                                    {{ $d->nama_driver }}
                                                </td>    
                                            @endif
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                            <input type="hidden" name="user" value="{{ Auth::user()->name }}">
                            <input type="hidden" style="font-size: 13px" class="form-control" id="harga" name="harga" value="">
                            
                            <button type="submit" 
                        {{-- onclick="submitOrder()"  --}}
                        class="btn btn-light btn-pesan">
                            Selesai
                        </button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div id="map" class="h-100 p-5 bg-light border rounded-3">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection