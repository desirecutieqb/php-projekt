@extends('layouts.app')

@section('title', 'Edytuj książkę')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Edytuj Książkę</h1>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST"
          class="bg-white shadow-md p-6 rounded">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block mb-1 font-semibold">Tytuł:</label>
            <input type="text" name="title" id="title"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                   value="{{ old('title', $book->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="author" class="block mb-1 font-semibold">Autor:</label>
            <input type="text" name="author" id="author"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                   value="{{ old('author', $book->author) }}" required>
        </div>

        <div class="mb-4">
            <label for="published_year" class="block mb-1 font-semibold">Rok wydania:</label>
            <input type="number" name="published_year" id="published_year"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                   value="{{ old('published_year', $book->published_year) }}" required>
        </div>

        <div class="mb-4">
            <label for="genre" class="block mb-1 font-semibold">Gatunek:</label>
            <input type="text" name="genre" id="genre"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                   value="{{ old('genre', $book->genre) }}">
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Zapisz zmiany
        </button>

        <a href="{{ route('books.index') }}"
           class="ml-4 text-gray-700 hover:underline">
           Anuluj
        </a>
    </form>
</div>
@endsection