<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        $user = Role::create(['name' => 'user']);

        // Crear permisos
        $permissions = [
            'manage users',
            'create expansions',
            'edit expansions',
            'delete expansions',
            'create cards',
            'edit cards',
            'delete cards',
            'create collections',
            'edit collections',
            'delete collections',
        ];

        foreach ($permissions as $perm) {
            Permission::create(['name' => $perm]);
        }

        // Asignar permisos a roles
        $admin->givePermissionTo($permissions);
        $editor->givePermissionTo(['create expansions', 'edit expansions', 'delete expansions', 'create cards', 'edit cards', 'delete cards']);
        $user->givePermissionTo(['create collections', 'edit collections', 'delete collections']);
    }
}
