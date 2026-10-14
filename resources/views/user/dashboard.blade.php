
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

        <div class="card-plain p-4">
            <h5>Dashboard Peserta</h5>

            <p>
                Kamu berhasil login sebagai peserta.
            </p>

            <p>
                Email: {{ $user->email }}
            </p>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>

    </div>
@endsection
