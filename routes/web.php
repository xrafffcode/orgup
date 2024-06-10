<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'app.'], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('landing');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
