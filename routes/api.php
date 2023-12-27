<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TripController;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/verify', [LoginController::class, 'verify'])->name('verifyLoginCode');
Route::post('/setName', [LoginController::class, 'setName'])->name('setName');
Route::post('/setDriverData', [DriverController::class, 'setDriverData'])->name('setDriverData');