<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achivement extends Model {

    protected $table = "sc_achivement";   //Indica o nome da Tabela
    protected $primaryKey = 'id_achivement';  //Indica a primaryKey da Tabela
    protected $fillable = ['name', 'description', 'icon'];


}