<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBordTable extends Migration
{
    public function up()
    {
        Schema::create('bord', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sale_user')->nullable();
            $table->unsignedInteger('buy_user')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->tinyInteger('delete_flg')->nullable();
            $table->dateTime('create_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bord');
    }
}

