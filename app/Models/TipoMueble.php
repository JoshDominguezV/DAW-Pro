<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMueble extends Model
{
    use HasFactory;
    protected $table = 'tipomueble';
    protected $primaryKey = 'idTipoMueble';
    public $timestamps = true;

    protected $fillable = [
        'nombreMueble',
    ];

    public function muebles()
    {
        return $this->hasMany(Mueble::class, 'idTipoMueble', 'idTipoMueble');
    }

}
