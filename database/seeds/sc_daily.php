<?php

use Illuminate\Database\Seeder;

class sc_daily extends Seeder {

    public function run() {

        $sc_daily = [
            0 => [
                'id_daily' => '1',
                'id_project' => '1',
                'meeting' => 'Fechado os ProductBackLog 1, 2 e 3',
                'date' => '2017-08-28',
            ]
        ];
        DB::table('sc_daily')->insert($sc_daily);
    }

}
