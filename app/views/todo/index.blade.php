@extends('layout')

{{-- Content --}}
@section('content')

<br />
    <!--  Formulaire d'ajout -->
    <form>
		<div class="form-group">
			<div class="controls">
	        <div class="input-group">
	            <input type="texte" class="form-control input-lg" name="texte" id="input_ajouter_todo" placeholder="AJOUTER UNE TÂCHE" />
	            <span class="input-group-btn">
	            <button type="button" class="btn btn-green btn-lg" onclick="ajouter_element('todo-ajax-ajouter',texte.value,'#todos')">AJOUTER</button>
	            </span>
	            <small class="text-danger"></small>
	        </div>
	        </div>
	    </div>
	</form>

<br />

@if (isset($todos))
    @include('todo/_todos')
@endif
<br />

<?php if ($user) { ?>
<br />
<p class="center"><a href="deconnexion" class=""><i class="fa fa-power-off fa-3x deconnexion"></i></a></p>
<?php } ?>
<?php if (!$user) { ?>
<p class="centered">
Pour gérer votre propre liste, <a href="inscription" class="">inscrivez vous</a>
</p>
<?php } ?>

@stop