@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Detail Peserta</h1>
        <p class="page-sub">Informasi lengkap peserta sertifikasi.</p>
    </div>

    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('peserta.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>

        <a href="{{ route('peserta.edit', $peserta) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i> Ubah Peserta
        </a>
    </div>
</div>

<style>
    .peserta-detail {
        max-width: 900px;
    }

    .peserta-profile {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 24px;
        border-bottom: 1px solid var(--bs-border-color, #e5e7eb);
    }

    .peserta-profile .avatar {
        flex-shrink: 0;
    }

    .peserta-profile-name {
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .detail-section {
        padding: 24px;
    }

    .detail-section-title {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: minmax(140px, 190px) minmax(0, 1fr);
        gap: 0;
        margin: 0;
    }

    .detail-grid dt,
    .detail-grid dd {
        padding: 13px 0;
        margin: 0;
        border-bottom: 1px solid var(--bs-border-color, #e5e7eb);
        overflow-wrap: anywhere;
    }

    .detail-grid dt {
        color: var(--bs-secondary-color, #6b7280);
        font-weight: 500;
    }

    .detail-grid dd {
        font-weight: 600;
    }

    .detail-grid dt:last-of-type,
    .detail-grid dd:last-of-type {
        border-bottom: 0;
    }

    .status-form {
        background: var(--bs-tertiary-bg, #f8fafc);
        border: 1px solid var(--bs-border-color, #e5e7eb);
        border-radius: 12px;
        padding: 20px;
    }

    .status-current {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: .8rem;
        font-weight: 600;
        margin-bottom: 14px;
    }

    .status-waiting {
        background: #fff3cd;
        color: #856404;
    }

    .status-approved {
        background: #d1e7dd;
        color: #0f5132;
    }

    .status-rejected {
        background: #f8d7da;
        color: #842029;
    }

    @media (max-width: 576px) {
        .peserta-profile,
        .detail-section {
            padding: 18px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-grid dt {
            padding-bottom: 4px;
            border-bottom: 0;
        }

        .detail-grid dd {
            padding-top: 0;
        }
    }
</style>

<div class="card-plain peserta-detail">
    <div class="peserta-profile">
        <span class="avatar avatar-lg">
            {{ mb_strtoupper(mb_substr($peserta->nama ?? 'P', 0, 1)) }}
        </span>

        <div>
            <h2 class="peserta-profile-name">
                {{ $peserta->nama }}
            </h2>

            <span class="badge-skema">
                {{ $peserta->skema->nama_skema ?? 'Skema belum tersedia' }}
            </span>
        </div>
    </div>

    <div class="detail-section">
        <h3 class="detail-section-title">
            {{-- <i class="bi bi-person-vcard me-2"></i> --}}
            Informasi Peserta
        </h3>

        <dl class="detail-grid">
            <dt>Nomor Peserta</dt>
            <dd>{{ $peserta->no_peserta ?? '-' }}</dd>

            <dt>Nama Lengkap</dt>
            <dd>{{ $peserta->nama ?? '-' }}</dd>

            <dt>NIK</dt>
            <dd>{{ $peserta->nik ?? '-' }}</dd>

            <dt>Email</dt>
            <dd>{{ $peserta->email ?? '-' }}</dd>

            <dt>Nomor Telepon</dt>
            <dd>{{ $peserta->no_telepon ?? '-' }}</dd>

            <dt>Tempat Lahir</dt>
            <dd>{{ $peserta->tempat_lahir ?? '-' }}</dd>

            <dt>Tanggal Lahir</dt>
            <dd>
                {{ $peserta->tanggal_lahir?->translatedFormat('d F Y') ?? '-' }}
            </dd>

            <dt>Alamat</dt>
            <dd>{{ $peserta->alamat ?? '-' }}</dd>

            <dt>Skema Sertifikasi</dt>
            <dd>
                {{ $peserta->skema->kode_skema ?? '-' }}
                -
                {{ $peserta->skema->nama_skema ?? '-' }}
            </dd>

            <dt>Tanggal Pendaftaran</dt>
            <dd>
                {{ $peserta->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}
            </dd>
        </dl>
    </div>

    <div class="detail-section border-top">
        <h3 class="detail-section-title">
            <i class="bi bi-clipboard-check me-2"></i>
            Verifikasi Pendaftaran
        </h3>

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
        @endphp

        <div class="status-form">
            <div class="text-muted small mb-2">Status saat ini</div>

            <div>
                <span class="status-current {{ $statusClasses[$status] ?? '' }}">
                    {{ $statusLabels[$status] ?? $status }}
                </span>
            </div>

            <form
                action="{{ route('peserta.status', $peserta) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="status" class="form-label fw-semibold">
                        Ubah Status Pendaftaran
                    </label>

                    <select
                        name="status"
                        id="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required
                    >
                        <option
                            value="menunggu_verifikasi"
                            @selected(old('status', $status) === 'menunggu_verifikasi')
                        >
                            Menunggu Verifikasi
                        </option>

                        <option
                            value="terverifikasi"
                            @selected(old('status', $status) === 'terverifikasi')
                        >
                            Terverifikasi
                        </option>

                        <option
                            value="ditolak"
                            @selected(old('status', $status) === 'ditolak')
                        >
                            Ditolak
                        </option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check2-circle me-1"></i>
                    Simpan Status
                </button>
            </form>
        </div>
    </div>
</div>
@endsection