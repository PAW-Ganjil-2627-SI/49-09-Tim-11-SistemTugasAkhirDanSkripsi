<?php

use App\Http\Controllers\DosenController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dosen.index'));

Route::resource('dosen', DosenController::class)->except(['show', 'create']);