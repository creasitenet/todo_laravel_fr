@extends('layout')
@section('content')
  
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">

			    <div class="reg-header">            
			        <h3>Réinitialisez votre mot de passe</h3>
			    </div>

                <div class="alert alert-info alert-bold-border fade in alert-dismissable">
                    Pour réinitialiser votre mot de passe, entrez votre identifiant ou votre adresse email.
                    Un email avec un nouveau mot de passe vous sera envoyé.
                </div>

                @include('_notifications')

				@if(Session::has('success'))

				@else

					{{ Form::open(array('route' => 'identifiants-perdus')) }}

					<div class="form-group {{ $errors->has('identifiant') ? ' has-error' : '' }}">
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
	            		<input type="text" name="identifiant" class="form-control input-lg" {{ Input::old('identifiant') ? ' value="'. e(Input::old('identifiant')) .'"' : '' }} placeholder="Identifiant ou email" />
	            	</div>
	                <span class="help-block">{{ $errors->first('identifiant') }}</span>            
	                </div>       

					<div class="row">
					    <div class="col-md-6"></div>
					    <div class="col-md-6">
					        <input type="submit" name="identifiants_perdus" value="REINITIALISER" class="btn btn-primary btn-lg pull-right"  />                     
					    </div>
					</div>

					{{ Form::close() }}

	                <hr>
                    <h4>Souvenu ?</h4>
	                <p><b><a href="{{ URL::route('connexion') }}">Connectez vous</a></b></p>

	            @endif
	            <br />   

		</div>
    </div>

@stop
