<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $lastProcessedNomorAntrian = Antrian::where('status', 'Processed')
        ->latest('updated_at')
        ->value('nomor_antrian');

        $urutanAntrian = auth()->user()->antrian
        ->where('status', 'waiting')
        ->value('nomor_antrian');

        return view('customer.index', [
            'jenisLayanans' => JenisLayanan::all(),
            'jumlahAntrian' => Antrian::where('status', 'waiting')->count(),
            'lastProcessedNomorAntrian' => $lastProcessedNomorAntrian,
            'urutanAntrian' => $urutanAntrian
        ]);
    }
}