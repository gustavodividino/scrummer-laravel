<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamProject extends Model {

    protected $table = "sc_team_project";   //Indica o nome da Tabela
    protected $primaryKey = 'id_team_project';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_project','id_user','id_position'];

    public function project() {
        return $this->belongsTo('App\Models\Project', 'id_project');
    }

    public function user() {

        return $this->belongsTo('App\Models\User', 'id_user');      //Pertence a um Usuario
    }

    public function position() {

        return $this->belongsTo('App\Models\Position', 'id_position');
    }

}
