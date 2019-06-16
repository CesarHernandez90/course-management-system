<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'get department']);
        Permission::create(['name' => 'post department']);
        Permission::create(['name' => 'put department']);
        Permission::create(['name' => 'delete department']);

        Permission::create(['name' => 'get coursetype']);
        Permission::create(['name' => 'post coursetype']);
        Permission::create(['name' => 'put coursetype']);
        Permission::create(['name' => 'delete coursetype']);

        Permission::create(['name' => 'get user']);
        Permission::create(['name' => 'post user']);
        Permission::create(['name' => 'put user']);
        Permission::create(['name' => 'delete user']);

        $role = Role::create(['name' => 'moderator']);
        $role->givePermissionTo(['get department', 'post department']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $moderator = User::create([
            'name' => 'Mojica',
            'email' => 'mojica@gmail.com',
            'password' => bcrypt('12345678'),
            'id_department' => 1,
        ]);
        $moderator->assignRole('moderator');

        $admin = User::create([
            'name' => 'Yecka',
            'email' => 'yecka@gmail.com',
            'password' => bcrypt('12345678'),
            'id_department' => 2,
        ]);
        $admin->assignRole('super-admin');
    }
}