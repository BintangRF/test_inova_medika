<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTindakan;

class PembayaranController extends Controller
{
    public function index()
    {
        $transaksi_tindakans = TransaksiTindakan::with(['kunjungan.pasien', 'tindakan', 'obat'])
            ->where('is_paid', false)
            ->get();

        return view('pembayaran.index', compact('transaksi_tindakans'));
    }

    public function update($id)
    {
        $transaksi_tindakan = TransaksiTindakan::findOrFail($id);
        $transaksi_tindakan->is_paid = true;
        $transaksi_tindakan->save();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diselesaikan.');
    }

}
