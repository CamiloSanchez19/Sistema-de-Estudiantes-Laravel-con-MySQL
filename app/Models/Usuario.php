<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'correo',
        'contraseña',
        'rol',
        'activo',
    ];

    protected $hidden = [
        'contraseña',
    ];

    /**
     * Laravel: indica cuál campo es la contraseña
     */
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    /**
     * Relación con estudiante
     */
    public function estudiante()
    {
        return $this->hasOne(
            Estudiante::class,
            'id_usuario',
            'id_usuario'
        );
    }
}
