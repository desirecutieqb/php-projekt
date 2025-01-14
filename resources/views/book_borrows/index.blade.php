@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Książki Wypożyczone</h1>
    <a href="{{ route('book_borrows.create') }}" class="btn btn-primary">Dodaj Wypożyczenie Książki</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Wypożyczenie</th>
                <th>Książka</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookBorrows as $bookBorrow)
                <tr>
                    <td>{{ $bookBorrow->borrow->id }}</td>
                    <td>{{ $bookBorrow->book->title }}</td>
                    <td>
                        <a href="{{ route('book_borrows.edit', $bookBorrow) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('book_borrows.destroy', $bookBorrow) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Czy na pewno chcesz usunąć to wypożyczenie książki?');">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $bookBorrows->links() }} <!-- Linki do paginacji -->
</div>
@endsection