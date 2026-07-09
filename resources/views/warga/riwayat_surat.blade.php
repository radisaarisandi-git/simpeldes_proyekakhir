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

                    @if($surat->status == 'pending')

                        <span class="badge badge-warning">
                            Sedang Diproses
                        </span>

                    @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')

                        <span class="badge badge-success">
                            Surat telah selesai diproses. Silakan ambil di kantor desa.
                        </span>

                    @else

                        <span class="badge badge-danger">
                            Pengajuan ditolak.
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

                    @if($surat->status == 'selesai')
                        <span class="badge badge-success">
                            Surat telah selesai diproses
                        </span>
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

                <div class="card card-outline card-primary mb-3">

            <div class="card-header">

                <strong>
                    <i class="fas fa-user"></i>
                    Data Pemohon
                </strong>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <p>
                            <strong>Nama</strong><br>
                            {{ $surat->user->name }}
                        </p>

                        <p>
                            <strong>NIK</strong><br>
                            {{ optional($surat->user->kependudukan)->nik ?? '-' }}
                        </p>

                    </div>

                    <div class="col-md-6">

                        <p>
                            <strong>Pekerjaan</strong><br>
                            {{ optional($surat->user->kependudukan)->pekerjaan ?? '-' }}
                        </p>

                        <p>
                            <strong>Alamat</strong><br>
                            {{ optional($surat->user->kependudukan)->alamat ?? '-' }}
                            {{ optional($surat->user->kependudukan)->rt_rw ? 'RT/RW '.optional($surat->user->kependudukan)->rt_rw : '' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

  <div class="row">

    @if($surat->jenis_surat == 'Surat Keterangan Usaha')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-file-alt"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Nama Usaha</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['nama_usaha'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Jenis Usaha</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['jenis_usaha'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Alamat Usaha</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['alamat_usaha'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Lama Usaha</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['lama_usaha'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="border rounded p-3 bg-light">
                <small class="text-muted">Keperluan Usaha</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['keperluan_usaha'] ?? '-' }}
                </h5>
            </div>
        </div>

    @elseif($surat->jenis_surat == 'Surat Keterangan Tidak Mampu')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-hand-holding-heart"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Penghasilan Per Bulan</small>
                <h5 class="mb-0">
                    Rp {{ number_format($surat->data_tambahan['penghasilan'] ?? 0,0,',','.') }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Jumlah Tanggungan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['jumlah_tanggungan'] ?? '-' }} Orang
                </h5>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Keperluan Pengajuan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['keperluan_sktm'] ?? '-' }}
                </h5>
            </div>
        </div>

    @elseif($surat->jenis_surat == 'Surat Keterangan Domisili')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-home"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Alamat Domisili</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['alamat_domisili'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Keperluan Pembuatan Surat</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['keperluan_domisili'] ?? '-' }}
                </h5>
            </div>
        </div>

    @elseif($surat->jenis_surat == 'Surat Pengantar KTP')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-id-card"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Jenis Pengajuan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['jenis_pengajuan_ktp'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Alasan Pengajuan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['alasan_ktp'] ?? '-' }}
                </h5>
            </div>
        </div>

    @elseif($surat->jenis_surat == 'Surat Pengantar KK')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-users"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Jenis Pengajuan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['jenis_pengajuan_kk'] ?? '-' }}
                </h5>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Alasan Pengajuan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['alasan_kk'] ?? '-' }}
                </h5>
            </div>
        </div>

    @elseif($surat->jenis_surat == 'Surat Keterangan Serbaguna')

        <div class="col-12">
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-file-alt"></i>
                        Data Surat
                    </strong>
                </div>
            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="border rounded p-3 h-100 bg-light">
                <small class="text-muted">Keperluan</small>
                <h5 class="mb-0">
                    {{ $surat->data_tambahan['keperluan'] ?? '-' }}
                </h5>
            </div>
        </div>

    @else

        <div class="col-12">
            <div class="alert alert-info">
                Detail surat ini belum tersedia.
            </div>
        </div>

 @endif

</div> {{-- end row --}}

            </div> {{-- end card-body --}}
        </div> {{-- end card --}}

@empty

<div class="card shadow">

    <div class="card-body text-center py-5">

        <i class="fas fa-folder-open fa-5x text-secondary mb-4"></i>

        <h3>Belum Ada Pengajuan Surat</h3>

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