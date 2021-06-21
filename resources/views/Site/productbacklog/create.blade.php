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
                <h1 class="entry-title"><span>Novo Product BackLog</span> </h1>
                <hr>
                <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('/productbacklog/save')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <label class="control-label col-sm-3">Projeto <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <select class="selectpicker" title="Escolha o Projeto" id="projects" name="id_project" required>
                                
                                @foreach($project as $item)
                                    <option value="{!! $item->id_project !!}">{!! $item->name !!}</option>

                                @endforeach
                                
                                
                            </select>                            
                        </div>                                            
                    </div>                    

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do Product BackLog" value="" maxlength="20">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descrição <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control" rows="5" name="description" id="description" placeholder="Digite a descrição do Product Backlog" required></textarea>
                        </div>
                    </div>                    
                    
                    
                    <div class="form-group">
                        <label class="control-label col-sm-3">Responsáveis <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <select class="selectpicker" multiple title="Escolha os Responsáveis" id="responsavel" name="responsavel[]" required>

                            </select>
                        </div>
                    </div>                      
                    <div class="form-group">
                        <label class="control-label col-sm-3">Poker Plan Points <span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="pokerplainpoint" id="pokerplainpoint" placeholder="Digite o valor" value="">
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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo asset('js/bootstrap-select.min.js') ?>"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>
@endpush


@section('page-head')

@stop

@section('page-script')
<script>    
$(document).ready(function () {
    $(document).on("change", "#projects", function () {
            var id = $("#projects option:selected").val();
        $.ajax({            
            url: "/project/" + id + "/getTeamProject/",
            type: 'GET',
            success: function (data) {
                var selectbox = $('#responsavel');
                selectbox.find('option').remove();
                var options = '';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id_user + '">' + data[i].user.name + " " + data[i].user.surname + '</option>';
                }
                $("#responsavel").append(options);
                $('#responsavel').selectpicker('refresh');

            }
        });
    });
});
</script>
@stop