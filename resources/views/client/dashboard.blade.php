@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel Klienta</h1>
    <a href="{{ route('client.borrow.books') }}" class="btn btn-primary">Wypożycz książki</a>
    <a href="{{ route('client.my.reservations') }}" class="btn btn-primary">Moje rezerwacje</a>
</div>
@endsection