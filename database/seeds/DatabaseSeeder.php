<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserCategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
<<<<<<< HEAD
        $this->call(GamesTableSeeder::class);
        $this->call(SynonymsTableSeeder::class);
=======
        $this->call(ActusTableSeeder::class);
>>>>>>> 8ca813cedcd087da423b76ad17b7926157fe520a

        Model::reguard();
    }
}
