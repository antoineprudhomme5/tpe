<?php

use Illuminate\Database\Seeder;

class UserCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_categories')->insert(array(
            array('name' => 'teacher'),
            array('name' => 'student')
        ));
    }
}
