@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj Wypożyczenie Książki</h1>

    <form action="{{ route('book_borrows.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="borrow_id">Wypożyczenie</label>
            <select name="borrow_id" class="form-control" required>
                <option value="">Wybierz wypożyczenie</option>
                @foreach($borrows as $borrow)
                    <option value="{{ $borrow->id }}">{{ $borrow->id }} - {{ $borrow->member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="book_id">Książka</label>
            <select name="book_id" class="form-control" required>
                <option value="">Wybierz książkę</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj Wypożyczenie Książki</button>
        <a href="{{ route('book_borrows.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
