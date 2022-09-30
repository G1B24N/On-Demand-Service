<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!--- css --->

    <link rel="stylesheet" href="{{asset('css/style-dashboard/adminlte.min.css')}}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/boxicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/meanmenu.css')}}">

    <link rel="stylesheet" href="{{asset('css/nice-select.min.css')}}"> --}}

    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> --}}

    {{-- <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <link rel="stylesheet" href="{{asset('css/theme-dark.css')}}">

    <link rel="stylesheet" href="{{asset('css/style-map/style.css')}}"> --}}

    {{-- <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> --}}

    {{-- <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}"> --}}

    {{-- <link rel="stylesheet" href="{{asset('css/style-dashboard/fontawesome.min.css')}}"> --}}

    {{-- <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script> --}}

    @yield('addCss')

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div id="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#sidebar"><i class="fa fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#sidebar" class="nav-link"><strong>Reseller</strong></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">

                    <!-- Sidebar user panel (optional) -->
                    <a class="nav-link" data-toggle="dropdown" href="">
                        @auth
                        <div class="user-panel d-flex">
                            <div class="image">
                                <img src="{{ asset('img/user.png') }}" class="brand-image img-circle m-auto"
                                    alt="User Image">
                            </div>
                        </div>
                        @endauth
                    </a>
                    @auth
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="#" class="dropdown-item">{{ Auth::user()->name }}</a>
                        <div class="dropdown-divider"></div>
                        <a href="#exampleModalCenter" data-toggle="modal" data-target="#exampleModalCenter"
                            class="dropdown-item">Profile <span class="text-info"><i class="fa fa-user"></i></span></a>
                        <a href="https://i.kym-cdn.com/entries/icons/original/000/003/093/404.png" target="_blank"
                            class="dropdown-item">Settings <span class="text-info"><i class="fa fa-cog"></i></span></a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{route('logout')}}" method="post">
                            {{ csrf_field() }}
                            <a href="{{route('logout')}}" class="dropdown-item">Logout <span class="text-danger"><i class="fa fa-sign-out"></i></span></a>
                        </form>
                    </div>
                    @endauth
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light elevation-4 position-fixed" style="background: #00695c">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset('img/k_cilik-removebg-preview.png') }}" alt="AdminLTE Logo" width="50px" style="opacity: .8; margin-left: 10px;">
            {{-- <span class="brand-text font-weight-light">{{config('app.name')}}</span> --}}
        </a>

        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column">
            @auth
                <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3">
                <div class="image">
                    <img src="{{asset('uploads/driver/profile ojol.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>
            @endauth

        <!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active btn-info">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/dashboard_admin.dashboard" class="nav-link active btn-light">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/home" class="nav-link active btn-light">
                      <i class="far fa-home nav-icon"></i>
                      <p>Home</p>
                    </a>
                  </li>
                  {{-- <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li> --}}
                  {{-- <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li> --}}
                </ul>
              </li>
            {{-- <div class="user-panel my-1"></div> --}}
            {{-- <li class="nav-item">
                <a href="{{route('daftarBarang')}}" class="nav-link">
                    <i class="nav-icon fa fa-table"></i>
                    <p>Daftar Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('daftarSupplier')}}" class="nav-link">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Daftar Supplier</p>
                </a>
            </li> --}}
            <li class="nav-item mt-2">

                <a href="{{route('indexproduct')}}" class="nav-link">
                    <i class="nav-icon fa fa-book text-light"></i>
                    <p class="text-light">
                        Makanan
                        <i class="right"></i>
                    </p>
                </a>
                {{-- <a href="/kategori/index" class="nav-link"> --}}
                <a href="{{route('indexRestaurant')}}" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        Restaurant
                        <i class="right"></i>
                    </p>
                </a>
                <a href="{{route('indexDriver')}}" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        Driver
                        <i class="right"></i>
                    </p>
                </a>
                <a href="/category/index" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        Kategori
                        <i class="right"></i>
                    </p>
                </a>

                {{-- <a href="/kategori/index" class="nav-link"> --}}

                <a href="{{route('indexUser')}}" class="nav-link">

                    <i class="nav-icon fa fa-user text-light"></i>
                    <p class="text-light">
                        User
                        <i class="right"></i>
                    </p>
                </a>
                <a href="{{route('indexOrder')}}" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        order

                        <i class="right"></i>
                    </p>
                </a>
                <a href="{{route('indexPayment')}}" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        Payment
                        <i class="right"></i>
                    </p>
                </a>
                <a href="{{route('indexContact')}}" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        Contact Cust
                        <i class="right"></i>
                    </p>
                </a>
                <a href="/kategori/index" class="nav-link">
                    <i class="nav-icon fa fa-table text-light"></i>
                    <p class="text-light">
                        setting
                        <i class="right"></i>
                    </p>
                </a>
                
                {{-- <ul class="nav nav-treeview">
                    <li class="nav-item mt-2">
                        <a href="#" class="nav-link bg-light">
                            <i class="fa fa-table text-primary"></i>
                            <p class="text-primary">Barang</p>
                        </a>
                    </li>
                    <li class="nav-item mt-2">
                        <a href="#" class="nav-link bg-light">
                            <i class="fa fa-user-plus text-primary"></i>
                            <p class="text-primary">Supplier</p>
                        </a>
                    </li>
                </ul> --}}
            </li>

            {{-- <li class="nav-item mt-2 ">
                            <form id="logout-form" action="{{route('logout')}}" method="post">
            @csrf
            </form>
            <a href="javascript:void(0)" class="nav-link bg-danger" onclick="$('#logout-form').submit();">
                <i class="nav-icon fa fa-sign-out"></i>
                <p>Logout</p>
            </a>
            </li> --}}

            {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                Simple Link
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li> --}}
        </ul>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    @auth
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>ID Admin : {{Auth::user()->id}}</li>
                        <li>Nama Admin : {{Auth::user()->name}}</li>
                        <li>Email : {{Auth::user()->email}}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle2">Update Profile</button> --}}
                    <a href="#exampleModalToggle2" data-toggle="modal" data-target="#exampleModalToggle2">Update</a>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalToggle2Title" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('my-profile-update')}}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="col-md-4">
                            <label for="">Preview Cover</label>
                            <br>
                            <img src="{{ asset('uploads/profile/'.Auth::user()->image) }}" alt id="previewImage"
                                style="max-width: 50%; border: 1px solid #219150; padding: 8px; border-radius: 8px;">
                            <div class="form-group mt-2">
                                <label for="inputCoverImage">Find Cover Image</label>
                                <input type="file" name="image" id="inputCoverImage" class="bg-success text-white"
                                    style="font-size: 1.5rem;">
                            </div>
                            {{-- <input type="file" name="image" class="form-control">
                            <img src="{{asset('uploads/profile/'.Auth::user()->image)}}" class="w-75" alt=""> --}}
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="nama_depan" class="form-control" placeholder="ex: John"
                                        style="font-size: 1.3rem" value="{{ Auth::user()->nama_depan }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="nama_belakang" class="form-control" placeholder="ex: Dhoe"
                                        style="font-size: 1.3rem" value="{{ Auth::user()->nama_belakang }}">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" style="font-size: 1.3rem"
                                        value="{{ Auth::user()->alamat }}">
                                </div>
                                {{-- <div class="form-floating">
                                    <textarea class="form-control" value="{{ Auth::user()->alamat }}"
                                placeholder="Leave a comment here" id="floatingTextarea" placeholder="ex:John"
                                style="font-size: 1.3rem"></textarea>
                            </div> --}}
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Kota</label>
                                <input name="kota" type="text" class="form-control" placeholder="ex: Jakarta"
                                    style="font-size: 1.3rem" value="{{ Auth::user()->kota }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">No Hp</label>
                                <input name="no_hp" type="text" class="form-control" placeholder="ex: 08**********"
                                    style="font-size: 1.3rem" value="{{ Auth::user()->no_hp }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label> <br>
                                <select name="jenis_kelamin" id="jenisKelamin">
                                    <option selected disabled value="{{ Auth::user()->jenis_kelamin }}">Pilih Jenis
                                        Kelamin</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                {{-- <input type="text"> --}}
                            </div>
                        </div>
                        
                </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle2">Update Profile</button> --}}
                {{-- <a href="#exampleModalToggle2" data-toggle="modal" data-target="#exampleModalToggle2">Update</a> --}}
                <button type="submit" class="btn btn-primary"
                                        style="font-size:15px;">Update</button>
            </div>
        </div>
    </div>
    </div>
    @endauth



    <!-- Main Footer -->
    <footer class="main-footer bg-">

        <div class="float-right d-none d-sm-inline">

            <a href="https://www.facebook.com/" target="_blank" class="pr-2 text-primary"><i
                    class="fa fa-facebook"></i></a>
            <a href="https://web.whatsapp.com/%F0%9F%8C%90/id" target="_blank" class="pr-2 text-success"><i
                    class="fa fa-whatsapp"></i></a>
            <a href="https://twitter.com/i/flow/login" target="_blank" class="pr-2 text-primary"><i
                    class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/?hl=id" target="_blank" class="pr-2 text-danger"><i
                    class="fa fa-instagram"></i></a>
            <a href="https://github.com/ColorlibHQ/AdminLTE/releases" target="_blank" class="pr-2 text-dark"><i
                    class="fa fa-github"></i></a>
        </div>

        <strong>Copyright &copy; {{date('Y')}} <a href="#">{{config('app.name')}}</a>.</strong> All rights
        reserved.
    </footer>


    </div>



    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{asset('js/jquery.min.js')}}"></script> --}}

    <script src="{{asset('js/script-dashboard/jquery.min.js')}}"></script>

    <script src="{{asset('js/script-dashboard/bootstrap.bundle.min.js')}}"></script>

    {{-- <script src="{{asset('js/script-dahsboard/adminlte.min.js')}}"></script> --}}

    <script src="{{asset('js/script-dahsboard/sweetalert.min.js')}}"></script>

    {{-- <script src="{{asset('js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('js/meanmenu.js')}}"></script>

    <script src="{{asset('js/wow.min.js')}}"></script>

    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>

    <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('js/form-validator.min.js')}}"></script>

    <script src="{{asset('js/contact-form-script.js')}}"></script>

    <script src="{{asset('js/script-map/script.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_qHKYFum4g_Y8e7sgqS3T26Fjz1IxBpg&libraries=places">
    </script>

    <script src="{{asset('js/custom.js')}}"></script> --}}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('addJavascript')
</body>

</html>