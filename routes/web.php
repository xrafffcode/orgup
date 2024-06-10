<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\InstructorController;
use App\LandingController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'app.'], function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');

    Route::prefix('kelas')->name('course.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/{slug}', [CourseController::class, 'show'])->name('show');

        Route::post('/{slug}/enroll', [CourseController::class, 'enroll'])->name('enroll');

        Route::get('/play/{slug}', [CourseController::class, 'play'])->name('play');
    });

    Route::prefix('instruktur')->name('instructor.')->group(function () {
        Route::get('/', [InstructorController::class, 'index'])->name('index');
    });

    Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
