<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = true;

    protected $fillable = [
        'idRol',
        'username',
        'password',
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'idUsuario', 'idUsuario');
    }
}
