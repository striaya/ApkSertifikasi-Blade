<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikasi Kompetensi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --background: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background: #fff;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--border);
            padding: 16px 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.2rem;
            color: var(--text-dark);
            letter-spacing: -.5px;
        }

        .navbar-brand span {
            color: var(--primary);
        }

        .navbar .nav-link {
            color: var(--text-muted);
            font-size: .9rem;
            font-weight: 500;
            margin: 0 10px;
        }

        .navbar .nav-link:hover {
            color: var(--primary);
        }

        .btn {
            font-size: .9rem;
            font-weight: 600;
            padding: 10px 18px;
            border-radius: 8px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .hero {
            padding: 100px 0 90px;
            background: linear-gradient(180deg, #eff6ff 0%, #ffffff 100%);
        }

        .hero-label {
            display: inline-block;
            background: #dbeafe;
            color: var(--primary-dark);
            padding: 8px 14px;
            border-radius: 50px;
            font-size: .8rem;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.8rem);
            line-height: 1.15;
            letter-spacing: -2px;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero p {
            max-width: 560px;
            color: var(--text-muted);
            font-size: 1rem;
            line-height: 1.9;
            margin-bottom: 30px;
        }

        .hero-illustration {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .06);
        }

        .hero-illustration-icon {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            background: #dbeafe;
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 24px;
        }

        .hero-illustration h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .hero-illustration p {
            font-size: .9rem;
            margin-bottom: 0;
        }

        .section {
            padding: 85px 0;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            font-weight: 800;
            letter-spacing: -1px;
            text-align: center;
            margin-bottom: 14px;
        }

        .section-description {
            max-width: 600px;
            margin: 0 auto 45px;
            text-align: center;
            color: var(--text-muted);
            line-height: 1.8;
            font-size: .95rem;
        }

        .feature-card {
            height: 100%;
            padding: 28px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
            transition: .2s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, .06);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dbeafe;
            color: var(--primary);
            border-radius: 12px;
            font-size: 1.4rem;
            margin-bottom: 22px;
        }

        .feature-card h3 {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--text-muted);
            font-size: .9rem;
            line-height: 1.8;
            margin-bottom: 0;
        }

        .workflow-section {
            background: var(--background);
        }

        .workflow-card {
            height: 100%;
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fff;
        }

        .workflow-number {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .workflow-card h3 {
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .workflow-card p {
            color: var(--text-muted);
            font-size: .9rem;
            line-height: 1.8;
            margin-bottom: 0;
        }

        footer {
            padding: 25px 0;
            border-top: 1px solid var(--border);
            color: var(--text-muted);
            font-size: .85rem;
            text-align: center;
        }

        /* LOGIN NOTIFICATION */
        #loginModal {
            overflow-y: auto;
        }

        #loginModal .modal-dialog {
            width: calc(100% - 32px);
            max-width: 760px;
            margin: 16px auto auto;
            transform: translateY(-15px);
            transition: transform .25s ease-out;
        }

        #loginModal.show .modal-dialog {
            transform: translateY(0);
        }

        #loginModal .modal-content {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 10px 35px rgba(15, 23, 42, .15);
        }

        #loginModal .modal-body {
            padding: 22px 24px;
        }

        .login-notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .login-notification-title {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .login-close {
            border: 0;
            background: transparent;
            font-size: 22px;
            color: #64748b;
            padding: 0 4px;
            line-height: 1;
        }

        .login-fields {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            align-items: end;
            gap: 12px;
        }

        .login-fields label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        #loginModal .form-control {
            height: 40px;
            font-size: 13px;
            border-radius: 5px;
            border-color: #cbd5e1;
            box-shadow: none;
        }

        #loginModal .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, .1);
        }

        .login-enter {
            height: 40px;
            min-width: 100px;
            padding: 8px 18px;
            border-radius: 5px;
        }

        .login-notification-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
            font-size: 12px;
            color: var(--text-muted);
        }

        .login-notification-footer a {
            color: var(--primary);
            font-weight: 700;
        }

        #loginModal .alert {
            font-size: 12px;
            padding: 9px 12px;
            margin-bottom: 14px;
        }

        .modal-backdrop.show {
            opacity: .15;
        }

        @media (max-width: 600px) {
            #loginModal .modal-body {
                padding: 18px;
            }

            .login-fields {
                grid-template-columns: 1fr;
            }

            .login-enter {
                width: 100%;
            }

            .login-notification-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero {
                padding: 65px 0;
            }

            .hero h1 {
                letter-spacing: -1px;
            }

            .hero-illustration {
                margin-top: 35px;
            }

            .section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-guest">
    <div class="container py-2">

        <a href="{{ auth()->check() && auth()->user()->role === 'admin' ? route('dashboard') : (auth()->check() ? route('user.dashboard') : route('welcome')) }}"
            class="d-flex align-items-center gap-2 text-decoration-none text-dark">
            <span class="fw-bold">Data Peserta Sertifikasi</span>
        </a>

        <div class="d-flex align-items-center gap-2">
            @auth
                <span class="text-secondary small d-none d-md-inline">
                    {{ auth()->user()->name }}
                </span>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">
                        Dashboard
                    </a>
                @elseif (auth()->user()->role === 'user')
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                        Dashboard
                    </a>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf

                    <button type="submit" class="btn btn-outline-danger">
                        Logout
                    </button>
                </form>
            @else
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    Login
                </button>

                <a href="{{ route('register') }}" class="btn btn-outline-primary">
                    Register
                </a>
            @endauth
        </div>

    </div>
</nav>

    <section class="section" id="fitur">
        <div class="container">
            <h2 class="section-title">Fitur Utama</h2>

            <p class="section-description">
                Fitur yang dirancang untuk membantu pengelolaan data sertifikasi
                kompetensi menjadi lebih mudah dan terorganisir.
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>Data Peserta</h3>
                        <p>
                            Kelola informasi peserta sertifikasi dengan data
                            yang tersimpan secara terstruktur dan mudah ditemukan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-journal-check"></i>
                        </div>
                        <h3>Data Skema Sertifikasi</h3>
                        <p>
                            Kelola skema sertifikasi untuk mendukung pendataan
                            dan pengelolaan peserta sesuai kebutuhan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        <h3>Akses Berdasarkan Role</h3>
                        <p>
                            Hak akses admin dan peserta dibedakan agar setiap
                            pengguna dapat mengakses fitur sesuai perannya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section workflow-section" id="alur">
        <div class="container">
            <h2 class="section-title">Cara Menggunakan</h2>

            <p class="section-description">
                Ikuti langkah sederhana untuk mulai menggunakan sistem
                informasi sertifikasi kompetensi.
            </p>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="workflow-card">
                        <div class="workflow-number">1</div>
                        <h3>Login atau Register</h3>
                        <p>
                            Masuk menggunakan akun yang sudah tersedia atau
                            buat akun baru melalui halaman pendaftaran.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="workflow-card">
                        <div class="workflow-number">2</div>
                        <h3>Akses Dashboard</h3>
                        <p>
                            Setelah berhasil masuk, pengguna diarahkan ke
                            dashboard sesuai dengan hak aksesnya.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="workflow-card">
                        <div class="workflow-number">3</div>
                        <h3>Kelola Informasi</h3>
                        <p>
                            Gunakan fitur yang tersedia untuk mengakses
                            atau mengelola informasi sertifikasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @guest
        <div
            class="modal fade"
            id="loginModal"
            tabindex="-1"
            aria-labelledby="loginModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        <div class="login-notification-header">
                            <h5 class="login-notification-title" id="loginModalLabel">
                                Login
                            </h5>

                            <button
                                type="button"
                                class="login-close"
                                data-bs-dismiss="modal"
                                aria-label="Tutup"
                            >
                                &times;
                            </button>
                        </div>

                        <form method="POST" action="{{ route('login.process') }}">
                            @csrf

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->has('username') || $errors->has('password'))
                                <div class="alert alert-danger">
                                    Username atau password salah.
                                </div>
                            @endif

                            <div class="login-fields">
                                <div>
                                    <label for="login_username">Username</label>
                                    <input
                                        type="text"
                                        name="username"
                                        id="login_username"
                                        class="form-control"
                                        placeholder="Masukkan username"
                                        value="{{ old('username') }}"
                                        autocomplete="username"
                                        required
                                    >
                                </div>

                                <div>
                                    <label for="login_password">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="login_password"
                                        class="form-control"
                                        placeholder="Masukkan password"
                                        autocomplete="current-password"
                                        required
                                    >
                                </div>

                                <button type="submit" class="btn btn-primary login-enter">
                                    Enter
                                </button>
                            </div>
                            <div class="login-notification-footer">
                                <span>Belum punya akun?</span>
                                <a href="{{ route('register') }}">Register sekarang</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endguest

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @if ($errors->has('username') || $errors->has('password'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const loginModalElement = document.getElementById('loginModal');

                if (loginModalElement) {
                    const loginModal = new bootstrap.Modal(loginModalElement);
                    loginModal.show();
                }
            });
        </script>
    @endif

</body>
</html>