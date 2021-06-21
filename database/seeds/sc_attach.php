<?php

use Illuminate\Database\Seeder;

class sc_attach extends Seeder {

    public function run() {

        $sc_attach = [
            0 => [
                'id_attach' => '1',
                'id_project' => '1',
                'description' => 'Ata de reunião',
                'filename' => 'ata_reuniao.doc',
                'id_user' => '1',
            ]
        ];
        DB::table('sc_attach')->insert($sc_attach);
    }

}
