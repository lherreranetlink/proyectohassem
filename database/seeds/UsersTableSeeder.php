<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = new DateTime;
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'nick_name' => str_random(10),
                'password' => bcrypt('secret'),
                'fecha_nac' => $dt->format('m-d-y H:i:s'),
                'foto_perfil_ruta' => str_random(10),
            ]);
        }
    }
}
