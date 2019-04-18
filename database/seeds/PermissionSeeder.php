<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'View_Permission']);
        Permission::create(['name' => 'Create_Permission']);
        Permission::create(['name' => 'Edit_Permission']);
        Permission::create(['name' => 'Delete_Permission']);

        Permission::create(['name' => 'View_Role']);
        Permission::create(['name' => 'Create_Role']);
        Permission::create(['name' => 'Edit_Role']);
        Permission::create(['name' => 'Delete_Role']);

        Permission::create(['name' => 'View_User']);
        Permission::create(['name' => 'Create_User']);
        Permission::create(['name' => 'Edit_User']);
        Permission::create(['name' => 'Delete_User']);
    }
}
