<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDompetTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dompet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('referensi');
            $table->string('deskripsi');
            $table->unsignedInteger('dompet_status_id');
            $table->timestamps();            

            $table->foreign('dompet_status_id')->references('id')->on('dompet_status')->onDelete('restrict');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dompet');
    }
}
