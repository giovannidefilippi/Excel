<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = ['rdo','denominazioneiniziativa','amministrazione',
        'regione','referente','telefono','bando','lotto','basedasta','datapubblicazione',
        'datascadenza','dataterminechiarimenti','giornidiconsegna','criterioaggiudicazione',
        'quotazione','offerta','note','percorsocartella'];
}
