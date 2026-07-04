<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pelayanan Desa</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{

            font-family: 'Segoe UI', sans-serif;

            background:url("{{ asset('images/login-bg.jpg') }}") no-repeat center center;
            background-size:cover;

            height:100vh;
            overflow:hidden;
        }

        body::before{

            content:'';

            position:absolute;
            inset:0;

            background:rgba(0,0,0,.45);
            backdrop-filter:blur(4px);

        }

        .container-login{

            position:relative;
            z-index:2;

            width:100%;
            height:100vh;

            display:flex;
            align-items:center;
            justify-content:space-between;

            padding:0 8%;

        }

        .left-content{

            width:50%;
            color:white;

        }

        .left-content h1{

            font-size:55px;
            font-weight:700;
            line-height:1.2;

        }

        .left-content p{

            margin-top:20px;
            font-size:20px;
            width:75%;
            line-height:1.7;

        }

        .login-card{

            width:420px;

            background:white;

            border-radius:18px;

            padding:40px;

            box-shadow:0 20px 50px rgba(0,0,0,.35);

        }

        .login-card h2{

            text-align:center;

            font-weight:bold;

            margin-bottom:30px;

        }

        .form-control{

            height:48px;

        }

        .btn-login{

            height:48px;

            font-size:17px;

            border-radius:8px;

        }

        .register{

            margin-top:20px;

            text-align:center;

        }

        @media(max-width:992px){

            .container-login{

                flex-direction:column;
                justify-content:center;

            }

            .left-content{

                width:100%;
                text-align:center;
                margin-bottom:40px;

            }

            .left-content p{

                width:100%;

            }

        }

    </style>

</head>

<body>

<div class="container-login">

    <div class="left-content">

        <h1>
            Sistem Informasi <br>
            Pelayanan Desa
        </h1>

        <p>
            Melayani masyarakat secara cepat,
            mudah, transparan, dan terpercaya
            dalam pengajuan berbagai surat
            secara online.
        </p>

    </div>


    <div class="login-card">

        <h2>Masuk</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">

            @csrf

            <div class="input-group mb-3">

                <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required>

                <div class="input-group-append">

                    <div class="input-group-text">

                        <span class="fas fa-envelope"></span>

                    </div>

                </div>

            </div>

            <div class="input-group mb-4">

                <input
                    type="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                    required>

                <div class="input-group-append">

                    <div class="input-group-text">

                        <span class="fas fa-lock"></span>

                    </div>

                </div>

            </div>

            <button class="btn btn-primary btn-block btn-login">

                <i class="fas fa-sign-in-alt"></i>

                Masuk

            </button>

        </form>

        <div class="register">

            <a href="{{ route('register') }}">

                Belum punya akun?
                <strong>Daftar Warga Baru</strong>

            </a>

        </div>

    </div>

</div>

</body>
</html>