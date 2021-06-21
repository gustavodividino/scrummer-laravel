<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    protected $table = "sc_status";   //Indica o nome da Tabela
    protected $primaryKey = 'id_status';  //Indica a primaryKey da Tabela
    protected $fillable = ['name'];




}