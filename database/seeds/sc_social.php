<?php

use Illuminate\Database\Seeder;

class sc_social extends Seeder {

    public function run() {
        $sc_social = [
            0 => [
                'id_social' => '1',
                'name' => 'Facebook',
                'initial' => 'facebook.com\\',
            ]
        ];
        DB::table('sc_social')->insert($sc_social);
    }

}
