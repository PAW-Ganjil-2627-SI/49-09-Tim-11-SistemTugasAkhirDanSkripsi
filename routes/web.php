<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuangSidangController;

Route::redirect('/', '/topik');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('topik', TopikController::class)->except(['create', 'show']);
    Route::resource('mahasiswa', MahasiswaController::class)->except(['create', 'show']);
    Route::resource('dosen', DosenController::class)->except(['create', 'show']);
    Route::resource('ruang', RuangSidangController::class);

});
