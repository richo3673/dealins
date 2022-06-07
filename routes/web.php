<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DealinController;
use App\Http\Controllers\SearchController;
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



Route::get('/login', function () {
    return view('welcome');
});

Route::get('/mine', [MainController::class, 'byUserId'])->middleware(['auth'])->name('mine');
Route::post('/mine', [MainController::class, 'byUserId'])->middleware(['auth'])->name('mine');
Route::get('/pengaturan', [MainController::class, 'pengaturan'])->middleware(['auth'])->name('pengaturan');
Route::get('/dealins/{id}/edit', [MainController::class, 'edit'])->middleware(['auth'])->name('edit-form');
Route::get('/create', [MainController::class, 'create'])->middleware(['auth'])->name('create-form');
Route::get('/', [MainController::class, 'home'])->middleware(['auth'])->name('dashboard');
Route::get('/', [MainController::class, 'home'])->name('home');

Route::post('/dealins/{id}/update', [DealinController::class, 'update'])->middleware(['auth'])->name('update');
Route::post('/add', [DealinController::class, 'store'])->middleware(['auth'])->name('add');
Route::get('/dealins/{id}', [DealinController::class, 'show'])->name('show');
Route::get('/dealins/{id}/delete', [DealinController::class, 'delete'])->middleware(['auth'])->name('delete');
Route::get('/dealins/', [SearchController::class, 'search'])->name('search');

Route::get('/profile', [UserController::class, 'showProfile'])->middleware(['auth'])->name('profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->middleware(['auth'])->name('update_profile');
Route::post('/pengaturan/hapus_akun', [UserController::class, 'deleteUser'])->middleware(['auth'])->name('hapus_akun');

Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->middleware(['auth'])->name('riwayat');
Route::get('/pengaturan/hapus_riwayat', [RiwayatController::class, 'hapusRiwayat'])->middleware(['auth'])->name('hapus_riwayat');

require __DIR__ . '/auth.php';
