@extends('layouts.app') {{-- Sesuaikan dengan nama template utama kalian --}}

@section('content')
<div class="container mt-4">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->user->name ?? 'Warga Tidak Terdaftar' }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>{{ $row->tempat_lahir }}, {{ $row->tanggal_lahir }}</td>
                        <td>{{ $row->alamat }} (RT/RW: {{ $row->rt_rw }})</td>
                        <td>{{ $row->pekerjaan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection