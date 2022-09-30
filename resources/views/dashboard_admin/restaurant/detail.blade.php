@extends('layouts.admin')

@section('content')

<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Detail Restaurant</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/dashboard_seller">Dashboard</a></li>
					<li class="breadcrumb-item active">Detail Restaurant</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<div class="content">
	<div class="container my-5 ml-3 mr-5 table-responsive">

		<div class="card">
			<div class="card-body">
                <div>
                    <div>
                        <div>
                            <div>
                                <h2 >Detail Restaurant</h2>
                            </div>
                            <div class="breadcrumb float-sm-right">
                                <a href="{{route('editRestaurant', ['id' => $restoran->id_restoran ])}}"
                                    class="text-primary" role="button"><i class="fa fa-edit">Edit</i></a>
                            </div>
                            <div>
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-img-wrap edit-img" style="border-radius: 50%; margin:0 auto 30px; position: relative;">
                                                <img src="{{ asset('uploads/restoran/' . $restoran->foto) }}" alt id="previewFoto" style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                                                <div class="fileupload btn">
                                                    <span class="btn-text">edit</span>
                                                    <input class="upload" name="foto" type="file">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Restaurant</label>
                                                        <input type="text" class="form-control" value="{{$restoran->nama_restoran}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nomor Hp</label>
                                                        <input type="text" class="form-control" value="{{$restoran->no_hp}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker text-primary" type="text" value="{{$restoran->email}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Estimasi Pemesanan </label>
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker" type="text" value="{{$restoran->waktu_pemesanan}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" value="{{$restoran->alamat}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kota</label>
                                                <input type="text" class="form-control" value="{{$restoran->kota}}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="United States">
                                            </div>
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" class="form-control" value="{{$restoran->zipcode}}">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" value="631-889-3206">
                                            </div>
                                        </div> --}}
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div><!-- /.container-fluid -->


    <section class="pt-30">
        <div class="container mt-1">
            <h1 class="mb-4 pb-2 border-bottom text-dark" data-aos="fade-right" data-aos-duration="1000">Semua Menu</h1>
            <div class="row">
                @foreach ($tbl_barangs as $barang )
                @if ($barang->id_restoran )
                <div class="col-lg-3 col-md-4">
                    <div class="product-card"> 
                        <a href="{{route('editproduct', ['id'=> $barang->id])}}">
                            <img height="200px" width="100%" style="object-fit: cover; position: center center;" src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Products Images">
                        </a>
                        <div class="product-content">
                            <a href="{{route('editproduct', ['id'=> $barang->id])}}">
                                <h4 style="font-size: 19px;">{{ $barang->nama_barang}}</h4>
                            </a>
                            
                            <p style="font-size: 14px;"> Rp. {{ number_format($barang->harga)}} </p>
                            <div class="product-cart">
                                <ul>
                                   
                                </ul>
                            </div>
                        </div>          
                    </div>
                </div>
                @endif
                @endforeach
               
            </div>  
        </div>
    </section> 
</div>

{{-- <div class="container inner-banner" style="height: 200px; background-image:url({{ url('uploads/barang/') }}/{{$restoran->foto}})">
    <div class="container">
        <div class="inner-title">
            <h3>Product</h3>
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <i class='bx bxs-chevrons-right'></i>
                </li>
                <li>Product</li>
            </ul>
        </div>
    </div>
</div>


<section class="pt-30">
    <div class="container">
        <h1>{{$restoran->nama_restoran}}</h1>
        
        <h2>{{$restoran->no_hp}}</h2>
        <h2>{{$restoran->email}}</h2>
        <h2>{{$restoran->waktu_pemesanan}}</h2>
        </div>
        <p style="width: 45%;">
            {{$restoran->alamat}}
        </p>
    </div>
</section>

<section class="pt-30">
    <div class="container mt-1">
        <h1 class="mb-4 pb-2 border-bottom text-dark" data-aos="fade-right" data-aos-duration="1000">Semua Menu</h1>
        <div class="row">
            @foreach ($tbl_barangs as $barang )
            @if ($barang->id_restoran )
            <div class="col-lg-3 col-md-4">
                <div class="product-card"> 
                    <a href="{{url('order')}}/{{ $barang->id }}">
                        <img height="200px" width="100%" style="object-fit: cover; position: center center;" src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Products Images">
                    </a>
                    <div class="product-content">
                        <a href="{{url('order')}}/{{ $barang->id }}">
                            <h4 style="font-size: 19px;">{{ $barang->nama_barang}}</h4>
                        </a>
                        
                        <p style="font-size: 14px;"> Rp. {{ number_format($barang->harga)}} </p>
                        <div class="product-cart">
                            <ul>
                               
                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
            @endif
            @endforeach
           
        </div>  
    </div>
</section> --}}
@endsection