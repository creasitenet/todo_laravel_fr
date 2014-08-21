@extends('layout')

@section('content')

<div class="container content">   
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

            <div class="reg-header">            
                <h3>Connectez vous à votre compte</h3>
            </div>

            @include('_notifications')

            {{ Form::open(array('route' => 'connexion-post')) }}

            	<div class="form-group {{ $errors->has('identifiant') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
            		<input type="text" name="identifiant" class="form-control input-lg" {{ Input::old('identifiant') ? ' value="'. e(Input::old('identifiant')) .'"' : '' }} placeholder="Identifiant ou email" />
            	</div>
                <span class="help-block">{{ $errors->first('identifiant') }}</span>            
                </div>       
            		
            	<div class="form-group {{ $errors->has('mot_de_passe') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            		<input type="password" name="mot_de_passe" class="form-control input-lg" {{ Input::old('mot_de_passe') ? ' value="'. e(Input::old('mot_de_passe')) .'"' : '' }} placeholder="mot de passe" />
            	</div>
                <span class="help-block">{{ $errors->first('mot_de_passe') }}</span>            
                </div>       
            		
                <div class="row">
                    <div class="col-md-6">                     
                    </div>
                    <div class="col-md-6">
                    	<input type="submit" name="connexion" value="SE CONNECTER" class="btn btn-green btn-lg pull-right"  />                     
                    </div>
                </div>

            {{ Form::close() }}

            <hr>
            <h4>Identifiants perdu ?</h4>
            <p><a href="{{ URL::route('identifiants-perdus') }}" class="color-green">réinitialisez votre mot de passe</a></p>

            <br />    
		</div>
    </div>
</div>  

@stop