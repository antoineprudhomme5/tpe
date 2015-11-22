<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array('name' => 'prudhomme', 'firstname' => 'antoine', 'category_id' => 2, 'email' => 'antoineprudhomme5@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'yolo', 'firstname' => 'jean', 'category_id' => 2, 'email' => 'user@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S')
        ));
    }
}
