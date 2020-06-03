<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('produk_id')->nullable();
            $table->UnsignedBigInteger('user_id')->nullable();
            $table->float('price_user')->nullable();
            $table->date('date_entry')->nullable();
            $table->string('status')->dafault(0);
            $table->timestamps();

            $table->foreign('produk_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
