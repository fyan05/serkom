<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sekolah Ciputra</title>
    <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
        }
        .login-container {
            max-width: 400px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
        }
        .logo-img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            border-radius: 50%;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            background: linear-gradient(90deg, #4d53b9 0%, #8f94fb 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #8f94fb 0%, #4e54c8 100%);
        }
        .login-title {
            font-family: 'Segoe UI', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #000000;
        }
        .input-group-text {
            background: #f0f0f0;
            border: none;
        }
        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #888;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container login-container p-4">
            @if (session('message'))
                <div class="alert alert-danger text-center mb-3">
                    {{ session('message') }}
                </div>
            @endif
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('asset/logo/logo-removebg-preview.png'   ) }}" alt="Logo" class="logo-img">
                </div>
                <h2 class="login-title text-center mb-4">Masuk Sekolah</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <footer class="footer py-3 bg-light mt-auto">
              <div class="container text-center">
                  <span>&copy; {{ date('Y') }} Sekolah Ciputra Surabaya. Sekolah unggulan</span>
              </div>
          </footer>
            </form>
        </div>
    </div>
    <script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
