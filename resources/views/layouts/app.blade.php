<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Pelayanan Desa</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        .skip-link,
        [href="#main-content"],
        [href="#navigation"]{
            display:none!important;
        }

        .main-sidebar{
            background:linear-gradient(180deg,#0f4c81,#083358)!important;
        }

        .brand-link{
            background:rgba(255,255,255,.08);
            text-align:center;
            border-bottom:1px solid rgba(255,255,255,.15)!important;
        }

        .brand-text{
            color:#fff!important;
            font-size:22px;
            font-weight:700!important;
            letter-spacing:1px;
        }

        .user-panel{
            border-bottom:1px solid rgba(255,255,255,.15)!important;
            padding-bottom:18px!important;
        }

        .user-panel .image img{
            width:42px;
            height:42px;
        }

        .user-panel .info a{
            color:white!important;
            font-weight:600;
        }

        .nav-sidebar .nav-link{
            border-radius:10px;
            margin:5px 10px;
            transition:.25s;
        }

        .nav-sidebar .nav-link:hover{
            background:#1d73be!important;
        }

        .nav-sidebar .nav-link.active{
            background:white!important;
            color:#0f4c81!important;
            font-weight:bold;
        }

        .main-header{
            background:white;
            box-shadow:0 3px 15px rgba(0,0,0,.08);
        }

        .content-wrapper{
            background:#f4f6fb;
        }

        .content-header h1{
            font-weight:700;
        }

        .main-footer{
            background:white;
            border-top:none;
            box-shadow:0 -2px 10px rgba(0,0,0,.05);
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ Auth::user()->role === 'warga' ? route('warga.dashboard') : route('admin.dashboard') }}"
                class="brand-link">
                <span class="brand-text">
                <i class="fas fa-landmark mr-2"></i>
                SIMPELDES
                </span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">

                    <div class="image">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffffff&color=0f4c81"
                            class="img-circle elevation-2">
                    </div>

                    <div class="info">

                        @if(Auth::user()->role=='kades'||Auth::user()->role=='staf')

                            <a href="{{ route('admin.dashboard') }}">
                                {{ Auth::user()->name }}
                                <br>
                                <small>Administrator</small>
                            </a>

                        @else

                            <a href="{{ route('warga.dashboard') }}">
                                {{ Auth::user()->name }}
                                <br>
                                <small>Warga</small>
                            </a>

                        @endif

                    </div>

                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            @if (Auth::user()->role === 'staf' || Auth::user()->role === 'kades')
                                <a href="{{ route('admin.dashboard') }}"
                                    class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            @else
                                <a href="{{ route('warga.dashboard') }}"
                                    class="nav-link {{ Request::is('warga/dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            @endif
                        </li>

                        @if (Auth::user()->role === 'warga')
                            <li class="nav-item">
                                <a href="{{ route('warga.surat.create') }}"
                                    class="nav-link {{ Request::is('warga/surat/create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Ajukan Surat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('warga.surat.index') }}"
                                    class="nav-link {{ Request::is('warga/surat') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-history"></i>
                                    <p>Riwayat Pengajuan</p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->role === 'staf' || Auth::user()->role === 'kades')
                            <li class="nav-item">
                                <a href="{{ route('admin.surat.index') }}"
                                    class="nav-link {{ Request::is('admin/surat*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-envelope-open-text"></i>
                                    <p>Permohonan Surat <span class="badge badge-warning right">New</span></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kependudukan.index') }}"
                                    class="nav-link {{ Request::is('admin/kependudukan*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Data Kependudukan</p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page_title')</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">Proyek Akhir Kelompok 1</div>
            <strong>SIMPELDES © 2026</strong>

                Sistem Informasi Pelayanan Desa Digital
        </footer>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>
