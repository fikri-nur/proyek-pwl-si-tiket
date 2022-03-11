<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id_bookings');
            $table->unsignedBigInteger('id_user');
            $table->string('nama_user');
            $table->string('nik_user');
            $table->unsignedInteger('id_jadwal');
            $table->integer('jumlah_tiket');
            $table->dateTime('waktu_pesan');
            $table->string('status_pembayaran');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bookings');
    }
}
