<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowSeeder extends Seeder
{
    public function run()
    {
        Borrow::create([
            'id' => 1,
            'member_id' => 1,
            'borrow_date' => now(),
            'return_date' => null,
        ]);

        Borrow::create([
            'id' => 2,
            'member_id' => 2,
            'borrow_date' => now(),
            'return_date' => null,
        ]);
    }
}
