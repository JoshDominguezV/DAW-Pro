<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\TipoMueble;
use App\Models\Bodega;

class Mueble extends Model
{
    use HasFactory;
    protected $table = 'mueble';
    protected $primaryKey = 'idMueble';
    public $timestamps = true;

    protected $fillable = [
        'idCategoria',
        'idMarca',
        'idTipoMueble',
        'precio',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'idMarca', 'idMarca');
    }

    public function tipoMueble()
    {
        return $this->belongsTo(TipoMueble::class, 'idTipoMueble', 'idTipoMueble');
    }

    public function bodegas()
    {
        return $this->hasMany(Bodega::class, 'idMueble', 'idMueble');
    }
}
