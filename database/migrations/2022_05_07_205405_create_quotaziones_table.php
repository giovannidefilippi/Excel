<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotazionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotaziones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gara_id');
            // chiave esterna su gara
            $table->foreign('gara_id')->references('id')->on('garas');
            $table->string('datarichiesta')->nullable();
            $table->string('fornitore');
            $table->double('valore')->nullable();
            $table->string('note')->nullable();
            $table->string('filecaricato')->nullable();
            $table->string('dataricezione')->nullable();
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
        Schema::dropIfExists('quotaziones');
    }
}
