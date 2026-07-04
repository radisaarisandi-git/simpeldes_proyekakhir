@extends('layouts.app')

@section('title','Riwayat Pengajuan Surat')
@section('page_title','Riwayat Pengajuan Surat')

@section('content')

<div class="container-fluid">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-3">

        <div class="col-md-12">

            <div class="card shadow-sm">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <h3 class="font-weight-bold mb-1">

                                <i class="fas fa-folder-open text-primary"></i>

                                Riwayat Pengajuan Surat

                            </h3>

                            <small class="text-muted">

                                Pantau seluruh status pengajuan surat Anda.

                            </small>

                        </div>

                        <a href="{{ route('warga.surat.create') }}" class="btn btn-primary">

                            <i class="fas fa-plus-circle"></i>

                            Ajukan Surat

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-md-3">

            <div class="small-box bg-info">

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

            <div class="small-box bg-warning">

                <div class="inner">

                    <h3>{{ $riwayat_Surat->where('status','pending')->count() }}</h3>

                    <p>Pending</p>

                </div>

                <div class="icon">

                    <i class="fas fa-hourglass-half"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="small-box bg-success">

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

            <div class="small-box bg-danger">

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


    @forelse($riwayat_Surat as $surat)

    <div class="card shadow mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">

                    <h4 class="font-weight-bold text-primary">

                        <i class="fas fa-file-signature"></i>

                        {{ $surat->jenis_surat }}

                    </h4>

                    <p class="text-muted mb-2">

                        <i class="far fa-calendar-alt"></i>

                        {{ $surat->created_at->format('d F Y H:i') }}

                    </p>

                    @if($surat->status=='pending')

                        <span class="badge badge-warning">

                            <i class="fas fa-hourglass-half"></i>

                            Menunggu Persetujuan

                        </span>

                    @elseif($surat->status=='selesai' || $surat->status=='disetujui')

                        <span class="badge badge-success">

                            <i class="fas fa-check-circle"></i>

                            Disetujui

                        </span>

                    @else

                        <span class="badge badge-danger">

                            <i class="fas fa-times-circle"></i>

                            Ditolak

                        </span>

                    @endif

                </div>

                <div class="col-md-4 text-right">

                    <button
                        class="btn btn-info"
                        data-toggle="collapse"
                        data-target="#detail{{ $surat->id }}">

                        <i class="fas fa-eye"></i>

                        Lihat Detail

                    </button>

                    @if($surat->status=='selesai' || $surat->status=='disetujui')

                        <a href="{{ route('warga.surat.cetak',$surat->id) }}"
                           class="btn btn-success">

                            <i class="fas fa-print"></i>

                            Cetak

                        </a>

                    @endif

                    @if($surat->status=='pending')

                        <form
                            action="{{ route('surat.destroy',$surat->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn btn-danger"
                                onclick="return confirm('Batalkan pengajuan ini?')">

                                <i class="fas fa-trash"></i>

                                Batalkan

                            </button>

                        </form>

                    @endif

                </div>

            </div>

            <div class="collapse mt-4" id="detail{{ $surat->id }}">

                <hr>

                <div class="row">
                                        @if(is_array($surat->data_tambahan))

                        @foreach($surat->data_tambahan as $label => $value)

                            @if($value != '')

                                <div class="col-md-6 mb-3">

                                    <div class="border rounded p-3 h-100 bg-light">

                                        <small class="text-muted d-block">

                                            {{ ucwords(str_replace('_',' ',$label)) }}

                                        </small>

                                        <strong>

                                            {{ $value }}

                                        </strong>

                                    </div>

                                </div>

                            @endif

                        @endforeach

                    @else

                        <div class="col-12">

                            <div class="alert alert-secondary mb-0">

                                Tidak ada data tambahan.

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="card shadow">

        <div class="card-body text-center py-5">

            <i class="fas fa-folder-open fa-5x text-secondary mb-4"></i>

            <h3>

                Belum Ada Pengajuan Surat

            </h3>

            <p class="text-muted">

                Anda belum pernah mengajukan surat.

            </p>

            <a href="{{ route('warga.surat.create') }}"
               class="btn btn-primary btn-lg">

                <i class="fas fa-plus-circle"></i>

                Ajukan Surat Sekarang

            </a>

        </div>

    </div>

    @endforelse

</div>

@endsection