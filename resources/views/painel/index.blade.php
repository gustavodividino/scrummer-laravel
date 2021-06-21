@include('site.template.template', compact('user'))

@section('content')

<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="">
                                </span>Usuários</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/user/create')}}">Adicionar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/user')}}">Lista</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/')}}">Exportar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/')}}">Importar</a>
                                    </td>
                                </tr>                                
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="">
                                </span>Scrummer</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="">XPTO</a> <span class="{{URL::to('painel/scrummer')}}"></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="">
                                </span>Projetos</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/project')}}">Lista</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="">
                                </span>Sprints</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/sprint')}}">Lista</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="">
                                </span>Product Backlog</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/pbacklog')}}">Lista</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="">
                                </span>Project Team</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/pteam')}}">Lista</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><span class="">
                                </span>Conquistas</a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/achivement/create')}}">Adicionar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/achivement')}}">Lista</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><span class="">
                                </span>Dashboard</a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class=""></span><a href="{{URL::to('painel/projects')}}">Projetos</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>                


            </div>
        </div>
        <div class="col-md-9">
            <br>
            <br>
            @if(Request::is('painel'))
            <br>
            <br>
            <center>
                <img src="<?php echo asset('imagens/manutencaoImg.jpg') ?>" height="500px" />            
            </center>
            @endif

            @if(Request::is('painel/scrummer'))
            <h1>Scrummer</h1>
            @endif

            @if(Request::is('painel/project'))
            <h4 class="entry-title"><span>Projetos Registrados</span> </h4>
            <div class="row">
                <table id="tableUsers" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $projects as $project)
                        <tr>
                            <td><a target="_blank" href="/project/{{$project->id_project}}">{{$project->id_project}}</a></td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            <td>{{$project->cd_status}}</td>
                            <td>
                                <a href="user/edit/1"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-repeat"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span></a>
                            </td>
                            @empty
                    <h1>Nenhum Registro</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('painel/sprint'))
            <h4 class="entry-title"><span>Sprints Registrados</span> </h4>
            <div class="row">
                <table id="tableUsers" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="user/edit/1"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-repeat"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('painel/pbacklog'))
            <h4 class="entry-title"><span>Product Backlog Registrados</span> </h4>
            <div class="row">
                <table id="tableUsers" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="user/edit/1"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-repeat"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('painel/pteam'))
            <h4 class="entry-title"><span>Project Team Registrados</span> </h4>
            <div class="row">
                <table id="tableUsers" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project ID</th>
                            <th>Members</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="user/edit/1"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-repeat"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('painel/user'))
            <h4 class="entry-title"><span>Usuários Registrados</span> </h4>
            <div class="row">
                <table id="tableUsers" class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-Mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse( $users as $user)
                        <tr>
                            <td><a target="_blank" href="/profile/{{$user->id_user}}">{{$user->id_user}}</a></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="user/edit/{{$user->id_user}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-repeat"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-lock"></span></a>
                            </td>

                        </tr>
                        @empty
                    <h1>Nenhum Registro</h1>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('painel/user/create'))

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <h4 class="entry-title"><span>Novo Usuário</span> </h4>
                            <hr>
                            <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('painel/user/store')}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Digite seu e-mail" value="">
                                        </div>
                                        <small> Uma senha temporária será enviada para este e-mail. </small> </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nome Completo <span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="text" class="form-control" name="mem_name" id="mem_name" placeholder="Digite seu nome completo" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-10">
                                        <input name="Submit" type="submit" value="Criar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>            
            @endif


            @if(Request::is('painel/achivement'))
            <h1>Achivements</h1>
            @endif

            @if(Request::is('painel/achivement/create'))

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <section>
                            <h4 class="entry-title"><span>Nova Conquista</span> </h4>
                            <hr>
                            <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('painel/user/store')}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />


                                <div class="form-group">
                                    <label class="control-label col-sm-3">Nome<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome da conquista" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Descrição<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Digite a descrição da conquista" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Tipo<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <select class="selectpicker" data-style="btn-primary">
                                            <option>Projeto</option>
                                            <option>Sprint</option>
                                            <option>Perfil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Variável<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <select class="selectpicker" data-style="btn-primary">
                                            <option>Quantidade de Projetos</option>
                                            <option>Quantidade de Sprints</option>
                                            <option>Quantidade de Product Backlog</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Condição<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <select class="selectpicker" data-style="btn-primary">
                                            <option>>=</option>
                                            <option><=</option>
                                            <option>=</option>
                                        </select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-8 col-sm-9">
                                        <select class="selectpicker" data-style="btn-primary">
                                            <option>Disable</option>
                                            <option>Enabled</option>
                                        </select>
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-10">
                                        <input name="Submit" type="submit" value="Criar" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>            

            @endif



            @if(Request::is('painel/dashboard'))
            <h1>Dashboards</h1>
            @endif 
        </div>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>       
<link rel="stylesheet" href="<?php echo asset('css/index.css') ?>" type="text/css"/> 
<link rel="stylesheet" href="<?php echo asset('css/painel.css') ?>" type="text/css"/> 
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css" type="text/css"/>


@endpush

