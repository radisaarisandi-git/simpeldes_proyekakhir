@extends('layouts.app')

@section('title', 'Kelola Pengajuan Surat')
@section('page_title', 'Daftar Pengajuan Surat Warga')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Permohonan Masuk</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>Tanggal Masuk</th>
                            <th>Jenis Surat</th>
                            <th>Detail Data</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($semuaSurat as $key => $surat)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><strong>{{ $surat->user->name ?? 'Warga dihapus' }}</strong></td>
                                <td>{{ $surat->created_at->format('d M Y H:i') }}</td>
                                <td><span class="badge badge-info">{{ $surat->jenis_surat }}</span></td>
                                <td>
                                    @if(is_array($surat->data_tambahan))
                                        @foreach($surat->data_tambahan as $label => $value)
                                            <small><strong>{{ ucwords(str_replace('_', ' ', $label)) }}:</strong> {{ $value }}</small><br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($surat->status == 'pending')
                                        <span class="badge badge-warning">Menunggu</span>
                                    @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($surat->status == 'pending')
                                        <form action="{{ route('admin.surat.status', $surat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="selesai">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i> Setujui
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.surat.status', $surat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak surat ini?')">
                                                <i class="fas fa-times"></i> Tolak
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted d-block mb-1"><i class="fas fa-check-circle"></i> Selesai Diproses</span>
                                        
                                        @if($surat->status == 'selesai' || $surat->status == 'disetujui')
                                            <a href="{{ route('warga.surat.cetak', $surat->id) }}" target="_blank" class="btn btn-sm btn-danger d-inline-block">
                                                <i class="fas fa-file-pdf"></i> Cetak
                                            </a>
                                        @endif

                                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-default" onclick="return confirm('Hapus arsip pengajuan ini dari database?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada permohonan surat dari warga.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection