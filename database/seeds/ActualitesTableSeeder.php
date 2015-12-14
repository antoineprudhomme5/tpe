<?php

use Illuminate\Database\Seeder;

class ActualitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actualites')->insert(array(
            array('user_id' => 3,
                'title' => 'My title 1',
                'slug' => 'my-title-1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eligendi facilis in necessitatibus pariatur. Accusamus et nesciunt optio quis vero. Amet cupiditate dolor est illo quis tenetur voluptatem? Est, vel?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda, consequatur doloribus eligendi laboriosam provident quaerat quia voluptatibus! Doloribus ducimus ex fugit incidunt, iure minima mollitia necessitatibus quidem similique temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad at consequatur debitis, delectus dolorem eligendi error facilis fugit inventore itaque laborum magni nobis numquam quam quas quia quo vel velit.',
                'created_at' => '2015-12-01 19:38:42',
                'updated_at' => '2015-12-02 20:53:50',
                'online' => 1
            ),
            array('user_id' => 3,
                'title' => 'My title 2',
                'slug' => 'my-title-2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eligendi facilis in necessitatibus pariatur. Accusamus et nesciunt optio quis vero. Amet cupiditate dolor est illo quis tenetur voluptatem? Est, vel?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda, consequatur doloribus eligendi laboriosam provident quaerat quia voluptatibus! Doloribus ducimus ex fugit incidunt, iure minima mollitia necessitatibus quidem similique temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad at consequatur debitis, delectus dolorem eligendi error facilis fugit inventore itaque laborum magni nobis numquam quam quas quia quo vel velit.',
                'created_at' => '2015-12-01 19:45:36',
                'updated_at' => '2015-12-01 19:45:36',
                'online' => 1
            ),
            array('user_id' => 3,
                'title' => 'My title 3',
                'slug' => 'my-title-3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea eligendi facilis in necessitatibus pariatur. Accusamus et nesciunt optio quis vero. Amet cupiditate dolor est illo quis tenetur voluptatem? Est, vel?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias assumenda, consequatur doloribus eligendi laboriosam provident quaerat quia voluptatibus! Doloribus ducimus ex fugit incidunt, iure minima mollitia necessitatibus quidem similique temporibus. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad at consequatur debitis, delectus dolorem eligendi error facilis fugit inventore itaque laborum magni nobis numquam quam quas quia quo vel velit.',
                'created_at' => '2015-12-02 22:20:24',
                'updated_at' => '2015-12-02 22:20:24',
                'online' => 0
            )
        ));
    }
}
