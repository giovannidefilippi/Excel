@extends('app')

@section('content')
    <div class="panel-heading">
        <h3 class="panel-heading text-center" style="margin-top: 50px;"> {{$tipo}}</h3>
        <br>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="gare">
                <thead class="thead-dark">


                <tr class="table-success text-center">
                    <th style="width: 5%">Info</th>
                    <th style="width: 5%"> Scadenza</th>
                    <th style="width: 5%"> RDO</th>
                    <th style="width: 5%;"> Lotto</th>
                    <th style="width: 10%"> Stato gara</th>
                    <th style="width: 20%"> Denominazione iniziativa</th>
                    <th style="width: 10%"> Base d'asta</th>
                    <th style="width: 10%"> Quotazione</th>
                    <th style="width: 10%"> Offerta</th>
                    <th style="width: 10%"> Amministrazione</th>
                    <th style="width: 10%"> Funzioni</th>


                </tr>
                </thead>

                @foreach($gara as $row)
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
                    @elseif($row->stato->id == '11')
                        <tr class="bg-danger" style="text-align: center">
                    @else
                        <tr style="text-align: center" class="table-info">
                            @endif

                            <td><a href="{{route('gare.edit',$row->id)}}"><img src="{{ asset('info.svg') }}" alt="info" width="32px"></a></td>
                            <td>{{$row->datascadenza}}</td>
                            <td>{{$row->rdo}}</td>
                            <td>{{$row->lotto}}</td>
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
                            <td>{{$row->denominazioneiniziativa}}</td>
                            <td>{{$row->basedasta}}€</td>
                            <td>@if($row->quotazione){{$row->quotazione}}€
                                @else Nessuna Quotazione
                                @endif</td>
                            <td>@if($row->offerta){{$row->offerta}}€
                                @else Nessuna Offerta
                                @endif</td>

                            <td>{{$row->amministrazione}}</td>
                            <td>
                                @if($row->percorsocartella)
                                    <a class="btn btn-sm btn-warning" style="width: 100%" href="{{route('apriCartella',$row->percorsocartella)}}">Apri Cartella </a>

                                @else
                                    <a class="btn btn-sm btn-info" style="width: 100%" href="{{route('creaCartella',[$row->rdo.$row->lotto,$row->id])}}">Crea Cartella </a>

                                @endif
                                <br>
                                <form action="{{route('gare.destroy',$row->id)}}" method="POST" style="display:inline">
                                    @method('DELETE')
                                    @csrf
                                    <input style="margin-top: 10px; width: 100%" type="submit" value="Elimina" class="btn btn-danger" onclick="return confirm('Sei sicuro? La gara verrà eliminata dal database')"/>
                                </form>
                            </td>
                        </tr>


                        @endforeach

            </table>
        </div>
    </div>


@endsection
