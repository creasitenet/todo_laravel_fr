@extends('layout')
@section('content') 

        <div class="row e404">
            <div class="col-md-6 col-md-offset-3 e404">
                <h1>500</h1>
                <p>
                Une erreur interne au serveur est survenue...
                </p>
                <p>
                    <a class="btn btn-primary radius" href="{{ URL::to('/') }}">RETOURNER A L'ACCUEIL</a>
                </p>
            </div>
        </div>

@stop