<?php

use Illuminate\Database\Seeder;

class sc_rank extends Seeder {

    public function run() {
        $sc_rank = [
        0=> ['id_rank' =>'1','description' =>'Dente de Leite','initial_level' => '1','end_level' => '3',],
        1=> ['id_rank' =>'2','description' =>'Junior','initial_level' => '4','end_level' => '7',],
        2=> ['id_rank' =>'3','description' =>'Amador','initial_level' => '8','end_level' => '12',],
        3=> ['id_rank' =>'4','description' =>'Serie-D','initial_level' => '13','end_level' => '18',],
        4=> ['id_rank' =>'5','description' =>'Serie-C','initial_level' => '19','end_level' => '28',],
        5=> ['id_rank' =>'6','description' =>'Serie-B','initial_level' => '29','end_level' => '44',],
        6=> ['id_rank' =>'7','description' =>'Serie-A','initial_level' => '45','end_level' => '66',],
        7=> ['id_rank' =>'8','description' =>'Seleção','initial_level' => '67','end_level' => '9999',],

        ];
        DB::table('sc_rank')->insert($sc_rank);
    }

}
