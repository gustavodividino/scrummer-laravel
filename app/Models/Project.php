<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $table = "sc_project";   //Indica o nome da Tabela
    protected $primaryKey = 'id_project';  //Indica a primaryKey da Tabela
    
    protected $fillable = ['name','id_status','description','start_date','end_date'];

    protected $dates = ['start_date', 'end_date', 'created_at'];


    public function productBacklog() {
        return $this->hasMany('App\Models\ProductBacklog', 'id_project')->orderBy('id_status');
    }

    public function sprint() {
        return $this->hasMany('App\Models\Sprint', 'id_project');   
    }

    public function teamproject() {
        return $this->hasOne('App\Models\TeamProject', 'id_project')->get();         
    }

    public function daily() {
        return $this->hasMany('App\Models\Daily', 'id_project')->get(); 
    }

    public function status(){
        return $this->belongsTo('App\Models\Status', 'id_status');
    }

    public function attach() {
        return $this->hasMany('App\Models\Attach', 'id_project'); 
    }

}
