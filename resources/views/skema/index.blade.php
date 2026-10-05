@extends('layouts.app')

@section('title', 'Data Skema')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Data Skema Sertifikasi</h1>
        <p class="page-sub">Kelola skema yang dapat dipilih oleh peserta.</p>
    </div>
    <a href="{{ route('skema.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Skema
    </a>
</div>

<div class="card-plain">
    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
                <tr>
                    <th style="width:60px">#</th>
                    <th>Kode</th>
                    <th>Nama Skema</th>
                    <th>Deskripsi</th>
                    <th>Peserta</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($skemas as $s)
                <tr>
                    <td class="text-muted">{{ $loop->iteration }}</td>
                    <td><span class="badge-skema">{{ $s->kode_skema }}</span></td>
                    <td class="fw-semibold">{{ $s->nama_skema }}</td>
                    <td class="text-muted">{{ Str::limit($s->deskripsi, 60) ?: '-' }}</td>
                    <td>{{ $s->pesertas_count }} peserta</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('skema.edit', $s) }}" class="btn-icon" title="Ubah">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('skema.destroy', $s) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus skema {{ addslashes($s->nama_skema) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon danger" title="Hapus">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="bi bi-award"></i>
                            Belum ada skema. Tambahkan skema terlebih dahulu.
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection