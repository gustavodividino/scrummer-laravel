@extends('site.template.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section>
                    <h1 class="entry-title"><span>Novo UsuárioX</span> </h1>
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
                                <small> Seu E-mail será usado para garantir a segurança de sua conta, autorização e recuperação de acesso. </small> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3">Senha <span class="text-danger">*</span></label>
                            <div class="col-md-5 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha(5-15 caracteres)" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Confirme Senha <span class="text-danger">*</span></label>
                            <div class="col-md-5 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirme sua senha" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nome Completo <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input type="text" class="form-control" name="mem_name" id="mem_name" placeholder="Digite seu nome completo" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <input name="Submit" type="submit" value="Registrar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection