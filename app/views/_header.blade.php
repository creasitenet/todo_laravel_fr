
 <!-- header -->
    <div class="row header">
            
        <div class="col-sm-6">
            <h1><a href="{{ URl::to('/') }}">todo</a></h1>
        </div>

        <div class="col-sm-6">
            <div class="header_acces padding">
                @if(!$user)
                    <a href="{{ URL::route('connexion') }}" class="btn btn-success btn-sm">SE CONNECTER</a>
                    <a href="{{ URL::route('inscription') }}" class="btn btn-danger btn-sm">S'INSCRIRE</a>
                @endif
                @if($user)
                    <span class="username">{{ $user->username }}
                    <a href="{{ URL::route('deconnexion') }}" class="deconnexion"><i class="fa fa-power-off fa-3x deconnexion"></i></a>
                    </span>
                @endif 
            </div>         
        </div>

    </div>
    <!-- /header -->
