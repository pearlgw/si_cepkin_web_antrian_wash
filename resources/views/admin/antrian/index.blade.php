@extends('admin.index')

@section('contentsAdmin')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Antrian</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama Customer</th>
                                <th>Jenis Layanan</th>
                                <th>Nomor Antrian</th>
                                <th>Mobil</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($antrians as $antrian)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->user->name }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->jenisLayanan->nama_layanan }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->nomor_antrian }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->mobil }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->deskripsi }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->status }}</td>
                                    <td style="vertical-align: middle;">{{ $antrian->created_at }}</td>
                                    @if ($antrian->status === 'Processed')
                                        <td style="vertical-align: middle;">
                                            <button type="submit" disabled class="badge bg-danger p-2"
                                                style="color: #111; border: none; background: none;">
                                                <i class="fas fa-edit"></i> {{ $antrian->status }}
                                            </button>
                                        </td>
                                    @else
                                        <td style="vertical-align: middle;">
                                            <form method="POST" action="/antrian/{{ $antrian->id }}/edit">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="badge bg-warning p-2"
                                                    style="color: #111; border: none; background: none;">
                                                    <i class="fas fa-edit"></i> Proses
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
