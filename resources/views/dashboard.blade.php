@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-sub">{{ now()->translatedFormat('l, d F Y') }}</p>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card-plain stat-card">
            <span class="stat-icon"><i class="bi bi-people"></i></span>
            <div>
                <div class="stat-label">Total Peserta</div>
                <div class="stat-number">{{ $totalPeserta }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-plain stat-card">
            <span class="stat-icon"><i class="bi bi-award"></i></span>
            <div>
                <div class="stat-label">Total Skema</div>
                <div class="stat-number">{{ $totalSkema }}</div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-plain p-3 h-100 d-flex flex-column justify-content-center gap-2">
            <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i> Tambah Peserta
            </a>
            <a href="{{ route('skema.create') }}" class="btn btn-ghost">
                <i class="bi bi-plus-circle me-1"></i> Tambah Skema
            </a>
        </div>
    </div>
</div>

<div class="card-plain">
    <div class="card-head d-flex justify-content-between align-items-center">
        <span>Peserta Terbaru</span>
        <a href="{{ route('peserta.index') }}" class="small text-decoration-none">Lihat semua</a>
    </div>

    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
                <tr>
                    <th>Peserta</th>
                    <th>No. Peserta</th>
                    <th>Skema</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($pesertaTerbaru as $p)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar">{{ mb_strtoupper(mb_substr($p->nama, 0, 1)) }}</span>
                            <div class="lh-sm">
                                <div class="fw-semibold">{{ $p->nama }}</div>
                                <small class="text-muted">{{ $p->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td>{{ $p->no_peserta }}</td>
                    <td><span class="badge-skema">{{ $p->skema->nama_skema }}</span></td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            Belum ada data peserta.
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection