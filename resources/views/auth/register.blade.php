<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar · Data Peserta Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --line: #dee2e6;
            --muted: #6c757d;
            --ink: #212529;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
        }

        .register-card {
            width: 100%;
            max-width: 400px;
            padding: 2.25rem 2rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(16, 24, 40, .06);
        }

        .register-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: .25rem;
        }

        .field {
            position: relative;
        }

        .field > i.icon {
            position: absolute;
            left: .95rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            pointer-events: none;
        }

        .field .form-control {
            padding-left: 2.6rem;
            height: 46px;
        }

        .field .toggle {
            position: absolute;
            right: .5rem;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: var(--muted);
            padding: .35rem .5rem;
        }

        .field .toggle:hover {
            color: var(--ink);
        }

        .field.has-toggle .form-control {
            padding-right: 2.8rem;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .15);
        }

        .login-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 p-3">

    <main class="register-card">
        <div class="text-center mb-4">
            <h1 class="register-title">Buat Akun</h1>
        </div>

        <form method="POST" action="{{ route('register.process') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>

                <div class="field">
                    <i class="bi bi-person-vcard icon"></i>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        maxlength="50"
                        required>
                </div>

                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>

                <div class="field">
                    <i class="bi bi-person icon"></i>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror"
                        placeholder="Buat username"
                        autocomplete="username"
                        maxlength="50"
                        required>
                </div>

                @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <div class="field">
                    <i class="bi bi-envelope icon"></i>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email"
                        autocomplete="email"
                        maxlength="255"
                        required>
                </div>

                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>

                <div class="field has-toggle">
                    <i class="bi bi-lock icon"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Minimal 8 karakter"
                        autocomplete="new-password"
                        minlength="8"
                        required>

                    <button
                        type="button"
                        class="toggle"
                        id="togglePassword"
                        aria-label="Tampilkan password">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">
                Daftar
            </button>

            <p class="text-center text-muted mt-4 mb-0">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="login-link">
                    Masuk
                </a>
            </p>
        </form>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        document.getElementById('togglePassword').addEventListener('click', function () {
            const hidden = passwordInput.type === 'password';

            passwordInput.type = hidden ? 'text' : 'password';
            toggleIcon.className = hidden
                ? 'bi bi-eye-slash'
                : 'bi bi-eye';

            this.setAttribute(
                'aria-label',
                hidden ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    </script>

</body>
</html>
