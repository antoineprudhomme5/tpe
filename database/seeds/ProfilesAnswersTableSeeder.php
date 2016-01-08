<?php

use Illuminate\Database\Seeder;

class ProfilesAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles_answers')->insert(array(
            array('user_id' => 1, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 1, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 1, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 1, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 1, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 1, 'profile_question_id' => 6, 'answer' => 'my answer'),
            array('user_id' => 1, 'profile_question_id' => 7, 'answer' => ''),
            array('user_id' => 1, 'profile_question_id' => 8, 'answer' => 'my answer'),
            array('user_id' => 1, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 2, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 2, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 6, 'answer' => ''),
            array('user_id' => 2, 'profile_question_id' => 7, 'answer' => 'my answer'),
            array('user_id' => 2, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 3, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 3, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 6, 'answer' => ''),
            array('user_id' => 3, 'profile_question_id' => 7, 'answer' => 'my answer'),
            array('user_id' => 3, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 4, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 4, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 6, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 7, 'answer' => ''),
            array('user_id' => 4, 'profile_question_id' => 8, 'answer' => 'my answer'),
            array('user_id' => 4, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 5, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 5, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 6, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 7, 'answer' => ''),
            array('user_id' => 5, 'profile_question_id' => 8, 'answer' => 'my answer'),
            array('user_id' => 5, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 6, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 6, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 6, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 7, 'answer' => ''),
            array('user_id' => 6, 'profile_question_id' => 8, 'answer' => 'my answer'),
            array('user_id' => 6, 'profile_question_id' => 9, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 1, 'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam'),
            array('user_id' => 7, 'profile_question_id' => 2, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 3, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 4, 'answer' => ''),
            array('user_id' => 7, 'profile_question_id' => 5, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 6, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 7, 'answer' => ''),
            array('user_id' => 7, 'profile_question_id' => 8, 'answer' => 'my answer'),
            array('user_id' => 7, 'profile_question_id' => 9, 'answer' => 'my answer'),
        ));
    }
}
