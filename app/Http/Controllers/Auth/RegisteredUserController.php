<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Wyświetla formularz rejestracji.
     */
    public function create()
    {
        return view('auth.register');
        // Upewnij się, że plik resources/views/auth/register.blade.php istnieje
    }

    /**
     * Obsługuje żądanie POST do rejestracji nowego użytkownika.
     */
    public function store(Request $request)
    {
        // 1. Walidacja danych
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ], [
            'password.confirmed' => 'Hasła muszą się zgadzać.',
            'password.min'       => 'Hasło musi mieć minimum :min znaków.',
        ]);

        // 2. Stworzenie nowego użytkownika
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Wydarzenie "zarejestrowano użytkownika" (opcjonalne, do maili aktywacyjnych itp.)
        event(new Registered($user));

        // 3. Logowanie użytkownika (jeśli chcesz, żeby był od razu zalogowany)
        Auth::login($user);

        // 4. Przekierowanie np. na stronę główną / dashboard
        return redirect()->route('dashboard')->with('success', 'Rejestracja zakończona sukcesem!');
    }
}