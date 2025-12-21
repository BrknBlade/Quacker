<?php

use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return redirect('quacks');
});

Route::resource('quacks', QuackController::class)->middleware('auth');
Route::resource('quashtags', QuashtagController::class)->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::resource('users', UserController::class);
