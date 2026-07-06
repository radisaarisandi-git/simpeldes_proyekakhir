@extends('layouts.app')

@section('title', 'Dashboard Warga')
@section('page_title', 'Dashboard Warga')

@section('content')

<div class="row mb-3">

    <div class="col-md-8">
        <p class="text-muted">
            Kelola pengajuan surat Anda dengan mudah dan cepat.
        </p>
    </div>

    <div class="col-md-4 text-right">
        <div class="card shadow-sm">
            <div class="card-body py-2">
                <i class="far fa-calendar-alt"></i>
                {{ now()->translatedFormat('d F Y, H:i') }}
            </div>
        </div>
    </div>

</div>


{{-- Hero Card --}}
<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-md-7">

                <h2 class="font-weight-bold mb-3">
                    Selamat Datang,
                    <span class="text-primary">{{ Auth::user()->name }}</span>
                </h2>

                <p class="lead">

                    Melalui sistem ini Anda dapat mengajukan
                    Surat Domisili,
                    KTP Sementara,
                    dan Surat Pengantar
                    secara online tanpa harus datang ke kantor desa.

                </p>

                <a href="{{ route('warga.surat.create') }}"
                   class="btn btn-primary btn-lg mt-2">

                    <i class="fas fa-file-signature"></i>

                    Mulai Ajukan Surat

                </a>

            </div>

            <div class="col-md-5 text-center">

                <img src="{{ asset('images/logo-rumah.png') }}"
                     class="img-fluid"
                     style="max-height:220px;">

            </div>

        </div>

    </div>

</div>

{{-- QUICK MENU --}}

<div class="row mb-4">

    <div class="col-12">

        <h3 class="font-weight-bold mb-3">

            Layanan Surat

        </h3>

    </div>

</div>



<div class="row">

    <div class="col-md-6 mb-4">

        <div class="card border-0 shadow h-100"
             style="border-radius:18px;transition:.3s;">

            <div class="card-body text-center p-5">

                <div class="mb-4">

                    <div style="
                    width:95px;
                    height:95px;
                    border-radius:50%;
                    background:#eaf3ff;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    margin:auto;">

                        <i class="fas fa-home fa-3x text-primary"></i>

                    </div>

                </div>

                <h3 class="font-weight-bold">

                    Surat Domisili

                </h3>

                <p class="text-muted">

                    Digunakan sebagai bukti tempat tinggal
                    untuk berbagai kebutuhan administrasi.

                </p>

                <span class="badge badge-success mb-3">

                    Estimasi 1 Hari

                </span>

                <br>

                <a href="{{ route('warga.surat.create',['jenis'=>'domisili']) }}"
                   class="btn btn-primary btn-lg btn-block mt-3">

                    <i class="fas fa-arrow-right"></i>

                    Ajukan Sekarang

                </a>

            </div>

        </div>

    </div>



    <div class="col-md-6 mb-4">

        <div class="card border-0 shadow h-100"
             style="border-radius:18px;">

            <div class="card-body text-center p-5">

                <div class="mb-4">

                    <div style="
                    width:95px;
                    height:95px;
                    border-radius:50%;
                    background:#eafbf1;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    margin:auto;">

                        <i class="fas fa-file-alt fa-3x text-success"></i>

                    </div>

                </div>

                <h3 class="font-weight-bold">

                    Surat Serbaguna

                </h3>

                <p class="text-muted">

                    Digunakan untuk berbagai keperluan administrasi
                    masyarakat.

                </p>

                <span class="badge badge-success mb-3">

                    Estimasi 1 Hari

                </span>

                <br>

                <a href="{{ route('warga.surat.create',['jenis'=>'serbaguna']) }}"
                   class="btn btn-success btn-lg btn-block mt-3">

                    <i class="fas fa-arrow-right"></i>

                    Ajukan Sekarang

                </a>

            </div>

        </div>

    </div>

</div>



{{-- RINGKASAN --}}

<h3 class="font-weight-bold mt-4 mb-4">

    Ringkasan Pengajuan

</h3>
<div class="row">

    <div class="col-md-3">

        <div class="small-box bg-primary shadow" style="border-radius:18px;">
            <div class="inner">
                <h3>{{ $riwayat_Surat->count() }}</h3>
                <p>Total Pengajuan</p>
            </div>

            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>

    </div>



    <div class="col-md-3">

        <div class="small-box bg-warning shadow" style="border-radius:18px;">
            <div class="inner">
                <h3>{{ $riwayat_Surat->where('status','pending')->count() }}</h3>
                <p>Menunggu</p>
            </div>

            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>

    </div>



    <div class="col-md-3">

        <div class="small-box bg-success shadow" style="border-radius:18px;">
            <div class="inner">
                <h3>{{ $riwayat_Surat->whereIn('status',['selesai','disetujui'])->count() }}</h3>
                <p>Disetujui</p>
            </div>

            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
        </div>

    </div>



    <div class="col-md-3">

        <div class="small-box bg-danger shadow" style="border-radius:18px;">
            <div class="inner">
                <h3>{{ $riwayat_Surat->where('status','ditolak')->count() }}</h3>
                <p>Ditolak</p>
            </div>

            <div class="icon">
                <i class="fas fa-times-circle"></i>
            </div>
        </div>

    </div>

</div>




{{-- Pengajuan Terakhir --}}

<div class="card shadow-lg border-0 mt-5"
     style="border-radius:18px;">

    <div class="card-header bg-white border-0 pt-4">

        <h4 class="font-weight-bold mb-0">

            <i class="fas fa-history text-primary"></i>

            Pengajuan Terakhir

        </h4>

    </div>


    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="bg-light">

                <tr>

                    <th style="width:70px">No</th>

                    <th>Jenis Surat</th>

                    <th>Tanggal</th>

                    <th>Status</th>

                </tr>

            </thead>

           <tbody>
                @forelse($riwayat_Surat->take(5) as $index => $surat)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>{{ $surat->jenis_surat }}</td>

                    <td>{{ $surat->created_at->format('d F Y') }}</td>

                    <td>
                        @if($surat->status == 'pending')
                            <span class="badge badge-warning">
                                Menunggu
                            </span>
                        @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')
                            <span class="badge badge-success">
                                Disetujui
                            </span>
                        @else
                            <span class="badge badge-danger">
                                Ditolak
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Belum ada pengajuan surat.
                    </td>
                </tr>
                @endforelse
            </tbody>
            
        </table>

    </div>

</div>



<style>

.card{

    transition:.25s;

}

.card:hover{

    transform:translateY(-3px);

}

.btn{

    border-radius:10px;

}

.small-box{

    border-radius:18px !important;

}

.table td{

    vertical-align:middle;

}

.badge{

    font-size:13px;

}

</style>

@endsection