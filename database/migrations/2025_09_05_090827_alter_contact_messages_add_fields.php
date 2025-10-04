<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_messages', 'nombre')) {
                $table->string('nombre', 150)->after('id');
            }
            if (!Schema::hasColumn('contact_messages', 'email')) {
                $table->string('email', 150)->after('nombre');
            }
            if (!Schema::hasColumn('contact_messages', 'telefono')) {
                $table->string('telefono', 50)->nullable()->after('email');
            }
            if (!Schema::hasColumn('contact_messages', 'mensaje')) {
                $table->text('mensaje')->after('telefono');
            }
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            // Revertir (opcional)
            if (Schema::hasColumn('contact_messages', 'mensaje')) $table->dropColumn('mensaje');
            if (Schema::hasColumn('contact_messages', 'telefono')) $table->dropColumn('telefono');
            if (Schema::hasColumn('contact_messages', 'email'))   $table->dropColumn('email');
            if (Schema::hasColumn('contact_messages', 'nombre'))  $table->dropColumn('nombre');
        });
    }
};

