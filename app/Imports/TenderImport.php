<?php

namespace App\Imports;

use App\Models\Tender;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');  //toglie le formattazioni


class
TenderImport implements ToModel,WithHeadingRow//,WithUpserts
{
    /**
    * @param array $row
    *
    * @return Tender|null
    */
    public function model(array $row): ?Tender
    {

        return new Tender([
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
            //sono i campi che importa nel db dal file
        ]);
    }


/*

    //forza unique del db e inserisce le righe del file con diverso numero pratica di quelle inserite
   /* public function uniqueBy(): string
    {
        return 'numero';
    }*/

}
