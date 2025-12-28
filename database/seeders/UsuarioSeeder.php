<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'correo' => 'admin@colegio.com',
                'contraseña' => Hash::make('admin123'),
                'rol' => 'admin',
                'activo' => true,
            ],
            [
                'correo' => 'espanol@colegio.com',
                'contraseña' => Hash::make('docente123'),
                'rol' => 'docente',
                'activo' => true,
            ],
            [
                'correo' => 'naturales@colegio.com',
                'contraseña' => Hash::make('docente123'),
                'rol' => 'docente',
                'activo' => true,
            ],
            [
                'correo' => 'sociales@colegio.com',
                'contraseña' => Hash::make('docente123'),
                'rol' => 'docente',
                'activo' => true,
            ],
            [
                'correo' => 'ingles@colegio.com',
                'contraseña' => Hash::make('docente123'),
                'rol' => 'docente',
                'activo' => true,
            ],
        ]);
    }
}
