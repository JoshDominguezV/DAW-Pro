<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Mueble;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $primaryKey = 'idCategoria';
    public $timestamps = true;

    protected $fillable = [
        'idUsuario',
        'nombreCategoria',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function muebles()
    {
        return $this->hasMany(Mueble::class, 'idCategoria', 'idCategoria');
    }

}
