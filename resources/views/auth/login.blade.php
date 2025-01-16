<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center ">
        <!-- Box z formularzem logowania -->
        <div class="w-full sm:max-w-md bg-white shadow-lg rounded-lg p-6">
            <div class="text-center mb-4">
                <h1 class="text-2xl font-bold">Zaloguj się</h1>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">Email</label>
                    <input id="email" type="email" name="email"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           required autofocus autocomplete="username" />
                    @error('email')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-1">Hasło</label>
                    <input id="password" type="password" name="password"
                           class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring"
                           required autocomplete="current-password" />
                    @error('password')
                      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="mr-2 rounded border-gray-300 focus:ring focus:ring-indigo-300">
                    <label for="remember_me" class="text-sm">Zapamiętaj mnie</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            Zapomniałeś hasła?
                        </a>
                    @endif

                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Zaloguj
                    </button>
                </div>
            </form>

            <!-- Link do rejestracji -->
            <div class="mt-4 text-center">
                <span class="text-sm text-gray-600">Nie masz konta?</span>
                <a class="text-sm text-blue-600 hover:underline ml-1" href="{{ route('register') }}">
                    Zarejestruj się
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>