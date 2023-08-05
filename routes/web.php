<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPegawaiController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class,'index'])->middleware('isGuest');

Route::get('login', [AuthController::class,'login_view'])->middleware('isGuest');
Route::get('register', [AuthController::class,'register_view'])->middleware('isGuest');

Route::post('create_register', [AuthController::class,'create_register']);
Route::post('/create_login', [AuthController::class, 'create_login']);

Route::get('dashboard', [DashboardController::class,'index'])->middleware('isLogin');

Route::get('admin', [DashboardAdminController::class,'index'])->middleware('isLogin');

Route::get('pegawai', [DashboardPegawaiController::class,'index'])->middleware('isLogin');


Route::get('logout', [AuthController::class,'logout']);


Route::get('penjualan', [PenjualanController::class, 'index'])->middleware('isLogin');
Route::get('tambah_penjualan', [PenjualanController::class, 'tambah'])->middleware('isLogin');
Route::post('proses_tambah_penjualan', [PenjualanController::class, 'proses_tambah']);

Route::get('barang', [BarangController::class, 'index'])->middleware('isLogin');
Route::get('tambah_barang', [BarangController::class, 'tambah'])->middleware('isLogin');
Route::post('proses_tambah_barang', [BarangController::class, 'proses_tambah']);

Route::delete('hapus_penjualan/{id}', [PenjualanController::class, 'hapus'])->where('id', '[0-9]+');
Route::get('edit_penjualan/{id}', [PenjualanController::class, 'edit'])->where('id', '[0-9]+')->middleware('isLogin');
Route::put('proses_edit_penjualan/{id}', [PenjualanController::class, 'proses_edit'])->where('id', '[0-9]+');

// Route::get('/create_register', function () {
//     return view('homepage');
// });
