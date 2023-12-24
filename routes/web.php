<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

// Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/{any}', [HomeController::class, 'index'])->where('any', '.*');
