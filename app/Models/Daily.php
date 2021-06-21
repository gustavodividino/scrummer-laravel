<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model {

    protected $table = "sc_daily";   //Indica o nome da Tabela
    protected $primaryKey = 'id_daily';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_project','meeting','date'];

    public function project() {

        return $this->belongsTo('project');
    }

}
