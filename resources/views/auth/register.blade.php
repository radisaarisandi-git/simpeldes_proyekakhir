<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1 class="h1"><b>Daftar</b>Warga</h1>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Lengkapi data untuk pendaftaran akun warga</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="nik" class="form-control" placeholder="NIK (16 Digit)" value="{{ old('nik') }}" required>
                    @error('nik') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password (Min 6 Karakter)" required>
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Daftar Sekarang</button>
            </form>

            <a href="{{ route('login') }}" class="text-center d-block mt-3">Sudah punya akun? Login</a>
        </div>
    </div>
</div>
</body>
</html>