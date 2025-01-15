<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    public function run()
    {
        $publishers = [
            ['name' => 'Penguin Random House', 'address' => 'New York, USA'],
            ['name' => 'HarperCollins', 'address' => 'London, UK'],
            ['name' => 'Macmillan Publishers', 'address' => 'New York, USA'],
        ];

        foreach ($publishers as $publisher) {
            Publisher::create($publisher);
        }
    }
}
