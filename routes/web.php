<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// disni kita akan buat route kita unutk pegawai
Route::get('/', [PegawaiController::class, 'index']); // jangan lupa controlernya kita import
// route tambah
Route::get('/tambah', [PegawaiController::class, 'tambah']); // jangan lupa controlernya kita import
// unutk menjalankan proses input datanya
Route::post('/insert', [PegawaiController::class, 'insert']);
// route edit data
Route::get('/edit/{id}', [PegawaiController::class, 'edit']);
// route update
Route::post('/update/{id}', [PegawaiController::class, 'update']);
// route hapus
Route::get('/delete/{id}', [PegawaiController::class, 'delete']);

// route pdf
Route::get('/export', [PegawaiController::class, 'export']);
