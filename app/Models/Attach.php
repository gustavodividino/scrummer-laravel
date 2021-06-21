<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attach extends Model {

    protected $table = "sc_attach";   //Indica o nome da Tabela
    protected $primaryKey = 'id_attach';  //Indica a primaryKey da Tabela
    protected $fillable = ['filename', 'description', 'id_project', 'id_user', 'size'];


	protected $dates = ['created_at'];

     public function user() {

     	return $this->belongsTo('App\Models\User', 'id_user');  

     }

}