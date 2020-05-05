<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

      foreach(range(1, 20) as $index){
      DB::table('posts')->insert(array(
        'user_id'=>$faker->numberBetween($min = 1, $max = 20),
        'message'=>$faker->catchphrase
      ));
      }
    }
}