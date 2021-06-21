<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model {

    protected $table = "sc_sprint";   //Indica o nome da Tabela
    protected $primaryKey = 'id_sprint';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_project', 'name', 'id_status', 'start_date', 'end_date'];
    protected $dates = ['start_date', 'end_date'];

    public function project() {
        return $this->belongsTo('App\Models\Project', 'id_project');
    }

    public function productsBackLog() {
        return $this->hasMany('App\Models\SprintProductBacklog', 'id_sprint')->get();
    }

    public function status() {
        return $this->belongsTo('App\Models\Status', 'id_status');
    }


}
