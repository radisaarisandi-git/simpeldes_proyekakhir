@extends('layouts.app')

@section('title', 'Riwayat Pengajuan Surat')
@section('page_title', 'Riwayat Pengajuan Surat Anda')

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
                <h3 class="card-title">Daftar Permohonan Dokumen</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jenis Surat</th>
                            <th>Data Tambahan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat_Surat as $key => $surat)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $surat->created_at->format('d M Y H:i') }}</td>
                                <td>{{ $surat->jenis_surat }}</td>
                                <td>
                                    @if(is_array($surat->data_tambahan))
                                        @foreach($surat->data_tambahan as $label => $value)
                                            <strong>{{ ucwords(str_replace('_', ' ', $label)) }}:</strong> {{ $value }}<br>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($surat->status == 'pending')
                                        <span class="badge badge-warning">Menunggu Persetujuan</span>
                                    @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')
                                        <span class="badge badge-success">Disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($surat->status == 'pending')
                                        <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin membatalkan pengajuan surat ini?')">
                                                <i class="fas fa-trash"></i> Batalkan
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted"><i class="fas fa-lock"></i> Diproses</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada riwayat pengajuan surat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection