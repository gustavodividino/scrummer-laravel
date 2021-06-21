<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model {

    protected $table = "sc_rank";   //Indica o nome da Tabela
    protected $primaryKey = 'id_rank';  //Indica a primaryKey da Tabela
    protected $fillable = ['initial_level', 'end_level'];



}