<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Tindakan;
use App\Models\Obat;
use App\Models\TransaksiTindakan;


class TransaksiTindakanController extends Controller
{

    public function index()
    {
        $transaksiTindakans = \App\Models\TransaksiTindakan::with(['kunjungan.pasien', 'tindakan', 'obat'])->latest()->get();

        return view('transaksi_tindakan.index', compact('transaksiTindakans'));
    }

    public function create(Kunjungan $kunjungan)
    {
        $tindakans = Tindakan::all();
        $obats = Obat::all();
        return view('transaksi_tindakan.create', compact('kunjungan', 'tindakans', 'obats'));
    }

    public function store(Request $request, Kunjungan $kunjungan)
    {
        $validated = $request->validate([
            'tindakan_id' => 'required|exists:tindakans,id',
            'obat_id' => 'nullable|exists:obats,id',
            'keterangan' => 'nullable|string',
        ]);

        $validated['kunjungan_id'] = $kunjungan->id;

        TransaksiTindakan::create($validated);

        return redirect()->route('pasien-kunjungan.index')->with('success', 'Tindakan & Obat berhasil diproses.');
    }
}
