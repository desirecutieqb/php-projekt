<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageBooks()
    {
        $books = Book::all();
        return view('admin.manage-books', compact('books'));
    }

    public function manageMembers()
    {
        $members = Member::all();
        return view('admin.manage-members', compact('members'));
    }
}
