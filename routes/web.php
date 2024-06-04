<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\PemakaianStokController;
use App\Http\Controllers\PersediaanBarangController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\PemakaianStok;
use Illuminate\Support\Facades\Route;

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

//  jika user belum login
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/sign-in', [AuthController::class, 'login'])->name('login');
    Route::post('/sign-in', [AuthController::class, 'dologin']);
    Route::get('/sign-up', [AuthController::class, 'signup']);
    Route::post('/sign-up', [AuthController::class, 'signuppost']);
    Route::post('/kritik-saran', [KritikSaranController::class, 'store']);
});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/users', UserController::class);
    Route::get('/antrian', [AntrianController::class, "index"]);
    Route::patch('/antrian/{id}/edit', [AntrianController::class, "update"]);
    Route::get('/kritik-saran', [KritikSaranController::class, "index"]);
    Route::resource('/persediaan-barang', PersediaanBarangController::class);
    Route::resource('/jenis-layanan', JenisLayananController::class);

    Route::get('/pemakaian-stok', [PemakaianStokController::class, 'index']);
    Route::post('/pemakaian-stok', [PemakaianStokController::class, 'store']);
    Route::get('/pemakaian-stok/create', [PemakaianStokController::class, 'create']);

    Route::resource('/transaksi', TransaksiController::class);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function () {
    Route::get('/customer', [CustomerController::class, 'index']);
    Route::post('/antrian', [AntrianController::class, 'store']);
});