<?php

use Illuminate\Database\Seeder;

class sc_status extends Seeder {

    public function run() {

        $sc_status = [
            0 => [
                'id_status' => '1',
                'name' => 'To Do'
            ],
            1 => [
                'id_status' => '2',
                'name' => 'Doing'
            ],
            2 => [
                'id_status' => '3',
                'name' => 'Done'
            ],
            3 => [
                'id_status' => '4',
                'name' => 'Aguardando'
            ],
            4 => [
                'id_status' => '5',
                'name' => 'Concluído'
            ],
            5 => [
                'id_status' => '6',
                'name' => 'Cancelado'
            ],
            6 => [
                'id_status' => '7',
                'name' => 'Em Andamento'
            ],      

            7 => [
                'id_status' => '8',
                'name' => 'Aprovado'
            ]


        ];
        DB::table('sc_status')->insert($sc_status);
    }

}
