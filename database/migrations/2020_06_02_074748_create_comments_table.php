<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('product_id')->nullable();
            $table->UnsignedBigInteger('blog_id')->nullable();
            $table->string('parent')->nullable();
            $table->string('child')->nullable();
            $table->string('status')->default(0);
            $table->text('comment')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('judul')->nullable();
            $table->timestamps();


            $table->foreign('blog_id')->references('id')->on('blogs');
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
        Schema::dropIfExists('comments');
    }
}
