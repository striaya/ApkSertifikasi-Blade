@if ($skemas->isEmpty())
    <div class="alert alert-warning">
        Belum ada skema sertifikasi.
        <a href="{{ route('skema.create') }}" class="alert-link">Tambah skema</a> terlebih dahulu
        agar peserta dapat dipilihkan skema.
    </div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label for="no_peserta" class="form-label">No. Peserta</label>
        <input type="text" id="no_peserta" name="no_peserta"
               value="{{ old('no_peserta', $peserta->no_peserta) }}"
               class="form-control @error('no_peserta') is-invalid @enderror"
               placeholder="">
        @error('no_peserta')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" id="nama" name="nama"
               value="{{ old('nama', $peserta->nama) }}"
               class="form-control @error('nama') is-invalid @enderror"
               placeholder="">
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email"
               value="{{ old('email', $peserta->email) }}"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="no_telepon" class="form-label">No. Telepon</label>
        <input type="text" id="no_telepon" name="no_telepon"
               value="{{ old('no_telepon', $peserta->no_telepon) }}"
               class="form-control @error('no_telepon') is-invalid @enderror"
               placeholder="">
        @error('no_telepon')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
               value="{{ old('tanggal_lahir', $peserta->tanggal_lahir?->format('Y-m-d')) }}"
               class="form-control @error('tanggal_lahir') is-invalid @enderror">
        @error('tanggal_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="skema_id" class="form-label">Skema Sertifikasi</label>
        <select id="skema_id" name="skema_id" class="form-select @error('skema_id') is-invalid @enderror">
            <option value="">-- Pilih skema --</option>
            @foreach ($skemas as $skema)
                <option value="{{ $skema->id }}" @selected(old('skema_id', $peserta->skema_id) == $skema->id)>
                    {{ $skema->kode_skema }} - {{ $skema->nama_skema }}
                </option>
            @endforeach
        </select>
        @error('skema_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea id="alamat" name="alamat" rows="3"
                  class="form-control @error('alamat') is-invalid @enderror"
                  placeholder="Alamat lengkap">{{ old('alamat', $peserta->alamat) }}</textarea>
        @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check2 me-1"></i> Simpan
    </button>
    <a href="{{ route('peserta.index') }}" class="btn btn-ghost">Batal</a>
</div>