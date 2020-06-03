<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('store_name')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->string('user_type')->nullable();
            $table->float('deposit')->nullable();

            $table->string('nama_belakang')->after('name')->nullable();
            $table->UnsignedBigInteger('provinsi_id')->after('address')->nullable()->comment('provinces');
            $table->UnsignedBigInteger('kabupaten_id')->after('provinsi_id')->nullable()->comment('regencies');
            $table->UnsignedBigInteger('kota_id')->after('kabupaten_id')->nullable()->comment('districts');
            $table->UnsignedBigInteger('kelurahan_id')->after('kota_id')->nullable()->comment('vilages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('store_name');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('user_type');
            $table->dropColumn('deposit');
            $table->dropColumn('nama_belakang');
            $table->dropColumn('provinsi_id');
            $table->dropColumn('kabupaten_id');
            $table->dropColumn('kota_id');
            $table->dropColumn('kelurahan_id');
        });
    }
}
