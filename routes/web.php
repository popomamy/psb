<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.auth');
    Route::resource('register', RegisterController::class)->only('index', 'store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard.index');
    });

    Route::resource('pendaftar', PendaftarController::class)->middleware('role:admin');
    Route::resource('form', FormController::class)->middleware('role:siswa');
    Route::resource('dashboard', DashboardController::class)->only('index');

    Route::post('logout', [LoginController::class, 'logout'])->name('login.logout');
});
