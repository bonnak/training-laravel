<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate all of blogs table data.
        Blog::truncate();

        // Insert a record into blogs table.
        factory(Blog::class, 10)->create([ 'user_id' => 1 ]);
    }
}
