<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Proveedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('proveedor')->insert([
            'direccion' => 'Dirección proveedor 1',
            'nombreProveedor' => 'Proveedor 1',
            'telefono' => '123456789',
        ]);
    }
}
