<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowToUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_to_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('product_id')->nullable();
            $table->string('parent')->nullable();
            $table->string('child')->nullable();
            $table->string('step')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('how_to_uses');
    }
}
