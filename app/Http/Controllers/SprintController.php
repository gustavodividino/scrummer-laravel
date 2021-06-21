<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SprintRequest;
use App\Models\Sprint;
use App\Models\Project;
use App\Models\User;
use App\Models\TaskBoardLog;
use Auth;
use Carbon;
use Log;

use App\Models\SprintProductbackLog;

class SprintController extends Controller {
    /*
      Metodo de Gravar informação no Banco
     */

    public function save(SprintRequest $request) {
        $sprint = Sprint::create($request->all());
        $products = $request->get('productsbacklog');

        foreach($products as $item){
            $product = \App\Models\ProductBacklog::find($item);
            $product->id_status = 1;
            $product->save();


            $taskboardlog = new TaskBoardLog;
            $taskboardlog->id_user = Auth::user()->id_user;
            $taskboardlog->state = "TODO";        
            $taskboardlog->old_state = "AGUARDANDO";
            $taskboardlog->date = Carbon\Carbon::now();
            $taskboardlog->id_productbacklog =  $product->id_productbacklog;

            $taskboardlog->save();


            $sprintProductbackLog = new SprintProductbackLog;
            $sprintProductbackLog->id_sprint = $sprint->id_sprint;
            $sprintProductbackLog->id_productbacklog = $product->id_productbacklog;

            $sprintProductbackLog->save();

        }
        
        return redirect('/project/' . $request->get('id_project'))->withInput(); 
    }

    public function update(SprintRequest $request) {
        $sprint = Sprint::find($request->get('idSprint'));
        $sprint->name = $request->get('name');
        $sprint->start_date = $request->get('start_date');
        $sprint->end_date = $request->get('end_date');

        $sprint->save();
        
        $products = $request->get('productsbacklog');

        foreach($products as $item){

            //Log::info($item);
            $sprintProductbackLog = SprintProductBackLog::where('id_productbacklog', '=', $item)->first();

            if(is_null($sprintProductbackLog)){
                //Log::info("Salvar Novo: " . $item);
                $product = \App\Models\ProductBacklog::find($item);
                $product->id_status = 1;
                $product->save();


                $sprintProductbackLog = new SprintProductbackLog;
                $sprintProductbackLog->id_sprint = $sprint->id_sprint;
                $sprintProductbackLog->id_productbacklog = $product->id_productbacklog;

                $sprintProductbackLog->save();

            }

        }
         return redirect('/project/' . $request->get('id_project') . '/edit')->withInput(); 
        
    }

    /*
      Metodos de Busca
     */
    
    public function findByID($idSprint) {
        return Sprint::find($idSprint);
    }

    public function findByProject($idProject) {
        return Sprint::where('id_project', '=', $idProject);
    }

    public function show($idSprint){
        $sprint = Sprint::where('id_sprint', '=', $idSprint)->first();

        $mensagem = "Desculpe, sprint não encontrado";
        if ($sprint == "")
            return view('error', compact('mensagem'));


        $sprintProductbackLog = SprintProductbackLog::where('id_sprint', '=', $sprint->id_sprint)
                    ->join('sc_productbacklog_user', 'sc_productbacklog_user.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')
                    ->join('sc_user', 'sc_user.id_user', '=', 'sc_productbacklog_user.id_user')
                    ->groupBy('sc_productbacklog_user.id_user')
                    ->select('sc_productbacklog_user.id_user')
                    ->get();
       $users = User::whereIn('id_user', $sprintProductbackLog)->get();

       $products = SprintProductbackLog::where('id_sprint', '=', $sprint->id_sprint)
                    ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')
                    
                    ->select('sc_productbacklog.*')
                    ->get();

      return view('site.sprint.index', compact('sprint', 'users', 'products'));
    }


    /*
      Metodos de chamada do formulario novo
     */

    public function newSprint() {
        $project = Project::orderBy('name')->get();
        return view('site.sprint.create', compact('project'));
    }

    public function editSprint($idSprint) {
        $sprint = Sprint::find($idSprint);
        return view('site.sprint.edit', compact('sprint'));
    }

    /*
      Metodos de chamada de Views
     */

    public function indexPage($idSprint) {
        return view('site.sprint.index', compact(''));
    }

}
