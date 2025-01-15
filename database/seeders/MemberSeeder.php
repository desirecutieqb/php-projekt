<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run()
    {
        $members = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123456789', 'membership_date' => now()],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '987654321', 'membership_date' => now()],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
