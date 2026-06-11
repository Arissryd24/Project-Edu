<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MarketingUserController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Home redirect ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard route dengan controller
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD resources
    Route::resource('marketing-users', MarketingUserController::class);
    Route::resource('transactions', TransactionController::class);
});

require __DIR__.'/auth.php';