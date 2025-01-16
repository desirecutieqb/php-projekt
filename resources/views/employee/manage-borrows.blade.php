@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zarządzaj Wypożyczeniami</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Członek</th>
                <th>Książka</th>
                <th>Data wypożyczenia</th>
                <th>Data zwrotu</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            <tr>
                <td>{{ $borrow->member->name }}</td>
                <td>{{ $borrow->book->title }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date ?? 'Nie zwrócono' }}</td>
                <td>
                    @if($borrow->return_date)
                    <span class="text-success">Zwrócono</span>
                    @else
                    <span class="text-danger">Nie zwrócono</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection