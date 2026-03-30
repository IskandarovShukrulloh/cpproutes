<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;

Route::view('/', 'pages.homepage')->name('home');
Route::view('/admin-panel', 'pages.admin')->name('admin-panel');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// CRUD ресурсы
Route::resource('users', UserController::class);
Route::resource('modules', ModuleController::class);

require __DIR__.'/settings.php';
