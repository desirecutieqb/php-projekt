<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Strona główna
Route::get('/', function () {
    // Możesz np. return view('welcome');
    // jeśli 'layouts.app' jest tylko layoutem, a nie stroną główną.
    return view('layouts.app');
});
Route::middleware('role:admin|employee')->get('/test-role', function() {
    return 'Middleware role:admin|employee zadziałało!';
});

// Trasy rejestracji (jeśli używasz własnego RegisteredUserController)
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Dashboard dostępny tylko dla zalogowanych i zweryfikowanych użytkowników
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Wylogowanie
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Trasy wymagające autoryzacji
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Zarządzanie książkami (tylko dla admin lub employee)
    Route::middleware('role:admin|employee')->group(function () {
        Route::resource('books', BookController::class);
    });

    // Zarządzanie członkami (również dla admin lub employee)
    Route::middleware('role:admin|employee')->group(function () {
        Route::resource('members', MemberController::class);
    });

    // Zarządzanie kategoriami (również admin lub employee)
    Route::middleware('role:admin|employee')->group(function () {
        Route::resource('categories', CategoryController::class);
    });

    // Możesz dodać kolejne trasy dla recenzji, rezerwacji itp.
});

// Pliki autoryzacyjne (np. logowanie, reset hasła)
require __DIR__ . '/auth.php';