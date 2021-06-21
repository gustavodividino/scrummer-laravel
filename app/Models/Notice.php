<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model {

    protected $table = "sc_notice";   //Indica o nome da Tabela
    protected $primaryKey = 'id_notice';  //Indica a primaryKey da Tabela
    protected $fillable = ['notice', 'start_date', 'end_date'];

}
