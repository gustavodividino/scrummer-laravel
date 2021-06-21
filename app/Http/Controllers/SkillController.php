<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;


class SkillController extends Controller {
    /*
      Metodos de Busca
     */

    public function findByID($idSkill) {
        return Skill::find($idSkill);
    }

    public function findAll() {
        return Skill::all();
    }

}
