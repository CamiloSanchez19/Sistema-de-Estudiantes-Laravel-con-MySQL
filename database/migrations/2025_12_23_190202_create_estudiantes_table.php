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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiante');
            $table->string('documento', 20)->unique();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->date('fecha_nacimiento');
            $table->enum('tipo_sangre', ['A+','A-','B+','B-','AB+','AB-','O+','O-']);
            $table->enum('sexo', ['M','F']);
            $table->string('direccion', 60);
            $table->string('barrio', 30);
            $table->string('telefono', 20);
            $table->timestamp('fecha_registro')->useCurrent();

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
        Schema::dropIfExists('estudiantes');
    }
};
