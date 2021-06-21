<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\TeamProject;
use App\Models\AchivementProfile;
use Log;

class AchivementController extends Controller
{

	public function addachivehl(Request $request){
		
		$achivementUser = AchivementProfile::where('id_profile', '=', $request->get('idProfile'))
							->where('id_achivement', '=', $request->get('idAchive') )
								->first();


		if($achivementUser->highlight == 0){
			$achivementUser->highlight = 1;
		}else{
			$achivementUser->highlight = 0;
		}

		$achivementUser->save();

	}


	public function verificaAchive($idAchive, $idProfile){

	}

    

	/*

		Validações de Achivements de Projetos

	*/
		public function finishProjetos($idProject){
			$project = Project::where('id_project', '=', $idProject)->first();
			$users = TeamProject::where('id_project', '=', $project->id_project)->get();

			foreach($users as $item){

				//Verifica se o usuario já tem os achivements
				$aux = AchivementProfile::where('id_profile', '=', $item->user->profile->id_profile)
							->get();
				Log::info($aux);


			}



		}


	/*

		Validações de Achivements de ProductBackLog

	*/





	/*

		Validações de Achivements de Skill

	*/		





	/*

		Validações de Achivements de Profile

	*/




	/*

		Validações de Achivements de Position

	*/		

}
