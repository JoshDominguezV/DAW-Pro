<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rol = DB::table('rol')->first();
        
        DB::table('usuario')->insert([
            'idRol' => $rol->idRol,
            'username' => 'ffulanito',
            'password' => 'asdasd123',
        ]);
    }
}
