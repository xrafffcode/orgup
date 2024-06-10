<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return "Dashboard";
    })->name('dashboard');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
