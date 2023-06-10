<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rol;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';
    protected $primaryKey = 'idRol';
    public $timestamps = true;

    protected $fillable = [
        'rol',
    ];

    // Relación uno a muchos con el modelo Usuario
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idRol');
    }
}
