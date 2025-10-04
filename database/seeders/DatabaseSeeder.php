<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Usuario de prueba
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 2️⃣ Roles y permisos
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $permissions = ['documents.view', 'documents.manage', 'users.manage'];

        foreach ($permissions as $permName) {
            Permission::firstOrCreate(['name' => $permName]);
        }

        $adminRole->syncPermissions(Permission::all());

        // 3️⃣ Usuario administrador principal
        $admin = User::firstOrCreate(
            ['email' => 'admin@iglesia.com'],
            [
                'name' => 'Administrador Principal',
                'password' => bcrypt('admin1234'),
            ]
        );

        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        // 4️⃣ Usuarios normales
        $this->call(UsuariosSeeder::class);

        $this->command->info('✅ Base de datos inicializada correctamente.');
    }
}
