<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Wyświetla listę wszystkich książek.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(10); 
        return view('books.index', compact('books'));
    }

    /**
     * Wyświetla formularz do dodania nowej książki.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Zapisuje nową książkę w bazie danych.
     */
    public function store(Request $request)
    {
        // Walidacja
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|numeric|min:1000|max:9999',
            'genre' => 'required|string|max:255',
        ]);

        // Tworzenie książki
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_year' => $request->published_year,
            'genre' => $request->genre,
        ]);

        return redirect()->route('books.index')
                         ->with('success', 'Książka została dodana pomyślnie!');
    }

    /**
     * Wyświetla szczegółowe informacje o wybranej książce.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Wyświetla formularz do edycji wybranej książki.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Aktualizuje dane o książce w bazie.
     */
    public function update(Request $request, Book $book)
    {
        // Walidacja
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|numeric|min:1000|max:9999',
            'genre' => 'required|string|max:255',
        ]);

        // Aktualizacja danych
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'published_year' => $request->published_year,
            'genre' => $request->genre,
        ]);

        return redirect()->route('books.index')
                         ->with('success', 'Dane książki zostały zaktualizowane!');
    }

    /**
     * Usuwa wybraną książkę z bazy danych.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
                         ->with('success', 'Książka została usunięta!');
    }
}