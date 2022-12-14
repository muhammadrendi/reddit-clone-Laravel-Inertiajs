<?php

use App\Http\Controllers\Frontend\CommunitieController as FrontendCommunityController;
use App\Http\Controllers\Backend\CommunitieController;
use App\Http\Controllers\Backend\CommunityPostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/r/{slug}', [FrontendCommunityController::class, 'show'])->name('community.detail');

Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/communities', CommunitieController::class);
    Route::resource('/community.post', CommunityPostController::class);
});

require __DIR__.'/auth.php';
