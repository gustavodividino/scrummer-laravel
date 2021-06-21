@extends('site.template.template')

@section('content')
<br>
<div class="col-xs12 col-sm-12 col-md-12">
	
		<h1>Scrum</h1>
		<p class="text-justify">
	Scrum é uma metodologia ágil para gestão e planejamento de projetos de software.

	No Scrum, os projetos são dividos em ciclos (tipicamente mensais) chamados de Sprints. O Sprint representa um Time Box dentro do qual um conjunto de atividades deve ser executado. Metodologias ágeis de desenvolvimento de software são iterativas, ou seja, o trabalho é dividido em iterações, que são chamadas de Sprints no caso do Scrum.

	As funcionalidades a serem implementadas em um projeto são mantidas em uma lista que é conhecida como Product Backlog. No início de cada Sprint, faz-se um Sprint Planning Meeting, ou seja, uma reunião de planejamento na qual o Product Owner prioriza os itens do Product Backlog e a equipe seleciona as atividades que ela será capaz de implementar durante o Sprint que se inicia. As tarefas alocadas em um Sprint são transferidas do Product Backlog para o Sprint Backlog.

	A cada dia de uma Sprint, a equipe faz uma breve reunião (normalmente de manhã), chamada Daily Scrum. O objetivo é disseminar conhecimento sobre o que foi feito no dia anterior, identificar impedimentos e priorizar o trabalho do dia que se inicia.

	Ao final de um Sprint, a equipe apresenta as funcionalidades implementadas em uma Sprint Review Meeting. Finalmente, faz-se uma Sprint Retrospective e a equipe parte para o planejamento do próximo Sprint. Assim reinicia-se o ciclo. Veja a ilustração abaixo:
</p>
	<center>
	<img src="http://www.desenvolvimentoagil.com.br/images/scrum/ciclo_scrum.gif">
	</center>
		<h1>PRODUCT OWNER</h1>
		<p class="text-justify">
O Product Owner é a pessoa que define os itens que compõem o Product Backlog e os prioriza nas Sprint Planning Meetings.

O Scrum Team olha para o Product Backlog priorizado, seleciona os itens mais prioritários e se compromete a entregá-los ao final de um Sprint (iteração). Estes itens transformam-se no Sprint Backlog.

A equipe se compromete a executar um conjunto de atividades no Sprint e o Product Owner se compromete a não trazer novos requisitos para a equipe durante o Sprint. Requisitos podem mudar (e mudanças são encorajadas), mas apenas fora do Sprint. Uma vez que a equipe comece a trabalhar em um Sprint, ela permanece concentrada no objetivo traçado para o Sprint e novos requisitos não são aceitos.

		</p>



		<h1>SCRUM MASTER</h1>
		<p class="text-justify">

O Scrum Master procura assegurar que a equipe respeite e siga os valores e as práticas do Scrum. Ele também protege a equipe assegurando que ela não se comprometa excessivamente com relação àquilo que é capaz de realizar durante um Sprint.

O Scrum Master atua como facilitador do Daily Scrum e torna-se responsável por remover quaisquer obstáculos que sejam levantados pela equipe durante essas reuniões.

O papel de Scrum Master é tipicamente exercido por um gerente de projeto ou um líder técnico, mas em princípio pode ser qualquer pessoa da equipe.

		</p>


		<h1>PRODUCT BACKLOG</h1>
		<p class="text-justify">
O Product Backlog é uma lista contendo todas as funcionalidades desejadas para um produto. O conteúdo desta lista é definido pelo Product Owner. O Product Backlog não precisa estar completo no início de um projeto. Pode-se começar com tudo aquilo que é mais óbvio em um primeiro momento. Com o tempo, o Product Backlog cresce e muda à medida que se aprende mais sobre o produto e seus usuários.

Durante o Sprint Planning Meeting, o Product Owner prioriza os itens do Product Backlog e os descreve para a equipe. A equipe então determina que itens será capaz de completar durante a Sprint que está por começar. Tais itens são, então, transferidos do Product Backlog para o Sprint Backlog. Ao fazer isso, a equipe quebra cada item do Product Backlog em uma ou mais tarefas do Sprint Backlog. Isso ajuda a dividir o trabalho entre os membros da equipe. Podem fazer parte do Product Backlog tarefas técnicas ou atividades diretamente relacionadas às funcionalidades solicitadas.			
		</p>


		<h1>SPRINT</h1>
		<p class="text-justify">
O Sprint é uma lista de tarefas que o Scrum Team se compromete a fazer em um Sprint. Os itens do Sprint são extraídos do Product Backlog, pela equipe, com base nas prioridades definidas pelo Product Owner e a percepção da equipe sobre o tempo que será necessário para completar as várias funcionalidades.

Cabe a equipe determinar a quantidade de itens do Product Backlog que serão trazidos para o Sprint, já que é ela quem irá se comprometer a implementá-los.

Durante um Sprint, o Scrum Master mantém o Sprint Backlog atualizando-o para refletir que tarefas são completadas e quanto tempo a equipe acredita que será necessário para completar aquelas que ainda não estão prontas. A estimativa do trabalho que ainda resta a ser feito no Sprint é calculada diariamente e colocada em um gráfico, resultando em um Sprint Burndown Chart.

		</p>

		<h1>DAILY SCRUM</h1>
		<p class="text-justify">
A cada dia do Sprint a equipe faz uma reunião diária, chamada Daily Scrum. Ela tem como objetivo disseminar conhecimento sobre o que foi feito no dia anterior, identificar impedimentos e priorizar o trabalho a ser realizado no dia que se inicia.

Os Daily Scrums normalmente são realizadas no mesmo lugar, na mesma hora do dia. Idealmente são realizados na parte da manhã, para ajudar a estabelecer as prioridades do novo dia de trabalho.

Todos os membros da equipe devem participar do Daily Scrum. Outras pessoas também podem estar presentes, mas só poderão escutar. Isso torna os Daily Scrums uma excelente forma para uma equipe disseminar informações sobre o estado do projeto.

O Daily Scrum não deve ser usado como uma reunião para resolução de problemas. Questões levantadas devem ser levadas para fora da reunião e normalmente tratadas por um grupo menor de pessoas que tenham a ver diretamente com o problema ou possam contribuir para solucioná-lo. Durante o Daily Scrum, cada membro da equipe provê respostas para cada uma destas três perguntas:

O que você fez ontem?
O que você fará hoje?
Há algum impedimento no seu caminho?
Concentrando-se no que cada pessoa fez ontem e no que ela irá fazer hoje, a equipe ganha uma excelente compreensão sobre que trabalho foi feito e que trabalho ainda precisa ser feito. O Daily Scrum não é uma reunião de status report na qual um chefe fica coletando informações sobre quem está atrasado. Ao invés disso, é uma reunião na qual membros da equipe assumem compromissos perante os demais.

Os impedimentos identificados no Daily Scrum devem ser tratados pelo Scrum Master o mais rapidamente possível.


		</p>




	<h5 style="text-align: right;">fonte: http://www.desenvolvimentoagil.com.br</h5>
</div>

@endsection


@push('scripts')

@endpush



@section('page-head')

@stop



@section('page-script')

@stop