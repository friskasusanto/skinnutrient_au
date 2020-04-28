<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_entry')->nullable();
            $table->UnsignedBigInteger('user_id')->nullable();
            $table->UnsignedBigInteger('product_id')->nullable();
            $table->string('status')->default(0);
            $table->string('receiver_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->float('total_amount')->nullable();
            $table->string('payment')->nullable();
            $table->date('paid_date')->nullable();
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
        Schema::dropIfExists('checkouts');
    }
}
