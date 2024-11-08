<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/laporan/dkp', [LaporanController::class, 'dkp'])->name('laporan.dkp');
Route::get('/laporan/kulitari', [LaporanController::class, 'kulitari'])->name('laporan.kulitari');
Route::get('/laporan/airkelapa', [LaporanController::class, 'airkelapa'])->name('laporan.airkelapa');
Route::get('/laporan/serabutkelapa', [LaporanController::class, 'serabutkelapa'])->name('laporan.serabutkelapa');
Route::get('/laporan/tempurung', [LaporanController::class, 'tempurung'])->name('laporan.tempurung');
Route::get('/laporan/dkp_reject', [LaporanController::class, 'dkp_reject'])->name('laporan.dkp_reject');



Route::get('/rekap_laporan/dkp', [RekapController::class, 'dkp'])->name('rekap_laporan.dkp');
Route::get('/rekap_laporan/kulit_ari', [RekapController::class, 'kulitari'])->name('rekap_laporan.kulit_ari');
Route::get('/rekap_laporan/tempurung', [RekapController::class, 'tempurung'])->name('rekap_laporan.tempurung');
Route::get('/rekap_laporan/serabut_kelapa', [RekapController::class, 'serabut_kelapa'])->name('rekap_laporan.serabut_kelapa');
Route::get('/rekap_laporan/air_kelapa', [RekapController::class, 'air_kelapa'])->name('rekap_laporan.air_kelapa');


require __DIR__.'/auth.php';
