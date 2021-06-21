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
                <h1 class="entry-title"><span>Editar Product BackLog</span> </h1>
                <hr>
                <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('/productbacklog/update')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <label class="control-label col-sm-3">Projeto <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" disabled="true" class="form-control" name="idproject" id="project"  value="{{ $productbacklog->project->name }}" required>
                            <input type="hidden" class="form-control" name="id_project" id="id_project"  value="{{ $productbacklog->id_project }}">
                            <input type="hidden" class="form-control" name="idProduct" id="idProduct"  value="{{ $productbacklog->id_productbacklog }}">                                                               
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do Product BackLog" value="{{ $productbacklog->name }}" maxlength="20">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descrição <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control" rows="5" name="description" id="description" placeholder="Digite a descrição do Product Backlog" required>{{ $productbacklog->description }}</textarea>
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
                            <input type="text" class="form-control" name="pokerplainpoint" id="pokerplainpoint" placeholder="Digite o valor" value="{{ $productbacklog->pokerplainpoint }}">
                        </div>
                    </div>                    

                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">
                            <input name="Submit" type="submit" value="Alterar" class="btn btn-primary">
                            <button type="button" onclick="self.close()" class="btn btn-default">Fechar Janela</button>
                            @if($productbacklog->id_status != 6)
                                <input name="Cancel" type="button" onclick="cancelar()" value="Cancelar Product BackLog" class="btn btn-danger">
                            @endif
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


    function cancelar() {
        event.preventDefault();
        var r = confirm("Deseja cancelar o product backlog?");

        if (r == true) {
            var product = $("#idProduct").val();
            url: 
            window.location.href = "/productbacklog/cancel/" + product;

        }
    }


$(document).ready(function () {
        var id = $("#id_project").val();
        var product = $("#idProduct").val();
        $.ajax({            
            url: "/productbacklog/getProductTeam/" + id,
            type: 'GET',
            success: function (data) {
                var selectbox = $('#responsavel');
                selectbox.find('option').remove();
                var options = '';
                for (var i = 0; i < data.length; i++) {
                    if(data[i].id_productbacklog == null){
                        options += '<option value="' + data[i].id_user + '">' + data[i].name + '</option>';
                    }
                    else if (data[i].id_productbacklog == product){
                        options += '<option value="' + data[i].id_user + '"selected>' + data[i].name + " " + data[i].surname + '</option>';
                    }                    
                }
                $("#responsavel").append(options);
                $('#responsavel').selectpicker('refresh');

            }
        });
    });

</script>

@stop