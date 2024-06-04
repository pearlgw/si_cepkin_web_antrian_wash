@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Persediaan Barang</h1>
    </div>
    <form method="post" action="/jenis-layanan">
        @csrf
        <div class="mb-3">
            <label for="nama_layanan" class="form-label">Nama Layanan</label>
            <input type="text" name="nama_layanan" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan"
                placeholder="Masukan nama layanan Anda">
            @error('nama_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
            <input type="text" name="deskripsi_layanan" class="form-control @error('deskripsi_layanan') is-invalid @enderror" id="deskripsi_layanan"
                placeholder="Masukan deskripsi layanan Anda">
            @error('deskripsi_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_layanan" class="form-label">Harga Layanan</label>
            <input type="number" name="harga_layanan" class="form-control @error('harga_layanan') is-invalid @enderror"
                placeholder="Masukan harga layanan Anda" id="harga_layanan">
            @error('harga_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Data Jenis Layanan</button>
    </form>
@endsection
