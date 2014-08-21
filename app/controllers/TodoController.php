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
        $texte = $_POST['texte'];//Input::get('texte');
        if ($texte=='') {
            $d["resultat"] = 0;
            $d["message"] = "La tâche ne peut pas être vide.";
       } else {  
            $todo = new Todo;
            if (Auth::check()) {
                $todo->user_id = $this->user->id;
            } else {
                $todo->user_id = 0;
            } 
            $todo->texte = $texte;
            $todo->fini = 0;
            if ($todo->save()) {
                $d["resultat"] =  1;
                $d["message"] = "La tâche a été ajoutée.";
                $d["todo_id"] = $todo->id;
            } else {
                $d["resultat"] =  0;
                $d["message"] =  "Impossible d'ajouter la tâche.";
            }
        }          
        return Response::json($d);
    }

    // Refresh Liste des todos
    public function getAjaxAjouterALaListe($id) {
        $todo = Todo::find($id);
        return View::make('todo.ajax_ajouter_a_la_liste', array('e' => $todo));
    }
    
    // Maj statut. Ajax. Retour Json.
    public function postAjaxMajStatut() {
        $todo = Todo::find(Input::get('id'));
        if ($todo->fini==1) {
            $todo->fini=0;
            $d["message"] =  "La tâche est à faire.";
        } else {
            $todo->fini=1;
            $d["message"] =  "La tâche est finie.";
        }
        $todo->save();
        $d["resultat"] = $todo->fini;
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