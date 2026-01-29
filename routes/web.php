<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjectController::class, 'index']);

Route::post('/progress', [ProjectController::class, 'storeProgress'])->name('progress.store');
