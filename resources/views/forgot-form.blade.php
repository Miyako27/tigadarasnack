<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #f05340;
            /* Laravel Red */
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            border-radius: 8px;
            background-color: #f05340;
            /* Laravel Red */
            border: none;
        }

        .btn-primary:hover {
            background-color: #d94734;
            /* Darker Laravel Red */
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding-bottom: 1rem;
        }

        .small-text {
            color: #6c757d;
        }

        a {
            color: #f05340;
            /* Laravel Red */
            text-decoration: none;
        }

        a:hover {
            color: #d94734;
            /* Darker Laravel Red */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header">
                        <h3>Welcome Back</h3>
                        <p>Please login to your account</p>
                    </div>
                    <div class="card-body">

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        {{-- @if ($result == 'Success')
                        <div class="alert alert-success text-center"> Login Menggunakan Berhasil! </div>
                    @elseif($result == 'Error')
                    <div class="alert alert-success text-center"> Login Gagal! </div>
                    @endif --}}

                        {{-- flashdata --}}
                        @if (session('result') == 'Success')
                            <div class="alert alert-success text-center">
                                Link reset password sudah dikirim ke {{ session('email') }}. Silahkan akses dan ikuti
                                langkah yang tersedia.
                            </div>
                        @elseif(session('result') == 'Error')
                            <div class="alert alert-danger text-center">
                                Email yang dimasukkan tidak valid!
                            </div>
                        @endif

                        <form action="{{ route('login.do-forgot') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                        {{-- INI TERAKHIR DI QUIZ --}}

                        {{-- @if (session('result') == 'Success') PASS QUIZ
                        <div class="alert alert-success text-center"> Link reset password sudah dikirim ke 2357301079@mahasiswa.pcr.ac.id. Silahkan akses dan ikuti langkah yang tersedia </div>
                    @elseif(session ('result') == 'Error')
                    <div class="alert alert-danger text-center"> Email yang dimasukkan tidak valid! </div>
                    @endif --}}

                        {{-- <form action ="{{ route('auth.do-forgot') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                    </div>
                    </form> --}}
                        <div class="card-footer">
                            <p class="small-text">Lupa Password? <a href="{{ route('login.forgot') }}">Forgot
                                    Password</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
