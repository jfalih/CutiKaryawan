
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Sistem Cuti Karyawan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        @section('css')
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        @show
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css"/>
    </head>

    
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{url('/')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    Sistem Cuti Karyawan
                                </span>
                                <span class="logo-lg">
                                    Sistem Cuti Karyawan
                                </span>
                            </a>
        
                            <a href="{{url('/')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    Sistem Cuti Karyawan
                                </span>
                                <span class="logo-lg">
                                    Sistem Cuti Karyawan
                                </span>
                            </a>
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-cog"></i>
                                <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15">Pengaturan Akun</span>
                                <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('user.profile')}}"><i class="uil uil-user font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="{{route('user.pengaturan')}}"><i class="uil uil-cog font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Pengaturan Akun</span></a>
                                <a class="dropdown-item" href="{{route('user.pengaturan')}}"><i class="uil uil-lock font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Ganti Password</span></a>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="uil uil-sign-out-alt font-size-18 align-middle me-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">


                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <div data-simplebar class="sidebar-menu-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>
                            @if (Auth::user()->level === 'hrd')
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="uil-cog"></i>
                                        <span>Pengaturan Hrd</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{route('admin.cuti')}}">List Pengajuan Cuti</a></li>
                                        <li><a href="{{route('admin.pengumuman')}}">List Pengumuman</a></li>
                                        <li><a href="{{route('admin.user')}}">List User</a></li>
                                    </ul>
                                </li>
                            @endif
                            @if(Auth::user()->level === 'hrd') 
                                <li>
                                    <a href="{{route('dashboard')}}">
                                        <i class="uil-window-section"></i>
                                        <span>Hrd Dashboard</span>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('welcome')}}">
                                    <i class="uil-home-alt"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('cuti')}}">
                                    <i class="uil-chart"></i>
                                    <span>Pengajuan Cuti</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="{{route('history.cuti')}}">
                                    <i class="uil-clipboard"></i>
                                    <span>Riwayat Cuti</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Sistem Cuti
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>




            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        @section('js')
        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
        <!-- apexcharts -->
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
        @show
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>

    </body>

</html>