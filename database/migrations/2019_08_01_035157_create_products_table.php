<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('cate_id');
            $table->integer('price_old');
            $table->integer('sale')->nullable();
            $table->integer('price_new')->nullable();
            $table->string('author');
            $table->string('publishing_company');
            $table->integer('number_page')->nullable();
            $table->integer('total')->nullable();
            $table->string('status')->nullable();
            $table->longText('detail');
            $table->string('class')->nullable();
            $table->string('subjects')->nullable();
            $table->string('thumbnail');
            $table->integer('hot');
            $table->integer('user_id');
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
