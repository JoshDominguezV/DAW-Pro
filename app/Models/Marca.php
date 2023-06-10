<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;
use App\Models\Mueble;

class Marca extends Model
{
    use HasFactory;

    protected $table = 'marca';
    protected $primaryKey = 'idMarca';
    public $timestamps = true;

    protected $fillable = [
        'idProveedor',
        'nombreMarca',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'idProveedor', 'idProveedor');
    }

    public function muebles()
    {
        return $this->hasMany(Mueble::class, 'idMarca', 'idMarca');
    }
}
