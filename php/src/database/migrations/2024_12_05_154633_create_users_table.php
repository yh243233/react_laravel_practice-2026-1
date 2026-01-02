<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 255)->nullable();
            $table->integer('age')->nullable();
            $table->string('tel', 255)->nullable();
            $table->integer('zip')->nullable();
            $table->string('pic', 255)->nullable();
            $table->string('addr', 255)->nullable();
            $table->string('email', 255)->unique()->nullable();
            $table->string('password', 255)->nullable();
            $table->tinyInteger('delete_flg')->default(0);
            $table->timestamp('login_time')->nullable();

            // 追加カラム
            $table->timestamp('create_date')->nullable();
            $table->timestamp('update_date')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

