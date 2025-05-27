<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienKunjunganController;
use App\Http\Controllers\TransaksiTindakanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'dokter' => redirect()->route('dokter.dashboard'),
        'kasir' => redirect()->route('kasir.dashboard'),
        'petugas' => redirect()->route('petugas.dashboard'),
        default => abort(403),
    };
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('wilayah', WilayahController::class);
    Route::resource('user', UserController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('tindakan', TindakanController::class);
    Route::resource('obat', ObatController::class);
    Route::resource('laporan', LaporanController::class)->only(['index']);
});

Route::middleware(['auth', 'role:petugas,dokter'])->group(function () {
    Route::get('pasien-kunjungan', [PasienKunjunganController::class, 'index'])->name('pasien-kunjungan.index');
    Route::resource('transaksi-tindakan', TransaksiTindakanController::class)->only(['index']);
});

Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::resource('pasien-kunjungan', PasienKunjunganController::class)->except(['index', 'show', 'destroy']);
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::resource('kunjungan.transaksi-tindakan', TransaksiTindakanController::class)->only(['create', 'store']);
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::resource('pembayaran', PembayaranController::class)->only(['index', 'update']);
});


require __DIR__.'/auth.php';
