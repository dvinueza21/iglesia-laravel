<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Crea el usuario administrador principal con todos los permisos.
     */
    public function run(): void
    {
        // 🔹 Crear o actualizar el usuario administrador principal
        $admin = User::firstOrCreate(
            ['email' => 'admin@iglesia.com'],
            [
                'name'     => 'Administrador Principal',
                'password' => bcrypt('1234admin'), // ⚠️ Cambia esta contraseña en producción
            ]
        );

        // 🔹 Crear rol admin si no existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // 🔹 Crear permisos básicos si no existen
        $permissions = [
            'documents.view',
            'documents.manage',
            'users.manage',
        ];

        foreach ($permissions as $permName) {
            Permission::firstOrCreate(['name' => $permName]);
        }

        // 🔹 Dar al rol admin todos los permisos existentes
        $adminRole->syncPermissions(Permission::all());

        // 🔹 Asignar rol admin al usuario admin
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        $this->command->info('✅ Usuario admin@iglesia.com creado con permisos completos.');
    }
}





