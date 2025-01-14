@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Członkowie</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary">Dodaj Członka</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Data członkostwa</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->membership_date }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member) }}" class="btn btn-warning btn-sm">Edytuj</a>
                        <form action="{{ route('members.destroy', $member) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć tego członka?');">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $members->links() }} <!-- Linki do paginacji -->
</div>
@endsection
