<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas_hotel');
            $table->string('foto_fasilitas_hotel')->nullable();
            $table->text('deskripsi_fasilitas_hotel')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_hotels');
    }
}
