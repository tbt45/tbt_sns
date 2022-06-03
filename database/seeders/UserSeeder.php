<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '佐藤',
                'email' => 'test1@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user1.png',
                'body' => '佐藤と申します。宜しくお願いします。',
            ],
            [
                'name' => '高橋',
                'email' => 'test2@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user2.png',
                'body' => '高橋と申します。宜しくお願いします。',
            ],
            [
                'name' => '田中',
                'email' => 'test3@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user3.png',
                'body' => '田中と申します。宜しくお願いします。',
            ],
            [
                'name' => '鈴木',
                'email' => 'test4@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user4.png',
                'body' => '鈴木と申します。宜しくお願いします。',
            ],
            [
                'name' => '吉田',
                'email' => 'test5@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user5.png',
                'body' => '吉田と申します。宜しくお願いします。',
            ],
            [
                'name' => '中村',
                'email' => 'test6@test.com',
                'password' => Hash::make('password'),
                // 'created_at' => '2022/01/01 11:11:11',
                // 'filename' => 'images/user/user6.png',
                'body' => '中村と申します。宜しくお願いします。',
            ],
        ]);
    }
}
