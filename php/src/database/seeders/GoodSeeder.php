<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoodSeeder extends Seeder
{
    public function run()
    {
        DB::table('goods')->insert([
            [
                'product_id' => 1,
                'user_id' => 2,
                'delete_flg' => 0,
                'create_date' => '2020-01-26 09:10:57',
                'update_date' => '2020-01-26 09:10:57',
            ],
        ]);
    }
}

