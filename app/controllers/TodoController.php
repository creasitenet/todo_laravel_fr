<?php
class TodoController extends \BaseController {

	public function index()	{
        if (Auth::check()) {
            $todos = Todo::where('user_id', '=', Auth::user()->id)->get();
        } else {
            $todos = Todo::where('user_id', '=', 0)->get();
        }
		return View::make('todo.index', array('todos' => $todos));
    }

    // Ajouter. Ajax. Retour Json.
    public function postAjaxAjouter() {
        $texte = Input::get('texte');
        if ($texte=='') {
            $d["resultat"] = 0;
            $d["message"] = "La tâche ne peut pas être vide.";
       } else {
            $todo = new Todo;
            if (Auth::check()) {
                $todo->user_id = Auth::user()->id;
            } else {
                $todo->user_id = 0;
            } 
            $todo->texte = $texte;
            $todo->statut = 0;
            $todo->save();
            $d["resultat"] =  1;
            $d["message"] = "La tâche a été ajoutée.";
            $d["todo_id"] = $todo->id;
        }          
        return Response::json($d);
    }

    // Refresh Liste des todos
    public function getAjaxAjouterALaListe($id) {
        $todo = Todo::find($id);
        return View::make('todo.ajax_ajouter_a_la_liste', array('t' => $todo));
    }
    
    // Maj statut. Ajax. Retour Json.
    public function postAjaxMajStatut() {
        $todo = Todo::find(Input::get('id'));
        if ($todo->statut==1) {
            $todo->statut=0;
            $d["message"] =  "La tâche est à faire.";
        } else {
            $todo->statut=1;
            $d["message"] =  "La tâche est finie.";
        }
        $todo->save();
        $d["resultat"] = $todo->statut;
        return  Response::json($d);
    }

    public function postAjaxSupprimer() {
        $todo = Todo::find(Input::get('id'));
        if ($todo->delete()) {
            $d["resultat"] =  1;
            $d["message"] =  "La tâche a été supprimée.";
        } else {
            $d["resultat"] =  0;
            $d["message"] = "Impossible de supprimer la tâche.";
        }
        return  Response::json($d);
    }

}