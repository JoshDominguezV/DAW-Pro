<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Categorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /**HACER UN CAMBIO SEGUN TABLA DE JOSUE - LOGIN */
        
        $usuario = DB::table('usuario')->first();

        DB::table('categoria')->insert([
            'idUsuario' => $usuario->idUsuario,
            'nombreCategoria' => 'Categoría 1',
       
        ]);
    }
}
