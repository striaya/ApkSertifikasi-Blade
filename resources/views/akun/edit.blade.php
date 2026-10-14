@extends('layouts.app')

@section('title', 'Edit Akun')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Edit Akun</h1>
        <p class="page-sub">Perbarui informasi akun pengguna.</p>
    </div>

    <a href="{{ route('akun.index') }}" class="btn btn-outline-secondary">
        Kembali
    </a>
</div>

<div class="card-plain p-4">
    <form action="{{ route('akun.update', $akun) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $akun->name) }}"
                       required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text"
                       id="username"
                       name="username"
                       class="form-control @error('username') is-invalid @enderror"
                       value="{{ old('username', $akun->username) }}"
                       required>
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $akun->email) }}"
                       required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="role" class="form-label">Role</label>
                <select id="role"
                        name="role"
                        class="form-select @error('role') is-invalid @enderror"
                        @disabled($akun->id === auth()->id())
                        required>
                    <option value="user" @selected(old('role', $akun->role) === 'user')>
                        User
                    </option>
                    <option value="admin" @selected(old('role', $akun->role) === 'admin')>
                        Admin
                    </option>
                </select>

                @if ($akun->id === auth()->id())
                    <input type="hidden" name="role" value="{{ $akun->role }}">
                    <small class="text-muted">Role akun sendiri tidak dapat diubah.</small>
                @endif

                @error('role')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <hr>
                <h6 class="fw-bold">Ganti Password</h6>
                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti password.
                </small>
            </div>

            <div class="col-md-6">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password Baru
                </label>
                <input type="password"
                       id="password_confirmation"
                       name="password_confirmation"
                       class="form-control"
                       autocomplete="new-password">
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
            </button>

            <a href="{{ route('akun.index') }}" class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection