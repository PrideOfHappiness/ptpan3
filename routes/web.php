<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\AuthDosenController;
use App\Http\Controllers\AuthMahasiswaController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\Pengambilan_MatakuliahController;

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
    return view('navbar/navbar');
});

//Routing Login
Route::get('/mahasiswa', [LoginPageController::class, 'MahasiswaLogin']);
Route::get('/dosen', [LoginPageController::class, 'DosenLogin']);
Route::get('/admin', [LoginPageController::class, 'AdminLogin']);

//Auth
Route::get('/mahasiswa/Home', function () {
    return view('dashboard\dashboardMahasiswa');
})->middleware('auth');

Route::get('/dosen/Home', function () {
    return view('dashboard\dashboardDosen');
})->middleware('auth');

Route::get('/admin/Home', function () {
    return view('dashboard\dashboardAdmin');
})->middleware('auth');

Route::any('/mahasiswa/login', [AuthMahasiswaController::class, 'login'])->name('loginMhs');
Route::post('/logoutMhs', [AuthMahasiswaController::class, 'logout'])->name('logoutMhs');

Route::any('/dosen/login', [AuthDosenController::class, 'login'])->name('loginDsn');
Route::post('/logoutDsn', [AuthDosenController::class, 'logout'])->name('logoutDsn');

Route::any('/admin/login', [AuthAdminController::class, 'login'])->name('loginAdm');
Route::post('/logoutAdm', [AuthAdminController::class, 'logout'])->name('logoutAdm');

//Semester
Route::resource('semester', SemesterController::class);

//User
Route::resource('user', UserController::class);

//Matakuliah
Route::resource('matakuliah', MatakuliahController::class);

//Pengambilan_Matakuliah
Route::resource('pengambilan_matakuliah', Pengambilan_MatakuliahController::class);
