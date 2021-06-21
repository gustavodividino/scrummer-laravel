<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daily;


class DailyController extends Controller {
    /*
      Metodo de Gravar informa��o no Banco
     */

    public function save(DailyRequest $request) {
        Daily::create($request->all());
    }

    public function update(DailyRequest $request) {
        Daily::save($request->all());
    }

    /*
      Metodos de Busca
     */

    public function findByID($idDaily) {
        return Daily::find($request->projeto);
    }

    public function findByProject($idProject) {
        return Daily::where('id_project', '=', $idProject)->get();
    }

    /*
      Metodos de chamada do formulario novo
     */

    public function newDaily() {

        return view('site.daily.create');
    }

    /*
      Metodos de chamada de Views
     */

    public function indexPage($idProject) {
        
    }

}
