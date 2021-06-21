<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;


class PositionController extends Controller {
    /*
      Metodos de Busca
     */

   
    public function findByID($idPosition) {
        return Position::find($idPosition);
    }

    public function getPosition(){
        return Position::orderBy('name')->get();
    }
    
}
