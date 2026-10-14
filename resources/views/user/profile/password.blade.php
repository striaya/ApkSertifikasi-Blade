@extends('layouts.user')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h2 class="fw-bold mb-1">Ubah Password</h2>
        <p class="text-secondary mb-0">Gunakan password lama untuk mengatur password baru.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('user.profile.password.update') }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="current_password" class="form-label">
                        Password Lama
                    </label>
                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        class="form-control"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password Baru
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">
                        Konfirmasi Password Baru
                    </label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        minlength="8"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Simpan Password
                    </button>

                    <a href="{{ route('user.profile') }}"
                       class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection