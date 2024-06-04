@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit User</h1>
    </div>
    <form action="/persediaan-barang/{{ $persediaanBarang->id }}" method="POST" style="width: 50%">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                placeholder="Masukan Nama Barang Anda" value="{{ old('nama_barang', $persediaanBarang->nama_barang) }}">
            @error('nama_barang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                placeholder="Masukan stok Anda" id="stok" value="{{ old('stok', $persediaanBarang->stok) }}">
            @error('stok')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_beli" class="form-label">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror"
                placeholder="Masukan Harga Beli Anda" id="harga_beli" value="{{ old('harga_beli', $persediaanBarang->harga_beli) }}">
            @error('harga_beli')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Data</button>
    </form>
@endsection
