@extends('layouts.app')

@section('title', 'Ubah Skema')

@section('content')
<div class="page-head">
    <div>
        <h1 class="page-title">Ubah Skema</h1>
        <p class="page-sub">Perbarui skema <strong>{{ $skema->nama_skema }}</strong>.</p>
    </div>
</div>

<div class="card-plain p-4" style="max-width: 760px;">
    <form method="POST" action="{{ route('skema.update', $skema) }}" novalidate>
        @csrf
        @method('PUT')
        @include('skema._form')
    </form>
</div>
@endsection