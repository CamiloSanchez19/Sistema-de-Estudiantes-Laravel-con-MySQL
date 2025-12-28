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
Schema::create('calificaciones', function (Blueprint $table) {
    $table->id('id_calificacion');
    $table->unsignedBigInteger('id_matricula');
    $table->unsignedBigInteger('id_materia');
    $table->decimal('nota', 4, 2);
    $table->string('periodo', 20);

    $table->unique(['id_matricula', 'id_materia', 'periodo']);

    $table->foreign('id_matricula')
          ->references('id_matricula')->on('matriculas')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();

    $table->foreign('id_materia')
          ->references('id_materia')->on('materias')
          ->cascadeOnDelete()
          ->cascadeOnUpdate();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
