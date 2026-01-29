<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuackController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    return redirect('quacks');
});

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);

Route::middleware('auth')->group(function() {
    Route::resource('quacks', QuackController::class)->middleware('auth');
    Route::resource('quashtags', QuashtagController::class)->middleware('auth');

    Route::get('/users/{user}/quacks', [UserController::class, 'quacks'])->name('user.quacks');
    Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::post('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
    Route::resource('users', UserController::class);
});


/* Route::get('/user/quacks', [UserController::class, 'quacks']) */
/*     ->name('user.quacks') */
/*     ->middleware('auth'); */
