<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
    ];

    // Relación con el modelo Producto
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
