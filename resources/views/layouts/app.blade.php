<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard {{Auth::user()->role}}</title>
    <!-- Favicon icon -->
    <!-- Pignose Calender -->
    <!-- Chartist -->
    <link rel="stylesheet" href="/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;0,500;0,600;0,700;1,100;1,400;1,500;1,600;1,700&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header gradient-4">
            <h2 class="text-center m-3 pt-2 text-putih"><Strong>Cafe Medan</Strong></h2>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                </div>
                <div class="header-left">
                    <h2 class="pmx-auto p-4 relative">Dashboard {{ Auth::user()->role }}</h2>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="namaUser"   data-toggle="dropdown" style="margin-top: 30px">
                                <h4 class="card gradient-1 pmx-auto p-3 relative">User : {{ Auth::user()->nama }}</h4>
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{ route('users.show', Auth::user()->id) }}"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li><a href="/logout"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar container container-lg pt-5">           
            <div class="nk-nav-scroll">
                <ul class="metismenu container-smooth" id="menu">
                    @auth
                        <li class="has-arrow m-2">
                            <a class="nav-link" href="{{ route('home.index') }}" aria-expanded="false">
                                <i class="uil uil-estate"></i><span class="nav-text"><strong>Home</strong></span>
                            </a>
                        </li>
                    @endauth
                    @if(Auth::check())
                        @if (Auth::user()->role == 'owner')
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('users.index') }}" aria-expanded="false">
                                        <i class="uil uil-users-alt"></i><span class="nav-text"><strong>Kelola Data Users</strong></span>
                                    </a>
                                </li>
                            @endauth
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('menus.index') }}" aria-expanded="false">
                                        <i class="uil uil-crockery"></i><span class="nav-text"><strong>Daftar Menu</strong></span>
                                    </a>
                                </li>
                            @endauth
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('transaksis.index') }}" aria-expanded="false">
                                        <i class="uil uil-transaction"></i><span class="nav-text"><strong>Daftar Transaksi</strong></span>
                                    </a>
                                </li>
                            @endauth
                            @auth
                            <li class="has-arrow m-2">
                                <a class="nav-link" href="{{ route('kategoris.index') }}" aria-expanded="false">
                                    <i class="uil uil-crockery"></i><span class="nav-text"><strong>Kelola Kategori</strong></span>
                                </a>
                            </li>
                        @endauth
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('statistik.index') }}" aria-expanded="false">
                                        <i class="uil uil-dashboard"></i><span class="nav-text"><strong>Statistik</strong></span>
                                    </a>
                                </li>
                            @endauth
                        @elseif(Auth::user()->role == 'kasir')
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('menus.index') }}" aria-expanded="false">
                                        <i class="uil uil-crockery"></i><span class="nav-text"><strong>Daftar Menu</strong></span>
                                    </a>
                                </li>
                            @endauth
                            @auth
                                <li class="has-arrow m-2">
                                    <a class="nav-link" href="{{ route('transaksis.index') }}" aria-expanded="false">
                                        <i class="uil uil-transaction"></i><span class="nav-text"><strong>Daftar Transaksi</strong></span>
                                    </a>
                                </li>
                            @endauth
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid p-5">
                {{-- <div class="row"> --}}
                    <div class="card">
                        <div class="col-12">
                            <main class="p-4">
                                @hasSection('content')
                                    @yield('content')
                                @else
                                    @php
                                        // Ganti 'route.nama' dengan nama route yang sesuai
                                        $redirectRoute = route('home.index');
                                    @endphp
                                    <script>window.location.href = "{{ $redirectRoute }}";</script>
                                @endif
                            </main>
                        </div>
                    {{-- </div> --}}
                </div>
                
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="/assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="/assets/plugins/d3v3/index.js"></script>
    <script src="/assets/plugins/topojson/topojson.min.js"></script>
    <!-- Morrisjs -->
    <script src="/assets/plugins/raphael/raphael.min.js"></script>
    <script src="/assets/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <!-- ChartistJS -->
    <script src="/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>




</body>

</html>