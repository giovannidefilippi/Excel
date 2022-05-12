@extends('app')

    @section('content')
                <div class="panel-heading">
                    <table class="table">
                        <tr class="" >
                            <td class="">
                                <form action="">
                                    <label for="operatoreSelezionato">Seleziona Operatore</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="operatoreSelezionato" id="operatoreSelezionato" style="width:350px ">
                                @foreach ($operatore as $item)
                                    <option value="{{ $item->id }}"> {{ $item->nome }} {{$item->cognome}}</option>
                                @endforeach    </select>

                            <input type="submit" class="btn btn-outline-success" value="Visualizza per Operatore">

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
                        <table class="table table-bordered table-striped">

                            <tr class="table-success text-center" >
                                <th> RDO</th>
                                <th> Lotto</th>
                                <th> Data Pubblicazione</th>
                                <th> Scadenza</th>
                                <th> Denominazione iniziativa</th>
                                <th> Importo totale a base d'asta lotto</th>
                                <th> Quotazione</th>
                                <th> Offerta</th>
                                <th> Stato gara</th>
                                <th> Amministrazione</th>





                            </tr>
                            @foreach($sorted_gara as $row)

                                @if($row->stato->id == '1')
                                    <tr class="bg-info" style="text-align: center">
                                @elseif($row->stato->id == '2')
                                    <tr class="table-warning" style="text-align: center">
                                @elseif($row->stato->id == '3')
                                    <tr class="table-danger" style="text-align: center">
                                @elseif($row->stato->id == '4')
                                    <tr class="table-primary" style="text-align: center">
                                @else
                                    <tr style="text-align: center" class="table-info">
                                        @endif

                                        <td>{{$row->rdo}}</td>
                                        <td>{{$row->lotto}}</td>
                                        <td>{{$row->datapubblicazione}}</td>
                                        <td>{{$row->datascadenza}}</td>
                                        <td>{{$row->denominazioneiniziativa}}</td>
                                        <td>{{$row->basedasta}} €</td>
                                        <td>@if($row->quotazione){{$row->quotazione}} €
                                                @else nessuna quotazione
                                            @endif</td>
                                        <td>@if($row->offerta){{$row->offerta}} €
                                            @else nessuna offerta
                                            @endif</td>
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
                                                <br>
                                                <input type="submit" class="btn btn-outline-primary" value="Cambia Stato" style="margin-top: 10%">
                                            </form>

                                    </td>
                                        <td>{{$row->amministrazione}}</td>




                                </tr>

                                    @endforeach

                        </table>
                    </div>
                </div>


    @endsection
