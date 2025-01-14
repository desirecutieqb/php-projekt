@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj Wypożyczenie</h1>

    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="member_id">Członek</label>
            <select name="member_id" class="form-control" required>
                <option value="">Wybierz członka</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="borrow_date">Data wypożyczenia</label>
            <input type="date" name="borrow_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="return_date">Data zwrotu</label>
            <input type="date" name="return_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj Wypożyczenie</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
    