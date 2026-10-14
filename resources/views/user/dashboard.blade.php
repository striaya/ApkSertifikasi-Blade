@extends('layouts.user')

@section('title', 'Dashboard Peserta')

@section('content')

@if (session('login_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('login_success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Tutup"
        ></button>
    </div>
@endif

<style>
    .user-dashboard .page-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.5rem;
    }

    .user-dashboard .page-title {
        margin: 0;
        font-size: 1.65rem;
        font-weight: 700;
        color: #212529;
    }

    .user-dashboard .page-sub {
        margin: 0.4rem 0 0;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .user-dashboard .stat-card {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        min-height: 120px;
        height: 100%;
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .user-dashboard .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 16px rgba(0, 0, 0, 0.07);
    }

    .user-dashboard .stat-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 52px;
        height: 52px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 1.6rem;
    }

    .user-dashboard .stat-label {
        margin-bottom: 0.35rem;
        color: #6c757d;
        font-size: 0.85rem;
    }

    .user-dashboard .stat-number {
        color: #212529;
        font-size: 1.25rem;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .user-dashboard .stat-card .btn {
        white-space: nowrap;
    }

    .user-dashboard .card-plain {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .user-dashboard .card-head {
        padding: 1rem 1.25rem;
        border-bottom: 1px solid #e9ecef;
        color: #212529;
        font-size: 1rem;
        font-weight: 600;
    }

    .user-dashboard .table-modern {
        width: 100%;
        margin-bottom: 0;
        vertical-align: middle;
    }

    .user-dashboard .table-modern thead th {
        padding: 0.95rem 1.25rem;
        background: #f8f9fa;
        color: #6c757d;
        font-size: 0.78rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.035em;
        white-space: nowrap;
        border-bottom: 1px solid #e9ecef;
    }

    .user-dashboard .table-modern tbody td {
        padding: 1rem 1.25rem;
        border-color: #f0f1f3;
        font-size: 0.9rem;
    }

    .user-dashboard .table-modern tbody tr:last-child td {
        border-bottom: 0;
    }

    .user-dashboard .table-modern tbody tr:hover {
        background: #fafbfc;
    }

    .user-dashboard .avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0d6efd;
        font-weight: 700;
    }

    .user-dashboard .badge-skema {
        display: inline-block;
        padding: 0.4rem 0.65rem;
        border-radius: 6px;
        background: #edf4ff;
        color: #2459a9;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .user-dashboard .status-badge {
        display: inline-block;
        padding: 0.4rem 0.65rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .user-dashboard .status-menunggu {
        color: #664d03;
        background: #fff3cd;
    }

    .user-dashboard .status-terverifikasi {
        color: #0f5132;
        background: #d1e7dd;
    }

    .user-dashboard .status-ditolak {
        color: #842029;
        background: #f8d7da;
    }

    .user-dashboard .status-lainnya {
        color: #41464b;
        background: #e2e3e5;
    }

    .user-dashboard .empty-state {
        padding: 2rem 1rem;
        text-align: center;
        color: #6c757d;
    }

    .user-dashboard .empty-state i {
        display: block;
        margin-bottom: 0.6rem;
        font-size: 2rem;
        color: #adb5bd;
    }

    .user-dashboard .dashboard-link {
        color: #0d6efd;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
    }

    .user-dashboard .dashboard-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 767.98px) {
        .user-dashboard .page-title {
            font-size: 1.4rem;
        }

        .user-dashboard .stat-card {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .user-dashboard .stat-card .stat-action {
            width: 100%;
            margin-left: 0 !important;
        }

        .user-dashboard .table-modern thead th,
        .user-dashboard .table-modern tbody td {
            padding: 0.8rem;
        }
    }
</style>

<div class="user-dashboard">

    <div class="page-head">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-sub">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>

    <div class="row g-3 mb-4">

        <div class="col-md-6">
            <div class="card-plain stat-card">
                <div class="flex-grow-1">
                    <div class="stat-label">Akun Peserta</div>

                    <div class="stat-number">
                        {{ $user->name }}
                    </div>

                    <small class="text-muted">
                        {{ $user->email }}
                    </small>
                </div>

                <div class="stat-action ms-auto">
                    <a href="{{ route('user.profile') }}"
                       class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-person me-1"></i>
                        Lihat Profil
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-plain stat-card">
                <div class="flex-grow-1">
                    <div class="stat-label">Status Pendaftaran</div>

                    @if ($peserta)
                        @php
                            $status = $peserta->status
                                ?? 'menunggu_verifikasi';

                            $statusLabels = [
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'terverifikasi' => 'Terverifikasi',
                                'ditolak' => 'Ditolak',
                            ];
                        @endphp

                        <div class="stat-number">
                            {{ $statusLabels[$status] ?? $status }}
                        </div>
                    @else
                        <div class="stat-number">
                            Belum Terdaftar
                        </div>
                    @endif

                    <a href="{{ route('user.riwayat') }}"
                       class="dashboard-link">
                        Lihat Riwayat
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="card-plain">

        <div class="card-head d-flex justify-content-between align-items-center">
            <span>
                <i class="bi bi-people me-2"></i>
                Informasi Sertifikasi
            </span>

            <a href="{{ route('user.riwayat') }}"
               class="dashboard-link">
                Lihat semua
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Peserta</th>
                        <th>No. Peserta</th>
                        <th>Skema Sertifikasi</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($peserta)
                        @php
                            $status = $peserta->status
                                ?? 'menunggu_verifikasi';

                            $statusLabels = [
                                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                                'terverifikasi' => 'Terverifikasi',
                                'ditolak' => 'Ditolak',
                            ];

                            $statusClasses = [
                                'menunggu_verifikasi' => 'status-menunggu',
                                'terverifikasi' => 'status-terverifikasi',
                                'ditolak' => 'status-ditolak',
                            ];
                        @endphp

                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="avatar">
                                        {{ mb_strtoupper(mb_substr($peserta->nama, 0, 1)) }}
                                    </span>

                                    <div class="lh-sm">
                                        <div class="fw-semibold">
                                            {{ $peserta->nama }}
                                        </div>

                                        <small class="text-muted">
                                            {{ $peserta->email }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                {{ $peserta->no_peserta ?? '-' }}
                            </td>

                            <td>
                                <span class="badge-skema">
                                    {{ $peserta->skema->nama_skema ?? '-' }}
                                </span>
                            </td>

                            <td>
                                <span class="status-badge {{ $statusClasses[$status] ?? 'status-lainnya' }}">
                                    {{ $statusLabels[$status] ?? $status }}
                                </span>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="4">
                                <div class="empty-state">
                                    <i class="bi bi-inbox"></i>

                                    <div class="fw-semibold mb-1">
                                        Belum ada data pendaftaran
                                    </div>

                                    <small>
                                        Data sertifikasi belum terhubung
                                        dengan akun ini.
                                    </small>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection