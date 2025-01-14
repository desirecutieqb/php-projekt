<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use App\Models\BookBorrow;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::paginate(50); // Paginacja dla książek
        $members = Member::paginate(50); // Paginacja dla członków
        $borrows = Borrow::with('member')->paginate(50); // Paginacja dla wypożyczeń
        $bookBorrows = BookBorrow::with(['borrow.member', 'book'])->paginate(50); // Paginacja dla wypożyczeń książek

        return view('layouts.app', compact('books', 'members', 'borrows', 'bookBorrows'));
    }
}
