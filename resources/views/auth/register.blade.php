<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center ">
        
        <!-- Box z formularzem rejestracji -->
        <div class="w-full sm:max-w-md bg-white shadow-lg rounded-lg p-6">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Zarejestruj się</h1>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-1">Nazwa użytkownika</label>
                    <input id="name" type="text" name="name"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           value="{{ old('name') }}" required autofocus autocomplete="name" />
                    @error('name')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">Adres email</label>
                    <input id="email" type="email" name="email"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           value="{{ old('email') }}" required autocomplete="username" />
                    @error('email')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-1">Hasło</label>
                    <input id="password" type="password" name="password"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           required autocomplete="new-password" />
                    @error('password')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block font-semibold mb-1">Potwierdź hasło</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           required autocomplete="new-password" />
                    @error('password_confirmation')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                        Masz już konto?
                    </a>

                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Zarejestruj
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>