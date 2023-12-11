<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
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
Route::middleware(['guest'])->group(function (){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function(){
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/owner', [AdminController::class, 'owner'])->middleware('userAkses:owner');
    Route::get('/admin/kasir', [AdminController::class, 'kasir'])->middleware('userAkses:kasir');
    Route::resource('users', UsersController::class)->middleware('userAkses:owner');
    Route::resource('users', UsersController::class)->only(['show'])->middleware('userAkses:kasir');
    Route::resource('menus', MenuController::class);
    Route::resource('transaksis', TransaksiController::class);
    Route::resource('statistik', StatistikController::class)->middleware('userAkses:owner');
    Route::resource('kategoris', KategoriController::class)->middleware('userAkses:owner');
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('home', HomeController::class);
    Route::get('/logout', [SesiController::class, 'logout']);
});
