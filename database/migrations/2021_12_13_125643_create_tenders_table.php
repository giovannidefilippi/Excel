<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('rdo');
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
        Schema::dropIfExists('tenders');
    }
}
