@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row">
    	<section>
        <div class="col-md-12">
        	<br>
        	<br>
		        <table id="projectsList" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
	                    <th>#</th>
	                    <th>Name</th>
	                    <th>Descrição</th>
	                    <th>Status</th>
	                </tr>
	            </thead>
				<tbody>
                       @foreach($project as $item)
                        <tr>
                            <td><a href="{{URL('project/' . $item->id_project)}}">{{ $item->id_project }}</a> </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->status->name }}</td>
                        </tr>
                       @endforeach
                </tbody>
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