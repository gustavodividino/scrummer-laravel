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
                <h1 class="entry-title"><span>Upload de Arquivo</span> </h1>
                <hr>
				<form action="move" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-sm-3">Descrição <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input type="text" id="description" name="description" required="true" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-sm-9">
                            <input type="file" id="photox" name="photo" onchange="xpto()"  required="true" />
                            <input type="submit" value="Upload" />
                        </div>
                    </div>


				    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <input type="hidden" id="idProject" name="idProject" value="{{$project->id_project}}" />
				    <input type="hidden" id="nameFile" name="name"/>
                    <input type="hidden" id="size" name="size"/>
                    
				     
				    
				</form>
            </section>
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

<script type="text/javascript">

	function xpto(){
        var arquivo = $("#photox").val();
		

        var fileInput = $("#photox");
        var maxSize = fileInput.data('max-size');

        $("#size").val(Math.round(fileInput.get(0).files[0].size / 1024));
        
        
		var valNew = arquivo.split('\\');                                    

        $("#nameFile").val(valNew[valNew.length - 1]);

	}


</script>
@stop