@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel Administratora</h1>
    <a href="{{ route('admin.manage.books') }}" class="btn btn-primary">Zarządzaj książkami</a>
    <a href="{{ route('admin.manage.members') }}" class="btn btn-primary">Zarządzaj członkami</a>
</div>
@endsection