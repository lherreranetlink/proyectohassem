<?php

use Illuminate\Database\Seeder;

class MakeAsiaRegion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
              'nombre' => 'Asia',
              'ip_address' => '192.168.0.6',
              'http_port' => '8080'
          ]);
    }
}
