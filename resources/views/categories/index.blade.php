@extends('layouts.app')

@section('title', 'Lista książek')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Lista Książek</h1>
    
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Dodaj Książkę
    </a>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Tytuł</th>
                <th class="py-2 px-4 border-b">Autor</th>
                <th class="py-2 px-4 border-b">Rok Wydania</th>
                <th class="py-2 px-4 border-b">Gatunek</th>
                <th class="py-2 px-4 border-b">Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td class="py-2 px-4 border-b">{{ $book->title }}</td>
                <td class="py-2 px-4 border-b">{{ $book->author }}</td>
                <td class="py-2 px-4 border-b">{{ $book->published_year }}</td>
                <td class="py-2 px-4 border-b">{{ $book->genre }}</td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 hover:underline">Pokaż</a> |
                    <a href="{{ route('books.edit', $book->id) }}" class="text-green-600 hover:underline">Edytuj</a> |
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Czy na pewno chcesz usunąć tę książkę?');">
                            Usuń
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginacja -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection