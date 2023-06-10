<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bodega;

class Pago extends Model
{
    use HasFactory;
    protected $table = 'pago';
    protected $primaryKey = 'idPago';
    public $timestamps = true;

    protected $fillable = [
        'idBodega',
        'tipoPago',
        'fechaPago',
    ];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class, 'idBodega', 'idBodega');
    }
}
