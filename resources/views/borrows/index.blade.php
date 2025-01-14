@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wypożyczenia</h1>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary">Dodaj Wypożyczenie</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Członek</th>
                <th>Data wypożyczenia</th>
                <th>Data zwrotu</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->member->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        <a href="{{ route('borrows.edit', $borrow) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('borrows.destroy', $borrow) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć to wypożyczenie?');">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $borrows->links() }} <!-- Linki do paginacji -->
</div>
@endsection
