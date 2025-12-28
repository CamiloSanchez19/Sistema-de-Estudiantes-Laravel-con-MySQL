<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'correo',
        'contraseña',
        'rol',
        'activo',
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    // 🔑 Laravel espera "password"
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
