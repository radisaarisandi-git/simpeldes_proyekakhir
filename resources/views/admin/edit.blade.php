@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Data Kependudukan: {{ $warga->user->name ?? 'Warga' }}</h4>
        </div>
        <div class="card-body">
            
            {{-- Form untuk update --}}
            <form action="{{ route('kependudukan.update', $warga->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Sisi Kiri -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Lengkap Warga</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $warga->user->name ?? '') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik', $warga->nik) }}" required>
                            @error('nik') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $warga->tanggal_lahir) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Sisi Kanan -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Alamat Lengkap</label>
                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $warga->alamat) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>RT / RW</label>
                            <input type="text" name="rt_rw" class="form-control" value="{{ old('rt_rw', $warga->rt_rw) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" value="{{ old('agama', $warga->agama) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $warga->pekerjaan) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="Belum Kawin" {{ $warga->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ $warga->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Cerai Hidup" {{ $warga->status_perkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="Cerai Mati" {{ $warga->status_perkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    <a href="{{ route('kependudukan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection