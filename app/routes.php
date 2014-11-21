<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Route csrf
Route::when('*','csrf',array('post','put','delete'));

// Expressions régulières
Route::pattern('id', '[0-9]+');
Route::pattern('userid', '[0-9]+');
Route::pattern('token', '[0-9A-Za-z]+');

// Routes
Route::get('/','TodoController@index');
Route::post('todoAjaxAjouter','TodoController@postAjaxAjouter');
Route::get('todoAjaxAjouterALaListe/{id}','TodoController@getAjaxAjouterALaListe');
Route::post('todoAjaxMajStatut','TodoController@postAjaxMajStatut');
Route::post('todoAjaxSupprimer','TodoController@postAjaxSupprimer');

// Unauthenticated group
Route::group(array('before' => 'guest'), function() {

	// Connexion
	Route::get('connexion',array('as'=>'connexion','uses' =>'AccesController@getConnexion'));
	Route::post('connexion',array('as'=>'connexion','uses'=>'AccesController@postConnexion'));

	// Inscription
	Route::get('inscription',array('as'=>'inscription','uses'=>'AccesController@getInscription'));
	Route::post('inscription',array('as'=>'inscription','uses'=>'AccesController@postInscription'));

	// Identifiants perdus
	Route::get('identifiants-perdus',array('as'=>'identifiants-perdus','uses'=>'AccesController@getIdentifiantsPerdus'));
	Route::post('identifiants-perdus',array('as'=>'identifiants-perdus','uses'=>'AccesController@postIdentifiantsPerdus'));
	
});

// Authenticated group
// Seuls les visiteurs identifiés
Route::group(array('before' => 'auth'), function() {
	
	// Deconnexion
	Route::get('deconnexion',array ('as'=>'deconnexion','uses'=>'AccesController@getDeconnexion'));

});