<?php

use Illuminate\Database\Seeder;

class sc_achivement extends Seeder {

    public function run() {
        $sc_achivement = [


        	
1=> ['categoria' => 'Project','experience' => '100 ','grade' => 'Bronze','name' => 'Meu Primeiro Projeto','description' => 'Conquistou seu primeiro projeto','icon' => 'AchiveProjectBronze.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
2=> ['categoria' => 'Project','experience' => '150 ','grade' => 'Prata','name' => '10 Projetos','description' => 'Concluiu seu 10º Projeto','icon' => 'AchiveProjectPrata.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
3=> ['categoria' => 'Project','experience' => '225 ','grade' => 'Ouro','name' => '25 Projetos','description' => 'Concluiu seu 25º Projeto','icon' => 'AchiveProjectOuro.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
4=> ['categoria' => 'Project','experience' => '338 ','grade' => 'Platina','name' => '50 Projetos','description' => 'Concluiu seu 50º Projeto','icon' => 'AchiveProjectPlatina.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
5=> ['categoria' => 'Project','experience' => '506 ','grade' => 'Diamente','name' => '75 Projetos','description' => 'Concluiu seu 75º Projeto','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
6=> ['categoria' => 'Project','experience' => '759 ','grade' => 'Safira','name' => '100 Projetos','description' => 'Concluiu seu 100º Projeto','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
7=> ['categoria' => 'Project','experience' => '0   ','grade' => 'Estrela','name' => 'Esse deixa comigo !','description' => 'Completar um projeto Solo','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
8=> ['categoria' => 'ProductBackLog','experience' => '100 ','grade' => 'Bronze','name' => 'Meu Primeiro Ponto','description' => 'Conquistou seu primeiro ponto de ProductBackLog','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
9=> ['categoria' => 'ProductBackLog','experience' => '150 ','grade' => 'Prata','name' => '80 Pontos Concluídos','description' => 'Alcançou 80 pontos de ProductbackLog Concluído','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
10=> ['categoria' => 'ProductBackLog','experience' => '225 ','grade' => 'Ouro','name' => '200 Pontos Concluídos','description' => 'Alcançou 200 pontos de ProductbackLog Concluído','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
11=> ['categoria' => 'ProductBackLog','experience' => '338 ','grade' => 'Platina','name' => '400 Pontos Concluídos','description' => 'Alcançou 400 pontos de ProductbackLog Concluído','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
12=> ['categoria' => 'ProductBackLog','experience' => '506 ','grade' => 'Diamente','name' => '800 Pontos Concluídos','description' => 'Alcançou 800 pontos de ProductbackLog Concluído','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
13=> ['categoria' => 'ProductBackLog','experience' => '759 ','grade' => 'Safira','name' => '1200 Pontos Concluídos','description' => 'Alcançou 1200 pontos de ProductbackLog Concluído','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
14=> ['categoria' => 'Skill','experience' => '100 ','grade' => 'Bronze','name' => 'Minha Primeira Habilidade','description' => 'Incluiu sua primeira habilidade no perfil','icon' => 'AchiveSkillBronze.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
15=> ['categoria' => 'Skill','experience' => '150 ','grade' => 'Prata','name' => '10 Habilidades','description' => 'Incluiu 10 habilidades no perfil','icon' => 'AchiveSkillPrata.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
16=> ['categoria' => 'Skill','experience' => '225 ','grade' => 'Ouro','name' => '25 Habilidades','description' => 'Incluiu 25 habilidades no perfil','icon' => 'AchiveSkillOuro.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
17=> ['categoria' => 'Skill','experience' => '338 ','grade' => 'Platina','name' => '50 Habilidades','description' => 'Incluiu 50 habilidades no perfil','icon' => 'AchiveSkillPlatina.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
18=> ['categoria' => 'Skill','experience' => '506 ','grade' => 'Diamente','name' => '75 Habilidades','description' => 'Incluiu 75 habilidades no perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
19=> ['categoria' => 'Skill','experience' => '759 ','grade' => 'Safira','name' => '100 Habilidades','description' => 'Incluiu 100 habilidades no perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
20=> ['categoria' => 'Profile','experience' => '30','grade' => 'Bronze','name' => 'LinkedIn','description' => 'Incluiu o linkedIn no seu perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
21=> ['categoria' => 'Profile','experience' => '30','grade' => 'Bronze','name' => 'Agora posso ser encontrado','description' => 'Incluiu o telefone/celular no seu perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
22=> ['categoria' => 'Profile','experience' => '30','grade' => 'Bronze','name' => 'Este sou eu!','description' => 'Incluiu uma foto no perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
23=> ['categoria' => 'Profile','experience' => '30','grade' => 'Bronze','name' => 'Meu Aniversário','description' => 'Incluiu o aniversário no perfil','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
24=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Analista Funcional','description' => 'Concluiu um projeto com o perfil de  Analista Funcional','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
25=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Arquiteto de Sistemas','description' => 'Concluiu um projeto com o perfil de Arquiteto de Sistemas','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
26=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Arquiteto de Solução','description' => 'Concluiu um projeto com o perfil de Arquiteto de Solução','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
27=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Desenvolvedor','description' => 'Concluiu um projeto com o perfil de Desenvolvedor','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
28=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Arquiteto de Testes','description' => 'Concluiu um projeto com o perfil de Arquiteto de Testes','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
29=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Analista de Testes','description' => 'Concluiu um projeto com o perfil de Analista de Testes','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
30=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Gerente de Projeto','description' => 'Concluiu um projeto com o perfil de Gerente de Projeto','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
31=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Analista de Projetos de Infra','description' => 'Concluiu um projeto com o perfil de Analista de Projetos de Infra','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
32=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Arquiteto de Solução de Infra','description' => 'Concluiu um projeto com o perfil de Arquiteto de Solução de Infra','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
33=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como Analista de Implantação','description' => 'Concluiu um projeto com o perfil de Analista de Implantação','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
34=> ['categoria' => 'Position','experience' => '150 ','grade' => 'Prata','name' => 'Participou de um projeto como PMO TI','description' => 'Concluiu um projeto com o perfil de PMO TI','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
35=> ['categoria' => 'Project','experience' => '100 ','grade' => 'Bronze','name' => '10 Entradas de DailyMeeting seguidos','description' => 'Incluiu 10 DailyMeetings sem errar','icon' => 'AchiveMeetingBronze.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
36=> ['categoria' => 'Project','experience' => '150 ','grade' => 'Prata','name' => '25 Entradas de DailyMeeting seguidos','description' => 'Incluiu 25 DailyMeetings sem errar','icon' => 'AchiveMeetingPrata.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
37=> ['categoria' => 'Project','experience' => '225 ','grade' => 'Ouro','name' => '50 Entradas de DailyMeeting seguidos','description' => 'Incluiu 50 DailyMeetings sem errar','icon' => 'AchiveMeetingOuro.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
38=> ['categoria' => 'Project','experience' => '338 ','grade' => 'Platina','name' => '75 Entradas de DailyMeeting seguidos','description' => 'Incluiu 75 DailyMeetings sem errar','icon' => 'AchiveMeetingPlatina.png','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
39=> ['categoria' => 'Project','experience' => '506 ','grade' => 'Diamente','name' => '100 Entradas de DailyMeeting seguidos','description' => 'Incluiu 100 DailyMeetings sem errar','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
40=> ['categoria' => 'Project','experience' => '759 ','grade' => 'Safira','name' => '150 Entradas de DailyMeeting seguidos','description' => 'Incluiu 150 DailyMeetings sem errar','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
41=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Analista Funcional','description' => 'Concluiu 10 projetos com o perfil de  Analista Funcional','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
42=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Arquiteto de Sistemas','description' => 'Concluiu 10 projetos com o perfil de Arquiteto de Sistemas','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
43=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Arquiteto de Solução','description' => 'Concluiu 10 projetos com o perfil de Arquiteto de Solução','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
44=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Desenvolvedor','description' => 'Concluiu 10 projetos com o perfil de Desenvolvedor','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
45=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Arquiteto de Testes','description' => 'Concluiu 10 projetos com o perfil de Arquiteto de Testes','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
46=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Analista de Testes','description' => 'Concluiu 10 projetos com o perfil de Analista de Testes','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
47=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Gerente de Projeto','description' => 'Concluiu 10 projetos com o perfil de Gerente de Projeto','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
48=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Analista de Projetos de Infra','description' => 'Concluiu 10 projetos com o perfil de Analista de Projetos de Infra','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
49=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Arquiteto de Solução de Infra','description' => 'Concluiu 10 projetos com o perfil de Arquiteto de Solução de Infra','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
50=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of Analista de Implantação','description' => 'Concluiu 10 projetos com o perfil de Analista de Implantação','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],
51=> ['categoria' => 'Position','experience' => '759 ','grade' => 'Safira','name' => 'Master of PMO TI','description' => 'Concluiu 10 projetos com o perfil de PMO TI','icon' => '','created_at' => '2017-01-01','updated_at' => '2017-10-17',],







        ];
        DB::table('sc_achivement')->insert($sc_achivement);        
    }

}
