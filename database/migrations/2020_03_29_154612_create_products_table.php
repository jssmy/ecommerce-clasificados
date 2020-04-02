<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',150);
            $table->text('description');
            $table->decimal('price');
            $table->decimal('discount');
            $table->integer('stock');
            $table->integer('priority')->default(0);
            $table->string('img_url_1',155);
            $table->string('img_url_2',155)->nullable();
            $table->string('img_url_3',155)->nullable();
            $table->string('img_url_4',155)->nullable();
            $table->string('img_url_5',155)->nullable();
            $table->string('img_url_6',155)->nullable();
            $table->string('img_url_7',155)->nullable();
            $table->string('img_url_8',155)->nullable();
            $table->integer('category_id')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('products');
    }
}
