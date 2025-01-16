<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Wyświetla stronę główną po zalogowaniu.
     */
    public function index()
    {
        return view('dashboard'); // Upewnij się, że masz plik resources/views/dashboard.blade.php
    }
}
