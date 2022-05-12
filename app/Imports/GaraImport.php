<?php

namespace App\Imports;

use App\Models\Gara;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');  //toglie le formattazioni

class GaraImport implements ToModel,WithHeadingRow,WithUpserts
{
    /**
    * @param array $row
    *
    * @return Model|null
    */
    public function model(array $row)
    {
        //$id=$row['Numero RdO']. $row['Numero Lotto'];
        if($row['Bando']=="BENI/Informatica, Elettronica, Telecomunicazioni e Macchine per Ufficio" || $row['Bando']=="SERVIZI/Servizi per l'Information & Communication Technology")

            return new Gara([
            //'id' =>$row['Numero RdO'].$row['Numero Lotto'],
            //'id'=>'10',
            'rdoelotto' => $row['Numero RdO'].$row['Numero Lotto'],
            'rdo'        => $row['Numero RdO'],
            'denominazioneiniziativa'      => $row['Denominazione iniziativa'],
            'amministrazione'     => $row['Amministrazione'],
            'referente'       => $row['Nome PO'],
            'telefono'       => $row['Telefono PO'],
            'bando'       => $row['Bando'],
            'basedasta'       =>$row["Importo totale a base d'asta lotto"],
            'datascadenza'       => $row['Data e ora termine ultimo presentazione offerte'],
            'lotto'       => $row['Numero Lotto'],
            'regione'       => $row['Regione'],
            'datapubblicazione'       => $row['Data e ora inizio presentazione offerte'],
            'dataterminechiarimenti'       => $row['Data e ora termine ultimo richiesta chiarimenti'],
            'giornidiconsegna'       => $row['Giorni dopo la stipula per Consegna Beni / Decorrenza Servizi'],
            'criterioaggiudicazione'       => $row['Criterio di aggiudicazione'],
            /*'stato_id' =>1,
            'operatore_id' =>1,
            'fidejussione_id'=>1,*/
            //sono i campi che importa nel db dal file
        ]);
        }

    public function uniqueBy(): string
    {
       //return ['rdo','lotto'];
        return 'rdo';
    }
}
