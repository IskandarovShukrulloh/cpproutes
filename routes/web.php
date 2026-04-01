<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
//use App\Http\Policies\ModulePolicy;

// ============================================
// AUTHENTICATED USER ROUTES
// ============================================
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // User's own modules
    Route::get('/my-modules', [ModuleController::class, 'myModules'])->name('modules.my');

    // CRUD for authenticated users (create, edit, update, delete their modules)
    Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::get('/modules/{module}/edit', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/{module}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/modules/{module}', [ModuleController::class, 'destroy'])->name('modules.destroy');
});

// ============================================
// PUBLIC ROUTES
// ============================================
Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/profile/{user}', [UserController::class, 'showProfile'])->name('profile.show');

// Public module viewing
Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/{module}', [ModuleController::class, 'show'])->name('modules.show');
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('lessons.show');

// ============================================
// GUEST ONLY ROUTES (Login/Register)
// ============================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ============================================
// ADMIN ROUTES
// ============================================
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::view('/admin-panel', 'pages.admin')->name('admin-panel');

    // Admin can manage all users
    Route::resource('users', UserController::class);

    // Admin can manage all modules
    Route::resource('modules', ModuleController::class)->only(['index', 'show']);
});

// ============================================
// LESSONS ROUTES
// ============================================
Route::middleware('auth')->group(function () {
    Route::get('/modules/{module}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/modules/{module}/lessons', [LessonController::class, 'store'])->name('lessons.store');


    Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});

// ============================================
// SETTINGS ROUTES
// ============================================
require __DIR__.'/settings.php';
