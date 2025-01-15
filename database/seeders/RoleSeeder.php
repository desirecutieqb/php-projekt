<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tworzenie uprawnień
        $viewBooks = Permission::create(['name' => 'view books']);
        $borrowBooks = Permission::create(['name' => 'borrow books']);
        $manageBooks = Permission::create(['name' => 'manage books']);

        // Tworzenie ról
        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'client']);
        $employeeRole = Role::create(['name' => 'employee']);

        // Przypisywanie uprawnień do ról
        $adminRole->givePermissionTo($viewBooks, $borrowBooks, $manageBooks);
        $clientRole->givePermissionTo($viewBooks, $borrowBooks);
        $employeeRole->givePermissionTo($viewBooks);
    }
}
