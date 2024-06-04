@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit User</h1>
    </div>
    <form action="/jenis-layanan/{{ $jenisLayanan->id }}" method="POST" style="width: 50%">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_layanan" class="form-label">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan"
                placeholder="Masukan Nama Layanan Anda" value="{{ old('nama_layanan', $jenisLayanan->nama_layanan) }}">
            @error('nama_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
            <input type="text" name="deskripsi_layanan" class="form-control @error('deskripsi_layanan') is-invalid @enderror" id="deskripsi_layanan"
                placeholder="Masukan Nama Layanan Anda" value="{{ old('deskripsi_layanan', $jenisLayanan->deskripsi_layanan) }}">
            @error('deskripsi_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga_layanan" class="form-label">Harga Layanan</label>
            <input type="number" name="harga_layanan" class="form-control @error('harga_layanan') is-invalid @enderror"
                placeholder="Masukan Harga Layanan Anda" id="harga_layanan" value="{{ old('harga_layanan', $jenisLayanan->harga_layanan) }}">
            @error('harga_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Data</button>
    </form>
@endsection
