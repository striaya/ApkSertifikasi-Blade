
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Beranda') · Data Peserta Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .navbar-guest {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: #dbeafe;
            color: #2563eb;
            font-size: 1.25rem;
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

        .stat-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 1.4rem;
        }

        .stat-label {
            color: #64748b;
            font-size: .875rem;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
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
            <a href="{{ route('welcome') }}"
                class="d-flex align-items-center gap-2 text-decoration-none text-dark">
          
                <span class="fw-bold">Data Peserta Sertifikasi</span>
            </a>

            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Login Admin
            </a>
        </div>
    </nav>

    <main class="container py-4 py-md-5">
        @yield('content')
    </main>

    <footer class="welcome-footer py-4 mt-3">
        <div class="container text-center small">
            &copy; {{ date('Y') }} Data Peserta Sertifikasi
        </div>
    </footer>
</body>

</html>
