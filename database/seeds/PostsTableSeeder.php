<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i = 0; $i < 10 ; $i++) {
        $newPost = new Post;
        $newPost->user_id = 1;
        $newPost->title = $faker->sentence(5);
        $newPost->body = $faker->text(255);
        $newPost->slug = Str::finish(Str::slug($newPost->title), rand(1, 1000000));
        $newPost->save();
      }
    }
}
