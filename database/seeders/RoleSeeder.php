<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Roles y Permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'General']);

        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.personal.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.personal.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.personal.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.personal.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'config.user.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.destroy'])->syncRoles([$role1]);
    }
}
