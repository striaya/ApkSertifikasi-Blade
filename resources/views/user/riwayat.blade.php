@extends('layouts.user')

@section('title', 'Riwayat Pendaftaran')

@section('content')
    <div class="user-dashboard riwayat-page">

        <style>
            .riwayat-page {
                --riwayat-primary: #2563eb;
                --riwayat-muted: #64748b;
                --riwayat-border: #e2e8f0;
            }

            .riwayat-page .page-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 16px;
                margin-bottom: 26px;
            }

            .riwayat-page .page-title {
                font-size: 1.65rem;
                font-weight: 750;
                letter-spacing: -.5px;
                margin-bottom: 8px;
            }

            .riwayat-page .page-sub {
                color: var(--riwayat-muted);
                margin-bottom: 0;
                font-size: .92rem;
            }

            .riwayat-page .riwayat-summary {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 18px;
                margin-bottom: 24px;
            }

            .riwayat-page .summary-card {
                display: flex;
                align-items: center;
                gap: 16px;
                min-width: 0;
                padding: 22px;
                background: #fff;
                border: 1px solid var(--riwayat-border);
                border-radius: 14px;
                box-shadow: 0 3px 12px rgba(15, 23, 42, .025);
            }

            .riwayat-page .summary-icon {
                width: 48px;
                height: 48px;
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 12px;
                background: #eff6ff;
                color: var(--riwayat-primary);
                font-size: 1.35rem;
            }

            .riwayat-page .summary-label {
                color: var(--riwayat-muted);
                font-size: .82rem;
                margin-bottom: 6px;
            }

            .riwayat-page .summary-value {
                font-size: 1rem;
                font-weight: 700;
                overflow-wrap: anywhere;
                margin: 0;
            }

            .riwayat-page .card-plain {
                overflow: hidden;
                background: #fff;
                border: 1px solid var(--riwayat-border);
                border-radius: 14px;
                box-shadow: 0 3px 12px rgba(15, 23, 42, .025);
            }

            .riwayat-page .riwayat-card-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
                padding: 22px 24px;
                border-bottom: 1px solid var(--riwayat-border);
            }

            .riwayat-page .riwayat-card-title {
                font-size: 1rem;
                font-weight: 700;
                margin: 0 0 5px;
            }

            .riwayat-page .riwayat-card-subtitle {
                font-size: .83rem;
                color: var(--riwayat-muted);
                margin: 0;
            }

            .riwayat-page .table-responsive {
                width: 100%;
            }

            .riwayat-page .table-modern {
                width: 100%;
                margin: 0;
                vertical-align: middle;
            }

            .riwayat-page .table-modern thead th {
                padding: 15px 20px;
                background: #f8fafc;
                color: #64748b;
                font-size: .75rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .45px;
                white-space: nowrap;
                border-bottom: 1px solid var(--riwayat-border);
            }

            .riwayat-page .table-modern tbody td {
                padding: 19px 20px;
                font-size: .88rem;
                border-bottom: 1px solid #f1f5f9;
            }

            .riwayat-page .table-modern tbody tr:last-child td {
                border-bottom: 0;
            }

            .riwayat-page .table-modern tbody tr:hover {
                background: #fafcff;
            }

            .riwayat-page .peserta-number {
                display: inline-flex;
                align-items: center;
                padding: 7px 10px;
                border-radius: 7px;
                background: #eff6ff;
                color: #1d4ed8;
                font-size: .8rem;
                font-weight: 700;
                white-space: nowrap;
            }

            .riwayat-page .peserta-name {
                font-weight: 650;
                color: #0f172a;
            }

            .riwayat-page .skema-name {
                font-weight: 600;
                color: #334155;
                min-width: 160px;
            }

            .riwayat-page .status-badge {
                display: inline-flex;
                align-items: center;
                gap: 7px;
                padding: 7px 11px;
                border-radius: 20px;
                font-size: .76rem;
                font-weight: 650;
                white-space: nowrap;
            }

            .riwayat-page .status-waiting {
                background: #fef3c7;
                color: #92400e;
            }

            .riwayat-page .status-approved {
                background: #d1fae5;
                color: #065f46;
            }

            .riwayat-page .status-rejected {
                background: #fee2e2;
                color: #991b1b;
            }

            .riwayat-page .empty-state {
                padding: 54px 20px;
                text-align: center;
                color: var(--riwayat-muted);
            }

            .riwayat-page .empty-state i {
                display: block;
                font-size: 2.4rem;
                color: #94a3b8;
                margin-bottom: 14px;
            }

            .riwayat-page .empty-title {
                color: #334155;
                font-weight: 700;
                margin-bottom: 7px;
            }

            .riwayat-page .empty-description {
                max-width: 390px;
                margin: 0 auto;
                font-size: .87rem;
                line-height: 1.7;
            }

            @media (max-width: 768px) {
                .riwayat-page .riwayat-summary {
                    grid-template-columns: 1fr;
                    gap: 12px;
                }

                .riwayat-page .page-title {
                    font-size: 1.4rem;
                }

                .riwayat-page .riwayat-card-head {
                    padding: 18px;
                }
            }
        </style>

        @php
            $status = $peserta->status ?? 'menunggu_verifikasi';

            $statusLabels = [
                'menunggu_verifikasi' => 'Menunggu Verifikasi',
                'terverifikasi' => 'Terverifikasi',
                'ditolak' => 'Ditolak',
            ];

            $statusClasses = [
                'menunggu_verifikasi' => 'status-waiting',
                'terverifikasi' => 'status-approved',
                'ditolak' => 'status-rejected',
            ];

            $statusIcons = [
                'menunggu_verifikasi' => 'bi-clock-history',
                'terverifikasi' => 'bi-check-circle-fill',
                'ditolak' => 'bi-x-circle-fill',
            ];
        @endphp

        <div class="page-head">
            <div>
                <h1 class="page-title">Riwayat Pendaftaran</h1>
                <p class="page-sub">
                    Pantau informasi dan status pendaftaran sertifikasi kamu.
                </p>
            </div>

            <a href="{{ route('user.dashboard') }}" class="btn btn-ghost">
                {{-- <i class="bi bi-arrow-left me-1"></i> --}}
                Kembali
            </a>
        </div>

        <div class="riwayat-summary">
            <div class="summary-card">
                <i class="bi bi-person-vcard"></i>

                <div class="min-w-0">
                    <div class="summary-label">Nomor Peserta</div>
                    <p class="summary-value">
                        {{ $peserta->no_peserta ?? 'Belum tersedia' }}
                    </p>
                </div>
            </div>

            <div class="summary-card">
                <i class="bi bi-clipboard-check"></i>

                <div class="min-w-0">
                    <div class="summary-label">Status Pendaftaran</div>
                    <p class="summary-value">
                        @if ($peserta)
                            {{ $statusLabels[$status] ?? $status }}
                        @else
                            Belum Mendaftar
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="card-plain">
            <div class="riwayat-card-head">
                <div>
                    <h2 class="riwayat-card-title">Data Pendaftaran Saya</h2>
                    <p class="riwayat-card-subtitle">
                        Informasi peserta dan hasil verifikasi admin.
                    </p>
                </div>
                {{-- 
            @if ($peserta)
                <span class="status-badge {{ $statusClasses[$status] ?? '' }}">
                    <i class="bi {{ $statusIcons[$status] ?? 'bi-info-circle' }}"></i>
                    {{ $statusLabels[$status] ?? $status }}
                </span>
            @endif --}}
            </div>

            <div class="table-responsive">
                <table class="table table-modern">
                    <thead>
                        <tr>
                            <th>Nomor Peserta</th>
                            <th>Nama Peserta</th>
                            <th>Skema Sertifikasi</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($peserta)
                            <tr>
                                <td>
                                    <span class="peserta-number">
                                        {{ $peserta->no_peserta ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="peserta-name">
                                        {{ $peserta->nama ?? '-' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="skema-name">
                                        {{ $peserta->skema->nama_skema ?? '-' }}
                                    </div>
                                </td>

                                <td>{{ $peserta->email ?? '-' }}</td>

                                <td>
                                    <span class="status-badge {{ $statusClasses[$status] ?? '' }}">
                                        <i class="bi {{ $statusIcons[$status] ?? 'bi-info-circle' }}"></i>
                                        {{ $statusLabels[$status] ?? $status }}
                                    </span>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-clipboard2-x"></i>

                                        <div class="empty-title">
                                            Belum Ada Pendaftaran
                                        </div>

                                        <p class="empty-description">
                                            Data pendaftaran yang terhubung dengan akun
                                            kamu belum tersedia. Silakan hubungi admin
                                            jika kamu sudah melakukan pendaftaran.
                                        </p>
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
