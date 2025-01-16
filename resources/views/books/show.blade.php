@extends('layouts.app')

@section('title', 'Szczegóły książki')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Szczegóły książki</h1>

    <div class="bg-white shadow-md p-6 rounded">
        <p><strong>ID:</strong> {{ $book->id }}</p>
        <p><strong>Tytuł:</strong> {{ $book->title }}</p>
        <p><strong>Autor:</strong> {{ $book->author }}</p>
        <p><strong>Rok wydania:</strong> {{ $book->published_year }}</p>
        <p><strong>Gatunek:</strong> {{ $book->genre }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('books.index') }}"
           class="text-blue-600 hover:underline">
           Powrót do listy
        </a>
    </div>
</div>
@endsection