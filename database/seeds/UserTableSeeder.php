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
            array('name' => 'Prudhomme', 'firstname' => 'Antoine', 'category_id' => 2, 'email' => 'antoineprudhomme5@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg'
            ),
            array('name' => 'Obara', 'firstname' => 'Nicolas', 'category_id' => 2, 'email' => 'user@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg'
            ),
            array('name' => 'Doe', 'firstname' => 'John', 'category_id' => 1, 'email' => 'prof@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg'
            ),
            array('name' => 'Lafont', 'firstname' => 'Emma', 'category_id' => 2, 'email' => 'user1@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'JBu08aFGqY1ohbYO4Q2SRn5gHMcEcUjpFkXRO7Ig.jpg.jpg',
                'avatar_sm' => 'JBu08aFGqY1ohbYO4Q2SRn5gHMcEcUjpFkXRO7Ig-sm.jpg'
            ),
            array('name' => 'Labat', 'firstname' => 'Laurent', 'category_id' => 2, 'email' => 'user2@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'obXfeCzUK7HStqyKcSPQ6SsX8naiErXulYXFx7f7.jpg',
                'avatar_sm' => 'obXfeCzUK7HStqyKcSPQ6SsX8naiErXulYXFx7f7-sm.jpg'
            ),
            array('name' => 'Durand', 'firstname' => 'Tom', 'category_id' => 2, 'email' => 'user3@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S'
            ),
            array('name' => 'Dupont', 'firstname' => 'Louis', 'category_id' => 2, 'email' => 'user4@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'TjO7yr8EuEl00pAMGhHQFdSsExsk015pava3TfIU.png',
                'avatar_sm' => 'TjO7yr8EuEl00pAMGhHQFdSsExsk015pava3TfIU-sm.png'
                )
        ));
    }
}
