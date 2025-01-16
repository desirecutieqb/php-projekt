<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Wyświetla listę wszystkich kategorii.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Formularz do dodania nowej kategorii.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Zapisuje nową kategorię w bazie danych.
     */
    public function store(Request $request)
    {
        // Walidacja
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Tworzenie kategorii
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Kategoria została dodana pomyślnie!');
    }

    /**
     * Wyświetla szczegółowe informacje o wybranej kategorii.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Formularz edycji kategorii.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Aktualizuje nazwę kategorii w bazie.
     */
    public function update(Request $request, Category $category)
    {
        // Walidacja
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        // Aktualizacja danych
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Kategoria została zaktualizowana!');
    }

    /**
     * Usuwa wybraną kategorię z bazy danych.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
                         ->with('success', 'Kategoria została usunięta!');
    }
}