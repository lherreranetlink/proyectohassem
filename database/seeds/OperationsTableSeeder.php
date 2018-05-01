<?php

use Illuminate\Database\Seeder;

class OperationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operacions')->insert([
            'descripcion' => 'Reaccion'
        ]);

        DB::table('operacions')->insert([
            'descripcion' => 'Comentario'
        ]);

        DB::table('operacions')->insert([
            'descripcion' => 'Eliminacion'
        ]);
    }
}
