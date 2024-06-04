<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('admin.transaksi.index', [
            'transaksis' => Transaksi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::today();

        // Mengambil data antrian yang statusnya belum selesai (atau yang sesuai dengan kriteria Anda) pada hari ini saja
        $antrians = Antrian::whereDate('updated_at', $today)
        ->whereDate('created_at', $today)
        ->where(function ($query) {
            $query->whereNull('status_pembayaran');
        })
        ->get();

        return view('admin.transaksi.create', [
            'antrians' => $antrians
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'antrian_id' => 'required',
            'harga_total' => 'required|integer',
            'uang_bayar' => 'required|integer',
            'uang_kembali' => 'required|integer',
        ]);

        // Buat transaksi baru
        $transaksi = new Transaksi([
            'antrian_id' => $validatedData['antrian_id'],
            'harga_total' => $validatedData['harga_total'],
            'uang_bayar' => $validatedData['uang_bayar'],
            'uang_kembali' => $validatedData['uang_kembali'],
        ]);

        // Temukan dan perbarui status pembayaran antrian menjadi 'paid_off'
        $antrian = Antrian::findOrFail($request->antrian_id);
        $antrian->status_pembayaran = 'paid_off';

        // Simpan transaksi dan perbarui status pembayaran antrian
        $transaksi->save();
        $antrian->save();

        return redirect('/transaksi')->with('success', 'Transaksi Sukses');
    }
}