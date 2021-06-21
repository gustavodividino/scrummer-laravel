<?php

use Illuminate\Database\Seeder;

class sc_level extends Seeder {

    public function run() {

        $sc_level = [
            0 => [
                'id_level' => '1',
                'level' => '3',
                'experience' => '302',
            ]
        ];
        DB::table('sc_level')->insert($sc_level);
    }

}
