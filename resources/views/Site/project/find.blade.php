@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row">
    	<section>
        <div class="col-md-6">
        	<br>
        	<br>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                <form class="form-horizontal" method="post" name="signup" id="signup" action="{{URL('project/result')}}" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <label class="control-label col-sm-3">#ID <span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="idProject" id="idProject" placeholder="Digite o ID do projeto" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Nome <span class="text-danger"></span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome do projeto" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">
                            <input name="Submit" type="Submit" value="Buscar" class="btn btn-primary">
                        </div>
                    </div>

                </form>
        </div>
       </section>
    </div>



</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo asset('css/project.css') ?>" type="text/css"/>


@endpush

@section('page-head')
<script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo asset('js/bootstrap-select.min.js') ?>"></script>
<!-- BootStrap -->

<!--  PAGINACAO de TABELAS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script type="text/javascript" language="javascript" src="<?php echo asset('js/jquery.dataTables.min.js') ?>"></script>


@stop

@section('page-script')



@stop