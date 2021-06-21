<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
        <meta id="token" name="token" content="{{ csrf_token() }}">
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>

        <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>" type="text/css"/>     
        <link rel="stylesheet" href="<?php echo asset('css/top.css') ?>" type="text/css"/>

        <script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>
        <script src="<?php echo asset('js/bootstrap.js') ?>"></script>
        
        <title>.:: Scrummer - Gerenciamento de Projetos ::.</title>
        @yield('page-head')
    </head>
    <body> 

        @yield('page-script')

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container-fluid">
                <nav class="navbar navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div>
                                <center>
                                    <a href="/home"><img src="<?php echo asset('imagens/empresaLogo.png') ?>" height="40px" style="margin-top: 5px"/></a>
                                </center>
                            </div>


                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manutenção <span class="caret"></span></a>                
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::to('/avisos')}}">Avisos</a></li>
                                        <li><a href="{{URL::to('/user')}}">Usuários</a></li>
                                        <li><a href="{{URL::to('/achivement')}}">Conquistas</a></li>
                                        <li><a href="{{URL::to('/skill')}}">Habilidades</a></li>
                                    </ul>
                                </li>
                                  

                            </ul>
                            <ul class="nav navbar-nav pull-right">
                                <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{URL::to('/profile/' . Auth::user()->id_user)}}">Meu Perfil</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>                                
                                <li><img class="img-rounded" src="{{ URL('photos')}}/{{ Auth::user()->profile->photo }}" height="50px" /></li>                                
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>

        @yield('content')

        @stack('scripts')

    </body>
</html>