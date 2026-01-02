<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->upsert([
            ['id' => 1, 'name' => 'システム開発・運用', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 2, 'name' => 'Web制作・Webデザイン', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 3, 'name' => '翻訳・通訳サービス', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 4, 'name' => 'デザイン制作', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 5, 'name' => 'ライティング・ネーミング', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 6, 'name' => '営業・マーケティング・企画・広報', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 7, 'name' => '写真・動画・ナレーション', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 8, 'name' => '事務・コンサル・専門職', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 9, 'name' => 'タスク・作業', 'delete_flg' => 0, 'create_date' => now()],
            ['id' => 10, 'name' => 'その他', 'delete_flg' => 0, 'create_date' => now()],
        ], ['id'], ['name', 'delete_flg', 'create_date']);
    }
}



