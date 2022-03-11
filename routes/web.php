<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandaraController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PesawatController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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


//Index
Route::get('/', [PageController::class, 'index'])->name('index');
//About us
Route::get('about', [PageController::class, 'about']);

//Route Auth
Auth::routes();

//Cari tiket 
Route::get('/tiket/pesawat', [BandaraController::class, 'index']);
Route::post('/tiket/pesawat/search', [JadwalController::class, 'cariJadwal']);

//Route user
Route::group(['middleware' => 'user'], function () {
    //Index
    Route::get('/user/dashboard', [HomeController::class, 'userDashboard'])->name('userDashboard');
    //Route Booking
    Route::get('/tiket/pesawat/detail-ticket/{id}', [BookingController::class, 'detailTiket']);
    // Route Pemesanan
    Route::post('/tiket/pesawat/pesan/', [BookingController::class, 'pesan']);
    // Route Pemesanan Berhasil
    Route::get('/tiket/pemesanan-berhasil', function () {
        return view('berhasil.pemesanan-berhasil');
    });
    //Route Pembayaran
    Route::get('/tiket/pesawat/bayar/{id}', [TransaksiController::class, 'bayar']);
    Route::post('/tiket/pesawat/bayar/proses', [TransaksiController::class, 'store']);
    //Route Pembayaran Berhasil
    Route::get('/tiket/pembayaran-berhasil', function () {
        return view('berhasil.pembayaran-berhasil');
    });
    //Route Batalkan Pemesanan
    Route::get('/tiket/pesawat/batalkan/{id}', [TransaksiController::class, 'cancel']);
});

//Route Admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('adminDashboard');
    //Admin
    //Data Admin
    Route::get('/admin/dashboard/admin', [AdminController::class, 'getAdmin']);
    //Edit Admin Jadikan User
    Route::get('/admin/dashboard/admin/jadikan-user/{id}', [AdminController::class, 'edit']);
    Route::get('/admin/dashboard/admin/jadikan-user/proses/{id}', [AdminController::class, 'proses']);
//User
    //Data User
    Route::get('/admin/dashboard/user', [UserController::class, 'getUser']);
    //Edit User Jadikan Admin
    Route::get('/admin/dashboard/user/jadikan-admin/{id}', [UserController::class, 'edit']);
    Route::get('/admin/dashboard/user/jadikan-admin/proses/{id}', [UserController::class, 'proses']);

//Bandara
    //Data Bandara
    Route::get('/admin/dashboard/bandara', [BandaraController::class, 'getBandara']);
    //Tambah Bandara
    Route::get('/admin/dashboard/bandara/tambah-data', [BandaraController::class, 'tambahData']);
    Route::post('/admin/dashboard/bandara/tambah-data/proses', [BandaraController::class, 'tambahDataProses']);
    //Update Bandara
    Route::get('/admin/dashboard/bandara/update/{id}', [BandaraController::class, 'update']);
    Route::post('/admin/dashboard/bandara/update/proses/{id}', [BandaraController::class, 'prosesUpdate']);
    //Delete Bandara
    Route::get('/admin/dashboard/bandara/delete/{id}', [BandaraController::class, 'delete']);
    Route::get('/admin/dashboard/bandara/delete/proses/{id}', [BandaraController::class, 'deleteProses']);
//Pesawat
    //Data Pesawat
    Route::get('/admin/dashboard/pesawat', [PesawatController::class, 'getPesawat']);
    //Tambah Pesawat
    Route::get('/admin/dashboard/pesawat/tambah-data', [PesawatController::class, 'tambahData']);
    Route::post('/admin/dashboard/pesawat/tambah-data/proses', [PesawatController::class, 'tambahDataProses']);
    //Update Pesawat
    Route::get('/admin/dashboard/pesawat/update/{id}', [PesawatController::class, 'update']);
    Route::post('/admin/dashboard/pesawat/update/proses/{id}', [PesawatController::class, 'prosesUpdate']);
    //Delete Bandara
    Route::get('/admin/dashboard/pesawat/delete/{id}', [PesawatController::class, 'delete']);
    Route::get('/admin/dashboard/pesawat/delete/proses/{id}', [PesawatController::class, 'deleteProses']);
//Jadwal
    //Data Jadwal
    Route::get('/admin/dashboard/jadwal', [JadwalController::class, 'getJadwal']);
    //Tambah Jadwal
    Route::get('/admin/dashboard/jadwal/tambah-data', [JadwalController::class, 'tambahData']);
    Route::post('/admin/dashboard/jadwal/tambah-data/proses', [JadwalController::class, 'tambahDataProses']);
    //Update Jadwal
    Route::get('/admin/dashboard/jadwal/update/{id}', [JadwalController::class, 'update']);
    Route::post('/admin/dashboard/jadwal/update/proses/{id}', [JadwalController::class, 'prosesUpdate']);
    //Delete Jadwal
    Route::get('/admin/dashboard/jadwal/delete/{id}', [JadwalController::class, 'delete']);
    Route::get('/admin/dashboard/jadwal/delete/proses/{id}', [JadwalController::class, 'deleteProses']);
//Pemesanan
    //Data Pemesanan
    Route::get('/admin/dashboard/pemesanan', [BookingController::class, 'getPemesanan']);
//Transaksi
    //Data Transaksi
    Route::get('/admin/dashboard/transaksi', [TransaksiController::class, 'getTransaksi']);
});






// Route::get('/tiket-pesawat', [BandaraController::class, 'index']);
// Route::get('/dump', [BookingController::class, 'test']);
Route::get('/tes', function () {
    return view('admin.layout.master-admin');
});
