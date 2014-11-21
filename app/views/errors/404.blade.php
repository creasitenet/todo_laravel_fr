@extends('layout')
@section('content') 

        <div class="row e404">
            <div class="col-md-6 col-md-offset-3 e404">
                <h1>404</h1>
                <p>
                    Désolé, nous ne trouvons pas la page demandée !
                </p>
                <p>
                    <a class="btn btn-primary radius" href="{{ URL::to('/') }}">RETOURNER A L'ACCUEIL</a>
                </p>
            </div>
        </div>

@stop

