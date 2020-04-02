<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardOptionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_option_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('card_option_id');
            $table->string('header_background')->default('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcREHxbijhe1ZwCHRlybXeQZbIbILW0mm8hrkmkE8yuhWgZxgUMl');
            $table->string('header');
            $table->string('content');
            $table->string('footer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_option_items');
    }
}
