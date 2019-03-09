<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('deskripsi');
            $table->string('date');
            $table->integer('nilai');
            $table->unsignedInteger('dompet_id');
            $table->unsignedInteger('kategori_id');
            $table->unsignedInteger('transaksi_status_id');
            $table->timestamps();

            $table->foreign('dompet_id')->references('id')->on('dompet')->onDelete('restrict');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('restrict');
            $table->foreign('transaksi_status_id')->references('id')->on('transaksi_status')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
