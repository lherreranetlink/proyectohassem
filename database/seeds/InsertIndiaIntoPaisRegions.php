<?php

use Illuminate\Database\Seeder;

class InsertIndiaIntoPaisRegions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais_region')->insert([
            'pais' => 'India',
            'region_id' => 2,
        ]);
    }
}
