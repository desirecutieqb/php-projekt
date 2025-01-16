<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookBorrow;

class BookBorrowSeeder extends Seeder
{
    public function run()
    {
        BookBorrow::create([
            'borrow_id' => 2,
            'book_id' => 2,
        ]);
    }
}
