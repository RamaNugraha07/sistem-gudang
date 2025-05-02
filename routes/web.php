<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, "index"]);
Route::get('/login', [MainController::class, "login"]);
Route::get('/sign-up-user', [MainController::class, "sign_up_user"]);

Route::post('auth/user', [MainController::class, "auth_user"]);
Route::post('signup/user', [MainController::class, "signup_user"]);
Route::post('/logout', [MainController::class, 'logout'])->name('logout');


Route::get('/dashboard', [UserController::class, "dashboard"])->name('dashboard');
Route::post('/barang', [UserController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [UserController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{id}', [UserController::class, 'update'])->name('barang.update');
Route::delete('/barang/{id}', [UserController::class, 'destroy'])->name('barang.destroy');

Route::resource('mutasi', MutasiController::class)->middleware('auth');
