<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([
            [
                'body' => '記事投稿',
                'user_id' => '1',
                'article_id' => '1',
            ],
        ]);
    }
}
