<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

    protected $table = "sc_skill";   //Indica o nome da Tabela
    protected $primaryKey = 'id_skill';  //Indica a primaryKey da Tabela
    protected $fillable = ['name'];

}
