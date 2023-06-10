<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Marca;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $primaryKey = 'idProveedor';
    public $timestamps = true;

    protected $fillable = [
        'direccion',
        'nombreProveedor',
        'telefono',
    ];

    public function marcas()
    {
        return $this->hasMany(Marca::class, 'idProveedor', 'idProveedor');
    }
}
