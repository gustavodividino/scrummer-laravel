<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceProfile extends Model {

    protected $table = "sc_experience_profile";   //Indica o nome da Tabela
    protected $primaryKey = 'id_experience_profile';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_profile', 'points'];


    public function profile() {

        return $this->hasOne('App\Models\Profile');
    }
    

}