<?php
class AccesController extends \BaseController {

	// Acces
	public function getConnexion() {
		return View::make('acces.connexion',array('titre'=>'Connexion'));
	}

	public function postConnexion() {
		$valid = Validator::make(Input::all(),
			array(
				'identifiant' => 'required',
				'mot_de_passe' => 'required'
			)
		);
		// Erreur Validation
		if($valid->fails()) {
			return Redirect::route('connexion')
			->withInput()
			->withErrors($valid);
		}
		// Validation ok
		if($valid->passes()) {			
			$user = User::where('username', '=', Input::get('identifiant'))
						->orWhere('email', '=', Input::get('identifiant'))
						->first();
			// Utilisateur trouvé
			if($user) {
				// Identifiant corrects
				if(Hash::check(Input::get('mot_de_passe'), $user->password)) {
					Auth::login($user);
					// Redirection compte
					return Redirect::intended('/')
						->with('success', 'Vous êtes maintenant connecté');
				}
				// Identifiant incorrects
				return Redirect::route('connexion')
					->withInput()
					->with('error', 'Identifiants incorrects. Rééssayez.');
			}			
			// Utilisateur non trouvé
			return Redirect::route('connexion')
				->withInput()
				->with('error', "Identifiants incorrects. Rééssayez."); 
		}
		// Erreur enregistrement en base de donnée				
		return Redirect::route('connexion')
			->withInput()
			->with('unex-error');
	}

	// Déconnexion
	public function getDeconnexion() {
		Auth::logout();
		return Redirect::to('/')
			->with('success', 'Vous avez été déconnecté');
	}

	// Identifiants perdus
	public function getIdentifiantsPerdus() {
		return View::make('acces.identifiants_perdus',array('titre'=>'Identifiants perdus'));
	}

	public function postIdentifiantsPerdus() {
		$valid = Validator::make(Input::all(),
			array(
				'identifiant' => 'required'
			)
		);
		// Erreur Validation
		if($valid->fails()) {
			return Redirect::route('identifiants-perdus')
				->withInput()
				->withErrors($valid);
		}
		// Validation ok
		if($valid->passes()) {		
			$user = User::where('username', '=', Input::get('identifiant'))
						->orWhere('email', '=', Input::get('identifiant'))
						->first();
			// Utilisateur trouvé
			if($user) {
				$nouveau_mot_de_passe = str_random(10);
				$user->token = str_random(60);
				$user->password = Hash::make($nouveau_mot_de_passe);
				$user->save();
				// email
				$email = Mail::send('email.identifiants_perdus', 
					array(
						'username' => $user->username, 
						'nouveau_mot_de_passe' => $nouveau_mot_de_passe
					), 
					function($m) use ($user) {
						$m->to($user->email, $user->username)
								->subject('Demande de nouveau mot de passe');
					}
				);
				if($email) {
					return Redirect::route('identifiants-perdus')
						->with('success', "Un email contenant un nouveau mot de passe vous a été envoyé.");
				}
				// Erreur envoi email
				return Redirect::route('identifiants-perdus')
					->withInput()
					->with('error', "Erreur lors de l'envoi du mail. Rééssayez.");
			}
			// Utilisateur non trouvé
			return Redirect::route('identifiants-perdus')
				->withInput()
				->with('error', 'Utilisateur non trouvé. Rééssayez');
		}
		// Erreur enregistrement en base de donnée				
		return Redirect::route('identifiants-perdus')
			->withInput()
			->with('unex-error');
	}

	// Inscription
	public function getInscription() {
		return View::make('acces.inscription',array('titre'=>'Inscription'));
	}

	public function postInscription() {
		$valid = Validator::make(Input::all(),
			array(
				'username' => 'required|max:50|unique:users',
				'email' => 'required|max:50|email|unique:users',
				'mot_de_passe' => 'required|min:5',
			)
		);
		// Validation ratée
		if($valid->fails()) {
			return Redirect::route('inscription')
				->withInput()
				->withErrors($valid);
		}		
		// Validation ok
		if($valid->passes()) {
			// Enregistre
			$e = new User;
			$e->username = Input::get('username');
			$e->password = Hash::make(Input::get('mot_de_passe'));
			$e->email = Input::get('email');
			$e->role = 1;
			$e->token = str_random(60);
			$e->remember_token = str_random(60);
			$e->save();
			return Redirect::route('connexion')
				->with('success', "Votre compte a été créé.<br />Vous pouvez désormais vous connecter.");
		}
		return Redirect::route('inscription')
			->withInput()
			->with("unex-error");
	}

	
}