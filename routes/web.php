<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard');
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/artikel', App\Http\Controllers\ArtikelController::class);
    Route::resource('/penulis', PenulisController::class);
    Route::resource('/tentang-kami', App\Http\Controllers\TentangKamiController::class);

});
