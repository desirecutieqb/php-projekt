<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            ['name' => 'J.K. Rowling', 'bio' => 'Author of the Harry Potter series.'],
            ['name' => 'George Orwell', 'bio' => 'Author of 1984 and Animal Farm.'],
            ['name' => 'Isaac Asimov', 'bio' => 'Famous for science fiction works.'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
