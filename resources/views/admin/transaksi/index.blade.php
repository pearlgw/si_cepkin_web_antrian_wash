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
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                <a href="/transaksi/create" class="btn btn-primary d-block">Buat Transaksi</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Antrian</th>
                                <th>Harga Total</th>
                                <th>Uang Bayar</th>
                                <th>Uang Kembali</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle;">{{ $transaksi->antrian->nomor_antrian }}</td>
                                    <td style="vertical-align: middle;">{{ $transaksi->harga_total }}</td>
                                    <td style="vertical-align: middle;">{{ $transaksi->uang_bayar }}</td>
                                    <td style="vertical-align: middle;">{{ $transaksi->uang_kembali }}</td>
                                    <td style="vertical-align: middle;">{{ $transaksi->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
