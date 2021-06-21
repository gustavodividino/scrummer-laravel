<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBacklog extends Model {

    protected $table = "sc_productbacklog";     //Indica o nome da Tabela
    protected $primaryKey = 'id_productbacklog';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_project','id_status','name','description','pokerplainpoint'];

    public function project() {
         return $this->belongsTo('App\Models\Project', 'id_project');
        
    }

    public function status() {
         return $this->belongsTo('App\Models\Status', 'id_status');
        
    }

    public function responsible(){
        return $this->hasMany('App\Models\ProductBacklogUser', 'id_productbacklog');
    }


}
