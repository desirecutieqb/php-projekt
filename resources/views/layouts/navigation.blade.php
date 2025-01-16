<nav x-data="{ open: false }" class="bg-gray-900 text-white border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo lub nazwa strony -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="font-bold text-xl">Moja Aplikacja</a>
                <a href="{{ route('books.index') }}">Książki</a>
                <a href="{{ route('members.index') }}">Członkowie</a>
                <a href="{{ route('categories.index') }}">Kategorie</a>
            </div>

            <!-- Sekcja Prawa -->
            <div class="flex items-center space-x-4">
                @auth
                    <!-- Nazwa użytkownika -->
                    <span>{{ Auth::user()->name }}</span>

                    <!-- Formularz wylogowania -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="px-4 py-2 bg-red-600 rounded hover:bg-red-700 transition">
                            Wyloguj
                        </button>
                    </form>
                @else
                    <!-- Link do logowania/rejestracji -->
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 bg-blue-600 rounded hover:bg-blue-700 transition">
                        Zaloguj
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>