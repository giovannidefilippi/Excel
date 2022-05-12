<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garas', function (Blueprint $table) {
            $table->id();
            $table->string('rdo');
            $table->string('rdoelotto');
            $table->string('denominazioneiniziativa');
            $table->string('amministrazione');
            $table->string('regione');
            $table->string('referente');
            $table->string('bando');
            $table->string('telefono');
            $table->integer('lotto');
            $table->double('basedasta');
            $table->string('datapubblicazione');
            $table->string('datascadenza');
            $table->string('dataterminechiarimenti');
            $table->integer('giornidiconsegna');
            $table->string('criterioaggiudicazione');
            $table->string('note');
            $table->string('percorsocartella');
            $table->double('quotazione');
            $table->double('offerta');
            $table->unsignedBigInteger('stato_id');
            // chiave esterna su stato
            $table->foreign('stato_id')->references('id')->on('statos');
            $table->unsignedBigInteger('operatore_id');
            // chiave esterna su operatore
            $table->foreign('operatore_id')->references('id')->on('operatores');
            $table->unsignedBigInteger('fidejussione_id');
            // chiave esterna su fidejussione
            $table->foreign('fidejussione_id')->references('id')->on('fidejussiones');
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
        Schema::dropIfExists('garas');
    }
}
