<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login-daftar.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-card {
            border-radius: 15px; /* Tambahkan lengkungan pada card */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            text-align: center;
            background-color: #F195B2;
            border-bottom: 1px solid #e9ecef;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            text-align: center;
            background-color: #ffffff;
            padding: 15px;
            border-top: 1px solid #e9ecef;
        }

        .logo {
            max-width: 75px;
            max-height: 75px;
        }

        .btn-primary {
            border-radius: 8px;
        }

        .btn-outline-secondary {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header">
                        <img class="logo mb-2" src="{{ asset('/assets/img/logo.png') }}" alt="logo">
                        <p class="mb-0">Silakan Masuk Ke Akun Anda!</p>
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

                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukkan Email">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan Password">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block mb-3">Masuk</button>
                                <a href="{{ route('redirect.google') }}" class="btn btn-outline-secondary w-100">Login with Google</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        {{-- <p class="small-text">Belum Memiliki Akun? <a href="daftar">Daftar</a></p> --}}
                        <p class="small-text">Lupa Password? <a href="{{ route('login.forgot') }}">Ubah Password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
