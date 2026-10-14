<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            max-width: 850px;
            padding: 2rem 2.5rem;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(16, 24, 40, .06);
        }

        .register-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: .25rem;
            color: var(--ink);
        }

        .register-subtitle {
            color: var(--muted);
            font-size: .9rem;
        }

        /* Layout form menjadi dua kolom */
        .register-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 1.5rem;
            row-gap: .25rem;
        }

        .register-grid .mb-3,
        .register-grid .mb-4 {
            margin-bottom: 1rem !important;
        }

        /* Field yang menggunakan lebar penuh */
        .register-grid .full-width {
            grid-column: 1 / -1;
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

        .field .form-control,
        .field .form-select {
            height: 46px;
            border-radius: 9px;
        }

        .field .form-control {
            padding-left: 2.6rem;
        }

        .field textarea.form-control {
            height: auto;
            min-height: 100px;
            padding-top: .75rem;
            resize: vertical;
        }

        .field .toggle {
            position: absolute;
            right: .9rem;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
            padding: 0;
        }

        .field .toggle:hover {
            color: var(--ink);
        }

        .field.has-toggle .form-control {
            padding-right: 2.8rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .12);
        }

        .form-label {
            font-size: .875rem;
            font-weight: 500;
            margin-bottom: .45rem;
        }

        .btn-register {
            height: 46px;
            border-radius: 9px;
            font-weight: 600;
        }

        .login-link {
            color: #0d6efd;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .invalid-feedback {
            display: block;
        }

        @media (max-width: 576px) {
            .register-card {
                padding: 1.5rem 1.25rem;
            }

            .register-grid {
                grid-template-columns: 1fr;
            }

            .register-grid .full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 p-3">

    <main class="register-card">

        <div class="text-center mb-4">
            <h1 class="register-title">Buat Akun</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="fw-semibold mb-1">
                    Pendaftaran belum berhasil.
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.process') }}">
            @csrf

            <div class="register-grid">

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>

                    <div class="field">
                        <i class="bi bi-person icon"></i>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            maxlength="50"
                            autocomplete="name"
                            required
                        >
                    </div>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>

                    <div class="field">
                        <i class="bi bi-person icon"></i>
                        <input
                            type="text"
                            class="form-control @error('username') is-invalid @enderror"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            maxlength="50"
                            autocomplete="username"
                            required
                        >
                    </div>

                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>

                    <div class="field">
                        <i class="bi bi-envelope icon"></i>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            maxlength="50"
                            autocomplete="email"
                            required
                        >
                    </div>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>

                    <div class="field has-toggle">
                        <i class="bi bi-lock icon"></i>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Minimal 8 karakter"
                            minlength="8"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>

                    <div class="field">
                        <i class="bi bi-card-text icon"></i>
                        <input
                            type="text"
                            class="form-control @error('nik') is-invalid @enderror"
                            id="nik"
                            name="nik"
                            placeholder="16 digit NIK"
                            value="{{ old('nik') }}"
                            inputmode="numeric"
                            maxlength="16"
                            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 16)"
                            required
                        >
                    </div>

                    @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Nomor Telepon</label>

                    <div class="field">
                        <i class="bi bi-telephone icon"></i>
                        <input
                            type="tel"
                            class="form-control @error('no_telepon') is-invalid @enderror"
                            id="no_telepon"
                            name="no_telepon"
                            value="{{ old('no_telepon') }}"
                            inputmode="numeric"
                            maxlength="13"
                            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 13)"
                            autocomplete="tel"
                            required
                        >
                    </div>

                    @error('no_telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>

                    <div class="field">
                        <i class="bi bi-geo-alt icon"></i>
                        <input
                            type="text"
                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir"
                            name="tempat_lahir"
                            placeholder="Kota tempat lahir"
                            value="{{ old('tempat_lahir') }}"
                            maxlength="100"
                            required
                        >
                    </div>

                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>

                    <div class="field">
                        <i class="bi bi-calendar icon"></i>
                        <input
                            type="date"
                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            max="{{ date('Y-m-d') }}"
                            required
                        >
                    </div>

                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="skema_id" class="form-label">Skema Sertifikasi</label>

                    <div class="field">
                        <select
                            class="form-select @error('skema_id') is-invalid @enderror"
                            id="skema_id"
                            name="skema_id"
                            required
                        >
                            <option value="">Pilih skema sertifikasi</option>

                            @foreach ($skemas as $skema)
                                <option
                                    value="{{ $skema->id }}"
                                    {{ old('skema_id') == $skema->id ? 'selected' : '' }}
                                >
                                    {{ $skema->nama_skema }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('skema_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 full-width">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>

                    <div class="field">
                        <textarea
                            class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat"
                            name="alamat"
                            rows="3"
                            maxlength="2000"
                            placeholder="Masukkan alamat lengkap"
                            autocomplete="street-address"
                            required
                        >{{ old('alamat') }}</textarea>
                    </div>

                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- Tombol Daftar --}}
            <button type="submit" class="btn btn-primary btn-register w-100">
                Daftar Sekarang
            </button>

            <p class="text-center mt-4 mb-0 small">
                Sudah punya akun?
                <a href="{{ route('welcome') }}" class="login-link">Login di sini</a>
            </p>

        </form>
    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            passwordIcon.classList.toggle('bi-eye', !isPassword);
            passwordIcon.classList.toggle('bi-eye-slash', isPassword);

            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Sembunyikan password' : 'Tampilkan password'
            );
        });
    </script>

</body>
</html>