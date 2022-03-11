<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->unsignedInteger('id_pesawat');
            $table->unsignedInteger('id_bandara_asal');
            $table->unsignedInteger('id_bandara_tujuan');
            $table->date('tgl_pergi');
            $table->time('jam_pergi');
            $table->timestamps();

            $table->foreign('id_pesawat')->references('id')->on('pesawats');
            $table->foreign('id_bandara_asal')->references('id_bandara')->on('bandaras');
            $table->foreign('id_bandara_tujuan')->references('id_bandara')->on('bandaras');
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
        Schema::dropIfExists('jadwals');
    }
}
