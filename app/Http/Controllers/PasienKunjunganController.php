<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class PasienKunjunganController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::with('kunjungan')->latest()->get();
        return view('pasien_kunjungan.index', compact('pasiens'));
    }

    public function create()
    {
        return view('pasien_kunjungan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:pasiens',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required',
        ]);

        $pasien = Pasien::create($request->only(['nama', 'nik', 'alamat', 'no_telepon']));
        $pasien->kunjungan()->create([
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jenis_kunjungan' => $request->jenis_kunjungan,
        ]);

        return redirect()->route('pasien-kunjungan.index')->with('success', 'Data pasien dan kunjungan berhasil disimpan');
    }

    public function edit($id)
    {
        $pasien = Pasien::with('kunjungan')->findOrFail($id);
        $kunjungan = $pasien->kunjungan->first(); // diasumsikan satu kunjungan saat pendaftaran
        return view('pasien_kunjungan.edit', compact('pasien', 'kunjungan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:pasiens,nik,' . $id,
            'alamat' => 'required',
            'no_telepon' => 'required',
            'tanggal_kunjungan' => 'required|date',
            'jenis_kunjungan' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->only(['nama', 'nik', 'alamat', 'no_telepon']));

        $kunjungan = $pasien->kunjungan->first();
        if ($kunjungan) {
            $kunjungan->update([
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'jenis_kunjungan' => $request->jenis_kunjungan,
            ]);
        }

        return redirect()->route('pasien-kunjungan.index')->with('success', 'Data pasien dan kunjungan diperbarui.');
    }

}
