<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'index'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/create', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/applications/{id}/review', [ApplicationController::class, 'addReview'])->name('applications.review');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');

});

Route::get('/', function () {
    return view('register');
});
