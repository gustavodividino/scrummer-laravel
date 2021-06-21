<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBacklogUser extends Model {

    protected $table = "sc_productbacklog_user";   //Indica o nome da Tabela
    protected $primaryKey = 'id_productbacklog_user';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_productbacklog','id_user'];

    public function productbacklog() {

        return $this->hasOne('App\Models\ProductBacklog', 'id_productbacklog');
    }

    public function user() {

        return $this->belongsTo('App\Models\User', 'id_user');
    }

}
