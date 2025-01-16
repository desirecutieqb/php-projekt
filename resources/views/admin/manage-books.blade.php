@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zarządzaj Książkami</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Powrót</a>
    <table class="table">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Rok wydania</th>
                <th>Gatunek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_year }}</td>
                <td>{{ $book->genre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection