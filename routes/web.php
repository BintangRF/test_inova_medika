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
    Route::get('/laporan', [laporanController::class, 'index'])->name('laporan.index');
});

Route::middleware(['auth', 'role:petugas,dokter'])->group(function () {
    Route::get('/pasien-kunjungan', [PasienKunjunganController::class, 'index'])->name('pasien-kunjungan.index');
    Route::get('/pasien-kunjungan/create', [PasienKunjunganController::class, 'create'])->name('pasien-kunjungan.create');
    Route::post('/pasien-kunjungan', [PasienKunjunganController::class, 'store'])->name('pasien-kunjungan.store');
    Route::get('/pasien-kunjungan/{id}/edit', [PasienKunjunganController::class, 'edit'])->name('pasien-kunjungan.edit');
    Route::put('/pasien-kunjungan/{id}', [PasienKunjunganController::class, 'update'])->name('pasien-kunjungan.update');
    Route::get('/transaksi-tindakan/{kunjungan}/create', [TransaksiTindakanController::class, 'create'])->name('transaksi-tindakan.create');
    Route::post('/transaksi-tindakan/{kunjungan}', [TransaksiTindakanController::class, 'store'])->name('transaksi-tindakan.store');
    Route::get('/transaksi/tindakan', [\App\Http\Controllers\TransaksiTindakanController::class, 'index'])->name('transaksi.tindakan.index');
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/{id}/bayar', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
});


require __DIR__.'/auth.php';
