<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTindakan;

class PembayaranController extends Controller
{
    public function index()
    {
        $kunjungans = TransaksiTindakan::with(['kunjungan.pasien', 'tindakan', 'obat'])
            ->where('is_paid', false)
            ->get();

        return view('pembayaran.index', compact('kunjungans'));
    }

    public function bayar($id)
    {
        $kunjungan = TransaksiTindakan::findOrFail($id);
        $kunjungan->is_paid = true;
        $kunjungan->save();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diselesaikan.');
    }

}
