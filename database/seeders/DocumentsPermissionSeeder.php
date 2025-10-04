<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DocumentsPermissionSeeder extends Seeder
{
    public function run(): void
    {
        // crea si no existen
        $view   = Permission::firstOrCreate(['name' => 'documents.view']);
        $manage = Permission::firstOrCreate(['name' => 'documents.manage']);

        // si usas rol admin, dale ambos permisos
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRole->givePermissionTo([$view, $manage]);
        }

        // Asignaciones directas por usuario (por email):
        $super = User::where('email', 'admin@iglesia.com')->first();
        if ($super) {
            $super->syncPermissions([$view, $manage]);
            $super->assignRole('admin'); // por si acaso
        }

        $dave  = User::where('email', 'd.vinueza@yahoo.es')->first();
        if ($dave) {
            $dave->syncPermissions([$view]); // solo ver/descargar
            $dave->assignRole('admin');      // sigue siendo admin
        }
    }
}
