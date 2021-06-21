<?php

use Illuminate\Database\Seeder;

class sc_taskboard_level extends Seeder {

    public function run() {

        $sc_taskboard_level = [
            0 => [
                'id_taskboard_level' => '1',
                'level' => '1',
                'name' => 'To Do',
            ]
        ];
        DB::table('sc_taskboard_level')->insert($sc_taskboard_level);
    }

}
