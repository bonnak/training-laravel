<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();

        factory(Comment::class, 5)->create([ 'blog_id' => 1 ]);
        factory(Comment::class, 5)->create([ 'blog_id' => 2 ]);
    }
}
