<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_resellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('product_id')->nullable();
            $table->UnsignedBigInteger('user_id')->nullable();
            $table->string('jumlah')->dafault(0)->nullable();
            $table->date('tgl_input')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_resellers');
    }
}
