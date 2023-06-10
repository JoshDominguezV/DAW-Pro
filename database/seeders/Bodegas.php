<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Bodegas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mueble = DB::table('mueble')->first();

        DB::table('bodega')->insert([
            'idMueble' => $mueble->idMueble,
            'cantidadMuebles' => 10,
           
        ]);
    }
}
