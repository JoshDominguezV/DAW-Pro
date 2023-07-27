<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Muebles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categoria = DB::table('categoria')->first();
        $marca = DB::table('marca')->first();
        $tipomueble = DB::table('tipomueble')->first();

        DB::table('mueble')->insert([
            'idCategoria' => $categoria->idCategoria,
            'idMarca' => $marca->idMarca,
            'idTipoMueble' => $tipomueble->idTipoMueble,
            'nombreMueble' => 'Comedor',
            'precio' => 9.99,
        ]);

        
    }
    public function usuario()
{
    return $this->belongsTo(Usuario::class, 'idUsuario');
}

public function rol()
{
    return $this->belongsTo(Rol::class, 'idRol');
}
}
