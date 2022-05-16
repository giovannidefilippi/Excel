@extends('app')

@section('content')
    <div class="col-lg-10" style="margin-left:150px ">
        <br>

        <h1 class="my-4 text-center"> {{$gara->stato->stato}}  scade il  {{$gara->datascadenza}}</h1>


        <b>RDO :</b>
        <br>
        <input type="text" name="rdo" value="{{$gara->rdo}}" class="form-control" readonly/>
        <br>

        <b>Denominazione iniziativa :</b>
        <br>
        <input type="text" name="denominazioneiniziativa" value="{{$gara->denominazioneiniziativa}}" class="form-control"readonly/>
        <br>

        <b>Amministrazione :</b>
        <br>
        <input type="text" name="amministrazione" value="{{$gara->amministrazione}}" class="form-control" readonly/>
        <br>

        <b>Regione :</b>
        <br>
        <input type="text" name="regione" value="{{$gara->regione}}" class="form-control" readonly/>
        <br>

        <b>Nome PO :</b>
        <br>
        <input type="text" name="referente" value="{{$gara->referente}}" class="form-control" readonly/>
        <br>

        <b>Telefono PO :</b>
        <br>
        <input type="text" name="telefono" value="{{$gara->telefono}}" class="form-control" readonly/>
        <br>

        <b>Bando :</b>
        <br>
        <input type="text" name="bando" value="{{$gara->bando}}" class="form-control" readonly/>
        <br>

        <b>Numero Lotto :</b>
        <br>
        <input type="text" name="lotto" value="{{$gara->lotto}}" class="form-control" readonly/>
        <br>

        <b>Importo totale a base d'asta lotto :</b>
        <br>
        <input type="text" name="basedasta" value="{{$gara->basedasta}}" class="form-control" readonly/>
        <br>

        <b>Data e ora inizio presentazione offerte :</b>
        <br>
        <input type="text" name="datapubblicazione" value="{{$gara->datapubblicazione}}" class="form-control" readonly/>
        <br>

        <b>Data e ora termine ultimo presentazione offerte :</b>
        <br>
        <input type="text" name="datascadenza" value="{{$gara->datascadenza}}" class="form-control" readonly/>
        <br>

        <b>Data e ora termine ultimo richiesta chiarimenti :</b>
        <br>
        <input type="text" name="dataterminechiarimenti" value="{{$gara->dataterminechiarimenti}}" class="form-control" readonly/>
        <br>

        <b>Giorni dopo la stipula per Consegna Beni / Decorrenza Servizi :</b>
        <br>
        <input type="text" name="giornidiconsegna" value="{{$gara->giornidiconsegna}}" class="form-control" readonly/>
        <br>

        <b>Criterio di aggiudicazione :</b>
        <br>
        <input type="text" name="criterioaggiudicazione" value="{{$gara->criterioaggiudicazione}}" class="form-control" readonly/>
        <br>

        <b>Note :</b>
        <br>
        <textarea type="text" name="note"  class="form-control" readonly>{{$gara->note}}</textarea>
        <br>

        <b>Quotazione :</b>
        <br>
        <input type="text" name="quotazione" value="{{$gara->quotazione}}" class="form-control" readonly/>
        <br>

        <b> Offerta :</b>
        <br>
        <input type="text" name="offerta" value="{{$gara->offerta}}" class="form-control" readonly/>
        <br>


        <div class="text-center">
            <a class="btn btn-primary" href="{{route('home')}}">Torna all'Elenco</a>
        </div>
        <br>
    </div>

@endsection



