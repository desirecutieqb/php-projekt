<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Strona główna
Route::get('/', function () {
    return view('layouts.app');
});

// Dashboard dostępny tylko dla zalogowanych i zweryfikowanych użytkowników
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Trasy wymagające autoryzacji
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Zarządzanie książkami (tylko dla administratorów i pracowników)
    Route::middleware('role:admin,staff')->group(function () {
        Route::resource('books', BookController::class);
    });

    // Zarządzanie członkami (tylko dla administratorów)
    Route::middleware('role:admin')->group(function () {
        Route::resource('members', MemberController::class);
    });

    // Zarządzanie kategoriami (tylko dla administratorów)
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
    });

    // Dodatkowe trasy np. recenzje, rezerwacje
    // Możesz je dodać w podobny sposób.
});

// Pliki autoryzacyjne (np. logowanie, rejestracja)
require __DIR__.'/auth.php';