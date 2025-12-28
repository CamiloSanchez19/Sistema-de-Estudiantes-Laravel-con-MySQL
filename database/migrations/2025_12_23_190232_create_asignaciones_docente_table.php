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
        Schema::create('asignaciones_docente', function (Blueprint $table) {
            $table->id('id_asignacion');
            
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_materia');
            $table->unsignedBigInteger('id_curso');

            $table->unique(['id_docente', 'id_materia', 'id_curso']);

            $table->foreign('id_docente')
                  ->references('id_usuario')->on('usuarios')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->foreign('id_materia')
                  ->references('id_materia')->on('materias')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->foreign('id_curso')
                  ->references('id_curso')->on('cursos')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones_docente');
    }
};
