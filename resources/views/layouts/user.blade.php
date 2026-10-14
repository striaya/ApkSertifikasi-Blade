<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Peserta') · Data Peserta Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .page-title {
            font-size: 1.65rem;
            font-weight: 700;
        }

        .page-sub {
            color: #64748b;
            margin-bottom: 0;
        }

        .card-plain {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .035);
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .user-main {
            flex: 1;
            width: 100%;
        }

        .user-dashboard {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .user-dashboard .page-head {
            margin-bottom: 24px;
        }

        .welcome-footer {
            border-top: 1px solid #e5e7eb;
            color: #64748b;
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

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf

                        <button type="submit" class="btn btn-outline-danger">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Login
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    <main class="container py-4 py-md-5 user-main">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
