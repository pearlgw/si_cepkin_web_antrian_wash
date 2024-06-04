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
                <h6 class="m-0 font-weight-bold text-primary">Kritik dan Saran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kritikSarans as $kritikSaran)
                                <tr>
                                    <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                    <td style="vertical-align: middle;">{{ $kritikSaran->firstname }}</td>
                                    <td style="vertical-align: middle;">{{ $kritikSaran->lastname }}</td>
                                    <td style="vertical-align: middle;">{{ $kritikSaran->email }}</td>
                                    <td style="vertical-align: middle;">{{ $kritikSaran->message }}</td>
                                    <td style="vertical-align: middle;">{{ $kritikSaran->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
