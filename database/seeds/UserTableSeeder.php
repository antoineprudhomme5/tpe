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
            array('name' => 'Prudhomme', 'firstname' => 'antoine', 'category_id' => 2, 'email' => 'antoineprudhomme5@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Obara', 'firstname' => 'nicolas', 'category_id' => 2, 'email' => 'user@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Doe', 'firstname' => 'John', 'category_id' => 1, 'email' => 'prof@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Lafont', 'Emma' => 'user1', 'category_id' => 2, 'email' => 'user1@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Labat', 'Laurent' => 'user2', 'category_id' => 2, 'email' => 'user2@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Durand', 'Tom' => 'user3', 'category_id' => 2, 'email' => 'user3@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'),
            array('name' => 'Dupont', 'Louis' => 'user4', 'category_id' => 2, 'email' => 'user4@gmail.com', 'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S')
        ));
    }
}
