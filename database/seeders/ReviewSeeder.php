<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $reviews = [
            ['book_id' => 1, 'member_id' => 1, 'rating' => 5, 'comment' => 'Amazing book!'],
            ['book_id' => 2, 'member_id' => 2, 'rating' => 4, 'comment' => 'Great read, but a bit slow.'],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
