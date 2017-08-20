<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //建立table用
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id'); //自動增加流水號
            $table->string('title');
            $table->string('text');
            $table->integer('author');//用id來存作者名字
            $table->timestamps(); //產生目前時間
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //後悔，要roll back
    {
        Schema::dropIfExists('posts');
    }
}
