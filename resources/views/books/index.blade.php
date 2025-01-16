@extends('layouts.app')

@section('title', 'Lista książek')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Lista Książek</h1>

    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-4">
        <a href="{{ route('books.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
           Dodaj książkę
        </a>

        <!-- Przykładowy formularz wyszukiwania -->
        <form action="{{ route('books.index') }}" method="GET" class="flex">
            <input type="text" name="search" placeholder="Szukaj..."
                   class="border border-gray-300 rounded-l px-3 py-2 focus:outline-none"
                   value="{{ request('search') }}">
            <button type="submit"
                    class="bg-gray-300 px-4 py-2 rounded-r hover:bg-gray-400 transition">
                Szukaj
            </button>
        </form>
    </div>

    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Tytuł</th>
                <th class="py-2 px-4 text-left">Autor</th>
                <th class="py-2 px-4 text-left">Rok</th>
                <th class="py-2 px-4 text-left">Gatunek</th>
                <th class="py-2 px-4 text-center">Akcje</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($books as $book)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $book->id }}</td>
                <td class="py-2 px-4">{{ $book->title }}</td>
                <td class="py-2 px-4">{{ $book->author }}</td>
                <td class="py-2 px-4">{{ $book->published_year }}</td>
                <td class="py-2 px-4">{{ $book->genre }}</td>
                <td class="py-2 px-4 text-center">
                    <a href="{{ route('books.show', $book->id) }}"
                       class="text-blue-600 hover:underline mr-2">
                       Pokaż
                    </a>
                    <a href="{{ route('books.edit', $book->id) }}"
                       class="text-green-600 hover:underline mr-2">
                       Edytuj
                    </a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-600 hover:underline"
                                onclick="return confirm('Na pewno usunąć?');">
                            Usuń
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="py-2 px-4 text-center text-gray-500">
                    Brak książek w bazie.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Przykładowa paginacja (jeśli w kontrolerze używasz ->paginate()) -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</div>
@endsection