@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Data Kependudukan SIMPELDES</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Warga</th>
                        <th>Jenis Kelamin</th>
                        <th>TTL</th>
                        <th>Alamat / RT RW</th>
                        <th>Pekerjaan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->nik }}</td>
                        
                        <td>
                            {{ $row->name ?? $row->user->name ?? $row->User->name ?? 'Warga Tidak Terdaftar' }}
                        </td>
                        
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->tempat_lahir }}, {{ $row->tanggal_lahir }}</td>
                        
                        <td>
                            {{ $row->alamat }} 
                            (RT/RW: {{ $row->rt_rw ?? $row->re_rw ?? '-' }})
                        </td>
                        
                        <td>{{ $row->pekerjaan }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('kependudukan.edit', $row->id) }}" class="btn btn-warning btn-sm mr-2">
                                    Edit
                                </a>

                                <form action="{{ route('kependudukan.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus warga ini beserta akun loginnya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection