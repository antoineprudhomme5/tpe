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
        $this->call(GamesTableSeeder::class);
        $this->call(SynonymsTableSeeder::class);
        $this->call(ActualitesTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(SpeakAboutTableSeeder::class);
        $this->call(ProfilesQuestionsTableSeeder::class);
        $this->call(ProfilesAnswersTableSeeder::class);
        $this->call(AchievementTableSeeder::class);
        $this->call(McqTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);

        Model::reguard();
    }
}
