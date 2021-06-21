<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SprintProductBackLog extends Model {

    protected $table = "sc_sprint_productbacklog";   //Indica o nome da Tabela
    protected $primaryKey = 'id_sprint_productbacklog';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_sprint', 'id_productbacklog'];
    

    public function product() {
         return $this->belongsTo('App\Models\ProductBackLog', 'id_productbacklog');        
    }
   
   public function sprint(){
   		return $this->belongsTo('App\Models\Sprint', 'id_sprint');
   }

}