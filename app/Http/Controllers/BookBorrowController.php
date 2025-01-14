<?php

namespace App\Http\Controllers;

use App\Models\BookBorrow;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BookBorrowController extends Controller
{
    public function index()
    {
        $bookBorrows = BookBorrow::with(['borrow', 'book'])->paginate(10);
        return view('book_borrows.index', compact('bookBorrows'));
    }

    public function create()
    {
        $borrows = Borrow::all();
        $books = Book::all();
        return view('book_borrows.create', compact('borrows', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'borrow_id' => 'required|exists:borrows,id',
            'book_id' => 'required|exists:books,id',
        ]);

        BookBorrow::create($request->all());
        return redirect()->route('book_borrows.index')->with('success', 'Książka została dodana do wypożyczenia.');
    }

    public function edit(BookBorrow $bookBorrow)
    {
        $borrows = Borrow::all();
        $books = Book::all();
        return view('book_borrows.edit', compact('bookBorrow', 'borrows', 'books'));
    }

    public function update(Request $request, BookBorrow $bookBorrow)
    {
        $request->validate([
            'borrow_id' => 'required|exists:borrows,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $bookBorrow->update($request->all());
        return redirect()->route('book_borrows.index')->with('success', 'Wypożyczenie książki zostało zaktualizowane.');
    }

    public function destroy(BookBorrow $bookBorrow)
    {
        $bookBorrow->delete();
        return redirect()->route('book_borrows.index')->with('success', 'Wypożyczenie książki zostało usunięte.');
    }
}
