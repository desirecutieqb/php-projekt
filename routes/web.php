<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BookBorrowController;

Route::resource('members', MemberController::class);
Route::resource('borrows', BorrowController::class);
Route::resource('book_borrows', BookBorrowController::class);
Route::resource('books', BookController::class);
Route::get('/', [LibraryController::class, 'index']);

