<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiddlewareName
{
    /**
     * Obsługuje przychodzące żądania.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  Rola, która jest wymagana do dostępu
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Sprawdź, czy użytkownik jest zalogowany
        if (!Auth::check()) {
            return redirect('/login'); // Przekierowanie, jeśli użytkownik nie jest zalogowany
        }

        // Sprawdź, czy użytkownik ma wymaganą rolę
        if (!Auth::user()->hasRole($role)) {
            abort(403, 'Nie masz uprawnień do tej akcji.');
        }

        return $next($request);
    }
}