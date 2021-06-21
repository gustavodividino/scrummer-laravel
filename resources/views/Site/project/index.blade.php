@extends('site.template.template')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<section class="">
    <div class="container">
        <center class="title"><span>#{{$project->id_project}} - [ {{$project->name}} ]</span> 
            @if($project->id_status == 2)
            <span class="badge">Em Andamento</span> 
            @elseif($project->id_status == 3)
            <span class="badge">Concluído</span> 
            @endif
        </center>
        <center><h5><small class="">Início {{$project->start_date->format('d-m-Y')}} / Termino {{$project->end_date->format('d-m-Y')}}</small></h5></center>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            @if(Request::is('*/find'))            
            <li class=active> 
                <a href="{{URL('project/' . $project->id_project)}}">Resumo</a> 
            </li>
            @else
            <li {{{ (Request::is( '*/' . $project->id_project) ? 'class=active' : '') }}}> 
                <a href="{{URL('project/' . $project->id_project)}}">Resumo</a> 
            </li>
            @endif
            <li {{{ (Request::is( '*/edit') ? 'class=active' : '') }}}> 
                <a href="{{URL('project/' . $project->id_project . '/edit')}}">Editar</a> 
            </li>
            <li {{{ (Request::is( '*/taskboard') ? 'class=active' : '') }}}> 
                <a href="{{URL('project/' . $project->id_project . '/taskboard')}}">Task Board</a> 
            </li>
            <li {{{ (Request::is( '*/attach') ? 'class=active' : '') }}}> 
                <a href="{{URL('project/' . $project->id_project . '/attach')}}">Anexos</a> 
            </li>
            <li {{{ (Request::is( '*/daily') ? 'class=active' : '') }}}> 
                <a href="{{URL('project/' . $project->id_project . '/daily')}}">Daily Meeting</a> 
            </li>
            <li {{{ (Request::is( '*/status') ? 'class=active' : '') }}} style="navbar-right"> 
                <a href="{{URL('project/' . $project->id_project . '/status')}}"><span class="glyphicon glyphicon-cog"> </span></a> 
            </li>  
        </ul>
    </div>
</section>


<br>
<div class="container">
    <!-- RESUME - INICIO -->    
    @if(Request::is('*/' . $project->id_project) || Request::is('*/find*'))
    <section class="main container">
        <!-- MD é usado devido a ser notebook, a soma dos dois sempre tem que dar 12 -->
        <div class="col-xs12 col-sm-3 col-md-3">
            <!-- SPRINT -->
            <h4>Sprints</h4>
            <div class="table-responsive" style="overflow:auto; height: 100px">
                <table id="tableSprint" class="table table-hover table-condensed table-bordered">
                    <tr class="info">
                        <th>Nome</th>
                        <th>Período</th>
                        <th></th>
                    </tr>

                    @foreach($project->sprint as $item)

                    <tr class="warning">
                        <td id="idsprint"><span class="sprintlbl"><a href="{{URL('project/sprint/' .  $item->id_sprint )}}" target="_blank"><span id="sprintlbl">{!! $item->name !!}</span></a></span></td>
                        <td id="datesprint"><span class="sprintlbl">{{ $item->start_date->format('d/m/y') }} {{ $item->end_date->format('d/m/y') }}</span></td>
                        <td><a href="{{URL('#')}}"><span class="glyphicon glyphicon-eye-open" onclick="setDataSet({{ $item->id_sprint }}, '{{ $item->name }}')"></span></a></td>
                    </tr>

                    @endforeach

                </table>
            </div>
            <br>
            <br>

            <!-- Product Backlog -->
            <h4>Products Backlog</h4>
            <div class="table-responsive" style="overflow:auto; height: 300px">
                <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                    <tr class="info">
                        <th>Nome</th>
                        <th>Status</th>
                    </tr>
                    @foreach($project->productbacklog as $item)

                    <tr class="warning">
                        <td><span class="productbackloglbl"><a href="{{URL('project/productbacklog/' .  $item->id_productbacklog )}}" target="_blank">{!! $item->name !!}</a></span>  </td>
                        @if($item->id_status == 3)
                            <td><span class="glyphicon glyphicon-star"></span></td>
                        @elseif($item->id_status == 2)
                            <td><span class="glyphicon glyphicon-fire"></span></td>
                        @elseif($item->id_status == 6)
                            <td><span class="glyphicon glyphicon-ban-circle"></span></td>
                        @elseif($item->id_status == 8)
                            <td><span class="glyphicon glyphicon-ok"></span></td>
                        @else
                        <td><span class="glyphicon glyphicon-minus"></span></td>
                        @endif
                    </tr>

                    @endforeach

                </table>
            </div>
        </div>
        <div class="col-xs12 col-sm-5 col-md-6">
            <center>
                <h4 id="burndownLbl">Burn up</h4>
            </center>
            <div id="chartdiv"></div>
        </div>
        <div class="col-xs12 col-sm-4 col-md-3" style="overflow:auto; height: 520px">
            <h4>Team</h4>
            <ul class="list-group">
                @foreach($project->teamProject() as $itemP)
                <li class="list-group-item">
                    <div class="col-xs-12 col-sm-4" style="margin-left: -15px">
                        <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="50" height="50">
                    </div>
                    <div class="col-xs-12 col-sm-8" style="margin-left: -20px">
                        <span class="name">
                            <a href="{{URL('profile/' . $itemP->user->id_user)}}"  data-toggle="tooltip" title="{{$itemP->user->name}}  {{$itemP->user->surname}}" target="_blank" class="menuTeam" >
                                {{$itemP->user->name}} {{$itemP->user->surname}}</a>

                        </span><br/>                            
                        <span class="badge" style="font-size: 11px;">{{ $itemP->position->name }}</span>
                    </div>
                    <div class="clearfix"></div>
                </li>
                @endforeach                 

            </ul>
        </div>
    </section>  
    @endif
    <!--  FIM  -->  

    <!-- Status - INICIO -->   
    @if(Request::is('*/status'))
    <section class="main container">
        <div class="col-xs12 col-sm-6 col-md-6" style="overflow:auto; height: 300px">
            <table id="tableStatus" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th colspan="3" style="text-align: center;">Pendencias</th>
                </tr>
                <tr class="info">
                    <th style="text-align: center;">Item</th>
                    <th style="text-align: center;">Nome</th>
                    <th style="text-align: center;">Status</th>                     
                </tr>                                        
                @foreach($project->productbacklog as $item)
                <tr>
                    <td id="type">ProductBackLog</td>
                    <td>{{ $item->name }}</td>
                    @if($item->id_status == 8)
                        <td><span id="stsOK" class="glyphicon glyphicon-ok"></span></td>
                    @else
                        @if($item->id_status == 6)
                            <td><span id="stsOK" class="glyphicon glyphicon-ban-circle"></span></td>
                        @else
                            <td><span id="stsNOK" class="glyphicon glyphicon-remove"></span></td>
                        @endif
                    @endif
                </tr>
                @endforeach
                @foreach($project->sprint as $item)
                <tr>
                    <td id="type">Sprint</td>
                    <td>{{ $item->name }}</td>
                    @if($item->id_status == 5)
                        <td><span id="stsOK" class="glyphicon glyphicon-ok"></span></td>
                    @else
                        @if($item->id_status == 6)
                            <td><span id="stsOK" class="glyphicon glyphicon-ban-circle"></span></td>
                        @else
                         <td><span id="stsNOK" class="glyphicon glyphicon-remove"></span></td>
                        @endif
                    @endif                     
                </tr>
                @endforeach

            </table>
        </div>

        <br>
        <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('project/' . $project->id_project  . '/done')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="idProject" value="{{ $project->id_project }}" />
            <div class="col-xs12 col-sm-3 col-md-3">
                <div class="container">
                    <button id="btnConcluir" type="submit" class="btn btn-primary btn-lg btn3d"> Concluir</button>
                </div>
            </div>
        </form>

        <div class="col-xs12 col-sm-3 col-md-3">
            <div class="container">
                <button type="button" class="btn btn-danger btn-lg btn3d"> Cancelar Projeto</button>
            </div>
        </div>
    </section>    
    @endif


    <!-- EDIT - INICIO -->   
    @if(Request::is('*/edit'))
    <section class="main container">

        <!-- MD é usado devido a ser notebook, a soma dos dois sempre tem que dar 12 -->
        <div class="col-xs12 col-sm-7 col-md-8">
            <h4>Projeto</h4>
            <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('project/' . $project->id_project  . '/update')}}" enctype="multipart/form-data">
                <div class="table-responsive" style="overflow:auto; height: 170px">
                    <table id="tableProject" class="table table-hover table-condensed table-bordered">
                        <tr class="info">
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Início</th>
                            <th>Término</th>
                        </tr>
                        <tr>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" name="idProject" value="{{ $project->id_project }}" />
                            <td><input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do projeto" value="{{$project->name}}" required></td>
                            <td><textarea class="form-control" name="description" id="descricao" required>{{$project->description}}</textarea></td>
                            <td><input class="form-control" name="start_date" id="inicio" type="date" value="{{$project->start_date->format('Y-m-d')}}"required style="width: 150px"></td>
                            <td><input class="form-control" name="end_date" id="fim" type="date" value="{{$project->end_date->format('Y-m-d')}}" required style="width: 150px"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: right;"> <input name="Submit" type="submit" value="Salvar Alteração" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </div>
            </form>
            <h4>Sprints</h4>
            <div class="table-responsive" style="overflow:auto; height: 100px">
                <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                    <tr class="info">
                        <th>Nome</th>
                        <th>Início</th>
                        <th>Término</th>
                    </tr>
                    @foreach($project->sprint as $item)
                    <tr>
                        <td><a href="{{URL('sprint/' .  $item->id_sprint .'/edit' )}}" target="_blank" >{!! $item->name !!}</a></td>
                        <td>{!! $item->start_date->format('d-m-Y') !!}</td>
                        <td>{!! $item->end_date->format('d-m-Y') !!}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <h4>Product Backlog</h4>
            <div class="table-responsive" style="overflow:auto; height: 300px">
                <table id="tableBacklog" class="table table-hover table-condensed">
                    <tr class="info">
                        <th>#</th>
                        <th>Nome</th>
                        <th>Responsáveis</th>
                        <th>Pontos</th>
                        <th>Status</th>
                    </tr>

                    @foreach($project->productbacklog as $item)
                    <tr>
                        <td><a href="{{URL('/productbacklog/' .  $item->id_productbacklog . '/edit/' )}}" target="_blank">{!! $item->id_productbacklog !!}</a></td>
                        <td>{!! $item->name !!}</td>
                        <td>
                            @foreach($item->responsible as $itemP)
                            <a href="/profile/{{ $itemP->user->id_user }}" target="_blank"> <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="30" height="30" data-toggle="tooltip" title="{!! $itemP->user->name . ' ' . $itemP->user->surname !!}"> </a>
                            @endforeach 
                        </td>
                        <td>{!! $item->pokerplainpoint !!}</td>
                        <td>{!! $item->status->name !!}</td>
                        @endforeach
                </table>
            </div>
        </div>
        <div class="col-xs12 col-sm-5 col-md-4 h-scroll" style="overflow:auto; height: 700px">

            <h4>Team</h4><a href="{{URL('project/' .  $project->id_project . '/teamproject/' )}}"> Gerenciar Time </a> 
            <ul class="list-group">
                @foreach($project->teamProject() as $itemP)

                <li class="list-group-item">
                    <div class="col-xs-12 col-sm-4" style="margin-left: -15px">
                        <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="50" height="50">
                    </div>
                    <div class="col-xs-12 col-sm-8" style="margin-left: -25px">
                        <span class="name">                            <a href="{{URL('profile/' . $itemP->user->id_user)}}" data-toggle="tooltip" title="{{$itemP->user->name}}  {{$itemP->user->surname}}" target="_blank" class="menuTeam">
                                {{$itemP->user->name}} {{$itemP->user->surname}}</a></span><br/>                            
                        <span class="badge" style="font-size: 11px;">{{ $itemP->position->name }}</span>
                    </div>
                    <div class="clearfix"></div>
                </li>              

                @endforeach


            </ul>
        </div>
        <!-- Colunas ABAIXO -->
        <div class="row">
            <div class="cor col-md-3">
            </div>
            <div class="cor col-md-3">
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <!-- FIM Colunas ABAIXO -->
    </section>
    @endif
    <!--  FIM  -->  

    <!-- ATTACH - INICIO -->
    @if(Request::is('*/attach'))
    <section class="main container ">
        <div class="resultados">
            <a href="{{URL('project/' .  $project->id_project . '/upload/' )}}"> Adicionar Arquivo </a> 
            <br>
            <br>
            <div class="row">
                <table id="tableArtifacts" class="table table-hover table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th>Tamanho (Kbs)</th>
                            <th>Autor</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project->attach as $item)
                        <tr>
                            <td><a target="_blank" href="{{ URL('files')}}/{{ $item->filename }}">{{ $item->description }}</a></td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            @if(Auth::user()->id_user == $item->user->id_user)
                                <td><a href="/removeitem/{{ $item->id_attach }}"><span class="glyphicon glyphicon-trash"></span></a></td>
                            @else
                                <td><span></span></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endif
    <!--  FIM  --> 

    <!-- TASK - INICIO -->
    @if(Request::is('*/taskboard'))
    <section class="main container">
        <!-- MD é usado devido a ser notebook, a soma dos dois sempre tem que dar 12 -->
        <div class="col-xs12 col-sm-12 col-md-12">

            <div class="container-fluid">
                <div id="sortableKanbanBoards" class="row">

                    <div class="panel panel-primary kanban-col">
                        <div class="panel-heading">
                            TODO
                            <i class="fa fa-2x fa-plus-circle pull-right"></i>
                        </div>
                        <div class="panel-body">
                            <div id="TODO" class="kanban-centered">

                                @foreach($project->productbacklog as $item)

                                @if($item->id_status == 1)
                                <article class="kanban-entry grab" id="{{ $item->id_productbacklog }}" draggable="true">
                                    <div class="kanban-entry-inner">
                                        <div class="kanban-label" data-toggle="tooltip" title="{{ $item->description }}">
                                            <span class="badge">{{ $item->pokerplainpoint }} Pts</span>
                                            <span>{{ $item->name }}</span></h2>

                                        </div>
                                    </div>
                                    <div>
                                        @foreach($item->responsible as $itemP)
                                        <a href="/profile/{{ $itemP->user->id_user }}" target="_blank"> <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="30" height="30" data-toggle="tooltip" title="{!! $itemP->user->name . ' ' . $itemP->user->surname !!}"> </a>
                                        @endforeach
                                    </div>
                                </article>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary kanban-col">
                        <div class="panel-heading">
                            DOING
                            <i class="fa fa-2x fa-plus-circle pull-right"></i>
                        </div>
                        <div class="panel-body">
                            <div id="DOING" class="kanban-centered">

                                @foreach($project->productbacklog as $item)

                                @if($item->id_status == 2)
                                <article class="kanban-entry grab" id="{{ $item->id_productbacklog }}" draggable="true">
                                    <div class="kanban-entry-inner">
                                        <div class="kanban-label" data-toggle="tooltip" title="{{ $item->description }}">
                                            <span class="badge">{{ $item->pokerplainpoint }} Pts</span>
                                            <span>{{ $item->name }}</span></h2>

                                        </div>
                                    </div>
                                    <div>
                                        @foreach($item->responsible as $itemP)
                                        <a href="/profile/{{ $itemP->user->id_user }}" target="_blank"> <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="30" height="30" data-toggle="tooltip" title="{!! $itemP->user->name . ' ' . $itemP->user->surname !!}"> </a>
                                        @endforeach
                                    </div>                                    
                                </article>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary kanban-col">
                        <div class="panel-heading">
                            DONE
                            <i class="fa fa-2x fa-plus-circle pull-right"></i>
                        </div>
                        <div class="panel-body">
                            <div id="DONE" class="kanban-centered">

                                @foreach($project->productbacklog as $item)

                                @if($item->id_status == 3 || $item->id_status == 8)
                                <article class="kanban-entry" id="{{ $item->id_productbacklog }}" draggable="false">
                                    <div class="kanban-entry-inner">
                                        <div class="kanban-label" data-toggle="tooltip" title="{{ $item->description }}">
                                            <table class="table ">
                                                @if($scrumMaster->id_user == Auth::user()->id_user)
                                                    <tr>
                                                        <td><span>{{ $item->name }}</span></h2></td>
                                                        <td><span class="badge">{{ $item->pokerplainpoint }} Pts</span></td>
                                                        @if($item->id_status == 8)
                                                            <td>Aprovado</td>
                                                            <td><a><span class="glyphicon glyphicon-remove" title="Reprovar" onclick="reprovarDone({{ $item->id_productbacklog }})"></span></a></td>
                                                        @else
                                                            <td><a><span class="glyphicon glyphicon-ok" title="Aprovar" onclick="aprovarDone({{ $item->id_productbacklog }})"></span></a></td>
                                                            <td><a><span class="glyphicon glyphicon-remove" title="Reprovar" onclick="reprovarDone({{ $item->id_productbacklog }})"></span></a></td>
                                                        @endif                                                    
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td><span>{{ $item->name }}</span></h2></td>
                                                        <td><span class="badge">{{ $item->pokerplainpoint }} Pts</span></td>
                                                        @if($item->id_status == 8)
                                                            <td colspan="2">Aprovado</td>
                                                        @else
                                                            <td colspan="2">Ag. Aprovação</td>
                                                        @endif                                                    
                                                    </tr>                                                
                                                @endif
                                                
                                            </table>
                                        </div>                                        
                                    </div>
                                    <div>
                                        @foreach($item->responsible as $itemP)
                                        <a href="/profile/{{ $itemP->user->id_user }}" target="_blank"> <img src="{{ URL('photos')}}/{{ $itemP->user->profile->photo }}" class="img-thumbnail" width="30" height="30" data-toggle="tooltip" title="{!! $itemP->user->name . ' ' . $itemP->user->surname !!}"> </a>
                                        @endforeach
                                    </div>                                    
                                </article>
                                @endif
                                @endforeach                                

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Static Modal -->
            <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <i class="fa fa-refresh fa-5x fa-spin"></i>
                                <h4>Processando...</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    @endif
    <!--  FIM  --> 

    @if(Request::is('*/daily'))
    <section class="main container">
        <h5></h5>
        <div class="col-xs12 col-sm-12 col-md-12">
            <div id="calendar" data-provide="calendar">

            </div>
        </div>

        <div id="event-modal" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModal-label">Novo Daily Meeting</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('project/daily/save')}}" enctype="multipart/form-data">

                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <input type="hidden" class="form-control" name="idProject" id="idProject" value="{{ $project->id_project }}">

                            <div class="form-group">
                                <label class="control-label col-sm-3">Data <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-sm-9">
                                    <input type="text" class="form-control" name="date" id="date" value="" disabled="true">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-3">Descrição <span class="text-danger">*</span></label>
                                <div class="col-md-8 col-sm-9">
                                    <textarea class="form-control" rows="5" name="description" id="description" placeholder="Digite a descrição do DailyMeeting" required></textarea>
                                </div>
                            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
    @endif


</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo asset('css/project.css') ?>" type="text/css"/>


@endpush


@section('page-head')

<!-- JQUERY -->
<script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>



<!-- Grafico -->
<link rel="stylesheet" href="<?php echo asset('amcharts/plugins/export/export.css') ?>" type="text/css"/>
<script src="<?php echo asset('amcharts/amcharts.js') ?>"></script>
<script src="<?php echo asset('amcharts/serial.js') ?>"></script>
<script src="<?php echo asset('amcharts/plugins/export/export.min.js') ?>"></script>
<script src="<?php echo asset('amcharts/lang/pt.js') ?>"></script>
<script src="<?php echo asset('amcharts/themes/light.js') ?>"></script>
<script src="<?php echo asset('amcharts/plugins/export/export.min.js') ?>"></script>
<script src="<?php echo asset('amcharts/dataloader.min.js') ?>"></script>


<link rel="stylesheet" type="text/css" href="<?php echo asset('css/bootstrap-year-calendar.css') ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<!--  PAGINACAO de TABELAS -->

<script type="text/javascript" language="javascript" src="<?php echo asset('js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo asset('js/bootstrap-year-calendar.js') ?>"></script>
<script type="text/javascript" class="init">



$(document).ready(function () {
$('#tableArtifacts').DataTable();
});

</script>

<!-- Styles -->
<style>
    #chartdiv {
        width	: 100%;
        height	: 500px;
    }
</style>


@stop

@section('page-script')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });


    /* DAILY */
    function editEvent(event) {
        var date = new Date(event.startDate);
        var nDate = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear()

        $('#event-modal input[name="event-index"]').val(event ? event.id : '');
        $('#event-modal input[name="date"]').val(event ? nDate : '');
        $('#event-modal textarea[name="description"]').val(event ? '' : '');


        $('#event-modal').modal();

    }

    function deleteEvent(event) {
        var dataSource = $('#calendar').data('calendar').getDataSource();

        for(var i in dataSource) {
            if(dataSource[i].id == event.id) {
                dataSource.splice(i, 1);
                break;
            }
        }
        
        $('#calendar').data('calendar').setDataSource(dataSource);
    }

    function saveEvent() {

    var event = {
        id: $('#event-modal input[name="event-index"]').val(),
        name: $('#event-modal input[name="event-name"]').val(),
        location: $('#event-modal input[name="event-location"]').val(),
        startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
        endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
    }
    
    var dataSource = $('#calendar').data('calendar').getDataSource();

    if(event.id) {
        for(var i in dataSource) {
            if(dataSource[i].id == event.id) {
                dataSource[i].name = event.name;
                dataSource[i].location = event.location;
                dataSource[i].startDate = event.startDate;
                dataSource[i].endDate = event.endDate;
            }
        }
    }
    else
    {
        var newId = 0;
        for(var i in dataSource) {
            if(dataSource[i].id > newId) {
                newId = dataSource[i].id;
            }
        }
        
        newId++;
        event.id = newId;
    
        dataSource.push(event);
    }
    
    $('#calendar').data('calendar').setDataSource(dataSource);
    $('#event-modal').modal('hide');
}



    /* FIM DAILY */




    /* KANBAN */

    function validaStatus() {
        var tabelaStatus = $('#tableStatus');
        var botaoConcluir = $('#btnConcluir');
        var linhas = $("tbody > tr");
        var item;
        linhas.each(function() {
            $linha = $(this).find("#type");
            item = $(this).find("#stsOK");
            if ($linha.text() != "") {
                console.log(item.attr("id"));
                if (typeof(item.attr("id")) === "undefined") {
                    botaoConcluir.attr("disabled", "true");
                    botaoConcluir.attr("title", "Existem itens em pendentes");
                }
            }
        });
    }


    function aprovarDone(id){

        $.post("/validarTask", {
                "_token": $('meta[name=token]').attr('content'),
                "idProduct": id,
                "status": "apr"
            },
            function(data, status) {
                location.reload();
            });
    }

    function reprovarDone(id){

        $.post("/validarTask", {
                "_token": $('meta[name=token]').attr('content'),
                "idProduct": id,
                "status": "rep"
            },
            function(data, status) {
                location.reload();
            });
    }



    $(function() {

        validaStatus();
        var kanbanCol = $('.panel-body');
        kanbanCol.css('max-height', (window.innerHeight - 150) + 'px');
        var kanbanColCount = parseInt(kanbanCol.length);
        $('.container-fluid').css('min-width', (kanbanColCount * 350) + 'px');
        draggableInit();
        $('.panel-heading').click(function() {
            var $panelBody = $(this).parent().children('.panel-body');
            $panelBody.slideToggle();
        });




    var currentYear = new Date().getFullYear();

    $('#calendar').calendar({ 
        enableContextMenu: true,
        enableRangeSelection: true,
        contextMenuItems:[
            {
                text: 'Update',
                click: editEvent
            },
            {
                text: 'Delete',
                click: deleteEvent
            }
        ],
        selectRange: function(e) {
            editEvent({ startDate: e.startDate, endDate: e.endDate });
        },
        mouseOnDay: function(e) {
            if(e.events.length > 0) {
                var content = '';
                
                for(var i in e.events) {
                    content += '<div class="event-tooltip-content">'
                                    + '<div class="event-name" style="color:' + e.events[i].color + '">' + e.events[i].name + '</div>'
                                    + '<div class="event-location">' + e.events[i].location + '</div>'
                                + '</div>';
                }
            
                $(e.element).popover({ 
                    trigger: 'manual',
                    container: 'body',
                    html:true,
                    content: content
                });
                
                $(e.element).popover('show');
            }
        },
        mouseOutDay: function(e) {
            if(e.events.length > 0) {
                $(e.element).popover('hide');
            }
        },
        dayContextMenu: function(e) {
            $(e.element).popover('hide');
        },
        dataSource: [
            {
                id: 0,
                name: 'Google I/O',
                location: 'San Francisco, CA',
                startDate: new Date(currentYear, 4, 28),
                endDate: new Date(currentYear, 4, 28)
            },
        ]
    });
    
    $('#save-event').click(function() {
        saveEvent();
    });


































    });

    function draggableInit() {
        var sourceId;
        $('[draggable=true]').bind('dragstart', function(event) {
            sourceId = $(this).parent().attr('id');
            event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
        });
        $('.panel-body').bind('dragover', function(event) {
            event.preventDefault();
        });
        $('.panel-body').bind('drop', function(event) {
            var children = $(this).children();
            var targetId = children.attr('id');
            if (sourceId != targetId) {
                var elementId = event.originalEvent.dataTransfer.getData("text/plain");

                //$('#processing-modal').modal('toggle'); //before post


                // Post data 
                setTimeout(function() {
                    var element = document.getElementById(elementId);
                    var idProductBackLog = elementId;
                    children.prepend(element);
                    //$('#processing-modal').modal('hide'); // after post

                    var updateTask = targetId + "-" + idProductBackLog;
                    $.post("/ajax", {
                            "_token": $('meta[name=token]').attr('content'),
                            "idProduct": idProductBackLog,
                            "etapa": targetId,
                            "source": sourceId
                        },
                        function(data, status) {
                            if(targetId == "DONE"){
                                location.reload();                                
                            }
                        });
                }, 400);
            }

            event.preventDefault();
        });
    }




    /* FIM KANBAN */




    function setDataSet(id, name) {
        $("#burndownLbl").text("BurnUp - " + name);

        var chart = AmCharts.makeChart("chartdiv", {
                "type": "serial",
                "balloonDateFormat": "DD-MMM-YYYY",
                "categoryField": "category",
                "columnSpacing": 3,
                "dataDateFormat": "",
                "sequencedAnimation": false,
                "startEffect": "easeOutSine",
                "accessible": false,
                "accessibleTitle": "",
                "color": "#888888",
                "fontFamily": "Arial, Sans-serif",
                "fontSize": 13,
                "path": "http://www.amcharts.com/lib/3/",
                "theme": "light",
                "export": {
                    "enabled": true
                },
                "categoryAxis": {
                    "gridPosition": "start",
                    "title": "",
                    "titleFontSize": 3,
                    "labelRotation": 45
                },
                "chartCursor": {
                    "enabled": true,
                    "animationDuration": 0.07,
                    "bulletsEnabled": true,
                    "bulletSize": 6,
                    "categoryBalloonColor": "#69BC69",
                    "cursorColor": "#888888",
                    "cursorPosition": "mouse"
                },
                "chartScrollbar": {
                    "enabled": true,
                    "backgroundAlpha": 0.11,
                    "dragIconHeight": 15,
                    "dragIconWidth": 26,
                    "graphFillColor": "#E7E7E7",
                    "graphLineColor": "#E7E7E7",
                    "gridColor": "#BBBBBB",
                    "scrollbarHeight": 4,
                    "scrollDuration": 2,
                    "selectedGraphFillColor": "#E7E7E7",
                    "selectedGraphLineColor": "#E7E7E7"
                },
                "trendLines": [],
                "graphs": [{
                        "balloonColor": "#9CCC65",
                        "balloonText": "Sprint Point Done: [[value]]",
                        "bullet": "round",
                        "bulletAlpha": 0.37,
                        "bulletBorderColor": "#0000FF",
                        "bulletColor": "#3CB9D8",
                        "columnWidth": 0.16,
                        "fillAlphas": 0.7,
                        "id": "AmGraph-1",
                        "lineAlpha": 0,
                        "lineThickness": 3,
                        "markerType": "circle",
                        "showAllValueLabels": true,
                        "showBulletsAt": "open",
                        "title": "",
                        "valueField": "Points"
                    },
                    {
                        "balloonText": "Sprint Point Total: [[value]]",
                        "bullet": "triangleRight",
                        "id": "AmGraph-2",
                        "title": "graph 2",
                        "type": "step",
                        "valueField": "ScrumPoints"
                    }
                ],
                "guides": [],
                "valueAxes": [{
                    "id": "ValueAxis-1",
                    "minimum": 0,
                    "synchronizationMultiplier": 0,
                    "treatZeroAs": 1,
                    "unit": "",
                    "usePrefixes": true,
                    "axisAlpha": 0.38,
                    "axisColor": "#888888",
                    "axisThickness": 3,
                    "boldLabels": true,
                    "color": "#3CB9D8",
                    "fontSize": 10,
                    "showFirstLabel": false,
                    "title": "Pontuação"
                }],
                "allLabels": [],
                "balloon": {},
                "titles": [],
                "dataLoader": {
                    "url": "/burnup/" + id
                }
            }



        );

    }

    function zoomChart() {
        chart.zoomToDates(new Date(2017, 09, 10), new Date(2017, 09, 13));
    }
</script>

@stop