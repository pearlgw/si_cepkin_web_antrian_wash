<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        return view('admin.antrian.index', [
            'antrians' => Antrian::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'jenis_layanan_id' => 'required|integer',
            'mobil' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $nomorAntrian = Antrian::generateNomorAntrian();

        $antrian = new Antrian([
            'user_id' => $validatedData['user_id'],
            'jenis_layanan_id' => $validatedData['jenis_layanan_id'],
            'nomor_antrian' => $nomorAntrian,
            'mobil' => $validatedData['mobil'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        $antrian->save();

        return redirect('/customer')->with('success', 'Berhasil Melakukan Antrian');
    }

    public function update(Request $request, string $id)
    {
        $antrian = Antrian::find($id);
        $antrian->update(['status' => 'Processed']);

        return redirect('/antrian')->with('success', 'Processed');
    }
}