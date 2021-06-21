<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskBoardLog extends Model
{
    protected $table = "sc_taskboard_log";   //Indica o nome da Tabela
    protected $primaryKey = 'id_taskboard_log';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_user', 'old_state','state', 'date'];

    protected $dates = ['date'];

    
public function user(){
	return $this->belongsTo('App\Models\User', 'id_user');
}

}
