<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductBacklogRequest;
use App\Models\ProductBacklog;
use App\Models\Project;
use App\Models\ProductBacklogUser;
use App\Models\TaskBoardLog;
use App\Models\TeamProject;
use App\Models\SprintProductBacklog;
use App\Models\ExperienceProfile;
use Auth;
use Log;
use Carbon;

class ProductBacklogController extends Controller {
    /*
      Metodo de Gravar informação no Banco
     */

    public function validarTask(Request $request){
      $product = ProductBacklog::where('id_productbacklog', '=', $request->get('idProduct'))->first();
      $status = "";

      if($request->get('status') == "apr"){
        $product->id_status = 8;  
        $status = "APROVADO";

        $taskboardlog = new TaskBoardLog;
        $taskboardlog->id_user = Auth::user()->id_user;
        $taskboardlog->state = "APROVADO";
        $taskboardlog->old_state = "DONE";
        $taskboardlog->date = Carbon\Carbon::now();
        $taskboardlog->id_productbacklog = $product->id_productbacklog;

        $taskboardlog->save();



        //Pontuacao aos participantes
        Log::info($product->responsible);

        foreach($product->responsible as $item){
          //Log::info($item->user->profile->id_profile);
          $experience_profile = ExperienceProfile::where('id_profile', '=', $item->user->profile->id_profile)->first();

          //Log::info($experience_profile);         
          $experience_profile->points += 100;
          $experience_profile->save();

        }


      }else{
        if($request->get('status') == "rep"){
          $product->id_status = 2;
          $status = "REPROVADO";

          $taskboardlog = new TaskBoardLog;
          $taskboardlog->id_user = Auth::user()->id_user;
          $taskboardlog->state = "REPROVADO";
          $taskboardlog->old_state = "DONE";
          $taskboardlog->date = Carbon\Carbon::now();
          $taskboardlog->id_productbacklog = $product->id_productbacklog;

          $taskboardlog->save();

          $taskboardlog = new TaskBoardLog;
          $taskboardlog->id_user = Auth::user()->id_user;
          $taskboardlog->state = "DOING";
          $taskboardlog->old_state = "REPROVADO";
          $taskboardlog->date = Carbon\Carbon::now();
          $taskboardlog->id_productbacklog = $product->id_productbacklog;

          $taskboardlog->save();


        //Pontuacao aos participantes
        //Log::info($product->responsible);

        foreach($product->responsible as $item){
          //Log::info($item->user->profile->id_profile);
          $experience_profile = ExperienceProfile::where('id_profile', '=', $item->user->profile->id_profile)->first();

          //Log::info($experience_profile);         
          $experience_profile->points -= 100;
          $experience_profile->save();

        }

        }
      }
      
      $product->save();

      //Pontuacao para Conclusao da Sprint

        //Verificar qual é a sprint do product
        $sprint = SprintProductBacklog::where('id_productbacklog', '=', $product->id_productbacklog)->first();

        //Verifica se existe ainda productbacklog em aberto na Sprint
        Log::info("Sprint: " . $sprint->id_sprint);
        $productsOpen = SprintProductBacklog::where('id_sprint', '=', $sprint->id_sprint)
                        ->where('sc_productbacklog.id_status', '!=', '8')
                        ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')
                        ->get();

        if($productsOpen->isEmpty()){
          //Se não tiver mais products abertos, finaliza sprint
          $sprint->sprint->id_status = 5;
          $sprint->sprint->save();

        }else{
          //Senao, deixa em aberto
          $sprint->sprint->id_status = 2;
          $sprint->sprint->save();
        }





    }


    public function tasksave(Request $request){

        
        $productbacklog = ProductBacklog::find($request->get('idProduct'));
      
        $id_status = 0;

        if($request->get('etapa') == "TODO"){
          $id_status = 1;
        }else if ($request->get('etapa') == "DOING"){
          $id_status = 2;
        }else if($request->get('etapa') == "DONE"){
          $id_status = 3;
        }

        $productbacklog->id_status = $id_status;

        $productbacklog->save();

        $taskboardlog = new TaskBoardLog;
        $taskboardlog->id_user = Auth::user()->id_user;
        $taskboardlog->state = $request->get('etapa');
        $taskboardlog->old_state = $request->get('source');
        $taskboardlog->date = Carbon\Carbon::now();
        $taskboardlog->id_productbacklog = $productbacklog->id_productbacklog;

        $taskboardlog->save();
        
    }


    public function save(ProductBacklogRequest $request) {
        $productbacklog = ProductBacklog::create($request->all());

        $responsavel = $request->get('responsavel'); 

        foreach($responsavel as $item){
          $productBacklogUser = new ProductBacklogUser;
          $productBacklogUser->id_user = $item;
          $productBacklogUser->id_productbacklog = $productbacklog->id_productbacklog;
          $productBacklogUser->save();
          //Log::info($productBacklogUser);
        }

        $taskboardlog = new TaskBoardLog;
        $taskboardlog->id_user = Auth::user()->id_user;
        $taskboardlog->state = "CRIADO";
        $taskboardlog->old_state = "-";
        $taskboardlog->date = Carbon\Carbon::now();
        $taskboardlog->id_productbacklog = $productbacklog->id_productbacklog;

        $taskboardlog->save();


        return redirect('/project/' . $request->get('id_project'))->withInput();        
    }

    public function update(ProductBacklogRequest $request) {
        $product = ProductBacklog::where('id_productbacklog', '=', $request->get('idProduct'))->first();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->pokerplainpoint = $request->get('pokerplainpoint');


        $product->save();


        return redirect('/project/' . $request->get('id_project') . '/edit')->withInput(); 
    }


    public function cancel($idProduct){

        $product = ProductBacklog::where('id_productbacklog', '=', $idProduct)->first();

        $taskboardlog = new TaskBoardLog;
        $taskboardlog->id_user = Auth::user()->id_user;
        

        if($product->id_status == 1){
          $taskboardlog->old_state = "TODO";
        }else if ($product->id_status == 2){
          $taskboardlog->old_state = "DOING";
        }else if($product->id_status == 3){
          $taskboardlog->old_state = "DONE";
        }else if($product->id_status == 4){
          $taskboardlog->old_state = "AGUARDANDO";
        }else if($product->id_status == 8){
          $taskboardlog->old_state = "APROVADO";
        }

        $taskboardlog->state = "CANCELADO";
        $taskboardlog->date = Carbon\Carbon::now();
        $taskboardlog->id_productbacklog = $product->id_productbacklog;

        $product->id_status = 6;

        //Retira o product da sprint
        $sprintProduct = SprintProductBacklog::where('id_productbacklog', '=', $product->id_productbacklog)->delete();


        $product->save();
        $taskboardlog->save();

        return redirect('/project/' . $product->id_project . '/edit')->with('project'); 
    }



    /*
      Metodos de Busca
     */

      public function getTeamProduct($idProject){
          $productTeam = TeamProject::where('id_project', '=', $idProject)
                 ->join('sc_user', 'sc_user.id_user', '=', 'sc_team_project.id_user')
                 ->join('sc_productbacklog_user', 'sc_productbacklog_user.id_user', '=', 'sc_user.id_user')
                 ->select('sc_productbacklog_user.*', 'sc_user.name', 'sc_user.surname')
                  ->get();
          return $productTeam;
      }



    public function findByID($idProductBacklog) {
       return ProductBacklog::find($idProductBacklog);
    }

    public function findByProject($idProject) {
        return ProductBacklog::where('id_project', '=', $idProject)
                ->where('id_status', '=', '4')
                ->get();
    }


    public function findBySprint($idProject) {
        return ProductBacklog::where('id_project', '=', $idProject)
              ->leftjoin('sc_sprint_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_sprint_productbacklog.id_productbacklog')
                ->select('sc_productbacklog.*', 'sc_sprint_productbacklog.id_sprint')
                ->get();
    }


    public function show($idProduct){
        $productbacklog = ProductBacklog::where('id_productbacklog', '=', $idProduct)->first();

        $mensagem = "Desculpe, product backlog não encontrado";
        if ($productbacklog == "")
            return view('error', compact('mensagem'));



        $taskboardlog = TaskBoardLog::where('id_productbacklog', '=', $productbacklog->id_productbacklog)->get();

        //return $taskboardlog;

      return view('site.productbacklog.index', compact('productbacklog', 'taskboardlog'));
    }



    public function editProductbacklog($idProduct) {
        
        $productbacklog = ProductBacklog::where('id_productbacklog', '=', $idProduct)->first();

        $mensagem = "Desculpe, product backlog não encontrado";
        if ($productbacklog == "")
            return view('error', compact('mensagem'));

        $project = Project::all();


      return view('site.productbacklog.edit', compact('productbacklog', 'project'));
    }


    /*
      Metodos de chamada do formulario novo
     */

    public function newProductBacklog() {
        $project = Project::orderBy('name')->get();
        return view('site.productbacklog.create', compact('project'));
    }

    /*
      Metodos de chamada de Views
     */

    public function indexPage($idProductBacklog) {
        //return view('site.productbacklog.index', compact(''));
        return view('site.productbacklog.index')->with('productbacklog', ProductBacklog::all());
    }

}
