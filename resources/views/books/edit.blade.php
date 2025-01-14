@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj Książkę</h1>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tytuł</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="published_year">Rok wydania</label>
            <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}" required>
        </div>
        <div class="form-group">
            <label for="genre">Gatunek</label>
            <input type="text" name="genre" class="form-control" value="{{ $book->genre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Książkę</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
