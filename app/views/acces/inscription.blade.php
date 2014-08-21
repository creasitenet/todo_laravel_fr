@extends('layout')

@section('content')

<div class="container content">   
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

            <h3>Créer un nouveau compte</h3>

            @include('_notifications')

			@if(Session::has('success'))

			@else

				@if(Session::has('unex-error'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Erreur!</strong> Un erreur est survenue. Veuillez réessayer plus tard.
				</div>
				@endif

				{{ Form::open(array('route' => 'inscription-post')) }}

					<div class="form-group {{ $errors->has('identifiant') ? ' has-error' : '' }}">
				    <div class="input-group margin-bottom-20">
				        <span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="identifiant" class="form-control input-lg" {{ Input::old('identifiant') ? ' value="'. Input::old('identifiant') .'"' : '' }} placeholder="Identifiant" />
				    </div>       
						@if($errors->has('identifiant'))
						<span class="help-block">
							@foreach($errors->get('identifiant') as $message)
							{{ $message }} 
							@endforeach
						</ul></span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
				    <div class="input-group margin-bottom-20">
				        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="email" name="email" class="form-control input-lg" {{ Input::old('email') ? ' value="'. Input::old('email') .'"' : '' }} placeholder="adresse email valide" />
				    </div> 
						@if($errors->has('email'))
						<span class="help-block">
							@foreach($errors->get('email') as $message)
							{{ $message }} 
							@endforeach
						</ul></span>
						@endif
					</div>

					<div class="form-group {{ ($errors->has('mot_de_passe') || $errors->has('confirmation_mot_de_passe')) ? ' has-error' : '' }}">
				    <div class="input-group margin-bottom-20">
				        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" name="mot_de_passe" class="form-control input-lg" {{ Input::old('mot_de_passe') ? ' value="'. e(Input::old('mot_de_passe')) .'"' : '' }} placeholder="mot de passe" />
				    </div>       
						@if($errors->has('mot_de_passe'))
						<span class="help-block">
							@foreach($errors->get('mot_de_passe') as $message)
							{{ $message }} 
							@endforeach
						</ul></span>
						@endif
					</div>

					<div class="form-group {{ $errors->has('confirmation_du_mot_de_passe') ? ' has-error' : '' }}">
				    <div class="input-group margin-bottom-20">
				        <span class="input-group-addon"><i class="fa fa-key"></i></span>
						<input type="password" name="confirmation_du_mot_de_passe" class="form-control input-lg" {{ Input::old('confirmation_du_mot_de_passe') ? ' value="'. e(Input::old('confirmation_du_mot_de_passe')) .'"' : '' }} placeholder="confirmation du mot de passe" />
				    </div>  
						@if($errors->has('confirmation_du_mot_de_passe'))
						<span class="help-block">
							@foreach($errors->get('confirmation_du_mot_de_passe') as $message)
							{{ $message }} 
							@endforeach
						</ul></span>
						@endif
					</div>

				    <div class="row">
				      <div class="col-lg-6">
				      </div>
				      <div class="col-lg-6 text-right">
				          <input type="submit" name="inscription" value="INSCRIPTION" class="btn btn-green btn-lg pull-right"  />
				      </div>
				    </div>

					
				{{ Form::close() }}

			@endif

            <hr>
            <h4>Déjà enregistré ?</h4>
            <p><a href="{{ URL::route('connexion') }}" class="color-green">Connectez vous</a></p>     

    	</div>
    </div>
</div>  

@stop