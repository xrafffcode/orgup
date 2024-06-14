<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\ForumController;
use App\Http\Controllers\Frontend\InstructorController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\SettingController;
use App\LandingController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'app.'], function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');

    Route::prefix('kelas')->name('course.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/{slug}', [CourseController::class, 'show'])->name('show');

        Route::post('/{slug}/enroll', [CourseController::class, 'enroll'])->name('enroll')->middleware('auth');

        Route::get('/play/{slug}', [CourseController::class, 'play'])->name('play')->middleware('auth');
    });

    Route::prefix('instruktur')->name('instructor.')->group(function () {
        Route::get('/', [InstructorController::class, 'index'])->name('index');
    });

    Route::prefix('artikel')->name('article.')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('/{slug}', [ArticleController::class, 'show'])->name('show');
    });

    Route::prefix('forum')->name('forum.')->group(function () {
        Route::get('/', [ForumController::class, 'index'])->name('index');

        Route::get('/topik/{id}', [ForumController::class, 'show'])->name('show');

        Route::post('/{id}/comment', [ForumController::class, 'comment'])->name('comment')->middleware('auth');

        Route::post('/{slug}/reply', [ForumController::class, 'reply'])->name('reply')->middleware('auth');

        Route::get('/tambah-topik', [ForumController::class, 'create'])->name('create')->middleware('auth');
        Route::post('/tambah-topik', [ForumController::class, 'store'])->name('store')->middleware('auth');
    });

    Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
});

Route::prefix('student')->name('student.')->middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kelas', [DashboardController::class, 'course'])->name('course');

    Route::get('/setting-profile', [SettingController::class, 'index'])->name('setting');
    Route::put('/setting-profile', [SettingController::class, 'update'])->name('setting.update');
});

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
