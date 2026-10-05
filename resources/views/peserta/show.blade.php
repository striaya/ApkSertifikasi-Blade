@extends('layouts.app')

@section('title', 'Detail Peserta')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Detail Peserta</h1>
        <p class="page-sub">Informasi lengkap peserta sertifikasi.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('peserta.index') }}" class="btn btn-ghost">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
        <a href="{{ route('peserta.edit', $peserta) }}" class="btn btn-primary">
            <i class="bi bi-pencil me-1"></i> Ubah
        </a>
    </div>
</div>

<div class="card-plain" style="max-width: 760px;">
    <div class="p-4 d-flex align-items-center gap-3 border-bottom">
        <span class="avatar avatar-lg">{{ mb_strtoupper(mb_substr($peserta->nama, 0, 1)) }}</span>
        <div>
            <h2 class="h5 mb-1">{{ $peserta->nama }}</h2>
            <span class="badge-skema">{{ $peserta->skema->nama_skema }}</span>
        </div>
    </div>

    <div class="p-4">
        <dl class="detail-grid">
            <dt>No. Peserta</dt>
            <dd>{{ $peserta->no_peserta }}</dd>

            <dt>Email</dt>
            <dd>{{ $peserta->email }}</dd>

            <dt>No. Telepon</dt>
            <dd>{{ $peserta->no_telepon ?? '-' }}</dd>

            <dt>Tanggal Lahir</dt>
            <dd>{{ $peserta->tanggal_lahir?->translatedFormat('d F Y') ?? '-' }}</dd>

            <dt>Alamat</dt>
            <dd>{{ $peserta->alamat ?? '-' }}</dd>

            <dt>Skema Sertifikasi</dt>
            <dd>{{ $peserta->skema->kode_skema }} - {{ $peserta->skema->nama_skema }}</dd>

            <dt>Terdaftar pada</dt>
            <dd>{{ $peserta->created_at->translatedFormat('d F Y, H:i') }}</dd>
        </dl>
    </div>
</div>
@endsection