<?php

use Illuminate\Database\Seeder;

class InsertInfoIntoRegions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'nombre' => 'America',
            'ip_address' => "192.168.1.77",
            'http_port' => "8080",
        ]);
    }
}
