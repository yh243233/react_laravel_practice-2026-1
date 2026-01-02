<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('delete_flg')->default(0);
            $table->timestamp('create_date')->nullable(); // この行を追加
            $table->timestamp('update_date')->nullable(); // この行を追加
            $table->timestamps(); // これがある場合、Laravel標準の created_at と updated_at も生成されます
        });
    }

    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
