<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

    protected $table = "sc_position";   //Indica o nome da Tabela
    protected $primaryKey = 'id_position';  //Indica a primaryKey da Tabela
    protected $fillable = ['name', 'description'];



}