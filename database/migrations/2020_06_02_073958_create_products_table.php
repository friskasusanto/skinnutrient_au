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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->UnsignedBigInteger('category_id')->nullable();
            $table->float('price')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->nullable();
            $table->float('min_price')->nullable();
            $table->float('max_price')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
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
