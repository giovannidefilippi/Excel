@extends('app')

@section('content')
    <div class="col-lg-10 ">
        <div class="text-center" style="margin-top: 20px">
            <table style="margin-left: 100px;">
                <tr>
                    <td><span id="TitoloInLinea" >Modifica Gara</span>
                    </td>
                    <td>
                <span style="margin-left: 350px;">
                    <form action="{{route('home')}}" method="GET" style="display:inline">
                    @csrf
                        <input type="submit" value="Ritorna senza modifiche" class="btn btn-outline-success btn-lg" />
                        <input type='hidden' name='cliente_id' value="{{$gara->id}}">
                    </form>
                    </span>
                    </td>
                </tr>
            </table>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <br>
        <form action="{{route('gare.update',$gara->id)}}" method="POST" enctype="multipart/form-data" style="margin-left:150px ">
            @method('PUT')
            @csrf

            <b>RDO :</b>
            <br>
            <input type="text" name="rdo" value="{{$gara->rdo}}" class="form-control" readonly/>
            <br>

            <b>Denominazione iniziativa :</b>
            <br>
            <input type="text" name="denominazioneiniziativa" value="{{$gara->denominazioneiniziativa}}" class="form-control" readonly/>
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
            <input type="text" name="referente" value="{{$gara->referente}}" class="form-control" />
            <br>

            <b>Telefono PO :</b>
            <br>
            <input type="text" name="telefono" value="{{$gara->telefono}}" class="form-control"/>
            <br>

            <b>Bando :</b>
            <br>
            <input type="text" name="bando" value="{{$gara->bando}}" class="form-control" readonly/>
            <br>

            <b>Numero Lotto :</b>
            <br>
            <input type="text" name="lotto" value="{{$gara->lotto}}" class="form-control"readonly/>
            <br>

            <b>Importo totale a base d'asta lotto :</b>
            <br>
            <input type="text" name="basedasta" value="{{$gara->basedasta}}" class="form-control"/>
            <br>

            <b>Data e ora inizio presentazione offerte :</b>
            <br>
            <input type="text" name="datapubblicazione" value="{{$gara->datapubblicazione}}" class="form-control" readonly/>
            <br>

            <b>Data e ora termine ultimo presentazione offerte :</b>
            <br>
            <input type="text" name="datascadenza" value="{{$gara->datascadenza}}" class="form-control" />
            <br>

            <b>Data e ora termine ultimo richiesta chiarimenti :</b>
            <br>
            <input type="text" name="dataterminechiarimenti" value="{{$gara->dataterminechiarimenti}}" class="form-control" />
            <br>

            <b>Giorni dopo la stipula per Consegna Beni / Decorrenza Servizi :</b>
            <br>
            <input type="text" name="giornidiconsegna" value="{{$gara->giornidiconsegna}}" class="form-control" readonly/>
            <br>

            <b>Criterio di aggiudicazione :</b>
            <br>
            <input type="text" name="criterioaggiudicazione" value="{{$gara->criterioaggiudicazione}}" class="form-control" readonly/>
            <br>

            <b>Quotazione :</b>
            <br>
            <input type="text" name="quotazione" value="{{$gara->quotazione}}" class="form-control"/>
            <br>

            <b> Offerta :</b>
            <br>
            <input type="text" name="offerta" value="{{$gara->offerta}}" class="form-control"/>
            <br>

            <div class="text-center">

                <input type="submit" class="btn btn-primary btn-lg" value="Salva Modifiche">
            </div>
        </form>

        <br>
    </div>
    <table class="table table-bordered table-striped" id="gare">
        <thead class="thead-dark">


        <tr class="table-success text-center">
            <th style="width: 5%">Info</th>
            <th style="width: 5%">Testo</th>
            <th style="width: 10%">Data</th>
            <th style="width: 10%"></th>


        </tr>
        </thead>

        @foreach($note as $row)
                <tr style="text-align: center" class="table-info">


                    <td><a href="{{route('note.edit',$row->id)}}"><img src="{{ asset('info.svg') }}" alt="info" width="32px"></a></td>
                    <td>{{$row->testo}}</td>
                    <td>{{$row->datainserimento}}</td>
                    <td>

                        <form action="{{route('note.destroy',$row->id)}}" method="POST" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <input style="margin-top: 10px; width: 100%" type="submit" value="Elimina" class="btn btn-danger" onclick="return confirm('Sei sicuro? La nota verrà eliminata dal database')"/>
                        </form>
                    </td>
                </tr>


                @endforeach

    </table>

@endsection


