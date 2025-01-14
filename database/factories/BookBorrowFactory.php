<?php
namespace Database\Factories;

use App\Models\BookBorrow;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookBorrowFactory extends Factory
{
    protected $model = BookBorrow::class;

    public function definition()
    {
        return [
            'borrow_id' => Borrow::factory(),
            'book_id' => Book::factory(),
        ];
    }
}
