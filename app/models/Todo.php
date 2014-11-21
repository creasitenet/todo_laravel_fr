<?php
class Todo extends Eloquent {

	protected $table = 'todos';
	protected $guarded = array('*');
	
	public function date_jour_mois() {
	    return date("d/m", strtotime($this->created_at));
	}

	public function date_heure_minute() {
	    return date("H:i", strtotime($this->created_at));
	} 
	
	// User
	public function user() {
		return $this->belongsTo('User', 'user_id');
	}

	// Supprimer
	public function supprimer()	{
		return parent::delete();
	}

}