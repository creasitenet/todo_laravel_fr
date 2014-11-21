@extends('layout')
@section('content')

    @include('_notifications')
    <!--  Formulaire d'ajout -->
    <br />
    <form>
		<div class="form-group">
			<div class="controls">
	        <div class="input-group">
	            <input type="texte" class="form-control input-lg" name="texte" id="input_ajouter_todo" placeholder="AJOUTER UNE TÂCHE" />
	            <span class="input-group-btn">
	            <button type="button" class="btn btn-primary btn-border-radius-right btn-lg" onclick="ajouter_element('todoAjaxAjouter',texte.value,'#todos')">AJOUTER</button>
	            </span>
	            <small class="text-danger"></small>
	        </div>
	        </div>
	    </div>
	</form>
	<br />

	<!--  Infos -->
	@if (isset($todos))
   		@include('todo/_todos')
	@endif

	<!--  Infos -->
	<br />
	@if(!$user)
		<p>
			Pour gérer votre propre liste, <a href="inscription">inscrivez vous</a><br />
			C'est gratuit.
		</p>
	@endif
	@if($user)
		<p>
			Ceci est votre propre liste.<br />
			Seul vous y avez accés.
		</p>
	@endif
	<br />

@stop