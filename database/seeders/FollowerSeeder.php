<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followers')->insert([
            [
                'following_id' => '1',
                'followed_id' => '2',
            ],
            [
                'following_id' => '2',
                'followed_id' => '1',
            ],
            [
                'following_id' => '2',
                'followed_id' => '3',
            ],
            [
                'following_id' => '3',
                'followed_id' => '2',
            ],
            [
                'following_id' => '1',
                'followed_id' => '3',
            ],
            [
                'following_id' => '1',
                'followed_id' => '5',
            ],
            [
                'following_id' => '6',
                'followed_id' => '1',
            ],
            [
                'following_id' => '6',
                'followed_id' => '5',
            ],
            [
                'following_id' => '5',
                'followed_id' => '6',
            ],
        ]);
    }
}
