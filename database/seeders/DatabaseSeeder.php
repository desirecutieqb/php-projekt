<?php
use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\BorrowSeeder;
use Database\Seeders\BookBorrowSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\PublisherSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\ReservationSeeder;
use Database\Seeders\RoleSeeder;
use Spatie\Permission\Models\Role;

Role::create(['name' => 'admin']);
Role::create(['name' => 'employee']);
Role::create(['name' => 'client']);

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BookSeeder::class,
            MemberSeeder::class,
            BorrowSeeder::class,
            BookBorrowSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            PublisherSeeder::class,
            ReviewSeeder::class,
            ReservationSeeder::class,
            RoleSeeder::class,      

        ]);
    }
}

