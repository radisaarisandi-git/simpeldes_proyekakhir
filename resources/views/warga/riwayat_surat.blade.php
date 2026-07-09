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

    {{-- HEADER CARD --}}
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
                            <i class="fas fa-plus-circle"></i> Ajukan Surat
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIC WIDGETS --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="small-box bg-info shadow-sm">
                <div class="inner">
                    <h3>{{ $riwayat_Surat->count() }}</h3>
                    <p>Total Pengajuan</p>
                </div>
                <div class="icon"><i class="fas fa-file-alt"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning shadow-sm">
                <div class="inner">
                    <h3>{{ $riwayat_Surat->where('status','pending')->count() }}</h3>
                    <p>Pending</p>
                </div>
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success shadow-sm">
                <div class="inner">
                    <h3>{{ $riwayat_Surat->whereIn('status',['selesai','disetujui'])->count() }}</h3>
                    <p>Disetujui</p>
                </div>
                <div class="icon"><i class="fas fa-check-circle"></i></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger shadow-sm">
                <div class="inner">
                    <h3>{{ $riwayat_Surat->where('status','ditolak')->count() }}</h3>
                    <p>Ditolak</p>
                </div>
                <div class="icon"><i class="fas fa-times-circle"></i></div>
            </div>
        </div>
    </div>

    {{-- LOOP SURAT --}}
    @forelse($riwayat_Surat as $surat)
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <div class="row align-items-center">
                {{-- Bagian Kiri: Info Surat & Status singkat --}}
                <div class="col-md-8">
                    <h4 class="font-weight-bold text-primary mb-2">
                        <i class="fas fa-file-signature mr-1"></i> {{ $surat->jenis_surat }}
                    </h4>
                    
                    <div class="d-flex flex-wrap align-items-center text-muted mb-2">
                        <span class="mr-3">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $surat->created_at->format('d F Y H:i') }}
                        </span>
                        
                        {{-- Badge Status Ringkas --}}
                        @if($surat->status == 'pending')
                            <span class="badge badge-warning px-2.5 py-1.5"><i class="fas fa-spinner fa-spin mr-1"></i> Sedang Diproses</span>
                        @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')
                            <span class="badge badge-success px-2.5 py-1.5"><i class="fas fa-check mr-1"></i> Selesai</span>
                        @else
                            <span class="badge badge-danger px-2.5 py-1.5"><i class="fas fa-times mr-1"></i> Ditolak</span>
                        @endif
                    </div>

                    {{-- Informasi Detail Status (Bukan pakai badge agar tidak kaku) --}}
                    @if($surat->status == 'selesai' || $surat->status == 'disetujui')
                        <div class="alert alert-soft-success my-2 py-2 px-3 border-0 bg-light text-success rounded" style="font-size: 0.9rem;">
                            <i class="fas fa-info-circle mr-1"></i> Surat telah selesai diproses. Silakan ambil di kantor desa.
                        </div>
                    @endif
                </div>

                {{-- Bagian Kanan: Tombol Aksi --}}
                <div class="col-md-4 text-md-right text-left mt-3 mt-md-0">
                    <button class="btn btn-sm btn-info px-3 shadow-sm mr-1" data-toggle="collapse" data-target="#detail{{ $surat->id }}">
                        <i class="fas fa-eye mr-1"></i> Lihat Detail
                    </button>

                    @if($surat->status == 'pending')
                        <form action="{{ route('surat.destroy',$surat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger px-3 shadow-sm" onclick="return confirm('Batalkan pengajuan ini?')">
                                <i class="fas fa-trash mr-1"></i> Batalkan
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            {{-- COLLAPSE DETAIL --}}
            <div class="collapse" id="detail{{ $surat->id }}">
                <hr class="my-4">
                
                {{-- Data Pemohon --}}
                <div class="card card-outline card-primary shadow-none border mb-3">
                    <div class="card-header bg-transparent">
                        <strong class="text-primary"><i class="fas fa-user mr-1"></i> Data Pemohon</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Nama:</strong><br><span class="text-muted">{{ $surat->user->name }}</span></p>
                                <p class="mb-0"><strong>NIK:</strong><br><span class="text-muted">{{ optional($surat->user->kependudukan)->nik ?? '-' }}</span></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Pekerjaan:</strong><br><span class="text-muted">{{ optional($surat->user->kependudukan)->pekerjaan ?? '-' }}</span></p>
                                <p class="mb-0"><strong>Alamat:</strong><br><span class="text-muted">{{ optional($surat->user->kependudukan)->alamat ?? '-' }} {{ optional($surat->user->kependudukan)->rt_rw ? 'RT/RW '.optional($surat->user->kependudukan)->rt_rw : '' }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Data Tambahan Berdasarkan Jenis Surat --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-success shadow-none border mb-3">
                            <div class="card-header bg-transparent">
                                <strong class="text-success"><i class="fas fa-file-alt mr-1"></i> Detail Informasi Surat</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if($surat->jenis_surat == 'Surat Keterangan Usaha')
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Nama Usaha</small><strong>{{ $surat->data_tambahan['nama_usaha'] ?? '-' }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Jenis Usaha</small><strong>{{ $surat->data_tambahan['jenis_usaha'] ?? '-' }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Alamat Usaha</small><strong>{{ $surat->data_tambahan['alamat_usaha'] ?? '-' }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Lama Usaha</small><strong>{{ $surat->data_tambahan['lama_usaha'] ?? '-' }}</strong></div>
                                        <div class="col-12"><small class="text-muted d-block">Keperluan Usaha</small><strong>{{ $surat->data_tambahan['keperluan_usaha'] ?? '-' }}</strong></div>
                                    
                                    @elseif($surat->jenis_surat == 'Surat Keterangan Tidak Mampu')
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Penghasilan Per Bulan</small><strong>Rp {{ number_format($surat->data_tambahan['penghasilan'] ?? 0,0,',','.') }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Jumlah Tanggungan</small><strong>{{ $surat->data_tambahan['jumlah_tanggungan'] ?? '-' }} Orang</strong></div>
                                        <div class="col-12"><small class="text-muted d-block">Keperluan Pengajuan</small><strong>{{ $surat->data_tambahan['keperluan_sktm'] ?? '-' }}</strong></div>
                                    
                                    @elseif($surat->jenis_surat == 'Surat Keterangan Domisili')
                                        <div class="col-12 mb-3"><small class="text-muted d-block">Alamat Domisili</small><strong>{{ $surat->data_tambahan['alamat_domisili'] ?? '-' }}</strong></div>
                                        <div class="col-12"><small class="text-muted d-block">Keperluan Pembuatan Surat</small><strong>{{ $surat->data_tambahan['keperluan_domisili'] ?? '-' }}</strong></div>
                                    
                                    @elseif($surat->jenis_surat == 'Surat Pengantar KTP')
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Jenis Pengajuan</small><strong>{{ $surat->data_tambahan['jenis_pengajuan_ktp'] ?? '-' }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Alasan Pengajuan</small><strong>{{ $surat->data_tambahan['alasan_ktp'] ?? '-' }}</strong></div>
                                    
                                    @elseif($surat->jenis_surat == 'Surat Pengantar KK')
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Jenis Pengajuan</small><strong>{{ $surat->data_tambahan['jenis_pengajuan_kk'] ?? '-' }}</strong></div>
                                        <div class="col-md-6 mb-3"><small class="text-muted d-block">Alasan Pengajuan</small><strong>{{ $surat->data_tambahan['alasan_kk'] ?? '-' }}</strong></div>
                                    
                                    @elseif($surat->jenis_surat == 'Surat Keterangan Serbaguna')
                                        <div class="col-12"><small class="text-muted d-block">Keperluan</small><strong>{{ $surat->data_tambahan['keperluan'] ?? '-' }}</strong></div>
                                    
                                    @else
                                        <div class="col-12"><div class="alert alert-info mb-0">Detail surat ini belum tersedia.</div></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- end row data tambahan --}}
            </div> {{-- end collapse --}}

        </div> {{-- end card-body --}}
    </div> {{-- end card --}}

    @empty
    <div class="card shadow-sm">
        <div class="card-body text-center py-5">
            <i class="fas fa-folder-open fa-5x text-secondary mb-4"></i>
            <h3>Belum Ada Pengajuan Surat</h3>
            <p class="text-muted">Anda belum pernah mengajukan surat.</p>
            <a href="{{ route('warga.surat.create') }}" class="btn btn-primary btn-lg shadow-sm">
                <i class="fas fa-plus-circle"></i> Ajukan Surat Sekarang
            </a>
        </div>
    </div>
    @endforelse

</div>

@endsection