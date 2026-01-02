<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'テスト太郎',
                'age' => 22,
                'tel' => '08033339999',
                'zip' => 1234567,
                'pic' => '',
                'addr' => '北海道',
                'email' => 'test01@gmail.com',
                'password' => bcrypt('password1'), // パスワードを暗号化
                'delete_flg' => 0,
                'login_time' => '2020-01-17 05:43:39',
                'create_date' => '2020-01-17 14:43:39',
                'update_date' => '2020-01-19 09:37:42',
            ],
            [
                'id' => 2,
                'username' => null,
                'age' => null,
                'tel' => null,
                'zip' => null,
                'pic' => null,
                'addr' => null,
                'email' => 'test02@gmail.com',
                'password' => bcrypt('password2'), // パスワードを暗号化
                'delete_flg' => 0,
                'login_time' => '2020-01-17 05:46:00',
                'create_date' => '2020-01-17 14:46:00',
                'update_date' => '2020-01-17 14:46:00',
            ],
        ]);
    }
}

