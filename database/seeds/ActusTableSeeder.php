<?php

use Illuminate\Database\Seeder;

class ActusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(array(
            array('user_id' => 3, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eligendi facilis in necessitatibus pariatur. Accusamus et nesciunt optio quis vero. Amet cupiditate dolor est illo quis tenetur voluptatem? Est, vel?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda, consequatur doloribus eligendi laboriosam provident quaerat quia voluptatibus! Doloribus ducimus ex fugit incidunt, iure minima mollitia necessitatibus quidem similique temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad at consequatur debitis, delectus dolorem eligendi error facilis fugit inventore itaque laborum magni nobis numquam quam quas quia quo vel velit.')
        ));
    }
}
