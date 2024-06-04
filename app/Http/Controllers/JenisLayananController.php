<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jenis_layanan.index', [
            'jenisLayanans' => JenisLayanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jenis_layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'harga_layanan' => 'required|integer',
        ]);

        $jenisLayanan = new JenisLayanan([
            'nama_layanan' => $validatedData['nama_layanan'],
            'deskripsi_layanan' => $validatedData['deskripsi_layanan'],
            'harga_layanan' => $validatedData['harga_layanan'],
        ]);

        $jenisLayanan->save();

        return redirect('/jenis-layanan')->with('success', 'Berhasil Menambahkan Data Jenis Layanan');
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
        return view('admin.jenis_layanan.edit', [
            'jenisLayanan' => JenisLayanan::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_layanan' => 'required',
            'deskripsi_layanan' => 'required',
            'harga_layanan' => 'required',
        ]);

        // Update data jenis layanan
        JenisLayanan::find($id)->update($validatedData);

        return redirect('/jenis-layanan')->with('success', 'Berhasil Update Data Jenis Layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        JenisLayanan::destroy($id);

        return redirect('/jenis-layanan')->with('success', 'Data Telah Dihapus');
    }
}