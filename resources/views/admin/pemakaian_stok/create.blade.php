@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pemakaian Stok</h1>
    </div>
    <form method="post" action="/pemakaian-stok">
        @csrf
        <div class="mb-3">
            <label for="persediaan_barang_id" class="form-label">Barang Yang Ingin Digunakan</label>
            <select class="form-control" id="persediaan_barang_id" name="persediaan_barang_id" required>
                @foreach ($persediaanBarangs as $persediaanBarang)
                    <option value="{{ $persediaanBarang->id }}">{{ $persediaanBarang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="stok_diambil" class="form-label">Stok Yang Diambil</label>
            <input type="number" name="stok_diambil" class="form-control @error('stok_diambil') is-invalid @enderror" id="stok_diambil"
                placeholder="Masukan stok yang diambil">
            @error('stok_diambil')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
