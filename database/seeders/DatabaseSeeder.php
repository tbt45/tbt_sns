<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Article;
use App\Models\Like;
use App\Models\Retweet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            // ImageSeeder::class,
            FollowerSeeder::class,
        ]);
        Article::factory(100)->create();
        Reply::factory(50)->create();
        Like::factory(50)->create();
        Retweet::factory(50)->create();
    }
}
