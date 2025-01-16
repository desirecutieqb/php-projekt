<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash; // jeśli chcesz zahashować hasło


class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tworzenie uprawnień
        $viewBooks = Permission::create(['name' => 'view books']);
        $borrowBooks = Permission::create(['name' => 'borrow books']);
        $manageBooks = Permission::create(['name' => 'manage books']);

        // Tworzenie ról
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
        $clientRole = Role::firstOrCreate(['name' => 'client'], ['guard_name' => 'web']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee'], ['guard_name' => 'web']);

        // Uprawnienia
        $viewBooks = Permission::firstOrCreate(['name' => 'view books'], ['guard_name' => 'web']);
        $borrowBooks = Permission::firstOrCreate(['name' => 'borrow books'], ['guard_name' => 'web']);
        $manageBooks = Permission::firstOrCreate(['name' => 'manage books'], ['guard_name' => 'web']);

        // Przypisywanie uprawnień
        $adminRole->givePermissionTo([$viewBooks, $borrowBooks, $manageBooks]);
        $clientRole->givePermissionTo([$viewBooks, $borrowBooks]);
        $employeeRole->givePermissionTo([$viewBooks]);
        $userAdmin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // hasło: admin123
        ]);

        $userAdmin->assignRole('admin');

        // Dodaj klienta
        $userClient = User::create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => Hash::make('client123'),
        ]);

        $userClient->assignRole('client');

        // Dodaj pracownika
        $userEmployee = User::create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'password' => Hash::make('employee123'),
        ]);

        $userEmployee->assignRole('employee');
    }
}
