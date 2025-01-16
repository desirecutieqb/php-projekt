@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dostępne Książki</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Autor</th>
                <th>Rok wydania</th>
                <th>Gatunek</th>
                <th>Akcja</th>
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
                    <form method="POST" action="{{ route('client.reserve.book', $book->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Zarezerwuj</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection