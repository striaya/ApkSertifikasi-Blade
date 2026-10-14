@extends('layouts.app')

@section('title', 'Manajemen Akun')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Manajemen Akun</h1>
        <p class="page-sub">Kelola akun pengguna dan hak akses sistem.</p>
    </div>

    <a href="{{ route('akun.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Tambah Akun
    </a>
</div>
{{-- 
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif --}}

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif

<div class="card-plain">
    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
                <tr>
                    <th style="width: 60px;">#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($akun as $a)
                    <tr>
                        <td class="text-muted">
                            {{ $akun->firstItem() + $loop->index }}
                        </td>

                        <td class="fw-semibold">
                            {{ $a->name }}
                        </td>

                        <td>
                            {{ $a->username }}
                        </td>

                        <td class="text-muted">
                            {{ $a->email }}
                        </td>

                        <td>
                            @if ($a->role === 'admin')
                                <span class="badge bg-primary">Admin</span>
                            @else
                                <span class="badge bg-secondary">User</span>
                            @endif
                        </td>

                        <td class="text-end text-nowrap">
                            <a href="{{ route('akun.edit', $a) }}"
                                class="btn-icon"
                                title="Ubah akun">
                                <i class="bi bi-pencil"></i>
                            </a>

                            @if ($a->id !== auth()->id())
                                <form action="{{ route('akun.destroy', $a) }}"
                                    method="POST"
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus akun {{ addslashes($a->username) }}?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn-icon danger"
                                        title="Hapus akun">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="bi bi-people"></i>
                                Belum ada akun yang terdaftar.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($akun->hasPages())
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 p-3">
            <div class="text-muted small">
                Menampilkan {{ $akun->firstItem() }}–{{ $akun->lastItem() }}
                dari {{ $akun->total() }} akun
            </div>

            {{ $akun->links() }}
        </div>
    @endif
</div>
@endsection