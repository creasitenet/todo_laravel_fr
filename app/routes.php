<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Route csrf
Route::when('*','csrf',array('post','put','delete'));

// Routes
Route::get('/','TodoController@index');
Route::post('todo-ajax-ajouter','TodoController@postAjaxAjouter');
Route::get('todo-ajax-ajouter-a-la-liste/{id}','TodoController@getAjaxAjouterALaListe');
Route::post('todo-ajax-maj-statut','TodoController@postAjaxMajStatut');
Route::post('todo-ajax-supprimer','TodoController@postAjaxSupprimer');

// Unauthenticated group
// Seul les visiteurs non identifiés
Route::group(array('before' => 'guest'), function() {

	// Connexion
	Route::get('connexion',
		array(
			'as' => 'connexion',
			'uses' => 'AccesController@getConnexion'
		)
	);
	// Connexion post
	Route::post('connexion',
		array(
			'as' => 'connexion-post',
			'uses' => 'AccesController@postConnexion'
		)
	);

	// Inscription
	Route::get('inscription',
		array(
			'as' => 'inscription',
			'uses' => 'AccesController@getInscription'
		)
	);
	// Inscription post
	Route::post('inscription',
		array(
			'as' => 'inscription-post',
			'uses' => 'AccesController@postInscription'
		)
	);

	// Identifiants perdus
	Route::get('identifiants-perdus',
		array(
			'as' => 'identifiants-perdus',
			'uses' => 'AccesController@getIdentifiantsPerdus'
		)
	);
	// Identifiants perdus post
	Route::post('identifiants-perdus',
		array(
			'as' => 'identifiants-perdus-post',
			'uses' => 'AccesController@postIdentifiantsPerdus'
		)
	);
	// Identifiants perdus confirmer
	Route::get('identifiants-perdus/{userid}/{token}',
		array(
			'as' => 'identifiants-perdus-confirmer',
			'uses' => 'AccesController@getIdentifiantsPerdusConfirmer'
		)
	);

});

// Authenticated group
// Seuls les visiteurs identifiés
Route::group(array('before' => 'auth'), function() {
	
	// Deconnexion
	Route::get('deconnexion',
		array (
			'as' => 'deconnexion',
			'uses' => 'AccesController@getDeconnexion'
		)
	);
	
});

/*App::missing(function()
{
	return View::make('errors/404');
});*/