@extends('app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-heading text-center" style="margin-top: 50px;"> Carica il file excel con le nuove Gare </h3>

            @if (count($errors) > 0)
                <div class="alert alert-danger text-center">
                    <div style="text-align: right">
                        <button type="button" class="close" data-dismiss="alert">chiudi x</button><br>
                    </div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($message =Illuminate\Support\Facades\Session::get('success'))
                <div class="alert alert-success alert-block text-center">
                    <div style="text-align: right">
                        <button type="button" class="close" data-dismiss="alert">chiudi x</button><br>
                    </div>
                    <strong>{{$message}}</strong>
                </div>
            @endif

            @if($message =Illuminate\Support\Facades\Session::get('error'))
                <div class="alert alert-warning alert-block text-center">
                    <div style="text-align: right">
                        <button type="button" class="close" data-dismiss="alert">chiudi x</button><br>
                    </div>
                    <strong>{{$message}}</strong>
                </div>
            @endif

            <br/>
        </div>
        <div class="panel-body">
            <form method="post" enctype="multipart/form-data" action="{{route('gara.import')}}">
                @csrf
                <div class="form-group">

                    <table class="table">
                        <tr>
                            <td style="width: 40%;text-align: right"><label>Seleziona il  file .xls da caricare</label></td>
                            <td style="width: 30%">
                                <input type="file" name="scegli_file" class="form-control">
                            </td>
                            <td style="width: 30%;text-align: left">
                                <input type="submit" name="upload" class="btn btn-primary" value="Carica il file">
                            </td>
                        </tr>
                    </table>

                </div>
            </form>

        </div>
    </div>


@endsection
