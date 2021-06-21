<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>

            <link rel="stylesheet" href="<?php echo asset('css/login.css') ?>" type="text/css"/>
            <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css') ?>" type="text/css"/>
            <script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>
            <script src="<?php echo asset('js/bootstrap.min.js') ?>"></script>
            <title>.:: Scrummer - Gerenciamento de Projetos ::.</title>
            <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'/>	     
    </head>
    <body class="bodyLogin">
        <div class="middlePage">
            <div class="page-header">
                <h1 class="logo">Scrummer | <small style="color: white;">Bem vindo</small></h1>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Por favor, faça o login</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <center>
                            <img src="<?php echo asset('imagens/empresaLogo.png') ?>" height="140px"/><br/>
                            </center>
                        </div>
                        <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}"> 
                                {{ csrf_field() }}

                                <fieldset>
                                    <input id="email" type="email" placeholder="E-Mail" class="form-control input-md" name="email" value="{{ old('email') }}" required autofocus/>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <div class="spacing"></div>

                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><small> Lembrar</small>

                                        <input id="password" type="password" placeholder="Senha" class="form-control input-md" name="password" required/>

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif

                                        
                                        <button id="enter" name="enter" class="btn btn-info btn-sm pull-right">Logar</button>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>