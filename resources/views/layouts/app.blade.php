<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') · Data Peserta Sertifikasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    @if (auth()->check() && auth()->user()->role === 'admin')
        <aside class="sidebar">
            <a href="{{ route('dashboard') }}" class="brand">
                {{-- <span class="brand-mark"><i class="bi bi-patch-check-fill"></i></span> --}}
                <span class="brand-text">Data Peserta<small>Sertifikasi</small></span>
            </a>

            <div class="nav-label">Menu</div>
            <nav class="nav flex-column gap-1">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-grid-1x2"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('peserta.*') ? 'active' : '' }}"
                    href="{{ route('peserta.index') }}">
                    <i class="bi bi-people"></i> Data Peserta
                </a>
                <a class="nav-link {{ request()->routeIs('skema.*') ? 'active' : '' }}"
                    href="{{ route('skema.index') }}">
                    <i class="bi bi-book"></i> Data Skema
                </a>

                <a href="{{ route('akun.index') }}" class="nav-link {{ request()->routeIs('akun.*') ? 'active' : '' }}">
                    <i class="bi bi-person-gear"></i>
                    <span>Manajemen Akun</span>
                </a>
            </nav>

            <div class="sidebar-user">
                <div class="d-flex align-items-center gap-2 mb-3">
                    {{-- <span class="avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span> --}}
                    {{-- <div class="lh-sm">
                <div class="fw-semibold">{{ auth()->user()->name }}</div>
                <small class="text-muted">Administrator</small>
            </div> --}}
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-ghost btn-sm w-100">
                        Keluar
                    </button>
                </form>
            </div>
        </aside>
    @endif

    <main class="content {{ auth()->check() && auth()->user()->role === 'user' ? 'content-full' : '' }}">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
