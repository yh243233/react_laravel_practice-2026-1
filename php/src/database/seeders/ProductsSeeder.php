<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'dad',
                'category_id' => 1,
                'comment' => 'dsa',
                'price' => 1234,
                'pic1' => 'uploads/9796baaf6a8fddc72cf79b5469e4f7a8d17a4213.png',
                'pic2' => '',
                'pic3' => '',
                'user_id' => 1,
                'delete_flg' => 0,
                'create_date' => '2020-01-17 14:44:07',
                'update_date' => '2020-01-17 14:44:07',
            ],
            [
                'id' => 2,
                'name' => 'test123',
                'category_id' => 1,
                'comment' => '-----詳細テンプレート-----・案件名・職種・勤務地（都道府県名）・勤務地(最寄り駅など)・単価(税込)・案件内容■スキル： ■人数 ： ■性別 ： ■国籍 ： ■特記',
                'price' => 1234,
                'pic1' => 'uploads/64bf121176848dfa79f970b4ae0fbe9b3840dc11.png',
                'pic2' => '',
                'pic3' => '',
                'user_id' => 1,
                'delete_flg' => 0,
                'create_date' => '2020-01-17 14:44:23',
                'update_date' => '2020-01-17 14:44:23',
            ],
            [
                'id' => 3,
                'name' => 'test',
                'category_id' => 1,
                'comment' => '-----詳細テンプレート-----・案件名・職種・勤務地（都道府県名）・勤務地(最寄り駅など)・単価(税込)・案件内容■スキル： ■人数 ： ■性別 ： ■国籍 ： ■特記',
                'price' => 1234,
                'pic1' => 'uploads/ca113526d54f352b519bca211cebed8743aebbe4.png',
                'pic2' => '',
                'pic3' => '',
                'user_id' => 1,
                'delete_flg' => 0,
                'create_date' => '2020-01-17 14:44:37',
                'update_date' => '2020-01-17 14:44:37',
            ],
        ]);
    }
}

