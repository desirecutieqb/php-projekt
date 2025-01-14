@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj Wypożyczenie Książki</h1>

    <form action="{{ route('book_borrows.update', $bookBorrow) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="borrow_id">Wypożyczenie</label>
            <select name="borrow_id" class="form-control" required>
                <option value="">Wybierz wypożyczenie</option>
                @foreach($borrows as $borrow)
                    <option value="{{ $borrow->id }}" {{ $borrow->id == $bookBorrow->borrow_id ? 'selected' : '' }}>
                        {{ $borrow->id }} - {{ $borrow->member->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_id">Książka</label>
            <select name="book_id" class="form-control" required>
                <option value="">Wybierz książkę</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $bookBorrow->book_id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Wypożyczenie Książki</button>
        <a href="{{ route('book_borrows.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
