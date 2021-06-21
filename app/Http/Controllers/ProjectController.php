<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\TeamProject;
use App\Models\ProductBacklog;
use App\Models\SprintProductBacklog;
use App\Models\Sprint;
use Auth;
use Log;
use DB;

class ProjectController extends Controller {

    public function burnup($id) {

        $sprint = Sprint::find($id);
        $project = Project::find(1);
        $product = $project->productBacklog;
        //$totalPoints = $product->sum('pokerplainpoint');

        // Pega o Total de pontos da Sprint
        $totalPoints = SprintProductBacklog::where('id_sprint', '=', $id)
                            ->join('sc_productbacklog', 'sc_sprint_productbacklog.id_productbacklog', '=', 'sc_productbacklog.id_productbacklog')
                            ->selectRaw('sum(sc_productbacklog.pokerplainpoint) as total')
                            ->get();

        //Pega todos os productsBackLog da Sprint                   
        $productSprintX = SprintProductBacklog::where('id_sprint', '=', $id)
                           ->orderBy('sc_productbacklog.updated_at', 'asc')
                            ->join('sc_productbacklog', 'sc_sprint_productbacklog.id_productbacklog', '=', 'sc_productbacklog.id_productbacklog')
                            ->where('sc_productbacklog.id_status', '=', '8')
                            ->get();
        

        //Retorno o total dos productsBacklogs finalizados agrupados pela data de conclusao e somatoria dos pontos
        $total = ProductBacklog::groupBy('category')
                ->join('sc_sprint_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')
                ->selectRaw('sum(pokerplainpoint) as sum, DATE_FORMAT(sc_productbacklog.updated_at, \'%d-%m-%Y\') as category')
                ->where('sc_productbacklog.id_status', '=', '8')
                ->where('sc_sprint_productbacklog.id_sprint', '=', $id)
                ->orderBy('sc_productbacklog.updated_at', 'asc')
                ->get();

        //return $total;

        $auxiliar = [];
        $i = 0;

        foreach($total as $item){
            if($i == 0){
                $auxiliar[$i] = array($item->category, $item->sum);
                //Log::info($auxiliar[$i][1]);                
            }else{
                $auxiliar[$i] = array($item->category, $item->sum + $auxiliar[$i -1][1]);
                //Log::info($auxiliar[$i][1]);                 
            }

            $productBackLog = ProductBacklog::find($item->id_productbacklog);

            $i = $i + 1;
        }


        $data = [
        
            'category' => $sprint->start_date->format('d-m-Y'),
            'Points' => 0,
            'ScrumPoints' => $totalPoints[0]->total

        ]; 

        $burnup[] = $data;
        $i = 0;
        foreach($total as $item){
            $data = [
            'category' => $auxiliar[$i][0],
            'Points' => $auxiliar[$i][1],
            'ScrumPoints' => $totalPoints[0]->total
            ];
            $burnup[] = $data;
            $i++;
        }

        return $burnup;
    

    }


    public function doneProject($idProject) {

        return "Fechar";

        $project = Project::find($idProject);

        $project->id_status = 3;

        $project->save();

        return view('site.project.index', compact('project'));
    }

    /*
      Metodo de Gravar informação no Banco
     */

    public function save(ProjectRequest $request) {
        $project = Project::create($request->all());
        $productowner = $request->get('idproductowner');
        $teamProject = new TeamProject;
        $teamProject->id_project = $project->id_project;
        $teamProject->id_user = $productowner;
        $teamProject->id_position = 3;

        //Log::info($teamProject);
        $teamProject->save();

        return redirect('/project/' . $project->id_project)->withInput();
    }

    public function update(ProjectRequest $request) {
       $project = Project::find($request->get('idProject'));
       $project->name = $request->get('name');
       $project->description = $request->get('description');
       $project->start_date = $request->get('start_date');
       $project->end_date = $request->get('end_date');

       $project->save();

       return view('site.project.index', compact('project'));

    }

    /*
      Metodos de Busca
     */

    public function result(Request $request){

        if($request->get('idProject') != ""){
            $project = Project::where('id_project', 'like', '%' . $request->get('idProject') . '%')
                        ->get();         
            //Log::info('ID_PROJECT');
            //Log::info($request->all());    
        }else{
            if($request->get('name') != ""){
                $project = Project::where('name', 'like', '%' . $request->get('name') . '%')
                        ->get();
                //Log::info('NAME');
                //Log::info($request->all());    
            }
        }

        //return $project;
        return view('site.project.result', compact('project')); 
    }

    public function findByID(Request $request) {
        $project = Project::find($request->projeto);
        return $project;
//        redirect()->action('ProjectController@show', ['project' => $request]);
    }

    public static function findByProductOwner($idProductOwner) {
        return Project::all();
        //return Project::where('cd_projectowner', '=', $idProductOwner)->get();        
    }

    public function sumAllProductBackLogByProject($idProject) {
        
    }



    public function show(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
            
    }

    /*
      Metodos de chamada do formulario novo
     */
    public function newProject() {

        return view('site.project.create');
    }

    public function newFile() {

        return view('site.attach.upload');
    }

    /*
      Metodos de chamada de Views
     */

    public function indexPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
    }

    public function editPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
    }

    public function attachPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
    }

    public function dashboardPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        $scrumMaster = TeamProject::where('id_project', '=', $project->id_project)
                        ->where('id_position', '=', 1)
                        ->select('id_user')
                        ->first();


        return view('site.project.index', compact('project', 'scrumMaster'));
    }

    public function dailyPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
    }

    public function statusPage(Request $request) {
        $project = Project::find($request->project);
        
        if ($project == ""){
            $mensagem = "Desculpe, projeto não encontrado";
            return view('error', compact('mensagem'));
        }

        return view('site.project.index', compact('project'));
    }

}
