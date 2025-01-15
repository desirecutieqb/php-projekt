<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Borrow;
use App\Models\Reservation;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.dashboard');
    }

    public function manageBorrows()
    {
        $borrows = Borrow::all();
        return view('employee.manage-borrows', compact('borrows'));
    }

    public function approveReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'approved';
        $reservation->save();

        return redirect()->back()->with('success', 'Rezerwacja zatwierdzona.');
    }
}
