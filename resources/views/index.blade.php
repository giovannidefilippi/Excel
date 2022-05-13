@extends('app')

    @section('content')
                <div class="panel-heading">
                    <table class="table">
                        <tr class="" >
                            <td class="">
                                <form action="">
                                    <label for="operatoreSelezionato">Seleziona Operatore</label>
                                    <select class="form-select form-select-lg mb-2" aria-label=".form-select-lg example" name="operatoreSelezionato" id="operatoreSelezionato" style="width:25%">
                                @foreach ($operatore as $item)
                                    <option value="{{ $item->id }}"> {{ $item->nome }} {{$item->cognome}}</option>
                                @endforeach </select>

                            <input type="submit" class="btn btn-outline-primary" value="Visualizza per Operatore" style="widtH: 25%;">

                                </form>
                            </td>

                            <td class="" style="text-align:right;">
                            <a class="btn btn-success btn-lg" href="{{route('importazione')}}" role="button" style="margin-top:45px;margin-right:25px;">Importa Gare</a>
                            </td>
                     </tr>
                    </table>
                   {{-- <h3 class="panel-heading text-center" style="margin-top: 50px;"> Elenco Gare </h3>--}}

                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                       <!--<table class="table table-bordered table-striped">-->
                            <table class="table table-striped">

                                <thead class="thead-dark">

                            <tr class="table-success text-center">
                                <th style="width: 5%"> Scadenza</th>
                                <th style="width: 5%"> RDO</th>
                                <th> Lotto</th>
                                <th style="width: 10%"> Stato gara</th>
                                <!--<th> Data Pubblicazione</th>-->
                                <th style="width: 25%"> Denominazione iniziativa</th>
                                <th style="width: 10%"> Base d'asta</th>
                                <th style="width: 10%"> Quotazione</th>
                                <th style="width: 10%"> Offerta</th>
                                <th style="width: 10%"> Amministrazione</th>
                                <th style="width: 10%"> Funzioni</th>


                            </tr>
                             </thead>
                             <tbody class="table-hover">

                            @foreach($sorted_gara as $row)

                                @if($row->stato->id == '1')
                                    <tr class="gara_inserita" style="text-align: center">
                                @elseif($row->stato->id == '2')
                                    <tr class="" style="text-align: center">
                                @elseif($row->stato->id == '3')
                                    <tr class="" style="text-align: center">
                                @elseif($row->stato->id == '4')
                                    <tr class="" style="text-align: center">
                                @elseif($row->stato->id == '5')
                                    <tr class="" style="text-align: center">
                                @elseif($row->stato->id == '6')
                                    <tr class="gara_attesa_uscita" style="text-align: center">
                                @elseif($row->stato->id == '7')
                                    <tr class="gara_attesa_uscita" style="text-align: center">
                                @elseif($row->stato->id == '8')
                                    <tr class="table-success" style="text-align: center">
                                @elseif($row->stato->id == '9')
                                    <tr class="gara_revocata" style="text-align: center">
                                @elseif($row->stato->id == '10')
                                    <tr class="bg-danger gara_scartata" style="text-align: center">

                                @else
                                    <tr style="text-align: center" class="table-info">
                                        @endif

                                        <td>{{$row->datascadenza}}</td>
                                        <td>{{$row->rdo}}</td>
                                        <td>{{$row->lotto}}</td>
                                        <td>


                                            <form action="{{route('gara.update',$row->id)}}" method="POST" enctype="multipart/form-data" >
                                                @method('PUT')
                                                @csrf
                                                <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="stato" id="stato" style="width:180px;text-align: center;background-color: #a6dec7">
                                                    <option value="{{ $row->stato->id }}" hidden> {{ $row->stato->stato }} </option>
                                                    @foreach ($stato as $item)
                                                        @if($row->stato->id!=$item->id)
                                                            <option value="{{ $item->id }}" > {{ $item->stato }} </option>
                                                        @endif
                                                    @endforeach    </select>
                                                <input type="submit" class="btn btn-outline-primary" value="Cambia Stato" style="margin-top: 10%; width: 100%">
                                            </form>

                                        </td>
                                       <!-- <td>{{$row->datapubblicazione}}</td>-->
                                        <td>{{$row->denominazioneiniziativa}}</td>
                                        <td>{{$row->basedasta}}€</td>
                                        <td>@if($row->quotazione){{$row->quotazione}}€
                                                @else nessuna quotazione
                                            @endif</td>
                                        <td>@if($row->offerta){{$row->offerta}}€
                                            @else nessuna offerta
                                            @endif</td>
                                        <td>{{$row->amministrazione}}</td>
                                        <td><a href="#" <input class="btn btn-primary" style="width: 100%; margin-bottom: 10px;">Modifica</a>
                                            <a href="#" <input class="btn btn-danger" style="width: 100%">Elimina</a>
                                        </td>




                                </tr>

                                    @endforeach

                                </tbody>
                        </table>
                    </div>
                </div>


    @endsection
