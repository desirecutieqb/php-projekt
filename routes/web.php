<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/manage-books', [AdminController::class, 'manageBooks'])->name('admin.manage.books');
    Route::get('/admin/manage-members', [AdminController::class, 'manageMembers'])->name('admin.manage.members');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client', [ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/client/borrow-books', [ClientController::class, 'borrowBooks'])->name('client.borrow.books');
    Route::get('/client/my-reservations', [ClientController::class, 'myReservations'])->name('client.my.reservations');
});

Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.dashboard');
    Route::get('/employee/manage-borrows', [EmployeeController::class, 'manageBorrows'])->name('employee.manage.borrows');
    Route::post('/employee/approve-reservation/{id}', [EmployeeController::class, 'approveReservation'])->name('employee.approve.reservation');
});