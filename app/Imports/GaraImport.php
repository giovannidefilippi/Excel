<?php

namespace App\Imports;

use App\Models\Gara;
use DateTime;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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
    * @return Model|void|null
    */
    public function model(array $row)
    {

        $dataitaliana=$row['Data e ora termine ultimo presentazione offerte'];
        $formato="d/m/Y H:i:s";
        $data=DateTime::createFromFormat($formato,$dataitaliana);
        $iso=$data->format(DateTimeInterface::ATOM);

        if($row['Bando']=="BENI/Informatica, Elettronica, Telecomunicazioni e Macchine per Ufficio" || $row['Bando']=="SERVIZI/Servizi per l'Information & Communication Technology")
        {
            /*$path=public_path().'/gare/'.$row['Numero RdO'].$row['Numero Lotto'];
            Storage::makeDirectory($path,0777,true,true);*/
            return new Gara([
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
            'datascadenzatotime' =>strtotime($iso),
            //sono i campi che importa nel db dal file
        ]);
        }
        else
            return ;
        }

    public function uniqueBy(): string
    {
       return 'rdoelotto';
    }
}
