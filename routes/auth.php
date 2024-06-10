<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/masuk', [LoginController::class, 'index'])->name('login');
Route::post('/masuk', [LoginController::class, 'login'])->name('login.post');

Route::get('/daftar', [RegisterController::class, 'index'])->name('register');
Route::post('/daftar', [RegisterController::class, 'store'])->name('register.post');

Route::get('/verifikasi', [RegisterController::class, 'verification'])->name('verification');
Route::post('/verifikasi', [RegisterController::class, 'verify'])->name('verification.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
