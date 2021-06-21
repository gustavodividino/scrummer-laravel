<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\TeamProject;
use App\Models\Experience;
use App\Models\Rank;
use App\Models\Skill;
use App\Models\skillProfile;
use App\Models\User;
use App\Models\Sprint;
use App\Models\AchivementProfile;
use App\Models\ProductBacklogUser;
use Illuminate\Support\Facades\Input;
use Log;

class ProfileController extends Controller {
    /*
      Metodo de Gravar informa��o no Banco
     */

    public function save(ProfileRequest $request) {
        Profile::create($request->all());
    }

    public function update(Request $request) {

        $profile = Profile::find($request->get('idProfile'));

        $profile->phone = $request->get('txPhone');
        $profile->cel = $request->get('txCelphone');
        $profile->birthday = $request->get('dtBirthDay');
        

        if (Input::hasFile('photo')) {
            $extension = explode('.', $request->get('namephoto'));
            $extension = strtolower($extension[1]);

            $file = Input::file('photo'); // retorna o objeto em questão

            $destinationPath = public_path() . '\photos';
            $fileName = $profile->id_profile . "." . pathinfo('Hearthstone.' . 'jpg')['extension'];
            $file->move($destinationPath, $fileName);
            $profile->photo = $fileName;

        }

        $profile->save();

        return redirect('/profile/' . $profile->id_profile . "/info")->withInput();
    }

    /*
      Metodos de Busca
     */

    public function result(Request $request) {

        if ($request->get('name') != "") {
            $skillProfile = User::where('name', 'like', '%' . $request->get('name') . '%')->get();
        } else {
            if ($request->get('surname') != "") {
                $skillProfile = User::where('surname', 'like', '%' . $request->get('surname') . '%')->get();
            } else {
                $skills = $request->get('skills');
                if ($skills != "") {
                    $users = Profile::join('sc_skill_profile', 'sc_skill_profile.id_profile', '=', 'sc_profile.id_profile')
                            ->join('sc_user', 'sc_user.id_user', '=', 'sc_profile.id_user')
                            ->whereIn('sc_skill_profile.id_skill', $skills)
                            ->select('sc_user.id_user')
                            ->get();
                    //return $users;
                    $skillProfile = User::whereIn('id_user', $users)->get();
                    //return $skillProfile;
                }
            }
        }

        //return $skillProfile;


        $skillU = SkillProfile::whereIn('id_profile', $skillProfile)
                ->select('id_profile', 'id_skill')
                ->get();

        //return $skillProfile;
        //return $request->all();
        return view('site.profile.result', compact('skillProfile', 'skillU'));
    }

    public function findByID($idProfile) {
        return Profile::find($idProfile);
    }

    public function show(Request $request) {
        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }

        $achiveDestaque = AchivementProfile::where('id_profile','=', $profile->id_profile)
                            ->where('highlight', '=', '1')
                            ->get();

        $totalProductsPoints = ProductBacklogUser::where('id_user', '=', $profile->id_user)
                        ->where('sc_productbacklog.id_status', '=', 8)
                        ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_productbacklog_user.id_productbacklog')
                        ->selectRaw('sum(sc_productbacklog.pokerplainpoint) as total')
                        ->first();



        $projetosConcluidos = ProductBacklogUser::where('id_user', '=', $profile->id_user)
                        ->where('sc_productbacklog.id_status', '=', 3)
                        ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_productbacklog_user.id_productbacklog')
                        ->groupBy('sc_productbacklog.id_project')
                        ->selectRaw('sc_productbacklog.id_project')
                        ->get();

        $teamProject = TeamProject::where('id_user', '=', $profile->user->id_user)->get();

        $qtdeprojetos = sizeof($teamProject);


        $totalHabilidades = SkillProfile::where('id_profile', '=', $profile->id_profile)
                                ->selectRaw('count(id_skill_profile) as total')
                                ->first();

        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();


        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));


        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank', 'achiveDestaque', 'totalProductsPoints', 'qtdeprojetos', 'totalHabilidades'));
    }

    /*
      Metodos de chamada de Views
     */

    public function infoPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }
        
        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));

        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank'));
    }

    public function achivementPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }
        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));

        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank'));
    }

    public function skillPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }
        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));

        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank'));
    }

    public function feedPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }
        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));

        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank'));
    }

    public function projectPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }

        $teamProject = TeamProject::where('id_user', '=', $profile->user->id_user)
                        ->where('sc_project.id_status', '=', 5)
                        ->join('sc_project', 'sc_project.id_project', '=', 'sc_team_project.id_project')
                        ->get();


        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));


        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank', 'teamProject'));
    }

    public function allocPage(Request $request) {

        $profile = Profile::find($request->profile);

        if ($profile == "") {
            $mensagem = "Desculpe, perfil não encontrado";
            return view('error', compact('mensagem'));
        }
        $points = $profile->experience->points;

        $level = Experience::where([
                    ['xp_init', '<=', $points],
                    ['xp_end', '>=', $points]
                ])->first();

        //=(((XP-Inicio)*100)/(Fim-Inicio))/100

        $porcentagem = Floor(((($points - $level->xp_init) * 100) / (($level->xp_end + 1) - $level->xp_init)));

        $rank = Rank::where([
                    ['initial_level', '<=', $level->level],
                    ['end_level', '>=', $level->level]
                ])->first();

        /*
          SELECT SP.id_project, SP.start_date, SP.end_date FROM sc_productbacklog_user P
          join sc_sprint_productbacklog S
          on S.id_productbacklog = P.id_productbacklog
          join sc_sprint SP
          on SP.id_sprint = S.id_sprint
          where id_user = 502
          order by SP.start_date

         */


        // return $porcentagem;
        return view('site.profile.index', compact('profile', 'level', 'porcentagem', 'rank', 'graph'));
    }

    public function graphAlloc_X($id) {

        $alocacao = ProductBacklogUser::where('id_user', '=', $id)
                ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_productbacklog_user.id_productbacklog')
                ->join('sc_sprint_productbacklog', 'sc_sprint_productbacklog.id_productbacklog', '=', 'sc_productbacklog.id_productbacklog')
                ->join('sc_sprint', 'sc_sprint.id_sprint', '=', 'sc_sprint_productbacklog.id_sprint')
                ->selectRaw('sc_sprint.name as sprintname, sc_productbacklog_user.id_productbacklog_user, sc_productbacklog.name, DATE_FORMAT(sc_sprint.start_date, \'%d-%m-%Y\') as start_date, DATE_FORMAT(sc_sprint.end_date, \'%d-%m-%Y\') as end_date')
                ->get();

        $segments = [];
        $graph = [];

        foreach ($alocacao as $item) {

            $data = [
                'start' => $item->start_date,
                'end' => $item->end_date,
                'color' => "#49728d",
                'task' => $item->name
            ];

            $segments[] = $data;

            $aux = [
                'category' => $item->sprintname,
                'segments' => $segments
            ];

            $graph[] = $aux;
        }

        return $graph;
    }

    public function graphAlloc($id) {


        /*
         * 
         * select SP.id_sprint, S.start_date, S.end_date from sc_productbacklog_user PU
          join sc_sprint_productbacklog SP
          on SP.id_productbacklog = PU.id_productbacklog
          join sc_sprint S
          on S.id_sprint = SP.id_sprint
          where PU.id_user = 502
          GROUP by SP.id_sprint, S.start_date, S.end_date
         * 
         * 
         * 
         */

          $projetos = ProductBacklogUser::where('id_user', '=', $id)
            ->join('sc_productbacklog', 'sc_productbacklog.id_productbacklog', '=', 'sc_productbacklog_user.id_productbacklog')
            ->join('sc_sprint_productbacklog', 'sc_sprint_productbacklog.id_productbacklog', '=', 'sc_productbacklog.id_productbacklog')
            ->join('sc_sprint', 'sc_sprint.id_sprint', '=', 'sc_sprint_productbacklog.id_sprint')
            ->join('sc_project', 'sc_project.id_project', '=', 'sc_sprint.id_project')
            ->groupBy('sc_project.id_project', 'sc_project.name')
            ->selectRaw('sc_project.id_project, sc_project.name')
            ->get();

        $segments = [];
        $graph = [];

        foreach($projetos as $item){
            $sprint = Sprint::where('id_project', '=', $item->id_project)
                ->selectRaw('sc_sprint.name, sc_sprint.id_project, sc_sprint.id_sprint, sc_sprint.start_date, sc_sprint.end_date')
                ->get();

            foreach($sprint as $itemX){

                $data = [
                    'start' => $itemX->start_date->format('d-m-Y'),
                    'end' => $itemX->end_date->format('d-m-Y'),
                    'color' => "#49728d",
                    'task' => $itemX->name
                ];

                $segments[] = $data;
            }
             $aux = [
                'category' => $item->name,
                'segments' => $segments
            ];
            
            $graph[] = $aux;
                            
        }

        if(sizeof($graph) <=0){
                $data = [
                    'start' => "",
                    'end' => "",
                    'color' => "#49728d",
                    'task' => ""
                ];

                $segments[] = $data;

                $aux = [
                    'category' => "",
                    'segments' => $segments
                ];
            
            $graph[] = $aux;

        }

       return $graph;

    }

}
