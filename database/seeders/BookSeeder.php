<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Tworzymy przykładowe rekordy
        Book::create([
            'id' => 1, // explicitly
            'title' => 'Example Book 1',
            'author' => 'John Doe',
            'published_year' => 2021,
            'genre' => 'Fiction',
        ]);

        Book::create([
            'id' => 2,
            'title' => 'Example Book 2',
            'author' => 'Jane Doe',
            'published_year' => 2022,
            'genre' => 'Sci-fi',
        ]);
    }
}