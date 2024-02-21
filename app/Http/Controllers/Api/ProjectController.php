<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies', 'socials')->paginate(20);
        return response()->json([
            "success" => true,
            "results" => $projects
        ]);
    }

    public function show(Project $project){
        $project = Project::with('type', 'technologies', 'socials')->findOrFail($project->id);
        return response()->json([
            "success" => true,
            "results" => $project
        ]);
    }

    public function search(Request $request){
        // dd($request->all());
        $data = $request->all();

        //se $data ha 'name', fornisco i dati, altrimenti 404
        if(isset($data['name'])){
            $stringa = $data['name'];
            //query (project con title che contiene la stringa. Dove ${stringa} è quello che ha scritto l'utente nella ricerca). Get serve a restituire la collection di risultati e non il query builder
            $project = Project::where('title', 'LIKE', "%{$stringa}%")->get();
            //response con $project
            return response()->json([
                "success" => true,
                "results" => $project,
                "matches" => count($project)
            ]);
        } else {
            abort(404);
        }
    }
}
