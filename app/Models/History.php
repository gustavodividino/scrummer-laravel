<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model {

    protected $table = "sc_history";   //Indica o nome da Tabela
    protected $primaryKey = 'id_history';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_user', 'description', 'date'];

    public function user(){
        return $this->belongsTo('User');
    }
    
}
