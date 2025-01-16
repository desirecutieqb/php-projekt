<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Wyświetla listę wszystkich członków.
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Formularz do dodania nowego członka.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Zapisuje nowego członka w bazie danych.
     */
    public function store(Request $request)
    {
        // Walidacja
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'membership_date' => 'required|date',
        ]);

        // Tworzenie nowego członka
        Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'membership_date' => $request->membership_date,
        ]);

        return redirect()->route('members.index')
                         ->with('success', 'Nowy członek został dodany!');
    }

    /**
     * Wyświetla szczegółowe informacje o wybranym członku.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Formularz edycji informacji o członku.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Aktualizuje dane o członku w bazie.
     */
    public function update(Request $request, Member $member)
    {
        // Walidacja
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required|string|max:20',
            'membership_date' => 'required|date',
        ]);

        // Aktualizacja danych
        $member->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'membership_date' => $request->membership_date,
        ]);

        return redirect()->route('members.index')
                         ->with('success', 'Dane członka zostały zaktualizowane!');
    }

    /**
     * Usuwa wybranego członka z bazy danych.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')
                         ->with('success', 'Członek został usunięty!');
    }
}