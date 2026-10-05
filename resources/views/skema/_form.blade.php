<div class="row g-3">
    <div class="col-md-4">
        <label for="kode_skema" class="form-label">Kode Skema</label>
        <input type="text" id="kode_skema" name="kode_skema"
               value="{{ old('kode_skema', $skema->kode_skema) }}"
               class="form-control @error('kode_skema') is-invalid @enderror"
               placeholder="">
        @error('kode_skema')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-8">
        <label for="nama_skema" class="form-label">Nama Skema</label>
        <input type="text" id="nama_skema" name="nama_skema"
               value="{{ old('nama_skema', $skema->nama_skema) }}"
               class="form-control @error('nama_skema') is-invalid @enderror"
               placeholder="">
        @error('nama_skema')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="3"
                  class="form-control @error('deskripsi') is-invalid @enderror"
                  placeholder="Deskripsi singkat">{{ old('deskripsi', $skema->deskripsi) }}</textarea>
        @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-check2 me-1"></i> Simpan
    </button>
    <a href="{{ route('skema.index') }}" class="btn btn-ghost">Batal</a>
</div>