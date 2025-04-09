<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ObatController;
use App\Models\Periksa;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/tables', [DashboardController::class, 'tables']);


/* --------------- Guest bisa login dan register --------------- */
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

/* --------------- Pasien bisa ke halaman dashboard, periksa, dan riwayat --------------- */
Route::get('/pasien', function () {
    return view('pasien.dashboard');
})->name('pasien.dashboard');

Route::get('/pasien/periksa', function () {
    return view('pasien.periksa');
})->name('pasien.periksa');

Route::get('/pasien/riwayat', function () {
    return view('pasien.riwayat');
})->name('pasien.riwayat');


/* --------------- Dokter bisa ke halaman dashboard, memeriksa pasien, dan obat --------------- */
Route::get('/dokter', function () {
    return view('dokter.dashboard');
})->name('dokter.dashboard');

Route::get('/dokter/periksa', function () {
    $periksas = Periksa::all();
    return view('dokter.periksa', compact('periksas'));
})->name('dokter.periksa');

// Route::get('/dokter/obat', function () {
//     return view('dokter.obat');
// })->name('dokter.obat');


Route::get('/dokter/obat', [ObatController::class , 'index'])->name('dokter.obat');
Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');