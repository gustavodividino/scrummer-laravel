@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
        	<center>
	            <section>
	            	<br>
	            	<br>	            
		            	<h4>{{ $mensagem }}</h4>
		            	<br>
	            		<br>
		                <a href="/home"><img height="300px" src="<?php echo asset('imagens/error.png') ?>" /></a>

	            </section>
        	</center>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>
@endpush


@section('page-script')
@stop