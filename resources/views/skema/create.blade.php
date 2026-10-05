@extends('layouts.app')

@section('title', 'Tambah Skema')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Tambah Skema</h1>
        <p class="page-sub">Buat skema sertifikasi baru.</p>
    </div>
</div>

<div class="card-plain p-4" style="max-width: 760px;">
    <form method="POST" action="{{ route('skema.store') }}" novalidate>
        @csrf
        @include('skema._form')
    </form>
</div>
@endsection