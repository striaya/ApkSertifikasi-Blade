@extends('layouts.app')

@section('title', 'Ubah Peserta')

@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">Ubah Peserta</h1>
            <p class="page-sub">Perbarui data peserta <strong>{{ $peserta->nama }}</strong>.</p>
        </div>
    </div>

    <div class="card-plain p-4" style="max-width: 860px;">
        <form method="POST" action="{{ route('peserta.update', ['peserta' => $peserta->id]) }}" novalidate>
            @csrf
            @method('PUT')
            @include('peserta._form')
        </form>
    </div>
@endsection
