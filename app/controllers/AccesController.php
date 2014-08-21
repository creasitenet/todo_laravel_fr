<?php
class AccesController extends \BaseController {

	public function __construct() {        
    }

	// Connexion
	public function getConnexion() {
		return View::make('acces.connexion');
	}

	public function postConnexion() {
		$valid = Validator::make(Input::all(),
			array(
				'identifiant' => 'required',
				'mot_de_passe' => 'required'
			)
		);
		if($valid->fails()) {
			return Redirect::route('connexion')
			->withInput()
			->withErrors($valid);
		}
		$user = User::where('username', '=', Input::get('identifiant'));
		if (!$user->count()) { 
			$user = User::where('email', '=', Input::get('identifiant'));
		}		
		if($user->count()) {
			$user = $user->first();
			if(Hash::check(Input::get('mot_de_passe'), $user->password)) {
				Auth::login($user);
				return Redirect::intended('/');
			} else {
				return Redirect::route('connexion')
				->withInput()
				->with('error', 'Identifiants incorrects. Rééssayez.');
			}
		}
		return Redirect::route('connexion')
		->withInput()
		->with('error', "Identifiants incorrects. Rééssayez.");
	}

	// Déconnexion
	public function getDeconnexion() {
		Auth::logout();
		return Redirect::to('/');
	}

	// Identifiants perdus
	public function getIdentifiantsPerdus() {
		return View::make('acces.identifiants-perdus');
	}

	public function postIdentifiantsPerdus() {
		$valid = Validator::make(Input::all(),
			array(
				'identifiant' => 'required'
			)
		);
		if($valid->fails()) {
			return Redirect::route('identifiants-perdus')
			->withInput()
			->withErrors($valid);
		}
		$user = User::where('username', '=', Input::get('identifiant'));
		if (!$user->count()) { 
			$user = User::where('email', '=', Input::get('identifiant'));
		}
		if($user->count()) {
			$user = $user->first();
			// un novueau mot de passe temporaire
			$nouveau_mot_de_passe = str_random(10);
			$user->password_temp = Hash::make($nouveau_mot_de_passe);		
			// un token
			$token = str_random(60);
			$user->token = $token;
			if($user->save()) {
				$email = Mail::send('emails.identifiants-perdus', 
								array(
									'username' => $user->username, 
									'link' => URL::route('identifiants-perdus-confirmer', 
												array(
													'userid' => $user->id, 
													'token' => $user->token, 
												)),
									'nouveau_mot_de_passe' => $nouveau_mot_de_passe
								), 
								function($message) use ($user) {
									$message->to($user->email, $user->username)
											->subject('Demande de nouveau mot de passe');
								}
							);
				if($email) {
					return Redirect::route('identifiants-perdus')
					->with('success', "Un email contenant un nouveau mot de passe et un lien d'activation vous a été envoyé.", true);
				}
				// Erreur envoi email
				return Redirect::route('identifiants-perdus')
				->withInput()
				->with('error', "Une erreur est survenue lors de l'envoi du mail. Veuillez rééssayer.");
			}
			// Erreur enregistrement en base de donnée // Normalement ça n'arrive pas				
			return Redirect::route('identifiants-perdus')
			->withInput()
			->with('error', 'unexpected-error');
		}
		// Utilisateur non trouvé
		return Redirect::route('identifiants-perdus')
		->withInput()
		->with('error', 'Utilisateur non trouvé. Rééssayez'); 
	}

	// Identifiants perdus Confirmer
	public function getIdentifiantsPerdusConfirmer($userid, $token) {
		// on cherche l'utilisateur id
		$user = User::find($userid);
		// Si le user est trouvé
		if($user) {
			// Si les token correspondent
			if($user->token == $token) {
				$user->password = $user->password_temp;
				// Enregistrement
				if($user->save()) {
					return Redirect::route('connexion')
					->with('success', 'Votre nouveau mot de passe a été activé.');
				}
				// Erreur enregistrement en base de donnée // Normalement ça n'arrive pas
				return Redirect::route('identifiants-perdus')
				->with('error', 'unexpected-error');
			}
			// Les token ne correspondent pas
			return Redirect::route('connexion')
			->with('error', 'Les informations recues ne nous ont pas permis de vous identifier.');
		}
		// Utilisateur non trouvé
		return Redirect::route('connexion')
		->with('error', 'Les informations recues ne nous ont pas permis de vous identifier.');
	}

	// Inscription
	public function getInscription() {
		return View::make('acces.inscription');
	}

	public function postInscription() {
		$valid = Validator::make(Input::all(),
			array(
				'identifiant' => 'required|max:50',
				'email' => 'required|max:50|email|unique:users',
				'mot_de_passe' => 'required|min:5',
				'confirmation_du_mot_de_passe' => 'required|same:mot_de_passe',
			)
		);
		if($valid->fails()) {
			return Redirect::route('inscription')
			->withInput()
			->withErrors($valid);
		}		
		if($valid->passes()) {
			$username = Input::get('identifiant');
			$password = Input::get('mot_de_passe');
			$email = Input::get('email');
			$user = User::create(array(
				'username' => $username,
				'password' => Hash::make($password),
				'email' => $email
			));
			// Enregistré
			if($user) {
				return Redirect::route('connexion')
				->with('success', "Votre compte a été créé avec succés. Vous pouvez désormais vous connecter.", true);
			}
			//Erreur enregistrement en base de donnée // normalement ça n'arrive pas
			return Redirect::route('inscription')
			->withInput()
			->with('error', "unexpected-error");
		}
		return Redirect::route('inscription')
		->withInput()
		->with('unex-error', true);
	}
	
}