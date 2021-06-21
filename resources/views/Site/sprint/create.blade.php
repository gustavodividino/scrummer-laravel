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
                <h1 class="entry-title"><span>Nova Sprint</span> </h1>
                <hr>
                <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('/sprint/save')}}" enctype="multipart/form-data">
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
                        <label class="control-label col-sm-3">Product Backlog <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <select class="selectpicker" multiple title="Escolha Products Backlogs" id="productsbacklog" name="productsbacklog[]" required>

                            </select>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="name" id="nameSprint" placeholder="Digite o nome da Sprint" value="" required>
                        </div>                                            
                    </div>                      

                    <div class="form-group">
                        <label class="control-label col-sm-3">Data Início*<span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-append date form_datetime">
                                <div class="input-group registration-date-time">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                    <input class="form-control" name="start_date" id="registration-date" type="date" required>
                                </div>
                            </div>
                        </div>
                    </div>                    

                    <div class="form-group">
                        <label class="control-label col-sm-3">Data Fim*<span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-append date form_datetime">
                                <div class="input-append date form_datetime">
                                    <div class="input-group registration-date-time">
                                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                        <input class="form-control" name="end_date" id="registration-date" type="date" required>
                                    </div>
                                </div>
                            </div>
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
@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>       
<link rel="stylesheet" href="<?php echo asset('css/project.css') ?>" type="text/css"/>       

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo asset('js/bootstrap-select.min.js') ?>"></script>
<!-- (Optional) Latest compiled and minified JavaScript translation files 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->
@endpush


@section('page-head')

@stop

@section('page-script')
<script>

$(document).ready(function () {
    $(document).on("change", "#projects", function () {
        var id = $("#projects option:selected").val();
        $.ajax({            
            url: "/productbacklog/getProducts/" + id,
            type: 'GET',
            success: function (data) {
                var selectbox = $('#productsbacklog');
                selectbox.find('option').remove();
                var options = '';
                for (var i = 0; i < data.length; i++) {
                    options += '<option value="' + data[i].id_productbacklog + '">' + data[i].name + '</option>';
                }
                $("#productsbacklog").append(options);
                $('#productsbacklog').selectpicker('refresh');

            }
        });
    });
});

</script>
@stop