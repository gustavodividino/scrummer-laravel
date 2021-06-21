<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Attach;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use File;
use Illuminate\Support\Facades\Input;
use Log;
use DB;
use Auth;

class AttachController extends Controller {

    public function upload($idProject)
    {
    	$project = Project::find($idProject);

    	return view('site.attach.upload', compact('project'));

    }

    public function move(Request $request)
    {
   
    	//return $request->all();

    	$idProject = $request->get('idProject');

    	$extension = explode('.', $request->get('name'));
    	$extension = strtolower($extension[1]);

		if (Input::hasFile('photo')){
			$file = Input::file('photo'); // retorna o objeto em questão

	        //$destinationPath = storage_path() . '\files';
	        $destinationPath = public_path() . '\files';
	        $fileName = md5($request->get('name') . time())."." . pathinfo('Hearthstone.' . $extension)['extension'];		
	        
	        //var_dump($file->move($destinationPath, $fileName));
	        $file->move($destinationPath, $fileName);

	        $anexo = new Attach();
	        $anexo->filename = $fileName;
	        $anexo->id_project = $idProject;
	        $anexo->id_user = Auth::user()->id_user;
	        $anexo->size = $request->get('size');
	        $anexo->description = $request->get('description');

	        $anexo->save();

	        $project = Project::find($idProject);

			return redirect('/project/' . $project->id_project . "/attach")->withInput(); 

		}

    }



}