<?php

namespace App\Http\Controllers;

use App\Models\PemakaianStok;
use App\Models\PersediaanBarang;
use Illuminate\Http\Request;

class PemakaianStokController extends Controller
{
    public function index()
    {
        return view('admin.pemakaian_stok.index', [
            'pemakaianStoks' => PemakaianStok::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pemakaian_stok.create', [
            'persediaanBarangs' => PersediaanBarang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'persediaan_barang_id' => 'required',
            'stok_diambil' => 'required|integer',
        ]);

        $pemakaianStok = new PemakaianStok([
            'persediaan_barang_id' => $validatedData['persediaan_barang_id'],
            'stok_diambil' => $validatedData['stok_diambil']
        ]);

        $pemakaianStok->save();

        // Kurangi stok di tabel persediaan_barang
        $persediaanBarang = PersediaanBarang::find($validatedData['persediaan_barang_id']);
        $persediaanBarang->stok -= $validatedData['stok_diambil'];
        $persediaanBarang->save();

        return redirect('/pemakaian-stok')->with('success', 'Sukses');
    }
}