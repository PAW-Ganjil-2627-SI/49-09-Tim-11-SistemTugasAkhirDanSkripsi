<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopikController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/topik');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Satu baris ini membuat route index, store, edit, update, destroy
    Route::resource('topik', TopikController::class)->except(['create', 'show']);
});