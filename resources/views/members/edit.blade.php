@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj Członka</h1>

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nazwa</label>
            <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="text" name="phone" class="form-control" value="{{ $member->phone }}" required>
        </div>
        <div class="form-group">
            <label for="membership_date">Data członkostwa</label>
            <input type="date" name="membership_date" class="form-control" value="{{ $member->membership_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Zaktualizuj Członka</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Powrót</a>
    </form>
</div>
@endsection
