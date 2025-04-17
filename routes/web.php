<?php

use App\Http\Controllers\AuthController;
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
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'authenticate'])->name('login.post');
Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

    Route::middleware('role:pasien')->group(function(){
        Route::get('/pasien', function () {
            return view('pasien.dashboard');
        })->name('pasien.dashboard');

        Route::get('/pasien/periksa', function () {
            return view('pasien.periksa.index');
        })->name('pasien.periksa');
    });
    /* --------------- Pasien bisa ke halaman dashboard, periksa, dan riwayat --------------- */

    Route::middleware('role:dokter')->group(function(){
        /* --------------- Dokter bisa ke halaman dashboard, memeriksa pasien, dan obat --------------- */
        Route::get('/dokter', function () {
            return view('dokter.dashboard');
        })->name('dokter.dashboard');

        Route::get('/dokter/periksa', function () {
            $periksas = Periksa::all();
            return view('dokter.periksa.index', compact('periksas'));
        })->name('dokter.periksa');

        Route::get('/dokter/obat', [ObatController::class , 'index'])->name('dokter.obat');
        Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
        Route::get('/dokter/obat/{id}', [ObatController::class, 'edit'])->name('dokter.obat.edit');
        Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');
        Route::delete('/dokter/obat/{id}', [ObatController::class, 'delete'])->name('dokter.obat.delete');
    });

    Route::get('/no-access', function(){
        return view('errors.403');
    });
});
