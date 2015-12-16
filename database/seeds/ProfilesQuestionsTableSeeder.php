<?php

use Illuminate\Database\Seeder;

class ProfilesQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles_questions')->insert(array(
            array('topic' => "Introduction", 'tag' => "introduction" ,'question' => "Write some words about yourself..."),
            array('topic' => "Personal skills", 'tag' => "skills", 'question' => "What are skills you have that most people don't?"),
            array('topic' => "Favourite books/authors/films", 'tag' => "favorite-books-movies", 'question' => "What are your favourite books, authors or films?"),
            array('topic' => "My interests in other cultures", 'tag' => "interests-cultures", 'question' => "What are you interested in learning about other cultures?"),
            array('topic' => "Living abroad for one year", 'tag' => "living-abroad", 'question' => "If you could live abroad for one year, where would you go?"),
            array('topic' => "Improving the school system", 'tag' => "improving", 'question' => "What is something you wish was taught in schools?"),
            array('topic' => "I wish people knew more about...", 'tag' => "wish", 'question' => "What is something you wish people would understand more?"),
            array('topic' => "It is better now", 'tag' => "better-now", 'question' => "What is something that you think was improved since your parents' generation?"),
            array('topic' => "I'm excited about...", 'tag' => "excited-about", 'question' => "What is something you are currently excited about?")
        ));
    }
}
