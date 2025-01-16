@extends('layouts.app')

@section('content')
<nav class="bg-white p-4 flex justify-between items-center">
        <div>
            <a href="{{ route('dashboard') }}" class="font-bold mr-4">Dashboard</a>
        </div>

        <div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                        Wyloguj
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                   Zaloguj
                </a>
            @endguest
        </div>
    </nav>
<div class="container">
    <h1>Panel Administratora</h1>
    <a href="{{ route('admin.manage.books') }}" class="btn btn-primary">Zarządzaj książkami</a>
    <a href="{{ route('admin.manage.members') }}" class="btn btn-primary">Zarządzaj członkami</a>
</div>
@endsection