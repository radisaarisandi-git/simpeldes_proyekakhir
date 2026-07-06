<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga Baru</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

   <style>
        html,
        body{
            width:100%;
            min-height:100%;
            margin:0;
            padding:0;
        }

        body{
            background:
                linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),
                url("{{ asset('images/login-bg.jpg') }}");

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
            background-attachment:fixed;

            display:flex;
            justify-content:center;
            align-items:flex-start;

            padding:70px 20px 70px;
            overflow-y:auto;
        }

        /* Card */
        .register-box{
            width:820px;
            max-width:100%;
            margin:0 auto;
        }

        .card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            background:rgba(255,255,255,.96);
            backdrop-filter:blur(6px);
            box-shadow:0 15px 40px rgba(0,0,0,.30);
        }

        /* Header */
        .card-header{
            background:#fff;
            border:none;
            text-align:center;
            padding:22px 25px 10px;
        }

        .card-header h2{
            color:#0d6efd;
            font-size:28px;
            font-weight:700;
            margin-bottom:4px;
        }

        .card-header h4{
            font-size:22px;
            font-weight:600;
            margin-bottom:5px;
        }

        .card-header small{
            font-size:14px;
            color:#777;
        }

        /* Body */
        .card-body{
            padding:20px 30px 25px;
        }

        .login-box-msg{
            margin-bottom:20px;
            color:#666;
            font-size:15px;
        }

        /* Form */
        .form-group{
            margin-bottom:14px;
        }

        .form-group label{
            font-weight:600;
            color:#444;
            margin-bottom:6px;
        }

        .form-control{
            height:42px;
            border-radius:8px;
            font-size:14px;
        }

        .form-control:focus{
            border-color:#0d6efd;
            box-shadow:0 0 0 .15rem rgba(13,110,253,.15);
        }

        /* Button */
        .btn-primary{
            height:44px;
            border-radius:8px;
            font-size:15px;
            font-weight:600;
            transition:.2s;
        }

        .btn-primary:hover{
            transform:translateY(-2px);
        }

        .text-center{
            margin-top:22px;
        }

        .text-center a{
            font-weight:600;
        }

        hr{
            margin:24px 0;
        }

        /* Mobile */
        @media (max-width:768px){

            body{
                padding:35px 12px;
            }

            .register-box{
                width:100%;
            }

            .card-body{
                padding:18px;
            }

            .card-header h2{
                font-size:24px;
            }

            .card-header h4{
                font-size:19px;
            }

        }
        </style>
</head>

<body>

<div class="register-box">

    <div class="card">

        <div class="card-header">
            <h2>SIMPELDES</h2>
            <h4>Registrasi Warga</h4>

            <small class="text-muted">
                Lengkapi data kependudukan untuk membuat akun baru
            </small>
        </div>

        <div class="card-body">

            <p class="login-box-msg">
                Silakan isi seluruh data dengan benar.
            </p>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="row">

                    <!-- ===================== KOLOM KIRI ===================== -->

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Nama Lengkap"
                                value="{{ old('name') }}" required>

                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>NIK (16 Digit)</label>
                            <input type="text" name="nik" class="form-control"
                                placeholder="NIK"
                                value="{{ old('nik') }}" required>

                            @error('nik')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                placeholder="Tempat Lahir"
                                value="{{ old('tempat_lahir') }}" required>

                            @error('tempat_lahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir"
                                class="form-control"
                                value="{{ old('tanggal_lahir') }}" required>

                            @error('tanggal_lahir')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                    </div>

                    <!-- ===================== KOLOM KANAN ===================== -->

                    <div class="col-md-6">
                                                <div class="form-group">
                            <label>Alamat Rumah</label>
                            <input type="text" name="alamat" class="form-control"
                                placeholder="Nama Jalan / Dusun"
                                value="{{ old('alamat') }}" required>

                            @error('alamat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>RT / RW</label>
                            <input type="text" name="rt_rw" class="form-control"
                                placeholder="Contoh : 001/002"
                                value="{{ old('rt_rw') }}" required>

                            @error('rt_rw')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control"
                                placeholder="Agama"
                                value="{{ old('agama') }}" required>

                            @error('agama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control"
                                placeholder="Pekerjaan"
                                value="{{ old('pekerjaan') }}" required>

                            @error('pekerjaan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Status Perkawinan</label>

                            <select name="status_perkawinan" class="form-control">
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>

                    </div>

                </div>

                <hr>

                <!-- ===================== AKUN LOGIN ===================== -->

                <div class="form-group">
                    <label>Email Akun</label>

                    <input type="email" name="email"
                        class="form-control"
                        placeholder="Masukkan Email"
                        value="{{ old('email') }}" required>

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password</label>

                    <input type="password" name="password"
                        class="form-control"
                        placeholder="Password"
                        required>

                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>

                    <input type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Konfirmasi Password"
                        required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-user-plus mr-2"></i>
                    Daftar Sekarang
                </button>

            </form>

            <div class="text-center mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}">
                    Login Disini
                </a>
            </div>

        </div>

    </div>

</div>

</body>
</html>