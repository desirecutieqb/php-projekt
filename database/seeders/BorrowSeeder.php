<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowSeeder extends Seeder
{
    public function run()
    {
        $borrows = [
            ['member_id' => 1, 'borrow_date' => now(), 'return_date' => null],
            ['member_id' => 2, 'borrow_date' => now(), 'return_date' => null],
        ];

        foreach ($borrows as $borrow) {
            Borrow::create($borrow);
        }
    }
}
