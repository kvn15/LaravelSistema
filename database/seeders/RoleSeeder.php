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
        $role3 = Role::create(['name' => 'Lector']);

        Permission::create(['name' => 'admin.dashboard', 'description' => 'Ver Dashboard'])->syncRoles([$role1,$role2,$role3]);
        /* ============================================================================================================================== */
        Permission::create(['name' => 'admin.*', 'description' => 'Ver Menu Administracion'])->syncRoles([$role1,$role2,$role3]);
        //Personal
        Permission::create(['name' => 'admin.personal.index', 'description' => 'Ver Personal'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.personal.create', 'description' => 'Crear Personal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.personal.edit', 'description' => 'Editar Personal'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.personal.destroy', 'description' => 'Eliminar Personal'])->syncRoles([$role1,$role2]);
        //Clientes
        Permission::create(['name' => 'admin.cliente.index', 'description' => 'Ver Cliente'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.cliente.create', 'description' => 'Crear Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.cliente.edit', 'description' => 'Editar Cliente'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.cliente.destroy', 'description' => 'Eliminar Cliente'])->syncRoles([$role1,$role2]);
        //Proveedor
        Permission::create(['name' => 'admin.proveedor.index', 'description' => 'Ver Proveedor'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'admin.proveedor.create', 'description' => 'Crear Proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.proveedor.edit', 'description' => 'Editar Proveedor'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.proveedor.destroy', 'description' => 'Eliminar Proveedor'])->syncRoles([$role1,$role2]);
        /* ============================================================================================================================== */
        Permission::create(['name' => 'config.*', 'description' => 'Ver Menu Configuracion'])->syncRoles([$role1]);
        //Usuarios
        Permission::create(['name' => 'config.user.index', 'description' => 'Ver Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.create', 'description' => 'Crear Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.edit', 'description' => 'Editar Usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.user.destroy', 'description' => 'Eliminar Usuario'])->syncRoles([$role1]);
        //Roles
        Permission::create(['name' => 'config.roles.index','description' => 'Ver Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.roles.create','description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.roles.edit','description' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'config.roles.destroy','description' => 'Eliminar Roles'])->syncRoles([$role1]);
    }
}
