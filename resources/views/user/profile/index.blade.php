@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
<style>
    /* ===== PROFIL PESERTA ===== */
    .user-profile .page-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .user-profile .page-title {
        margin: 0;
        font-size: 1.65rem;
        font-weight: 700;
        color: #212529;
    }

    .user-profile .page-sub {
        margin: 0.4rem 0 0;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .user-profile .card-plain {
        overflow: hidden;
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .user-profile .card-head {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.1rem 1.4rem;
        border-bottom: 1px solid #e9ecef;
        color: #212529;
        font-size: 1rem;
        font-weight: 600;
    }

    .user-profile .profile-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        border-radius: 50%;
        background: #eaf2ff;
        color: #0d6efd;
        font-size: 1.6rem;
        font-weight: 700;
    }

    .user-profile .profile-name {
        margin: 0 0 0.25rem;
        color: #212529;
        font-size: 1.2rem;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .user-profile .profile-email {
        color: #6c757d;
        font-size: 0.9rem;
        overflow-wrap: anywhere;
    }

    .user-profile .profile-details {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.25rem;
    }

    .user-profile .profile-field {
        padding: 1rem;
        background: #f8f9fa;
        border: 1px solid #edf0f2;
        border-radius: 10px;
        min-width: 0;
    }

    .user-profile .profile-label {
        display: block;
        margin-bottom: 0.45rem;
        color: #6c757d;
        font-size: 0.82rem;
    }

    .user-profile .profile-value {
        margin: 0;
        color: #212529;
        font-size: 0.95rem;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .user-profile .profile-role {
        display: inline-block;
        padding: 0.35rem 0.7rem;
        border-radius: 6px;
        background: #eaf2ff;
        color: #2459a9;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .user-profile .profile-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        padding-top: 1.25rem;
        margin-top: 1.25rem;
        border-top: 1px solid #e9ecef;
    }

    .user-profile .btn {
        border-radius: 8px;
    }

    .user-profile .alert {
        border-radius: 10px;
    }

    @media (max-width: 575.98px) {
        .user-profile .page-head {
            align-items: flex-start;
        }

        .user-profile .page-title {
            font-size: 1.4rem;
        }

        .user-profile .profile-details {
            grid-template-columns: 1fr;
            gap: 0.85rem;
        }

        .user-profile .profile-actions .btn {
            width: 100%;
        }
    }
</style>

<div class="user-profile">

    <div class="page-head">
        <div>
            <h1 class="page-title">Profil Saya</h1>
            <p class="page-sub">Informasi akun kamu</p>
        </div>

        <a href="{{ route('user.dashboard') }}"
           class="btn btn-ghost">
            {{-- <i class="bi bi-arrow-left me-1"></i> --}}
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <div class="fw-semibold mb-2">
                <i class="bi bi-exclamation-circle me-1"></i>
                Ada data yang perlu diperiksa:
            </div>

            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-plain">

        <div class="card-head">
            Informasi Akun
        </div>

        <div class="p-4">

            <div class="d-flex align-items-center gap-3 mb-4">
                <div class="profile-avatar">
                    {{ mb_strtoupper(mb_substr($user->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <h2 class="profile-name">
                        {{ $user->name }}
                    </h2>

                    <div class="profile-email">
                        {{ $user->email }}
                    </div>
                </div>
            </div>

            <hr class="mb-4">

            <div class="profile-details">

                <div class="profile-field">
                    <span class="profile-label">
                        <i class="bi bi-person me-1"></i>
                        Nama Lengkap
                    </span>

                    <p class="profile-value">
                        {{ $user->name }}
                    </p>
                </div>

                <div class="profile-field">
                    <span class="profile-label">
                        <i class="bi bi-at me-1"></i>
                        Username
                    </span>

                    <p class="profile-value">
                        {{ $user->username }}
                    </p>
                </div>

                <div class="profile-field">
                    <span class="profile-label">
                        <i class="bi bi-envelope me-1"></i>
                        Email
                    </span>

                    <p class="profile-value">
                        {{ $user->email }}
                    </p>
                </div>

                <div class="profile-field">
                    <span class="profile-label">
                        <i class="bi bi-shield-check me-1"></i>
                        Role Akun
                    </span>

                    <p class="profile-value">
                        <span class="profile-role">
                            {{ ucfirst($user->role) }}
                        </span>
                    </p>
                </div>

            </div>

            <div class="profile-actions">
                <a href="{{ route('user.profile.edit') }}"
                   class="btn btn-primary">
                    {{-- <i class="bi bi-pencil-square me-1"></i> --}}
                    Edit Profil
                </a>

                <a href="{{ route('user.profile.password') }}"
                   class="btn btn-ghost">
                    {{-- <i class="bi bi-key me-1"></i> --}}
                    Ubah Password
                </a>
            </div>

        </div>
    </div>

</div>
@endsection