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
            array(
                'category_id' => 2,
                'name' => 'Prudhomme',
                'firstname' => 'Antoine',
                'email' => 'antoineprudhomme5@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg',
                'points' => 150
            ),
            array(
                'category_id' => 2,
                'name' => 'Obara',
                'firstname' => 'Nicolas',
                'email' => 'user@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg',
                'points' => 190
            ),
            array(
                'category_id' => 1,
                'name' => 'Doe',
                'firstname' => 'John',
                'email' => 'prof@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg',
                'points' => 190
            ),
            array(
                'category_id' => 2,
                'name' => 'Lafont',
                'firstname' => 'Emma',
                'email' => 'user1@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'JBu08aFGqY1ohbYO4Q2SRn5gHMcEcUjpFkXRO7Ig.jpg',
                'avatar_sm' => 'JBu08aFGqY1ohbYO4Q2SRn5gHMcEcUjpFkXRO7Ig-sm.jpg',
                'points' => 100
            ),
            array(
                'category_id' => 2,
                'name' => 'Labat',
                'firstname' => 'Laurent',
                'email' => 'user2@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'obXfeCzUK7HStqyKcSPQ6SsX8naiErXulYXFx7f7.jpg',
                'avatar_sm' => 'obXfeCzUK7HStqyKcSPQ6SsX8naiErXulYXFx7f7-sm.jpg',
                'points' => 50
            ),
            array(
                'category_id' => 2,
                'name' => 'Durand',
                'firstname' => 'Tom',
                'email' => 'user3@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD.jpg',
                'avatar_sm' => 'Qoo8OCzsNSO8ZPi5VyN6MAoirpAygWpYvb3twUAD-sm.jpg',
                'points' => 50
            ),
            array(
                'category_id' => 2,
                'name' => 'Dupont',
                'firstname' => 'Louis',
                'email' => 'user4@gmail.com',
                'password' => '$2a$10$n9qAMFM1fhRpdd9rcYdhEO8dkQQiqEm3D/Ro2KC9hgSMhZGejWw/S',
                'avatar' => 'TjO7yr8EuEl00pAMGhHQFdSsExsk015pava3TfIU.png',
                'avatar_sm' => 'TjO7yr8EuEl00pAMGhHQFdSsExsk015pava3TfIU-sm.png',
                'points' => 398
                )
        ));
    }
}
