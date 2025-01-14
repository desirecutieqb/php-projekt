@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Książki</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Dodaj Książkę</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Rok wydania</th>
                <th>Gatunek</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tę książkę?');">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $books->links() }} <!-- Linki do paginacji -->
</div>
@endsection
