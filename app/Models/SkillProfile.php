<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillProfile extends Model {

    protected $table = "sc_skill_profile";   //Indica o nome da Tabela
    protected $primaryKey = 'id_skill_profile';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_profile','id_skill'];


    public function profile() {
        return $this->belongsTo('App\Models\Profile', 'id_profile')->get();
    }

    public function skill() {
        return $this->belongsTo('App\Models\Skill', 'id_skill');
    }
 

}
