<?php

use Illuminate\Database\Seeder;

class sc_social_profile extends Seeder {

    public function run() {
        $sc_social_profile = [
            0 => [
                'id_social_profile' => '1',
                'id_user' => '1',
                'id_social' => '1',
                'link' => 'alberto.silva',
            ]
        ];
        DB::table('sc_social_profile')->insert($sc_social_profile);
    }

}
