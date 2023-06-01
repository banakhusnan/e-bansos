<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BantuanSosialController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [PublicController::class, 'index'])->name('dashboard');
});

Route::controller(ProfileController::class)->name('profile.')->prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit', 'edit')->name('edit');
    Route::put('/edit', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

Route::controller(BantuanSosialController::class)->name('bansos.')->middleware('auth')->group(function () {
    Route::get('/informasi-bantuan', 'informasiBantuan')->name('informasi-bantuan');
    Route::get('/pendaftaran', 'pendaftaran')->name('pendaftaran');
    Route::put('/edit', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
});

require __DIR__.'/auth.php';
