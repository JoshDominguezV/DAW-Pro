<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $fillable = [
        'producto_id',
        'bodega_id',
        'cantidad',
        'fecha',
        // Otros campos de la tabla
    ];

    protected $dates = ['fecha'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }
}

