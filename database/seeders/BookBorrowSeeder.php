<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookBorrow;

class BookBorrowSeeder extends Seeder
{
    public function run()
    {
        $bookBorrows = [
            ['borrow_id' => 1, 'book_id' => 1],
            ['borrow_id' => 2, 'book_id' => 2],
        ];

        foreach ($bookBorrows as $bookBorrow) {
            BookBorrow::create($bookBorrow);
        }
    }
}
