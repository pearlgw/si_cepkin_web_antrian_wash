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
                <h6 class="m-0 font-weight-bold text-primary">Data Pemakaian Stok</h6>
                <a href="/pemakaian-stok/create" class="btn btn-primary d-block">Buat Laporan Pemakaian Barang</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Barang Yang Diambil</th>
                                <th>Jumlah Yang Diambil</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemakaianStoks as $pemakaianStok)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle;">{{ $pemakaianStok->persediaanBarang->nama_barang }}</td>
                                    <td style="vertical-align: middle;">{{ $pemakaianStok->stok_diambil }}</td>
                                    <td style="vertical-align: middle;">{{ $pemakaianStok->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
