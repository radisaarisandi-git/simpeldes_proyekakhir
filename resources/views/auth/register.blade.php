<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page" style="height: auto; padding: 40px 0;">
<div class="register-box" style="width: 500px;"> <!-- Ukuran box diperlebar agar muat dua kolom input -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1 class="h1"><b>Daftar</b>Warga</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Lengkapi seluruh data kependudukan untuk pendaftaran akun</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK" value="{{ old('nik') }}" required>
                            @error('nik') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                            @error('tempat_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
                            @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Alamat Rumah</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Nama Jalan/Dusun" value="{{ old('alamat') }}" required>
                            @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>RT / RW</label>
                            <input type="text" name="rt_rw" class="form-control" placeholder="Contoh: 002/001" value="{{ old('rt_rw') }}" required>
                            @error('rt_rw') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" placeholder="Agama" value="{{ old('agama') }}" required>
                            @error('agama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}" required>
                            @error('pekerjaan') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Validasi Akun Login -->
                <div class="form-group mb-3">
                    <label>Email Akun</label>
                    <input type="email" name="email" class="form-control" placeholder="Email untuk login" value="{{ old('email') }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password (Min 6 Karakter)" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
            </form>

            <a href="{{ route('login') }}" class="text-center d-block mt-3">Sudah punya akun? Login</a>
        </div>
    </div>
</div>
</body>
</html>