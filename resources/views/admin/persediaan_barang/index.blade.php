@extends('admin.index')

@section('contentsAdmin')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Persediaan Barang</h6>
                <a href="/persediaan-barang/create" class="btn btn-primary d-block">Tambah Data Persediaan Barang</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga Beli</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($persediaanBarangs as $persediaanBarang)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle;">{{ $persediaanBarang->nama_barang }}</td>
                                    <td style="vertical-align: middle;">{{ $persediaanBarang->stok }}</td>
                                    <td style="vertical-align: middle;">{{ $persediaanBarang->harga_beli }}</td>
                                    <td style="vertical-align: middle;">{{ $persediaanBarang->created_at }}</td>
                                    <td style="vertical-align: middle;">{{ $persediaanBarang->updated_at }}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="/persediaan-barang/{{ $persediaanBarang->id }}/edit" class="badge bg-warning p-2" style="color: #111"><i
                                                class="fas fa-edit"></i> Edit</a>
                                        <form action="/persediaan-barang/{{ $persediaanBarang->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="badge bg-danger border-0 p-2"
                                                onclick="return confirm('Yakin hapus data persediaan barang?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
