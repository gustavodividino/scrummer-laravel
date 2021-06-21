<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model {

    protected $table = "sc_level";   //Indica o nome da Tabela
    protected $primaryKey = 'id_level';  //Indica a primaryKey da Tabela
    protected $fillable = ['level', 'experience'];


}