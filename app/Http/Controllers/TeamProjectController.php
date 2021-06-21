<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeamProject;
use App\Models\User;
use App\Models\Position;
use App\Models\History;
use App\Models\Project;
use Carbon\Carbon;

use Log;

class TeamProjectController extends Controller {
    

    public function dropTeam(Request $request){
        
        $project = Project::find($request->get('project'));
        $id_project = $request->get('project');

        $deletedRows = TeamProject::where('id_project',   $id_project)->delete();

        //Log::info("Limpo Projeto: " .  $id_project);

        return "ok";

    }

    public function teamsave(Request $request){

        $project = Project::find($request->get('project'));
        $cargo = Position::find($request->get('cargo'));
        
        $id_project =   $request->get('project');
        $id_usuario =   $request->get('usuario');
        $id_cargo =     $request->get('cargo');

        $teamProject = new TeamProject;

        $teamProject->id_project = $id_project;
        $teamProject->id_user = $id_usuario;
        $teamProject->id_position = $id_cargo;

        $teamProject->save();

        //Log::info("Salvo Projeto: " .  $project);
        
        
        
       /* Cria o Log de adicao para exibição */
        $history = new History();
        $history->id_user = $id_usuario;
        $history->description = "Foi adicionado ao projeto " . $project->name . " como " . $cargo->name;

        $history->date = Carbon::now();
        //Log::info("Salvo Projeto: " .  $history);
        $history->save();        
        
        
        
        return "ok";

    }


    /*
      Metodos de Busca
     */

    public static function findByUserProjects($idUser){
        return TeamProject::with(array('project' => function($query) {
                        $query->select('id_project', 'name');
                    }))->where('id_user', '=', $idUser);
    }

    public function findByID($idTeamProject) {
        return TeamProject::find($idTeamProject);
    }

    public function findByProject($idProject) {
        return TeamProject::with(array('user' => function($query) {
                        $query->select('id_user', 'name', 'surname');
                    }))->where('id_project', '=', $idProject)->get();
    }

    public function manageTeamProject($idProject) {
        $teamProject = TeamProject::where('id_project', '=', $idProject)->get();
        $users = User::orderBy('name')->get();
        $position = Position::all();
        return view('site.project.teamProject', compact('teamProject', 'users', 'position'));
    }

}
