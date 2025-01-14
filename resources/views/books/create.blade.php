@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj Książkę</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Tytuł</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="published_year">Rok wydania</label>
            <input type="number" name="published_year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="genre">Gatunek</label>
            <input type="text" name="genre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj Książkę</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
