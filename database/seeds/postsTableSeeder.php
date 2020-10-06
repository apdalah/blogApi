<?php

use Illuminate\Database\Seeder;
use App\Post;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate();

        factory(Post::class, 20)->create();
    }
}
