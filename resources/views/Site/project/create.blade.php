@extends('site.template.template', compact('user'))

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


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <section>
                <h1 class="entry-title"><span>Novo Projeto</span> </h1>
                <hr>
                <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('project/save')}}" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do projeto" value="" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descrição <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control" rows="5" name="description" id="descricao" placeholder="Digite a descrição do projeto" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Product Owner <span class="text-danger"></span>*</label>
                        <div class="col-md-8 col-sm-9">                          
                            <input type="text" disabled="true" class="form-control" name="scrummaster" id="scrummaster" placeholder="Digite o nome do Scrum Master" value="{{ Auth::user()->name }}" required> 
                            <input type="hidden" name="idproductowner" id="idproductowner" value="{{ Auth::user()->id_user }}">
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label class="control-label col-sm-3">Previsão Inicio <span class="text-danger"></span>*</label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-append date form_datetime">
                                <div class="input-append date form_datetime">
                                    <div class="input-group registration-date-time">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                        <input class="form-control" name="start_date" id="inicio" type="date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Previsão Fim <span class="text-danger"></span>*</label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-append date form_datetime">
                                <div class="input-append date form_datetime">
                                    <div class="input-group registration-date-time">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                        <input class="form-control" name="end_date" id="end_date" type="date" required>
                                    </div>
                                </div>
                            </div>
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

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>       
<link rel="stylesheet" href="<?php echo asset('css/project.css') ?>" type="text/css"/>       

@endpush


@section('page-head')

@stop

@section('page-script')


@stop