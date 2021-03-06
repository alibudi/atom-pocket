<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DompetController;
use App\Http\Controllers\DompetKeluarController;
use App\Http\Controllers\DompetMasukController;
use App\Http\Controllers\LaporanController;
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
Route::resource('dompet', DompetController::class);
Route::get('change_status/{id}', [DompetController::class, 'change_status'])->name('dompet.status');
Route::resource('category', CategoryController::class);
Route::get('change_category/{id}', [CategoryController::class, 'change_status'])->name('category.status');
Route::resource('dompet_masuk', DompetMasukController::class);
Route::resource('dompet_keluar', DompetKeluarController::class);
Route::resource('laporan', LaporanController::class);
Route::post('export', [LaporanController::class, 'export'])->name('export');