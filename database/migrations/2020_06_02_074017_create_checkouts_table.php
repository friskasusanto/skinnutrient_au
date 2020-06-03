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
            $table->UnsignedBigInteger('product_id')->nullable();
            $table->UnsignedBigInteger('user_id')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone_number')->nullable();
            $table->float('total_amount')->nullable();
            $table->UnsignedBigInteger('payment_id')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('courier')->nullable();
            $table->float('courier_price')->nullable();
            $table->string('status')->default(0);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
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
