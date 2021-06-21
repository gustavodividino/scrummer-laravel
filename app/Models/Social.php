<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model {

    protected $table = "sc_social";   //Indica o nome da Tabela
    protected $primaryKey = 'id_social';  //Indica a primaryKey da Tabela
    protected $fillable = ['name', 'initial'];



}