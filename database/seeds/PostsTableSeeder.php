<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate all of blogs table data.
        Post::truncate();

        // Insert a record into blogs table.
        factory(Post::class, 10)->create([ 'user_id' => 1 ]);
    }
}
