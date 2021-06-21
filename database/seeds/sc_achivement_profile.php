<?php

use Illuminate\Database\Seeder;

class sc_achivement_profile extends Seeder {

    public function run() {

        $sc_achivement_profile = [
1=> ['id_achivement' => '1','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
2=> ['id_achivement' => '2','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
3=> ['id_achivement' => '3','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
4=> ['id_achivement' => '4','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
5=> ['id_achivement' => '14','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
6=> ['id_achivement' => '15','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
7=> ['id_achivement' => '16','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
8=> ['id_achivement' => '17','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
9=> ['id_achivement' => '35','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
10=> ['id_achivement' => '36','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
11=> ['id_achivement' => '37','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
12=> ['id_achivement' => '38','id_profile' => '502','created_at' => '2017-01-01','updated_at' => '2017-10-17',],



        ];
        DB::table('sc_achivement_profile')->insert($sc_achivement_profile);
    }

}
