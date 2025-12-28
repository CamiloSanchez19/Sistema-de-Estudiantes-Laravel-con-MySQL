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
    Schema::create('matriculas', function (Blueprint $table) {
        $table->id('id_matricula');

        $table->unsignedBigInteger('id_estudiante');
        $table->unsignedBigInteger('id_curso');

        $table->timestamps();

        $table->foreign('id_estudiante')
              ->references('id_estudiante')->on('estudiantes')
              ->cascadeOnDelete()
              ->cascadeOnUpdate();

        $table->foreign('id_curso')
              ->references('id_curso')->on('cursos')
              ->cascadeOnDelete()
              ->cascadeOnUpdate();

        $table->unique(['id_estudiante', 'id_curso']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
