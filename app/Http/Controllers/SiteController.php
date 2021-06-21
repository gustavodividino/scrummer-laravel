<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Skill;

class SiteController extends Controller {

    public function __construct() {

    }

    public function index() {

        return view('site\home\index', compact('user'));
    }

    public function contato() {
        return 'Pagina de contato';
    }

    public function login() {
        return view('auth\loginscrummer');
    }

    public function findUser() {
        $skills = Skill::all();

       return view('site\profile\find', compact('skills'));
    }

    public function findProject() {
       return view('site\project\find');
    }

    public function createProject() {
        return 'Pagina Criação de Projetos';
    }

    public function createSprint() {
        return 'Pagina Criação de Sprints';
    }

    public function createPBacklog() {
        return 'Pagina Criação de PBacklog';
    }

    public function helpProcess() {
        return view('site\help\process');
    }

    public function helpScrum() {
        return view('site\help\scrum');
    }

    public function helpScrummer() {
        return view('site\help\scrummer');
    }

}
