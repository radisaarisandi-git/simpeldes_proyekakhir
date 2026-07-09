@extends('layouts.app')

@section('title', 'Kelola Pengajuan Surat')
@section('page_title', 'Daftar Pengajuan Surat Warga')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    {{ session('success') }}
                </div>
            @endif
            <div class="card shadow">

                <div class="card-header bg-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <h3 class="card-title">

                            <i class="fas fa-envelope-open-text text-primary mr-2"></i>

                            Daftar Pengajuan Surat

                        </h3>

                        <span class="badge badge-primary p-2">

                            Total {{ count($semuaSurat) }} Pengajuan

                        </span>

                    </div>

                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-light">

                            <tr>

                                <th width="5%">No</th>

                                <th width="20%">Nama Warga</th>

                                <th width="15%">Tanggal</th>

                                <th width="20%">Jenis Surat</th>

                                <th width="10%">Detail</th>

                                <th width="10%">Status</th>

                                <th width="20%">Aksi</th>

                            </tr>

                        </thead>
                        <tbody>
                            @forelse($semuaSurat as $key => $surat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>

                                        <i class="fas fa-user-circle text-primary"></i>

                                        <strong>

                                            {{ $surat->user->name ?? 'Warga Dihapus' }}

                                        </strong>

                                    </td>
                                    <td>

                                        {{ $surat->created_at->format('d M Y') }}

                                        <br>

                                        <small class="text-muted">

                                            {{ $surat->created_at->format('H:i') }}

                                        </small>

                                    </td>
                                    <td>

                                        @switch($surat->jenis_surat)
                                            @case('Surat Keterangan Domisili')
                                                <span class="badge badge-primary px-3 py-2">

                                                    <i class="fas fa-home mr-1"></i>

                                                    Domisili

                                                </span>
                                            @break

                                            @case('Surat Keterangan Usaha')
                                                <span class="badge badge-success px-3 py-2">

                                                    <i class="fas fa-store mr-1"></i>

                                                    Usaha

                                                </span>
                                            @break

                                            @case('Surat Keterangan Tidak Mampu')
                                                <span class="badge badge-danger px-3 py-2">

                                                    <i class="fas fa-hand-holding-heart mr-1"></i>

                                                    SKTM

                                                </span>
                                            @break

                                            @case('Surat Pengantar KTP')
                                                <span class="badge badge-warning px-3 py-2">

                                                    <i class="fas fa-id-card mr-1"></i>

                                                    Pengantar KTP

                                                </span>
                                            @break

                                            @case('Surat Pengantar KK')
                                                <span class="badge badge-info px-3 py-2">

                                                    <i class="fas fa-users mr-1"></i>

                                                    Pengantar KK

                                                </span>
                                            @break

                                            @case('Surat Keterangan Serbaguna')
                                                <span class="badge badge-secondary px-3 py-2">

                                                    <i class="fas fa-file-alt mr-1"></i>

                                                    Serbaguna

                                                </span>
                                            @break

                                            @default
                                                <span class="badge badge-dark px-3 py-2">

                                                    {{ $surat->jenis_surat }}

                                                </span>
                                        @endswitch

                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#detail{{ $surat->id }}">

                                            <i class="fas fa-eye"></i>

                                            Lihat

                                        </button>

                                    </td>
                                    <td class="text-center">

                                        @if ($surat->status == 'pending')
                                            <span class="badge badge-pill badge-warning px-3 py-2">

                                                <i class="fas fa-clock mr-1"></i>

                                                Menunggu

                                            </span>
                                        @elseif($surat->status == 'selesai' || $surat->status == 'disetujui')
                                            <span class="badge badge-pill badge-success px-3 py-2">

                                                <i class="fas fa-check-circle mr-1"></i>

                                                Disetujui

                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-danger px-3 py-2">

                                                <i class="fas fa-times-circle mr-1"></i>

                                                Ditolak

                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        @if ($surat->status == 'pending')
                                            <form action="{{ route('admin.surat.status', $surat->id) }}" method="POST"
                                                style="display:inline;">

                                                @csrf

                                                <input type="hidden" name="status" value="selesai">

                                                <button type="submit" class="btn btn-sm btn-success">

                                                    <i class="fas fa-check"></i>

                                                    Setujui

                                                </button>

                                            </form>

                                            <form action="{{ route('admin.surat.status', $surat->id) }}" method="POST"
                                                style="display:inline;">

                                                @csrf

                                                <input type="hidden" name="status" value="ditolak">

                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Yakin ingin menolak surat ini?')">

                                                    <i class="fas fa-times"></i>

                                                    Tolak

                                                </button>

                                            </form>
                                        @else
                                            <span class="text-muted d-block mb-2">

                                                <i class="fas fa-check-circle text-success"></i>

                                                Selesai Diproses

                                            </span>

                                            @if ($surat->status == 'selesai' || $surat->status == 'disetujui')
                                                <a href="{{ route('admin.surat.cetak', $surat->id) }}" target="_blank"
                                                    class="btn btn-sm btn-danger mb-1">

                                                    <i class="fas fa-file-pdf"></i>

                                                    Cetak PDF

                                                </a>
                                            @endif

                                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST"
                                                style="display:inline;">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-secondary"
                                                    onclick="return confirm('Hapus arsip pengajuan ini?')">

                                                    <i class="fas fa-trash"></i>

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

        {{-- ================= MODAL DETAIL ================= --}}
        @foreach ($semuaSurat as $surat)
            <div class="modal fade" id="detail{{ $surat->id }}" tabindex="-1">

                <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                        <div class="modal-header bg-primary">

                            <h5 class="modal-title">

                                <i class="fas fa-file-alt mr-2"></i>

                                Detail Pengajuan Surat

                            </h5>

                            <button type="button" class="close text-white" data-dismiss="modal">

                                <span>&times;</span>

                            </button>

                        </div>

                        <div class="modal-body">

                            <table class="table table-bordered">

                                <tr>

                                    <th width="35%">Nama Warga</th>

                                    <td>{{ $surat->user->name }}</td>

                                </tr>

                                <tr>

                                    <th>Jenis Surat</th>

                                    <td>{{ $surat->jenis_surat }}</td>

                                </tr>

                                <tr>

                                    <th>Tanggal Pengajuan</th>

                                    <td>{{ $surat->created_at->format('d M Y H:i') }}</td>

                                </tr>

                                <tr>

                                    <th>Status</th>

                                    <td>{{ ucfirst($surat->status) }}</td>

                                </tr>

                                @php
                                    $data = $surat->data_tambahan ?? [];
                                @endphp
                                {{-- ================= SURAT KETERANGAN USAHA ================= --}}
                                @if ($surat->jenis_surat == 'Surat Keterangan Usaha')
                                    <tr>
                                        <th>Nama Usaha</th>
                                        <td>{{ $data['nama_usaha'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Jenis Usaha</th>
                                        <td>{{ $data['jenis_usaha'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alamat Usaha</th>
                                        <td>{{ $data['alamat_usaha'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Lama Usaha</th>
                                        <td>{{ $data['lama_usaha'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Keperluan</th>
                                        <td>{{ $data['keperluan_usaha'] ?? '-' }}</td>
                                    </tr>

                                    {{-- ================= SKTM ================= --}}
                                @elseif($surat->jenis_surat == 'Surat Keterangan Tidak Mampu')
                                    <tr>
                                        <th>Penghasilan</th>
                                        <td>Rp {{ number_format($data['penghasilan'] ?? 0, 0, ',', '.') }}</td>
                                    </tr>

                                    <tr>
                                        <th>Jumlah Tanggungan</th>
                                        <td>{{ $data['jumlah_tanggungan'] ?? '-' }} Orang</td>
                                    </tr>

                                    <tr>
                                        <th>Keperluan</th>
                                        <td>{{ $data['keperluan_sktm'] ?? '-' }}</td>
                                    </tr>

                                    {{-- ================= DOMISILI ================= --}}
                                @elseif($surat->jenis_surat == 'Surat Keterangan Domisili')
                                    <tr>
                                        <th>Alamat Domisili</th>
                                        <td>{{ $data['alamat_domisili'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Keperluan</th>
                                        <td>{{ $data['keperluan_domisili'] ?? '-' }}</td>
                                    </tr>

                                    {{-- ================= KTP ================= --}}
                                @elseif($surat->jenis_surat == 'Surat Pengantar KTP')
                                    <tr>
                                        <th>Jenis Pengajuan</th>
                                        <td>{{ $data['jenis_pengajuan_ktp'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alasan</th>
                                        <td>{{ $data['alasan_ktp'] ?? '-' }}</td>
                                    </tr>

                                    {{-- ================= KK ================= --}}
                                @elseif($surat->jenis_surat == 'Surat Pengantar KK')
                                    <tr>
                                        <th>Jenis Pengajuan</th>
                                        <td>{{ $data['jenis_pengajuan_kk'] ?? '-' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alasan</th>
                                        <td>{{ $data['alasan_kk'] ?? '-' }}</td>
                                    </tr>

                                    {{-- ================= SERBAGUNA ================= --}}
                                @elseif($surat->jenis_surat == 'Surat Keterangan Serbaguna')
                                    <tr>
                                        <th>Keperluan</th>
                                        <td>{{ $data['keperluan'] ?? '-' }}</td>
                                    </tr>
                                @endif
                            </table>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">

                                <i class="fas fa-times"></i>

                                Tutup

                            </button>

                        </div>

                    </div>

                </div>

            </div>
        @endforeach

        <style>
            .badge {

                font-size: 13px;

                font-weight: 600;

                border-radius: 30px;

                padding: 8px 14px;

            }

            .badge i {

                margin-right: 4px;

            }

            .table tbody tr {

                transition: 0.2s;

            }

            .table tbody tr:hover {

                background: #f4f9ff;

            }

            .card {

                border-radius: 12px;

            }

            .btn {

                border-radius: 8px;

            }

            .modal-content {

                border-radius: 15px;

            }

            .modal-header {

                border-top-left-radius: 15px;

                border-top-right-radius: 15px;

            }
        </style>
    @endsection
