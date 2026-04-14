<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login-daftar.css') }}">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 800px;
            /* Lebarkan container */
            overflow: hidden;
        }

        .card {
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            height: 100%;
        }


        .card-header,
        .card-footer {
            padding: 10px 20px;
        }

        .card-body {
            padding: 20px;
            /* Menambah padding agar konten tidak menempel di tepi */
            overflow-y: auto;
            max-height: 500px;
            width: 100%;
            /* Lebar maksimal card-body */
            box-sizing: border-box;
            /* Menjaga padding tidak mempengaruhi lebar */
        }


        .form-label {
            font-size: 14px;
            margin-bottom: 0;
        }

        .form-control {
            padding: 0.375rem 0.75rem;
            margin-bottom: 0rem;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .card-footer {
            padding-top: 10px;
        }

        .card-footer .d-grid {
            margin-bottom: 0px;
        }

        .card-footer p {
            margin-bottom: 0;
        }

        .card-footer a {
            text-decoration: none;
        }

        .footer-content {
            display: flex;
            justify-content: center;
            /* Memastikan konten dalam footer tengah */
            align-items: center;
            text-align: center;
            /* Menengahkan teks */
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card daftar-card">
            <div class="card-header">
                <img class="logo mb-0" src="{{ asset('/assets/img/logo.png') }}" alt="logo" style="max-width: 75px; max-height: 75px;">
                {{-- <h3>Formulir Registrasi</h3>--}}
                <p class="mb-0">Silakan Isi Informasi Anda Untuk Mendaftar!</p>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action ="{{ route('daftar') }}" method="POST">
                    @csrf
                    <div class="mb-0">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-0">
                        <label for="addres" class="form-label">Alamat</label>
                        <textarea class="form-control" id="addres" name="addres" placeholder="Masukkan Alamat"></textarea>
                    </div>

                    <div class="mb-0">
                        <label for="date" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="date" name="date"
                            placeholder="Masukkan Tanggal Lahir">
                    </div>

                    <div class="mb-0">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Masukkan Username">
                    </div>

                    <div class="mb-0">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan Password">
                    </div>

                    <div class="mb-3">
                        <label for="confirm" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm" name="confirm"
                            placeholder="Masukkan Konfirmasi Password">
                    </div>
                    <div class="d-grid mb-0">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="footer-content">
                    <p class="small-text">Sudah Memiliki Akun? <a href="login">Masuk</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
