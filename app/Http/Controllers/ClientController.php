<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Book;
use App\Models\Reservation;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.dashboard');
    }

    public function borrowBooks()
    {
        $books = Book::where('available', true)->get();
        return view('client.borrow-books', compact('books'));
    }

    public function myReservations()
    {
        $reservations = auth()->user()->reservations;
        return view('client.my-reservations', compact('reservations'));
    }
}
