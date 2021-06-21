<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchivementProfile extends Model {

    protected $table = "sc_achivement_profile";   //Indica o nome da Tabela
    protected $primaryKey = 'id_achivement_profile';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_achivement', 'id_profile'];

    protected $dates = ['created_at'];

    public function profile() {

        return $this->hasOne('Profile');
    }

    public function achivement() {

        return $this->belongsTo('App\Models\Achivement', 'id_achivement');
    }

}