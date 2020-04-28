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
            $table->text('detail')->nullable();
            $table->string('ingredient')->nullable();
            $table->text('shipping_police')->nullable();
            $table->UnsignedBigInteger('skincare_id')->nullable();
            $table->string('help_with')->nullable();
            $table->string('key_ingredient')->nullable();
            $table->text('kegunaan')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();

            $table->foreign('skincare_id')->references('id')->on('skin_cares');
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
