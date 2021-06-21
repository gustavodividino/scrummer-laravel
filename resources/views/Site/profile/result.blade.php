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
	                    <th>Nome</th>
	                    <th>Skills</th>
	                </tr>
	            </thead>
				<tbody>
					@foreach($skillProfile as $item)
						<tr> 
	                    	<td width="100px"><a href="{{URL('profile/' . $item->id_user )}}"> {{ $item->id_user }}</a></td>
	                    	<td width="250px">{{ $item->name }} {{ $item->surname }}</td>
	                    	<td>
                    			@foreach($item->profile->skill() as $itemX)
                    				@if($itemX->skill->avatar != "")
                    					<img class="img-thumbnail" src="../../imagens/habilidades/{{ $itemX->skill->avatar }}" width="30" height="30" data-toggle="tooltip" title="{{$itemX->skill->name}}"/>
                    				@else
		                                <img class="img-thumbnail" src="../../imagens/habilidades/skill_default.png" width="30" height="30" data-toggle="tooltip" title="{{$itemX->skill->name}}"/>
                    				@endif
                    			@endforeach
	                    		
	                    	</td>
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

</script>

@stop