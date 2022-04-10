<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kamar');
            $table->string('foto_kamar')->nullable();
            $table->integer('jum_kamar');
            $table->integer('jum_kamar_kosong')->default(0);
            $table->integer('jum_kamar_terisi')->default(0);
            $table->integer('harga_kamar')->nullable();
            $table->text('deskripsi_kamar')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
