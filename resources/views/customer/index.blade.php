@extends('layout.main')

@section('contents')
    @include('components.navbar')
    @include('components.jumbotron')
    <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <p class="py-3"><b>Welcome {{ auth()->user()->name }}!</b> Jumlah antrian saat ini: <b>{{ $jumlahAntrian === null ? '0' : $jumlahAntrian }}</b>,
            Nomer antrian yang sedang di kerjakan:
            <b>{{ $lastProcessedNomorAntrian === null ? '0' : $lastProcessedNomorAntrian }}</b></p>
        <div class="row">
            <div class="col-md-5">
                <div class="card-body">
                    <h2 class="text-center">Form Antrian</h2>
                    <form method="post" action="/antrian">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="jenis_layanan_id" class="form-label">Jenis Layanan</label>
                            <select class="form-control" id="jenis_layanan_id" name="jenis_layanan_id" required>
                                @foreach ($jenisLayanans as $jenisLayanan)
                                    <option value="{{ $jenisLayanan->id }}">{{ $jenisLayanan->nama_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="mobil" class="form-label">Mobil</label>
                            <input type="text" name="mobil" class="form-control @error('mobil') is-invalid @enderror"
                                id="mobil">
                            @error('mobil')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Catatan Khusus</label>
                            <input type="text" name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Buat Antrian</button>
                    </form>
                </div>
                <h6 class="mt-3">
                    Nomor Urutan Anda:
                    {{ $urutanAntrian === null ? '0' : $urutanAntrian }}
                </h6>
            </div>

            <div class="col-md-7">
                <img src="{{ asset('images/about.jpg') }}" alt="about"
                    style="width: 100%; object-fit: cover; height: 450px;">
            </div>
        </div>
    </div>
    @include('components.footer')
@endsection
