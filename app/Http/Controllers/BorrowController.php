<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('member')->paginate(10);
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $members = Member::all();
        return view('borrows.create', compact('members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success', 'Wypożyczenie zostało dodane.');
    }

    public function edit(Borrow $borrow)
    {
        $members = Member::all();
        return view('borrows.edit', compact('borrow', 'members'));
    }
    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after:borrow_date',
        ]);

        $borrow->update($request->all());
        return redirect()->route('borrows.index')->with('success', 'Wypożyczenie zostało zaktualizowane.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Wypożyczenie zostało usunięte.');
    }
}
