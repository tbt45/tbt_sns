<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RetweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('retweets')->insert([
            [
                'user_id' => '2',
                'article_id' => '3',
            ],
            [
                'user_id' => '3',
                'article_id' => '1',
            ],
            [
                'user_id' => '5',
                'article_id' => '3',
            ],
            [
                'user_id' => '4',
                'article_id' => '6',
            ],
            [
                'user_id' => '3',
                'article_id' => '9',
            ],
            [
                'user_id' => '1',
                'article_id' => '34',
            ],
            [
                'user_id' => '4',
                'article_id' => '55',
            ],
            [
                'user_id' => '4',
                'article_id' => '23',
            ],
        ]);
    }
}
