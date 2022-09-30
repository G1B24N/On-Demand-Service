@extends('layouts.dofood')

@section('content')
<div class="inner-banner-product" style="height: 200px; background-image:url({{ url('uploads/restoran/') }}/{{$tbl_restorans->cover}})">
    {{-- <div class="container">
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
    </div> --}}
</div>

<section class="pt-30"> 
    <div class="container">
        <div class="product-review">
            <div class="rating">
                <h1>{{$tbl_restorans->nama_restoran}} <span style="font-size: 15px"><a href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='bx bx-dots-horizontal-rounded'></i></a></span></h1> 
            </div>
        </div>
        <p style="width: 50%;" class="text-dark">{{ $tbl_restorans->deskripsi }}</p>    
        <div class="product-review">
            <div class="rating" style="width: 40%;">
                {{-- <span class="text-dark">Buka jam <span class="text-warning">{{ $tbl_restorans->jam_kerja }}</span> AM</span> <br> --}}
                <i class='bx bx-time text-warning'></i>
                <span class="text-dark">{{ $tbl_restorans->waktu_pemesanan }} <span>Min • {{$tbl_restorans->alamat}}</span></span>
            </div>
        </div>
        <p style="width: 45%;" class="text-dark">
            
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
                        <img style="object-fit: cover; position: center center;" src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Products Images">
                    </a>
                    <div class="product-content">
                        <a href="{{url('order')}}/{{ $barang->id }}">
                            <h4 style="font-size: 19px;">{{ $barang->nama_barang}}</h4>
                        </a>
                        
                        <p style="font-size: 13px; font-weight:lighter;"> Rp. {{ number_format($barang->harga)}} </p>
                        <div class="product-cart">
                            <ul>
                                
                                <li>
                                    <a href="{{ url('order') }}/{{ $barang->id }}">
                                        <i class='bx bx-cart'></i>
                                    </a>
                                </li>
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
@endsection