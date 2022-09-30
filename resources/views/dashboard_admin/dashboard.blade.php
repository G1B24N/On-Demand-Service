@extends('layouts.admin')
@section('addJavascript')
<script>
  var myDate = new Date();
  var hrs = myDate.getHours();

  var greet;

  if ( hrs < 11)
  greet = 'Selamat Pagi!';
  else if ( hrs >= 11 && hrs <= 14)
  greet = 'Selamat Siang!';
  else if ( hrs >= 14 && hrs <= 18)
  greet = 'Selamat Sore!';
  else if ( hrs >= 18 && hrs >= 24)
  greet = 'Selamat Malam!';

  document.getElementById('gibran').innerHTML = '<br>' + greet;
</script>
@endsection
@section('content')

<section class="content">
  <div class="content-header">
    <div class="container-fluid">
          <div class="card text-white pt-1 shadow p-3 mb-5 " style="background-image: linear-gradient(to bottom right, rgb(118, 237, 255), rgb(255, 176, 227));">
              <div class="mb-2 text-center">
                  <div class="col">
                      <h1 class="m-5 text-dark text-center"><span id="gibran"></span> <strong>{{Auth::user()->name}}</strong></h1>
                  </div>
                  <!-- /.col -->
                  {{-- <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div> --}}
                  <!-- /.col -->
              </div><!-- /.row -->
          </div>
    </div><!-- /.container-fluid -->
  </div>  
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$pesanan_details}}</h3>
            <p>Total Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
          <div class="inner">
            <h3>Rp. {{number_format($jumlah)}}<sup style="font-size: 20px"></sup></h3>
            <p>Income</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <i href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></i>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$user}}</h3>
            <h3></h3>
            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{route('indexUser')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$restaurant}}</h3>
            <p>Restaurant</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-restaurant"></i>
          </div>
          <a href="{{route('indexRestaurant')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

  </div>
</section>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/script-adminlte/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('js/script-adminlte/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/script-adminlte/dashboard.js')}}"></script>
</body>

</html>





@endsection