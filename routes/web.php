<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/mine', [MainController::class, 'byUserId'])->middleware(['auth'])->name('mine');
Route::post('/mine', [MainController::class, 'byUserId'])->middleware(['auth'])->name('mine');
Route::get('/riwayat', [MainController::class, 'riwayat'])->middleware(['auth'])->name('riwayat');

Route::get('/dealins/{id}/edit', [MainController::class, 'edit'])->middleware(['auth'])->name('edit-form');
Route::get('/create', [MainController::class, 'create'])->middleware(['auth'])->name('create-form');
Route::post('/dealins/{id}/update', [MainController::class, 'update'])->middleware(['auth'])->name('update');
Route::post('/add', [MainController::class, 'store'])->middleware(['auth'])->name('add');
Route::get('/dealins/{id}', [MainController::class, 'show'])->name('show');
Route::get('/dealins/{id}/delete', [MainController::class, 'delete'])->middleware(['auth'])->name('delete');
Route::get('/dealins/', [MainController::class, 'search'])->name('search');
Route::get('/', [MainController::class, 'home'])->middleware(['auth'])->name('dashboard');
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/profile', [MainController::class, 'showProfile'])->middleware(['auth'])->name('profile');
Route::post('/profile/update', [MainController::class, 'updateProfile'])->middleware(['auth'])->name('update_profile');
Route::post('/pengaturan', [MainController::class, 'pengaturan'])->middleware(['auth'])->name('pengaturan');





require __DIR__ . '/auth.php';
