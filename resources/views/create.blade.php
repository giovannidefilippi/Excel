@extends('app')

@section('content')
    <div class="col-lg-10 ">
        <div class="text-center" style="margin-top: 20px">
            <table style="margin-left: 100px;">
                <tr>
                    <td><span id="TitoloInLinea"> Inserisci Nuova Gara</span>
                    </td>
                    <td>
                        <span style="margin-left: 350px;"><a class="btn btn-outline-success btn-lg" href="{{route('home')}}" role="button">Ritorna senza salvare</a>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-left:150px ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('gare.store')}}" method="POST" enctype="multipart/form-data" style="margin-left:150px ">
            @csrf

            <b>RDO :</b>
            <br>
            <input type="text" name="rdo" value="{{old('rdo')}}" class="form-control" placeholder="**Campo Obbligatorio"/>
            <br>

            <b>Denominazione iniziativa :</b>
            <br>
            <input type="text" name="denominazioneiniziativa" value="{{old('denominazioneiniziativa')}}" class="form-control" />
            <br>

            <b>Amministrazione :</b>
            <br>
            <input type="text" name="amministrazione" value="{{old('amministrazione')}}" class="form-control" />
            <br>

            <b>Regione :</b>
            <br>
            <input type="text" name="regione" value="{{old('regione')}}" class="form-control" />
            <br>

            <b>Nome PO :</b>
            <br>
            <input type="text" name="referente" value="{{old('referente')}}" class="form-control" />
            <br>

            <b>Telefono PO :</b>
            <br>
            <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" />
            <br>

            <b>Bando :</b>
            <br>
            <input type="text" name="bando" value="{{old('bando')}}" class="form-control" />
            <br>

            <b>Numero Lotto :</b>
            <br>
            <input type="text" name="lotto" value="{{old('lotto')}}" class="form-control" placeholder="**Campo Obbligatorio"/>
            <br>

            <b>Importo totale a base d'asta lotto :</b>
            <br>
            <input type="text" name="basedasta" value="{{old('basedasta')}}" class="form-control" />
            <br>

            <b>Data e ora inizio presentazione offerte :</b>
            <br>
            <input type="text" name="datapubblicazione" value="{{old('datapubblicazione')}}" class="form-control" />
            <br>

            <b>Data e ora termine ultimo presentazione offerte :</b>
            <br>
            <input type="text" name="datascadenza" value="{{old('datascadenza')}}" class="form-control" />
            <br>

            <b>Data e ora termine ultimo richiesta chiarimenti :</b>
            <br>
            <input type="text" name="dataterminechiarimenti" value="{{old('dataterminechiarimenti')}}" class="form-control" />
            <br>

            <b>Giorni dopo la stipula per Consegna Beni / Decorrenza Servizi :</b>
            <br>
            <input type="text" name="giornidiconsegna" value="{{old('giornidiconsegna')}}" class="form-control" />
            <br>

            <b>Criterio di aggiudicazione :</b>
            <br>
            <input type="text" name="criterioaggiudicazione" value="{{old('criterioaggiudicazione')}}" class="form-control" />
            <br>

            <b>Note :</b>
            <br>
            <textarea type="text" name="note"  class="form-control" >{{old('note')}}</textarea>
            <br>

            <b>Quotazione :</b>
            <br>
            <input type="text" name="quotazione" value="{{old('quotazione')}}" class="form-control" />
            <br>

            <b> Offerta :</b>
            <br>
            <input type="text" name="offerta" value="{{old('offerta')}}" class="form-control" />
            <br>

            <div class="text-center">

                <input type="submit" class="btn btn-primary" value="Salva Nuova Gara">
            </div>
        </form>
        <br>
    </div>

@endsection


