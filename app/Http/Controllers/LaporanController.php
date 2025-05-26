<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiTindakan;

class LaporanController extends Controller
{

    public function index()
    {
        $kunjunganPerBulan = DB::table('transaksi_tindakans')
            ->join('kunjungans', 'transaksi_tindakans.kunjungan_id', '=', 'kunjungans.id')
            ->select(
                DB::raw("DATE_FORMAT(kunjungans.tanggal_kunjungan, '%Y-%m') as bulan"),
                DB::raw("COUNT(*) as jumlah")
            )
            ->groupBy('bulan')
            ->get();

        $tindakanTerbanyak = DB::table('transaksi_tindakans')
            ->join('tindakans', 'transaksi_tindakans.tindakan_id', '=', 'tindakans.id')
            ->select('tindakans.nama', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tindakans.nama')
            ->orderByDesc('jumlah')
            ->limit(5)
            ->get();

        $obatTerbanyak = DB::table('transaksi_tindakans')
            ->join('obats', 'transaksi_tindakans.obat_id', '=', 'obats.id')
            ->select('obats.nama', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('obats.nama')
            ->orderByDesc('jumlah')
            ->limit(5)
            ->get();

        return view('laporan.index', compact('kunjunganPerBulan', 'tindakanTerbanyak', 'obatTerbanyak'));
    }

}
