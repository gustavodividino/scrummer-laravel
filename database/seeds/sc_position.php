<?php

use Illuminate\Database\Seeder;

class sc_position extends Seeder {

    public function run() {

        $sc_position = [
            0 => ['id_position' => '1', 'name' => 'Scrum Master', 'description' => 'É responsável pelos ritos ágeis e por acompanhar as entregas de software que formam o escopo do projeto no prazo custos e qualidade acordoados atuando junto aos desenvolvedores e demais papeis técnicos envolvidos'],
            1 => ['id_position' => '2', 'name' => 'Analista Funcional', 'description' => 'É responsável pelo detalhamento funcional da solução traduzindo a necessidade das áreas em requisitos funcionais e não funcionais junto com os AS em uma linguagem não técnica e criação das estórias. Tem interface direta com as áreas cliente para execução do seu papel'],
            2 => ['id_position' => '3', 'name' => 'Product Owner', 'description' => 'Responsável pela delimitação do escopo do projeto garantindo que as necessidades dos clientes sejam atendidas e priorizadas de forma a minimizar valor da entrega.'],
            3 => ['id_position' => '4', 'name' => 'Arquiteto de Sistemas', 'description' => 'É responsável pela solução técnica do sistema e de sua especialidade e especificação técnica detalhada dos requisitos do projeto. Deve ser capaz de avaliar o entregável do desenvolvedor.'],
            4 => ['id_position' => '5', 'name' => 'Arquiteto de Solução', 'description' => 'E responsável pela solução geral e direcionamento técnico do escopo do projeto alinhada aos direcionamentos da arquitetura corporativa'],
            5 => ['id_position' => '6', 'name' => 'Desenvolvedor', 'description' => 'Codifica e realiza testes unitários de acordo com especificações e detalhes técnicos definidos.'],
            6 => ['id_position' => '7', 'name' => 'Arquiteto de Testes', 'description' => 'Elabora cenários e casos de testes baseado nas especificações funcionais e critérios de aceita definidos.'],
            7 => ['id_position' => '8', 'name' => 'Analista de Testes', 'description' => 'Elabora os casos de teste executa cenários e casos de testes registrando resultados e evidencias nas respectivas ferramentas'],
            8 => ['id_position' => '9', 'name' => 'Gerente de Projeto', 'description' => 'Responsável por todos os aspectos necessários para que se viabilize a entrega do projeto destacando (não limitando a): custo prazo plano alocação recursos completude de escopo qualidade da entrega e da solução'],
            9 => ['id_position' => '10', 'name' => 'Analista de Projetos de Infra', 'description' => 'É responsável por coordenar a entrega de infraestrutura de acordo com os requisitos do projeto.'],
            10 => ['id_position' => '11', 'name' => 'Arquiteto de Solução de Infra', 'description' => 'É responsável por abrir e acompanhar os chamados e mudança abertos para execução do que está definido na solução de infraestrutura'],
            11 => ['id_position' => '12', 'name' => 'Analista de Implantação', 'description' => 'É responsável por abrir e acompanhar os chamados e mudança abertos para execução do que está definido na solução de infraestrutura.'],
            12 => ['id_position' => '13', 'name' => 'PMO TI', 'description' => 'É responsável pela iteração como o PMO Corporativo e pela gestão do portfólio dos projetos dentro de TI.'],
        ];
        DB::table('sc_position')->insert($sc_position);
    }

}
