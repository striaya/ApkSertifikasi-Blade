@extends('layouts.app')

@section('title', 'Data Peserta')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Data Peserta</h1>
        <p class="page-sub">Kelola data peserta sertifikasi.</p>
    </div>
    <a href="{{ route('peserta.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Peserta
    </a>
</div>

<form method="GET" action="{{ route('peserta.index') }}" class="d-flex gap-2 mb-3">
    <div class="search-box flex-grow-1">
        <i class="bi bi-search"></i>
        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
               placeholder="Pencarian">
    </div>
    <button type="submit" class="btn btn-primary">Cari</button>
    @if (request('search'))
        <a href="{{ route('peserta.index') }}" class="btn btn-ghost">Reset</a>
    @endif
</form>

<div class="card-plain">
    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
                <tr>
                    <th style="width:60px">#</th>
                    <th>Peserta</th>
                    <th>No. Peserta</th>
                    <th>Skema</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($pesertas as $p)
                <tr>
                    <td class="text-muted">{{ $pesertas->firstItem() + $loop->index }}</td>
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
                    <td class="text-end text-nowrap">
                        <a href="{{ route('peserta.show', $p) }}" class="btn-icon" title="Detail">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('peserta.edit', $p) }}" class="btn-icon" title="Ubah">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('peserta.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus data {{ addslashes($p->nama) }}?')">
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
                    <td colspan="5">
                        <div class="empty-state">
                            <i class="bi bi-search"></i>
                            @if (request('search'))
                                Tidak ada hasil untuk "<strong>{{ request('search') }}</strong>".
                            @else
                                Belum ada data peserta.
                            @endif
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-3 border-top">
        {{-- <small class="text-muted">
            Menampilkan {{ $pesertas->firstItem() ?? 0 }}–{{ $pesertas->lastItem() ?? 0 }}
            dari {{ $pesertas->total() }} data
        </small> --}}
        {{ $pesertas->links() }}
    </div>
</div>
@endsection