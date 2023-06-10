<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mueble;
use App\Models\Pago;

class Bodega extends Model
{
    use HasFactory;

    protected $table = 'bodega';
    protected $primaryKey = 'idBodega';
    public $timestamps = true;

    protected $fillable = [
        'idMueble',
        'cantidadMuebles',
    ];

    public function mueble()
    {
        return $this->belongsTo(Mueble::class, 'idMueble', 'idMueble');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'idBodega', 'idBodega');
    }
}
