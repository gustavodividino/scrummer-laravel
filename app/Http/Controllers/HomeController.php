<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use App\Models\TeamProject;
use App\Models\ProductBacklogUser;
use App\Models\Project;
use Auth;
use Log;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$projects = ProjectController::findByProductOwner(Auth::user()->id_user);
        $projects = TeamProject::where('id_user', Auth::user()->id_user)->get();
        
        $products = ProductBacklogUser::where('id_user', '=', Auth::user()->id_user)->get();

        $topten = Project::groupBy('sc_project.id_project', 'sc_project.name')
                        ->where('sc_project.id_status', '=', 5)
                        ->join('sc_productbacklog', 'sc_productbacklog.id_project', '=', 'sc_project.id_project')
                        ->selectRaw('sc_project.id_project, sc_project.name, sum(pokerplainpoint) as sum')
                        ->orderBy('sum', 'desc')
                        ->paginate(10);
        //return $topten;

        $alocacao = ProductBacklogUser::where('id_user', '=', Auth::user()->id_user)
                        ->where('sc_productbacklog.id_status', '!=', 8)
                        
                        ->join('sc_sprint_productbacklog', 'sc_sprint_productbacklog.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')                    

                        ->join('sc_sprint', 'sc_sprint.id_sprint', '=', 'sc_sprint_productbacklog.id_sprint')

                        ->join('sc_project', 'sc_project.id_project', '=', 'sc_sprint.id_project')                        
                        
                        ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog' ,'=', 'sc_sprint_productbacklog.id_productbacklog')

                        ->groupBy('sc_productbacklog.name','sc_project.name', 'sc_project.id_project', 'sc_sprint_productbacklog.id_productbacklog', 'sc_sprint.start_date', 'sc_sprint.end_date')
                        ->selectRaw('sc_productbacklog.name as nameProduct, sc_project.name, sc_project.id_project, sc_sprint_productbacklog.id_productbacklog, DATE_FORMAT(sc_sprint.start_date, \'%d-%m-%Y\') as start_date, DATE_FORMAT(sc_sprint.end_date, \'%d-%m-%Y\') as end_date')
                        ->get();

        //return $alocacao;

        //Log::info("Projetos: " .  $projects);
        return view('Site\home\index', compact('projects', 'products', 'topten', 'alocacao'));
    }
}
