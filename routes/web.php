<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\CakeBookController;
use App\Http\Controllers\Admin\InformationController;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Guest Routes 
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('events', EventController::class);
    Route::resource('recipes', RecipeController::class);
    Route::resource('books', CakeBookController::class);
    
    Route::get('/information', [InformationController::class, 'edit'])->name('info.edit');
    Route::post('/information', [InformationController::class, 'update'])->name('info.update');

   
});