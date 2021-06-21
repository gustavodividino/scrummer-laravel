<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model {

    protected $table = "sc_social_profile";   //Indica o nome da Tabela
    protected $primaryKey = 'id_social_profile';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_user', 'id_social', 'link'];


    public function profile() {

        return $this->hasOne('Profile');
    }

    public function social() {

        return $this->hasOne('Social');
    }


}