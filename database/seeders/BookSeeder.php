<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Dodaj przykładowe dane
        Book::create([
            'title' => 'Sample Book',
            'author' => 'Sample Author',
            'published_year' => 2021,
            'genre' => 'Fiction',
        ]);
    }
}