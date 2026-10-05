<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk · Data Peserta Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2.25rem 2rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(16, 24, 40, .06);
        }

        .login-card .brand-mark {
            width: 48px;
            height: 48px;
            font-size: 1.4rem;
            margin-bottom: 1rem;
        }

        .login-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: .25rem;
        }

        .field {
            position: relative;
        }

        .field>i.icon {
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
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 p-3">

    <main class="login-card">
        <div class="text-center mb-4">
            {{-- <span class="brand-mark"><i class="bi bi-patch-check-fill"></i></span> --}}
            <h1 class="login-title">Masuk</h1>
            {{-- <p class="text-muted mb-0">Aplikasi Pengelolaan Data Peserta Sertifikasi</p> --}}
        </div>

        <form method="POST" action="{{ route('login.process') }}" novalidate>
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="field">
                    <i class="bi bi-person icon"></i>
                    <input type="text" id="username" name="username" value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"
                        autocomplete="username" autofocus>
                </div>
                @error('username')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="field has-toggle">
                    <i class="bi bi-lock icon"></i>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password"
                        autocomplete="current-password">
                    <button type="button" class="toggle" id="togglePassword" aria-label="Tampilkan password">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Masuk</button>
        </form>
    </main>

    <script>
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        document.getElementById('togglePassword').addEventListener('click', function() {
            const hidden = passwordInput.type === 'password';
            passwordInput.type = hidden ? 'text' : 'password';
            toggleIcon.className = hidden ? 'bi bi-eye-slash' : 'bi bi-eye';
        });
    </script>
</body>

</html>
