<?php

namespace App\Http\Controllers;

use App\Models\PersediaanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PersediaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.persediaan_barang.index', [
            'persediaanBarangs' => PersediaanBarang::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.persediaan_barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga_beli' => 'required|integer',
        ]);

        $persediaanBarang = new PersediaanBarang([
            'nama_barang' => $validatedData['nama_barang'],
            'stok' => $validatedData['stok'],
            'harga_beli' => $validatedData['harga_beli'],
        ]);

        $persediaanBarang->save();

        return redirect('/persediaan-barang')->with('success', 'Berhasil Menambahkan Data Persediaan Barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.persediaan_barang.edit', [
            'persediaanBarang' => PersediaanBarang::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
        ]);

        // Update data persediaan barang
        PersediaanBarang::find($id)->update($validatedData);

        return redirect('/persediaan-barang')->with('success', 'Berhasil Update Data Persediaan Barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PersediaanBarang::destroy($id);

        return redirect('/persediaan-barang')->with('success', 'Data Telah Dihapus');
    }
}