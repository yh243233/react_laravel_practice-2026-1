<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('comment');
            $table->string('pic1');
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->decimal('price', 10, 2);
            $table->boolean('delete_flg')->default(0);
            $table->timestamp('create_date')->nullable();
            $table->timestamp('update_date')->nullable();  // ここで追加
            $table->unsignedBigInteger('user_id');
            $table->timestamps();  // もし標準の created_at と updated_at を使いたい場合
        });

    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
