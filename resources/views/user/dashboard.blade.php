@extends('layouts.user')

@section('title', 'Dashboard Peserta')

@section('content')
<div class="user-dashboard">

    <div class="page-head">
        <div>
            <h1 class="page-title">
                Selamat datang, {{ $user->name }}!
            </h1>

            <p class="page-sub">
                {{ now()->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card-plain p-4 h-100">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-person-circle fs-2 text-primary"></i>

                    <div>
                        <p class="text-muted mb-1">Akun Peserta</p>
                        <h5 class="mb-0">{{ $user->name }}</h5>
                        <small>{{ $user->email }}</small>
                    </div>
                </div>

                <a href="{{ route('user.profile') }}"
                    class="btn btn-outline-primary mt-4">
                    Lihat Profil
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-plain p-4 h-100">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-award fs-2 text-primary"></i>

                    <div>
                        <p class="text-muted mb-1">
                            Status Pendaftaran
                        </p>

                        @if ($peserta)
                            <h5 class="mb-0">
                                {{ $peserta->status ?? 'Menunggu Verifikasi' }}
                            </h5>
                        @else
                            <h5 class="mb-0">Data belum terhubung</h5>
                        @endif
                    </div>
                </div>

                <a href="{{ route('user.riwayat') }}"
                    class="btn btn-outline-primary mt-4">
                    Lihat Riwayat
                </a>
            </div>
        </div>
    </div>

    <div class="card-plain p-4">
        <h5 class="mb-3">Informasi Sertifikasi</h5>

        @if ($peserta)
            <div class="row g-3">
                <div class="col-md-6">
                    <small class="text-muted">Nomor Peserta</small>
                    <p class="fw-semibold mb-0">
                        {{ $peserta->no_peserta ?? '-' }}
                    </p>
                </div>

                <div class="col-md-6">
                    <small class="text-muted">Skema Sertifikasi</small>
                    <p class="fw-semibold mb-0">
                        {{ $peserta->skema->nama_skema ?? '-' }}
                    </p>
                </div>
            </div>
        @else
            <p class="text-muted mb-0">
                Data pendaftaran belum terhubung ke akun ini.
            </p>
        @endif
    </div>

</div>
@endsection