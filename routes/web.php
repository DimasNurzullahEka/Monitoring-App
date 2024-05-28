<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KodeController;
use App\Http\Controllers\Lokasi__Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\Type_Controller;
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
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::resource('lokasi', Lokasi__Controller::class);
Route::resource('type',TipeController::class);
Route::resource('kode',KodeController::class);
Route::resource('barang',BarangController::class);

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update_avatar')->middleware('auth');

Route::get('lokasis/success', [Lokasi__Controller::class, 'success'])->name('lokasi.success');
Route::get('types/success', [TipeController::class, 'success'])->name('type.success');
Route::get('barangs/success', [BarangController::class, 'success'])->name('barang.success');
Route::get('kodes/success', [KodeController::class, 'success'])->name('kode.success');
Route::get('/filter-barang', [BarangController::class, 'filter'])->name('filter.barang');
Route::get('/autocomplete', [BarangController::class, 'autocomplete'])->name('autocomplete');

