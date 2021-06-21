@include('site.template.template', compact('user'))

@section('content')

<br>
<br>
<section class="main container">
    <div class="col-xs12 col-sm-4 col-md-4">

    </div>
</section>    
<section class="main container">
    <div class="col-xs12 col-sm-12 col-md-12">
        <div class="table-responsive">
            <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th>Avisos</th>
                </tr>
                <tr>
                    <td>! Sistema em Desenvolvimento !</td>
                </tr>
                </tr>
            </table>
        </div>                 
    </div>
    <hr>
    <div class="col-xs12 col-sm-3 col-md-3">
        <!-- Meus Projetos --> 
        <h4>Meus Projetos</h4>
        <div class="table-responsive" style="overflow:auto; height: 400px">
            <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th>#</th>
                    <th>Nome</th>
                </tr>
                
                    @foreach($projects as $item)
     <tr>
                        <td><a href="project/{{ $item->project->id_project }}">{{ $item->project->id_project }}</a></td>
                        <td>{{ $item->project->name }}</td>
                    </tr>
                @endforeach 

            </table>
        </div>
    </div>
    <div class="col-xs12 col-sm-5 col-md-5">
        <!-- Atividades --> 
        <h4>ProductsBackLogs em Aberto</h4>
        <div class="table-responsive" style="overflow:auto; height: 400px">
            <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th># Projeto</th>
                    <th>Nome</th>
                    <th>Inicio</th>
                    <th>Fim</th>
                </tr>
                 @foreach($alocacao as $item)
                    <tr>
                        <td><a href="{{URL('project/')}}/{{ $item->id_project }}" target="_blank">{{ $item->name }}</a></td>
                        <td>{{ $item->nameProduct }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                    </tr>           
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-xs12 col-sm-4 col-md-4">
        <!-- TOP 10 Maiores Projetos--> 
        <h4>Maiores Projetos Concluídos</h4>
        <div class="table-responsive" style="overflow:auto; height: 400px">
            <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th>Nome</th>
                    <th>Pontos</th>
                </tr>
                @foreach($topten as $item)
                    <tr>                    
                        <td><a href="{{URL('project/' . $item->id_project)}}" target="_blank">{{ $item->name }}</a></td>
                        <td><span class="label label-success">{{ $item->sum }}</span></td>
                    </tr>
                @endforeach                
            </table>
        </div>
    </div>			
</section>
