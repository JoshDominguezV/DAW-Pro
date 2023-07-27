<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $roles = [
            ['rol' => 'Admin'],
            ['rol' => 'Empleado'],
            [ 'rol' => 'Invitado'],
        ];

        DB::table('rol')->insert($roles);

    }
    
}
