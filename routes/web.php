<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/cars', [App\Http\Controllers\CarController::class, 'index']);
Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'show']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/auth', function () {
    return view('auth');
})->name('login');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update']);
    
    Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites');
    Route::post('/favorites/{car}/toggle', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorites.toggle');

    Route::get('/contracts', [App\Http\Controllers\ContractController::class, 'index'])->name('contracts');
    Route::get('/contracts/create', [App\Http\Controllers\ContractController::class, 'create'])->name('contracts.create');
    Route::post('/contracts', [App\Http\Controllers\ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts/{contract}', [App\Http\Controllers\ContractController::class, 'show'])->name('contracts.show');
});
