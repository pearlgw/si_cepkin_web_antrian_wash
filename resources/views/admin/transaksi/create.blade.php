@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pemakaian Stok</h1>
    </div>
    <form method="post" action="/transaksi">
        @csrf
        <div class="mb-3">
            <label for="antrian_id" class="form-label">Data Antrian</label>
            <select class="form-control" id="antrian_id" name="antrian_id" required>
                <option selected>Pilih Data Antrian</option>
                @foreach ($antrians as $antrian)
                    <option value="{{ $antrian->id }}" data-harga="{{ $antrian->jenisLayanan->harga_layanan }}">
                        {{ $antrian->user->name }} | {{ $antrian->jenisLayanan->nama_layanan }} | {{ $antrian->mobil }} |
                        {{ $antrian->jenisLayanan->harga_layanan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga_total" class="form-label">Harga Total</label>
            <input type="number" name="harga_total" class="form-control @error('harga_total') is-invalid @enderror"
                id="harga_total" readonly>
            @error('harga_total')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="uang_bayar" class="form-label">Uang Bayar</label>
            <input type="number" name="uang_bayar" class="form-control @error('uang_bayar') is-invalid @enderror"
                id="uang_bayar">
            @error('uang_bayar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="uang_kembali" class="form-label">Uang Kembali</label>
            <input type="number" name="uang_kembali" class="form-control @error('uang_kembali') is-invalid @enderror"
                id="uang_kembali" readonly>
            @error('uang_kembali')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const antrianSelect = document.getElementById("antrian_id");
            const hargaTotalInput = document.getElementById("harga_total");

            // Tambahkan event listener ketika nilai select berubah
            antrianSelect.addEventListener("change", function() {
                // Ambil harga layanan dari atribut data-harga option yang dipilih
                const hargaLayanan = this.options[this.selectedIndex].getAttribute("data-harga");

                // Isi input harga total dengan harga layanan yang dipilih
                hargaTotalInput.value = hargaLayanan;
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const uangBayarInput = document.getElementById("uang_bayar");
            const hargaTotalInput = document.getElementById("harga_total");
            const uangKembaliInput = document.getElementById("uang_kembali");

            // Tambahkan event listener ketika nilai input uang bayar berubah
            uangBayarInput.addEventListener("input", function() {
                // Ambil nilai uang bayar dan harga total
                const uangBayar = parseFloat(this.value);
                const hargaTotal = parseFloat(hargaTotalInput.value);

                // Hitung dan tampilkan uang kembali
                const uangKembali = uangBayar - hargaTotal;
                uangKembaliInput.value = uangKembali;
            });
        });
    </script>
@endsection
