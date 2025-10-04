<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        // Rol "user" y permiso para ver documentos
        $roleUser = Role::firstOrCreate(['name' => 'user', 'guard_name' => 'web']);
        $permView = Permission::firstOrCreate(['name' => 'documents.view', 'guard_name' => 'web']);

        // Asegura que el rol tenga el permiso de ver
        $roleUser->syncPermissions([$permView]);

        // Usuarios que SOLO descargan
        $usuarios = [
            ['name' => 'Miriam',   'email' => 'miriam@iglesia.com'],
            ['name' => 'Cristina', 'email' => 'cristina@iglesia.com'],
            ['name' => 'Dave',     'email' => 'dave@iglesia.com'],
        ];

        foreach ($usuarios as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                [
                    'name' => $u['name'],
                    'password' => bcrypt('admin9878'), // cambia luego en producción
                ]
            );

            if (! $user->hasRole('user')) {
                $user->assignRole('user');
            }
        }
    }
}
