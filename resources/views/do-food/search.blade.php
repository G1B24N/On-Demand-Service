@extends('layouts.dofood')
@section('content')

@section('addCss')
<link rel="stylesheet" href="{{ asset('css/style-kategori/style.css') }}">

<style>
    html {
        scroll-behavior: smooth;
    }
    #minuman{
        scroll-margin-top: 175px;
    }
    #jajanan{
        scroll-margin-top: 150px;
    }
    #anekanasi{
        scroll-margin-top: 150px;
    }
    #siapsaji{
        scroll-margin-top: 150px;
    }
    #roti{
        scroll-margin-top: 150px;
    }
    #makanansehat{
        scroll-margin-top: 150px;
    }
</style>
@endsection

<div class="inner-banner inner-bg7">
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


<section class="product-area pt-100">
    <div class="container">
        <div class="section-title text-center">
            <span>Product</span>
            <h2>We Have Some Pre-ready Demo Product</h2>
            <p>
                What indication best sick be project proposal in attempt, train of the showed
                some a forth. That homeless, won't many of goals thoughts volumes felt.
            </p>
        </div>
    </div>
</section>
    <form class="form-inline my-2 my-lg-0 pl-lg-5" width="500px">
        <input class="form-control mr-sm-2" id="search" name="search" type="search" placeholder="Cari Produk" aria-label="search">
        <button class="btn btn-outline-success my-2 my-sm-0" id="tombol" type="submit">Cari</button>
    </form>

<section  class="py-5 mycard ">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40" data-aos="fade-right" data-aos-duration="1000">All products</h2>
        <div class="row pt-45">
            @foreach ($barangs as $barang )
            <div class="col-lg-4 col-md-6">
                <div class="product-card"> 
                    <a href="">
                        <img height="200px" width="100%" style="object-fit: cover; background-size: cover; position: center;" src="{{ url('uploads/barang/') }}/{{ $barang->gambar }}" alt="Products Images">
                    </a>
                    <div class="product-content">
                        <a href="product-details.html">
                            <h3>{{ $barang->nama_barang}}</h3>
                        </a>
                        <p>Stok: {{ number_format($barang->stok) }}</p>
                        <p> Rp. {{ number_format($barang->harga)}} </p>
                        <div class="product-cart">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class='bx bx-heart'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('pesan') }}/{{ $barang->id }}">
                                        <i class='bx bx-cart'></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
            @endforeach
        </div>
    </div>

    

            
            {{-- <div id="minuman" class="container px-4 px-lg-5 mt-5">
                <h2 class="mb-4 pb-2 border-bottom text-dark" style="font-size: 3rem; color: #130f40" data-aos="fade-right" data-aos-duration="1000">Minuman</h2>
    
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">

                    @foreach ($minumen as $m)
                    <div class="col mb-5" data-aos="zoom-in-up" data-aos-duration="1000">
                        <div class="card h-100 inner" style="background: whitesmoke; border-style:none; border-radius:0.5rem;">
    
                            <img class="card-img-top" src="{{ url('uploads/barang/') }}/{{ $m->gambar }}" alt="..." />
    
                            <div class="card-body p-4">
                                <div class="text-center">
    
                                    <h5 value="{{$barang->id}}" {{$barang->id == $m->nama_minuman}} class="fw-bolder text-dark" style="font-size: 2rem;">{{ $m->nama_minuman }}</h5>
                                    <h5 class="text-secondary pt-5" style="font-size: 15px;">Stok : {{ $m->stok_minuman }}</h5>
    
                                    
                                    Rp. {{ number_format($m->harga_minuman)}}
                                </div>
                            </div>
    
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-success mt-auto" style="font-size: 13px; padding: .7rem 1.8rem; font-size: 1.5rem" href="{{ url('pesan') }}/{{ $m->id }}">Pesan</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> --}}
        {{-- </section> --}}
        
    
                    
    </div>
</section>
@endsection
@section('addJavascript')
{{-- <script>
 $('#keyword').on('keyup',function()
 {
    $value= $(this).val();

    $.ajax({
        type:'get',
        url:'{{URL::to('search')}}',
        data:{'search':$value},

        success:function(data)
        {
            console.log(data);
            $('#content').html(data);  
        }
    });
 })
</script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    $(document).ready(function(){
        $('#search').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "/search",
                data: {'search':value},
                // dataType: "dataType",
                success: function(data) {
                    // console.log(data);
                    $('.mycard').html(data);
                }
            });
        });
    });
</script>
@endsection
@push('scripts')
{{-- <script>
    window.scrollTop({top: 900, behavior: 'smooth'});
</script> --}}
@endpush