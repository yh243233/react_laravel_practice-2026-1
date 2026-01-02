<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bord_id')->nullable();
            $table->dateTime('send_date')->nullable();
            $table->unsignedInteger('to_user')->nullable();
            $table->unsignedInteger('from_user')->nullable();
            $table->string('msg', 255)->nullable();
            $table->tinyInteger('delete_flg')->default(0);
            $table->dateTime('create_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('message');
    }
}
