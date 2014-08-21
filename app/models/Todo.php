<?php
class Todo extends Eloquent {

	protected $table = 'todos';
	//protected $guarded = array('id', 'position', 'created_at', 'updated_at');
	protected $fillable = array('texte');

	public function texte()	{
		return nl2br($this->texte);
	}

	public function date_jour_mois() {
	    return date("d/m", strtotime($this->created_at));
	}

	public function date_heure_minute() {
	    return date("H:i", strtotime($this->created_at));
	} 
	
	// Supprimer
	public function supprimer()	{
		// Delete the comments
		//$this->commentaires()->delete();

		// Delete
		return parent::delete();
	}

}