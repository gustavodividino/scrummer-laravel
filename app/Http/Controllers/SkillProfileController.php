<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillProfile;
use App\Models\Skill;
use App\Models\Profile;
use App\Models\History;
use Carbon\Carbon;
use Auth;
use Log;

class SkillProfileController extends Controller {

    public function removeskill(Request $request) {

        //Log::info($request->all());

        $skill = Skill::find($request->get('idSkill'));

        $skillProfile = SkillProfile::where('id_profile', '=', $request->get('idProfile'))
                ->where('id_skill', '=', $skill->id_skill)
                ->delete();



        /* Cria o Log de adicao para exibição */
        $history = new History();
        $history->id_user = Auth::user()->id_user;
        $history->description = "Removeu a habilidade " . $skill->name;

        $history->date = Carbon::now();
        $history->save();
    }

    public function saveskill(Request $request) {
        $skillProfile = new SkillProfile();
        $skillProfile->id_profile = $request->get('user');
        $skillProfile->id_skill = $request->get('skill');

        $skillProfile->save();

        //Log::info($skillProfile);


        /* Cria o Log de adicao para exibição */
        $history = new History();
        $history->id_user = Auth::user()->id_user;
        $history->description = "Adicionou a habilidade " . $skillProfile->skill->name;

        $history->date = Carbon::now();
        $history->save();
    }

    /*
      Metodos de Busca
     */

    public function findByID($idSkillProfile) {
        return SkillProfile::find($idSkillProfile);
    }

    public function findByProfile($idProfile) {
        return TeamProject::with(array('skill' => function($query) {
                        $query->select('id_skill', 'name');
                    }))->where('id_profile', '=', $idProfile);
    }

    public function manageSkillProfile($idProfile) {

        $profile = Profile::find($idProfile);

        if ($profile->id_user == Auth::user()->id_user) {
            $skillProfile = SkillProfile::where('id_profile', '=', $idProfile)->get();
            $skill = Skill::orderBy('name')->get();
            return view('site.profile.skill.skill', compact('skillProfile', 'skill'));
        } else {
            return redirect('/home');
        }
    }

}
