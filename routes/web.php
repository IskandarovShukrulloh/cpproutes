<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;

// Главная
Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::middleware(['auth', AdminMiddleware::class]);


// User profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});

//  Гость (НЕ авторизован)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

//  Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


////  Dashboard
//Route::middleware(['auth'])->group(function () {
//    Route::view('/dashboard', 'dashboard')->name('dashboard');
//});


// 🔒 ВСЯ админка под защитой
Route::middleware(['auth', AdminMiddleware::class])->group(function () {

    Route::view('/admin-panel', 'pages.admin')->name('admin-panel');

    Route::resource('users', UserController::class);
    Route::resource('modules', ModuleController::class);

});

require __DIR__.'/settings.php';
