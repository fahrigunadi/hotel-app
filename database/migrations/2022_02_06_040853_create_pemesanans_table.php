<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kamar_id')
                ->nullable()
                ->constrained('kamars')
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->date('tgl_checkin');
            $table->date('tgl_checkout');
            $table->integer('jum_kamar_dipesan');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('no_hp');
            $table->string('nama_tamu');
            $table->enum('status',['pesan','checkin', 'checkout', 'batal'])->default('pesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
}
