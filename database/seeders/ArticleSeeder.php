<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'body' => '記事投稿',
                'user_id' => '1',
                //画像は未設定
                // 'image1' => 'sample',
                // 'image2' => 'sample',
                // 'image3' => 'sample',
                // 'image4' => 'sample',
            ],
        ]);
    }
}
