<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $faker=Factory::create();
       for ($i=0;$i<20;$i++){
           $post=new Post();
           $post->title=$faker->title;
           $post->body=$faker->text;
           $post->save();
       }

    }
}
