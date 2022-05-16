@extends('app')

    @section('content')
                <div class="panel-heading">
                  <h3 class="panel-heading text-center" style="margin-top: 50px;"> {{$tipo}}</h3>
                    <br>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">


                                <tr class="table-success text-center">
                                <th> RDO</th>
                                <th> Lotto</th>
                                <th> Data Pubblicazione</th>
                                <th> Scadenza</th>
                                <th> Denominazione iniziativa</th>
                                <th> Base d'asta</th>
                                <th> Quotazione</th>
                                <th> Offerta</th>
                                <th> Stato gara</th>
                                <th> Amministrazione</th>
                                <th> Area lavoro</th>
                                <th> </th>





                            </tr>

                            @foreach($gara as $row)
                                @if($row->stato->id == '1')
                                    <tr class="table-info" style="text-align: center">
                                @elseif($row->stato->id == '2')
                                    <tr class="table-warning" style="text-align: center">
                                @elseif($row->stato->id == '3')
                                    <tr class="table-danger" style="text-align: center">
                                @elseif($row->stato->id == '4')
                                    <tr class="table-primary" style="text-align: center">
                                @elseif($row->stato->id == '5')
                                    <tr class="table-secondary" style="text-align: center">
                                @elseif($row->stato->id == '6')
                                    <tr class="table-success" style="text-align: center">
                                @elseif($row->stato->id == '7')
                                    <tr class="table-light" style="text-align: center">
                                @elseif($row->stato->id == '8')
                                    <tr class="bg-primary" style="text-align: center">
                                @elseif($row->stato->id == '9')
                                    <tr class="bg-warning" style="text-align: center">
                                @elseif($row->stato->id == '10')
                                    <tr class="bg-danger" style="text-align: center">
                                @elseif($row->stato->id == '11')
                                    <tr class="bg-danger" style="text-align: center">
                                @else
                                    <tr style="text-align: center" class="table-info">
                                        @endif


                                        <td>{{$row->rdo}} <a class="btn btn-sm btn-info" href="{{route('gare.show',$row->id)}}"> Dettagli </a></td>
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


                                            <form action="{{route('gare.update',$row->id)}}" method="POST" enctype="multipart/form-data" >
                                                @method('PUT')
                                                @csrf
                                                <select class="form-select form-select-sm" aria-label=".form-select-lg example" name="stato" id="stato" style="width:180px;text-align: center;background-color: #a6dec7">
                                                    <option value="{{ $row->stato->id }}" hidden> {{ $row->stato->stato }} </option>
                                                    @foreach ($stato as $item)
                                                        @if($row->stato->id!=$item->id)
                                                        <option value="{{ $item->id }}" > {{ $item->stato }} </option>
                                                        @endif
                                                    @endforeach    </select>

                                                <input type="submit" class="btn btn-sm btn-outline-primary" value="Cambia Stato" style="margin-top: 10%">
                                            </form>

                                    </td>
                                        <td>{{$row->amministrazione}}</td>
                                        <td>
                                            @if($row->percorsocartella)
                                            <a class="btn btn-sm btn-outline-warning" href="{{route('apriCartella',$row->percorsocartella)}}">Apri Cartella </a>

                                            @else
                                            <a class="btn btn-sm btn-outline-info" href="{{route('creaCartella',[$row->rdo.$row->lotto,$row->id])}}">Crea Cartella </a>

                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary" href="{{route('gare.edit',$row->id)}}" style="margin-bottom: 2px">Modifica</a>
                                            <form action="{{route('gare.destroy',$row->id)}}" method="POST" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Elimina" class="btn btn-outline-danger" onclick="return confirm('Sei sicuro ? La gara verrà definitivamente eliminata')"/>
                                            </form>
                                        </td>
                                </tr>


                                    @endforeach

                        </table>
                    </div>
                </div>


    @endsection
