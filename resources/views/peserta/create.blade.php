@extends('layouts.app')

@section('title', 'Tambah Peserta')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Tambah Peserta</h1>
        <p class="page-sub">Isi data peserta dengan lengkap dan benar.</p>
    </div>
</div>

<div class="card-plain p-4" style="max-width: 860px;">
    <form method="POST" action="{{ route('peserta.store') }}" novalidate>
        @csrf
        @include('peserta._form')
    </form>
</div>
@endsection