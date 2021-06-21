<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    protected $table = "sc_user";   //Indica o nome da Tabela
    protected $primaryKey = 'id_user';  //Indica a primaryKey da Tabela

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function profile(){

        return $this->hasOne('App\Models\Profile', 'id_user');

    }


}
