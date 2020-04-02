<?php

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i = 0; $i < 10; $i++) {
        $tag = new Tag; // nuova istanza
        $tag->name = $faker->word; // creaimo un nome fittizio con Faker
        $tag->save(); // salviamo il dato
      }
    }
}
