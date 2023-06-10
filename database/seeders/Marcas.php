<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Marcas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $proveedor = DB::table('proveedor')->first();

        DB::table('marca')->insert([
            'idProveedor' => $proveedor->idProveedor,
            'nombreMarca' => 'Marca 1',
           
        ]);
    }
}
