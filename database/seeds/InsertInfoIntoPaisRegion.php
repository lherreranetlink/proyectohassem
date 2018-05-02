<?php

use Illuminate\Database\Seeder;

class InsertInfoIntoPaisRegion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais_region')->insert([
            'pais' => 'Mexico',
            'region_id' => 1,
        ]);
    }
}
