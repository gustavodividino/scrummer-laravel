@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div>
                    <div class="img-thumbnail">
                        <center>
                            <!-- SIDEBAR USERPIC -->
                            <div >
                                <img src="{{ URL('photos')}}/{{ $profile->photo }}" height="260px" width="220px" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC --> 
                            <div class="profile-usertitle-name">
                                {{$profile->user->name}} {{ $profile->user->surname }}
                            </div>
                    </div>
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">                
                        <div>
                            <div class="profile-usertitle-job">
                                <br>
                                <span class="label label-info" style="font-size: 11px">Level {{ $level->level }} </span> <span class="label label-warning" style="font-size: 11px;"> {{ $rank->description }} </span>
                            </div>
                            <div class="progress" title="XP Atual: {{ $profile->experience->points }} | Próximo level:  {{ $level->xp_end + 1 }}" style="width: 230px;"> 
                                <div class="progress-bar" data-toggle="tooltip" title="XP Atual: {{ $profile->experience->points }} | Próximo level:  {{ $level->xp_end  + 1}}" style="width:{{ $porcentagem }}%; background:#97c513;">
                                    <div class="progress-value" style="color: black">{{ $porcentagem }} %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">

                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    </center>
                </div>
                <!-- MODAL MENSAGEM -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Nova Mensagem</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Para:</label>
                                        <input disabled=true type="text" class="form-control" id="recipient-name" value="{{$profile->name}}">
                                        <input type="hidden" name="_idUser" value="{{ $profile->id_user }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Mensagem:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-primary">Enviar Mensagem</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MENSAGEM -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li {{{ (Request::is( '*/' . $profile->id_user) ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/')}}"><i class="glyphicon glyphicon-home"></i>Geral</a> </li>
                        <li {{{ (Request::is( '*/info') ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/info')}}"><i class="glyphicon glyphicon-info-sign"></i>Informações</a> </li>
                        <li {{{ (Request::is( '*/skill') ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/skill')}}"><i class="glyphicon glyphicon-list-alt"></i>Habilidades</a> </li>
                        <li {{{ (Request::is( '*/achivement') ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/achivement')}}"><i class="glyphicon glyphicon-list-alt"></i>Conquistas</a> </li>
                        <li {{{ (Request::is( '*/project') ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/project')}}"><i class="glyphicon glyphicon-flag"></i>Projetos</a> </li>
                        <li {{{ (Request::is( '*/allocation') ? 'class=active' : '') }}}> <a href="{{URL('profile/' . $profile->id_user . '/allocation')}}"><i class="glyphicon glyphicon-th-list"></i>Alocação</a> </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>

        <br>
        <br>

        <div class="container">
            @if(Request::is('*/' . $profile->id_user))
            <div div class="col-md-9">
                <!-- Principais ACHIVEMENTS -->
                <div class="row">
                    @if(sizeof($achiveDestaque) == 0)
                    <div class="col-md-4">
                        <img class="img-responsive fancybox thumbnail" alt="" src="http://placehold.it/80x80">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive fancybox thumbnail" alt="" src="http://placehold.it/80x80">
                    </div>
                    <div class="col-md-4">
                        <img class="img-responsive fancybox thumbnail" alt="" src="http://placehold.it/80x80">
                    </div>
                    @else
                        @foreach($achiveDestaque as $item)
                        <div class="col-md-4">
                            <div class="img-responsive fancybox thumbnail">
                                <center>
                                    <div class="info" >
                                        <img src="'../../../imagens/{{ $item->achivement->icon }}" height="80px;">
                                        <h2 class="title" style="font-size: 14px; margin-top: 5px">{{ $item->achivement->name }}</h2>
                                    </div>
                                </center>
                            </div>                        
                        </div>
                        @endforeach
                    @endif

                </div>
                <hr>


                <!-- FEED -->
                <div class="row">
                    <div class="col-md-8">
                        <h4>Últimas atividades</h4>
                        <div class="activity-feed" style="overflow:auto; height: 300px">
                            @foreach($profile->history as $item)
                            <div class="feed-item">
                                <div class="date">{{ Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</div>
                                <div class="text">{{$item->description}}</div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4>Principais status</h4>
                        <table class="table">
                            <tr>
                                <td>Scrum Points concluídos</td>
                                <td>{{ $totalProductsPoints->total }}</td>
                            </tr>
                            <tr>
                                <td>Projetos concluídos</td>
                                <td>{{ $qtdeprojetos }}</td>
                            </tr>
                            <tr>
                                <td>Habilidades</td>
                                <td>{{ $totalHabilidades->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @endif

            @if(Request::is('*/skill'))
            <div div class="col-md-9">                
                @if(Auth::user()->id_user == $profile->id_user)
                <div class="col-md-12">
                    <a href="{{URL('profile/' . $profile->id_user . '/skillproject/' )}}"> <span class="glyphicon glyphicon-plus">Gerenciar</span></a> 

                </div>                    
                @endif
                <div class="col-md-12">
                    <div class='list-group gallery' style="margin-left: 100px;">
                        @foreach($profile->skill() as $item)
                        <div class='col-sm-5 col-xs-8 col-md-3 col-lg-3'>
                            @if($item->skill->avatar != "")
                            <img class="img-responsive fancybox thumbnail" src="../../imagens/habilidades/{{ $item->skill->avatar }}" width="80" height="80" data-toggle="tooltip" title="{{$item->skill->name}}"/>
                            @else
                                <img class="img-responsive fancybox thumbnail" src="../../imagens/habilidades/skill_default.png" width="80" height="80" data-toggle="tooltip" title="{{$item->skill->name}}"/>
                            @endif
                        </div>
                        @endforeach

                    </div> <!-- list-group / end -->
                </div>
            </div>
            @endif

            @if(Request::is('*/info'))            
            <div div class="col-md-9">
                <div div class="col-md-10" style="margin-left: -90px;">
                    <div class="container">
                        <form class="form-horizontal" method="post" name="signup" id="save" action="{{URL('/profile/' . $profile->id_user . '/update')}}" enctype="multipart/form-data">                        
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <input type="hidden" name="idProfile" value="{{ $profile->id_user }}" />
                            <fieldset>
                                @if(Auth::user()->id_user == $profile->id_user)
                                <!-- File Button -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="filebutton">Foto</label>
                                    <div class="col-md-5">
                                        <input type="file" id="photox" name="photo" onchange="xpto()" accept="image/*"/>
                                        <input type="hidden" id="nameFile" name="namephoto"/>
                                    </div>
                                </div>
                                @endif
                                
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Aniversário</label>
                                    <div class="col-md-5">
                                        <div class="input-append date form_datetime">
                                            <div class="input-group registration-date-time">
                                                @if(Auth::user()->id_user == $profile->id_user)
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                                <input class="form-control" name="dtBirthDay" id="birth-date" type="date" value="{{$profile->birthday->format('Y-m-d')}}">
                                                @else
                                                <label for="textinput">{{$profile->birthday->format('d-m-Y')}}</label>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">

                                    <label class="col-md-2 control-label" for="textinput">Telefone</label>
                                    <div class="col-md-5">
                                        @if(Auth::user()->id_user == $profile->id_user)
                                        <input id="textinput" width="20px" name="txPhone" type="text" placeholder="Telefone" class="form-control" value="{{$profile->phone}}">
                                        @else
                                        <label for="textinput">{{$profile->phone}}</label>
                                        @endif
                                    </div>

                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Celular</label>
                                    <div class="col-md-5">
                                        @if(Auth::user()->id_user == $profile->id_user)
                                        <input id="textinput" name="txCelphone" type="text" placeholder="Celular" class="form-control input-md" value="{{$profile->cel}}">
                                        @else
                                        <label for="textinput">{{$profile->cel}}</label>
                                        @endif


                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Skype ID</label>
                                    <div class="col-md-5">
                                        @if(Auth::user()->id_user == $profile->id_user)
                                        <input id="textinput" name="txSkype" type="text" placeholder="Skype ID" class="form-control input-md" value='{{$profile->skype}}'>
                                        @else
                                        <label for="textinput">{{$profile->skype}}</label>
                                        @endif
                                    </div>
                                </div>


                                @if(Auth::user()->id_user == $profile->id_user)

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Facebook</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>
                                            <input id="textinput" name="txFacebook" type="text" placeholder="Facebook ID" class="form-control input-md" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Twitter</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>
                                            <input id="textinput" name="txTwitter" type="text" placeholder="Twitter ID" class="form-control input-md" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="textinput">Linkedin</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1">@</span>
                                            <input id="textinput" name="txLinkedin" type="text" placeholder="Linkedin ID" class="form-control input-md" value="">
                                        </div>
                                    </div>
                                </div>                                

                                @endif

                                @if(Auth::user()->id_user == $profile->id_user)
                                <!-- Button -->
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="singlebutton"></label>
                                    <div class="col-md-2">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                                @endif
                            </fieldset>
                        </form>

                    </div>
                </div>
                @if(Auth::user()->id_user != $profile->id_user)

                <div div class="col-md-2">

                    <div class='list-group gallery'>
                        <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
                            <a href="#">
                                <img class="img-responsive fancybox thumbnail" src="../../imagens/social/iconFacebook.png" width="50" height="50" />
                            </a>
                        </div>
                        <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
                            <a href="#">
                                <img class="img-responsive fancybox thumbnail" src="../../imagens/social/iconYammer.png" width="50" height="50" />
                            </a>
                        </div>
                        <div class='col-sm-12 col-xs-12 col-md-12 col-lg-12'>
                            <a href="#">
                                <img class="img-responsive fancybox thumbnail" src="../../imagens/social/iconLinkedin.png" width="50" height="50" />
                            </a>
                        </div>                       
                    </div> <!-- list-group / end -->

                </div>
                @endif
            </div>
            @endif

            @if(Request::is('*/achivement'))
            <div div class="col-md-9">

                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span>
                                    </span>Projetos</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                        <ul class="event-list">
                                            <input type="hidden" id="idProfile" name="idProfile" value="{{ $profile->id_profile }}" /> 
                                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                            @foreach($profile->achivements as $item)
                                                @if($item->achivement->categoria == "Project")
                                                    <li>
                                                      <time datetime="2016-07-20">
                                                          <span class="points"> </span>
                                                      </time>                                            
                                                        <div class="info" data-toggle="tooltip" title="Rank {{ $item->achivement->grade }}" style="background-image: url('../../imagens/{{ $item->achivement->icon }}'); background-repeat: no-repeat; background-position: left; background-size: 80px;">

                                                          @if(Auth::user()->id_user == $profile->id_user)
                                                          <input name="chkAchive" type="checkbox" onclick="validaAchive({{ $item->achivement->id_achivement }})" value="{{ $item->achivement->id_achivement }}" {{ ($item->highlight == 1 ? 'checked' : '') }}    >
                                                          @endif
                                                          <h2 class="title" style="margin-top: -20px">{{ $item->achivement->name }}</h2>
                                                          <p class="desc" style="margin-top: 1px">{{ $item->achivement->description }}</p>
                                                          <p class="date" style="margin-top: -5px">{{ $item->created_at->format('d/m/Y') }}</p>
                                                      </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span>
                                    </span>Cargos</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                        <ul class="event-list">
                                            @foreach($profile->achivements as $item)
                                                @if($item->achivement->categoria == "Position")
                                                <li>
                                                    <time datetime="2016-07-20">
                                                        <span class="points"> </span>
                                                    </time>
                                                        <div class="info" data-toggle="tooltip" title="Rank {{ $item->achivement->grade }}" style="background-image: url('../../imagens/{{ $item->achivement->icon }}'); background-repeat: no-repeat; background-position: left; background-size: 80px;">
                                                        @if(Auth::user()->id_user == $profile->id_user)
                                                        <input name="chkAchive" type="checkbox" onclick="validaAchive({{ $item->achivement->id_achivement }})" value="{{ $item->achivement->id_achivement }}" {{ ($item->highlight == 1 ? 'checked' : '') }}    >
                                                        @endif
                                                        <h2 class="title" style="margin-top: -20px">{{ $item->achivement->name }}</h2>
                                                          <p class="desc" style="margin-top: 1px">{{ $item->achivement->description }}</p>
                                                          <p class="date" style="margin-top: -5px">{{ $item->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span>
                                    </span>Product BackLog</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                        <ul class="event-list">
                                            @foreach($profile->achivements as $item)
                                                @if($item->achivement->categoria == "ProductBackLog")
                                                <li>
                                                    <time datetime="2016-07-20">
                                                        <span class="points"> </span>
                                                    </time>
                                                        <div class="info" data-toggle="tooltip" title="Rank {{ $item->achivement->grade }}" style="background-image: url('../../imagens/{{ $item->achivement->icon }}'); background-repeat: no-repeat; background-position: left; background-size: 80px;">
                                                        @if(Auth::user()->id_user == $profile->id_user)
                                                        <input name="chkAchive" type="checkbox" onclick="validaAchive({{ $item->achivement->id_achivement }})" value="{{ $item->achivement->id_achivement }}" {{ ($item->highlight == 1 ? 'checked' : '') }}    >
                                                        @endif
                                                        <h2 class="title" style="margin-top: -20px">{{ $item->achivement->name }}</h2>
                                                          <p class="desc" style="margin-top: 1px">{{ $item->achivement->description }}</p>
                                                          <p class="date" style="margin-top: -5px">{{ $item->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span>
                                    </span>Habilidades</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                        <ul class="event-list">
                                            @foreach($profile->achivements as $item)
                                                @if($item->achivement->categoria == "Skill")
                                                <li>
                                                    <time datetime="2016-07-20">
                                                        <span class="points"> </span>
                                                    </time>
                                                        <div class="info" data-toggle="tooltip" title="Rank {{ $item->achivement->grade }}" style="background-image: url('../../imagens/{{ $item->achivement->icon }}'); background-repeat: no-repeat; background-position: left; background-size: 80px;">
                                                        @if(Auth::user()->id_user == $profile->id_user)
                                                        <input name="chkAchive" type="checkbox" onclick="validaAchive({{ $item->achivement->id_achivement }})" value="{{ $item->achivement->id_achivement }}" {{ ($item->highlight == 1 ? 'checked' : '') }}    >
                                                        @endif
                                                        <h2 class="title" style="margin-top: -20px">{{ $item->achivement->name }}</h2>
                                                          <p class="desc" style="margin-top: 1px">{{ $item->achivement->description }}</p>
                                                          <p class="date" style="margin-top: -5px">{{ $item->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span>
                                    </span>Perfil</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                                        <ul class="event-list">
                                            @foreach($profile->achivements as $item)
                                                @if($item->achivement->categoria == "Profile")
                                                <li>
                                                    <time datetime="2016-07-20">
                                                        <span class="points"> </span>
                                                    </time>
                                                        <div class="info" data-toggle="tooltip" title="Rank {{ $item->achivement->grade }}" style="background-image: url('../../imagens/{{ $item->achivement->icon }}'); background-repeat: no-repeat; background-position: left; background-size: 80px;">

                                                        @if(Auth::user()->id_user == $profile->id_user)
                                                        <input name="chkAchive" type="checkbox" onclick="validaAchive({{ $item->achivement->id_achivement }})" value="{{ $item->achivement->id_achivement }}" {{ ($item->highlight == 1 ? 'checked' : '') }}    >
                                                        @endif
                                                        <h2 class="title" style="margin-top: -20px">{{ $item->achivement->name }}</h2>
                                                          <p class="desc" style="margin-top: 1px">{{ $item->achivement->description }}</p>
                                                          <p class="date" style="margin-top: -5px">{{ $item->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>                    

                </div>
            </div>
            @endif

            @if(Request::is('*/project'))
            <div div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Projeto</th>
                            <th>Posição</th>
                            <th>Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teamProject as $item)
                        <tr>
                            <td><a href="{{ URL('project/' . $item->project->id_project) }}">{{ $item->project->name }} </a></td>
                            <td>{{ $item->position->name }}</td>
                            <td>{{ $item->project->end_date->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            @if(Request::is('*/allocation'))
            <input type="hidden" id="iduser" name="iduser" value="{{ $profile->user->id_user }}"/>
            <div div class="col-md-9">
                <div id="chartdiv" style="height: 400px;"></div>
            </div>
            @endif



        </div>
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo asset('css/profile.css') ?>" type="text/css"/>
@endpush


@section('page-head')
<link rel="stylesheet" href="<?php echo asset('amcharts/plugins/export/export.css') ?>" type="text/css"/>
<script src="<?php echo asset('amcharts/amcharts.js') ?>"></script>
<script src="<?php echo asset('amcharts/serial.js') ?>"></script>
<script src="<?php echo asset('amcharts/gantt.js') ?>"></script>
<script src="<?php echo asset('amcharts/plugins/export/export.min.js') ?>"></script>
<script src="<?php echo asset('amcharts/lang/pt.js') ?>"></script>
<script src="<?php echo asset('amcharts/themes/light.js') ?>"></script>
<script src="<?php echo asset('amcharts/dataloader.min.js') ?>"></script>
@stop

@section('page-script')
<script>

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

    
    function validaAchive(id){

        var total = $("input[name='chkAchive']:checked").length;

        $("input[name='chkAchive']").change(function () {
            var maxAllowed = 3;
            var cnt = $("input[name='chkAchive']:checked").length;

            if (cnt > maxAllowed) {                
                $(this).prop("checked", "");
                alert('Somente é possível escolher ' + maxAllowed + ' Achivements para destaque!!');
            }
        });

        if(total > 3){
            console.log("limite");
        }else{
            console.log("Verifica o ID: " + id);


        var idProfile = $("#idProfile").val();
        $.post("/addachivehl",
            {
                    "_token": $('meta[name=token]').attr('content'),
                    "idAchive": id,
                    "idProfile": idProfile
            },function(data, status){  
            });

        }
       
        
    }


    function xpto(){
        var arquivo = $("#photox").val();
        

        var fileInput = $("#photox");
        var maxSize = fileInput.data('max-size');

        $("#size").val(Math.round(fileInput.get(0).files[0].size / 1024));
        
        
        var valNew = arquivo.split('\\');                                    

        $("#nameFile").val(valNew[valNew.length - 1]);


    }

    $(document).ready(function() {
        var id = $("#iduser").val();
        updateChart(id);
    });

    function updateChart(id){

        AmCharts.useUTC = true;
    var chart = AmCharts.makeChart("chartdiv", {
        "type": "gantt",
        "theme": "light",
        "marginRight": 70,
        "period": "DD",
        "language": "pt",
        "dataDateFormat": "DD-MM-YYYY",
        "columnWidth": 0.5,
        "valueAxis": {
            "type": "date"
        },
        "brightnessStep": 7,
        "graph": {
            "fillAlphas": 1,
            "lineAlpha": 1,
            "lineColor": "#fff",
            "fillAlphas": 0.85,
            "balloonText": "<b>[[task]]</b>:<br />[[open]] -- [[value]]"
        },
        "rotate": true,
        "categoryField": "category",
        "segmentsField": "segments",
        "colorField": "color",
        "startDateField": "start",
        "endDateField": "end",
        "dataLoader": {
                "url": "/alloc/" + id
            },
        "valueScrollbar": {
            "autoGridCount": true
        },
        "chartCursor": {
            "cursorColor": "#49728d",
            "valueBalloonsEnabled": false,
            "cursorAlpha": 0,
            "valueLineAlpha": 0.5,
            "valueLineBalloonEnabled": true,
            "valueLineEnabled": true,
            "zoomable": false,
            "valueZoomable": true
        },
        "export": {
            "enabled": true
        }
    });
    }

    
    
</script>

@stop