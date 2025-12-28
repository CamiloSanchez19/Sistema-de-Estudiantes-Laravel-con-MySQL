<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_docente');
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->string('especialidad', 50);
            $table->string('telefono', 20);
            $table->string('email', 100)->unique();

            $table->unsignedBigInteger('id_usuario')->unique()->nullable();
            $table->foreign('id_usuario')
                  ->references('id_usuario')->on('usuarios')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
