<?php
namespace Database\Factories;

use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    protected $model = Borrow::class;

    public function definition()
    {
        return [
            'member_id' => Member::factory(),
            'borrow_date' => $this->faker->date(),
            'return_date' => $this->faker->optional()->date(),
        ];
    }
}

