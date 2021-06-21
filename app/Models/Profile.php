<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {

    protected $table = "sc_profile";   //Indica o nome da Tabela
    protected $primaryKey = 'id_profile';  //Indica a primaryKey da Tabela
    protected $fillable = ['id_user', 'phone','cel','address', 'birthday', 'gender', 'photo'];

    protected $dates = ['birthday'];


    public function history(){
        return $this->hasMany('App\Models\History', 'id_user')->orderBy('updated_at', 'desc');
    }
    
    public function user() {
        return $this->hasOne('App\Models\User', 'id_user');
    }

    public function skill() {

        return $this->hasMany('App\Models\SkillProfile', 'id_profile')->get();
    }

    public function social() {

        return $this->hasMany('Models\SocialProfile', 'id_profile')->get();
    }

    public function achivements() {

        return $this->hasMany('App\Models\AchivementProfile', 'id_profile')->orderBy('id_achivement', 'asc');;
    }

    public function experience(){
        return $this->hasOne('App\Models\ExperienceProfile', 'id_profile');
    }

}
