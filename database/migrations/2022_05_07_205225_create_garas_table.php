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
            $table->string('rdoelotto')->unique();
            $table->longText('denominazioneiniziativa')->nullable();
            $table->string('amministrazione')->nullable();
            $table->string('regione')->nullable();
            $table->string('referente')->nullable();
            $table->string('bando')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('lotto');
            $table->double('basedasta')->nullable();
            $table->string('datapubblicazione')->nullable();
            $table->string('datascadenza')->nullable();
            $table->string('dataterminechiarimenti')->nullable();
            $table->string('giornidiconsegna')->nullable();
            $table->string('criterioaggiudicazione')->nullable();
            $table->string('note')->nullable();
            $table->string('percorsocartella')->nullable();
            $table->double('quotazione')->nullable();
            $table->double('offerta')->nullable();
            $table->unsignedBigInteger('stato_id')->default(1);
            // chiave esterna su stato
            $table->foreign('stato_id')->references('id')->on('statos');
            $table->unsignedBigInteger('operatore_id')->default(1);
            // chiave esterna su operatore
            $table->foreign('operatore_id')->references('id')->on('operatores');
            $table->unsignedBigInteger('fidejussione_id')->default(1);
            // chiave esterna su fidejussione
            $table->foreign('fidejussione_id')->references('id')->on('fidejussiones');
            $table->timestamps();
            $table->integer('datascadenzatotime')->nullable();
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
