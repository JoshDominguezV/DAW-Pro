<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Pagos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bodega = DB::table('bodega')->first();

        DB::table('pago')->insert([
            'idBodega' => $bodega->idBodega,
            'tipoPago' => 'Efectivo',
            'fechaPago' => now(),
          
        ]);
    }
}
