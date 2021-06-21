<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = "sc_experience";   //Indica o nome da Tabela
    protected $primaryKey = 'id_experience';  //Indica a primaryKey da Tabela
    protected $fillable = ['level', 'xp_init', 'xp_end'];
    
    
}
