<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BantuanSosialController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\KelolaPendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// For Role Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function(){
    Route::controller(AdminController::class)->name('admin.')->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(ChartController::class)->group(function(){
        Route::get('/chart', 'statistics');
    });

    // Kelola Pengguna
    Route::controller(KelolaPenggunaController::class)->name('kelola-pengguna.')->group(function(){
        // Modal
        Route::get('/pengguna/{id}', 'getPengguna');
        
        Route::get('/kelola-pengguna', 'index')->name('index');
    });
    
    // Kelola Pendaftaran
    Route::controller(KelolaPendaftaranController::class)->name('pendaftaran-admin.')->group(function(){
        // Modal
        Route::get('/pendaftaran/{id}', 'getPendaftaran');

        Route::get('/kelola-pendaftaran', 'index')->name('index');
    });
});

// For Role Public
Route::group(['middleware' => ['auth', 'role:public']], function() {
    Route::get('/dashboard', [PublicController::class, 'index'])->name('dashboard');
    Route::post('/bayar-listrik', [PublicController::class, 'pembayaranListrik'])->name('pembayaran.listrik');

    Route::controller(BantuanSosialController::class)->name('bansos.')->middleware('auth')->group(function () {
        Route::get('/informasi-bantuan', 'informasiBantuan')->name('informasi-bantuan');
        Route::get('/pendaftaran', 'pendaftaran')->name('pendaftaran');
        Route::post('/pendaftaran', 'pendaftaranStore');
        Route::delete('/', 'destroy')->name('destroy');
    });
});

// Profile
Route::controller(ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/edit', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

require __DIR__.'/auth.php';