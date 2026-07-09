@extends('layouts.app')

@section('title', 'Dashboard Admin')


@section('content')

    <div class="row mb-4">

        <div class="col-md-8">

            <h2 class="font-weight-bold">
                Dashboard <strong>{{ strtoupper(Auth::user()->role) }}</strong>
            </h2>

            <p class="text-muted mb-0">
                Kelola seluruh permohonan surat dan data kependudukan desa.
            </p>

        </div>

        <div class="col-md-4 text-right">

            <span class="badge badge-light shadow-sm p-3" style="font-size:15px;border-radius:12px;">

                <i class="far fa-calendar-alt text-primary"></i>

                {{ now()->translatedFormat('l, d F Y • H:i') }}

            </span>

        </div>

    </div>



    {{-- HERO --}}

    <div class="card border-0 shadow-lg mb-5"
        style="
     border-radius:20px;
     background:linear-gradient(135deg,#198754,#20c997);
     overflow:hidden;">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-7">

                    <h1 class="text-white font-weight-bold mb-3">

                        Selamat Datang,

                        {{ Auth::user()->name }}

                    </h1>

                    <p class="text-white mb-4" style="font-size:18px;line-height:30px;">

                        Anda login sebagai
                        <strong>{{ strtoupper(Auth::user()->role) }}</strong>.

                        Kelola seluruh permohonan surat,
                        verifikasi data warga,
                        dan pantau aktivitas pelayanan desa
                        melalui dashboard ini.

                    </p>

                    <a href="{{ route('admin.surat.index') }}" class="btn btn-light btn-lg mr-2">

                        <i class="fas fa-envelope-open-text"></i>

                        Permohonan Surat

                    </a>

                    <a href="{{ route('kependudukan.index') }}" class="btn btn-outline-light btn-lg">

                        <i class="fas fa-users"></i>

                        Data Penduduk

                    </a>

                </div>



                <div class="col-lg-5 text-center">

                    <i class="fas fa-user-shield"
                        style="
                   font-size:170px;
                   color:rgba(255,255,255,.25);">

                    </i>

                </div>

            </div>

        </div>

    </div>

    <div class="row mb-5">

        <div class="col-lg-3 col-md-6">

            <div class="small-box bg-primary shadow">

                <div class="inner">

                    <h3>{{ $totalSurat }}</h3>

                    <p>Total Surat</p>

                </div>

                <div class="icon">

                    <i class="fas fa-envelope"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="small-box bg-warning shadow">

                <div class="inner">

                    <h3>{{ $pending }}</h3>

                    <p>Menunggu</p>

                </div>

                <div class="icon">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="small-box bg-success shadow">

                <div class="inner">

                    <h3>{{ $disetujui }}</h3>

                    <p>Disetujui</p>

                </div>

                <div class="icon">

                    <i class="fas fa-check-circle"></i>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="small-box bg-info shadow">

                <div class="inner">

                    <h3>{{ $totalPenduduk }}</h3>

                    <p>Total Penduduk</p>

                </div>

                <div class="icon">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

    </div>


    <h3 class="font-weight-bold mb-4">

        Menu Cepat

    </h3>



    <div class="row">

        <div class="col-md-6">

            <div class="card border-0 shadow h-100" style="border-radius:18px;">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <div
                            style="
                    width:95px;
                    height:95px;
                    border-radius:50%;
                    background:#eaf8f1;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    margin:auto;">

                            <i class="fas fa-envelope-open-text fa-3x text-success"></i>

                        </div>

                    </div>

                    <h3 class="font-weight-bold">

                        Permohonan Surat

                    </h3>

                    <p class="text-muted">

                        Lihat seluruh pengajuan surat
                        yang dikirim oleh warga.

                    </p>

                    <a href="{{ route('admin.surat.index') }}" class="btn btn-success btn-lg btn-block">

                        <i class="fas fa-arrow-right"></i>

                        Kelola Surat

                    </a>

                </div>

            </div>

        </div>



        <div class="col-md-6">

            <div class="card border-0 shadow h-100" style="border-radius:18px;">

                <div class="card-body text-center p-5">

                    <div class="mb-4">

                        <div
                            style="
                    width:95px;
                    height:95px;
                    border-radius:50%;
                    background:#eef4ff;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    margin:auto;">

                            <i class="fas fa-users fa-3x text-primary"></i>

                        </div>

                    </div>

                    <h3 class="font-weight-bold">

                        Data Kependudukan

                    </h3>

                    <p class="text-muted">

                        Kelola seluruh data
                        kependudukan masyarakat desa.

                    </p>

                    <a href="{{ route('kependudukan.index') }}" class="btn btn-primary btn-lg btn-block">

                        <i class="fas fa-arrow-right"></i>

                        Kelola Data

                    </a>

                </div>

            </div>

        </div>

    </div>


@endsection
