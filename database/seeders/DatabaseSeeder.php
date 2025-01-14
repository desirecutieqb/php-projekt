<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use App\Models\BookBorrow;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Book::factory(1000)->create();
        Member::factory(1000)->create();
        Borrow::factory(1000)->create();
        BookBorrow::factory(1000)->create();
    }
}

