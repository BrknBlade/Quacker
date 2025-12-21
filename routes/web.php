<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('quacks');
});

Route::resource('quacks', QuackController::class);
Route::resource('quashtags', QuashtagController::class);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);



Route::get('/quacks', [QuackController::class, 'index'])->middleware('auth');
