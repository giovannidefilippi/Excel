<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gare</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Elenco Gare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('gare.create')}}">Nuova Gara</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('importazione')}}">Importa Gare</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Seleziona per Stato</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('nuovaGara')}}">Nuova Gara</a></li>
                                <li><a class="dropdown-item" href="{{route('inValutazione')}}">In Valutazione</a></li>
                                <li><a class="dropdown-item" href="{{route('richiestaChiarimenti')}}">Richiesta chiarimenti</a></li>
                                <li><a class="dropdown-item" href="{{route('richiestaQuotazione')}}">Richiesta Quotazione</a></li>
                                <li><a class="dropdown-item" href="{{route('quotazioneRicevuta')}}">Quotazione Ricevuta</a></li>
                                <li><a class="dropdown-item" href="{{route('attesaPrezzoUscita')}}">Attesa Prezzo Uscita</a></li>
                                <li><a class="dropdown-item" href="{{route('daPartecipare')}}">Da partecipare</a></li>
                                <li><a class="dropdown-item" href="{{route('partecipata')}}">Partecipata</a></li>
                                <li><a class="dropdown-item" href="{{route('revocata')}}">Revocata</a></li>
                                <li><a class="dropdown-item" href="{{route('scartata')}}">Scartata</a></li>
                                <li><a class="dropdown-item" href="{{route('eliminata')}}">Eliminata</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="{{route('home')}}">Tutte le Gare</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div>


            <div class="container-fluid">
                <div class="row">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
