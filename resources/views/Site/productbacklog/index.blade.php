@extends('site.template.template')

@section('content')
<br>
<div class="col-xs12 col-sm-12 col-md-12">
	<div class="col-xs12 col-sm-4 col-md-3">
		<center class="title"><h2>{{ $productbacklog->name }}</h2> 
			<span class="badge">{{ $productbacklog->status->name }}</span>
		<br>
		<h4>{{ $productbacklog->description }}</h4>
		<br>
	</div>

	<div class="col-xs12 col-sm-4 col-md-3">		
			<center class="title"><h4>Responsáveis</h4>
			<ul class="list-group">
				@foreach($productbacklog->responsible as $item)
					<li class="list-group-item">
	                    <div class="col-xs12 col-sm-4 col-md-3" style="margin-left: -15px">
	                        <img src="{{ URL('photos')}}/{{ $item->user->profile->photo }}" class="img-thumbnail" width="50" height="50">
	                    </div>
	                    <div class="col-xs-12 col-sm-8" style="margin-left: -20px">
	                        <span class="name">
	                            <a href="{{URL('profile/' . $item->user->id_user)}}" data-toggle="tooltip"  title="{{$item->user->name}}  {{$item->user->surname}}" target="_blank" class="menuTeam" >
	                                {{$item->user->name}} </a>
	                        </span><br/>                                                    
	                    </div>
	                    <div class="clearfix"></div>
	                </li>
				@endforeach

			</ul>
	</div>

	<div class="col-xs12 col-sm-4 col-md-6">
		<center class="title"><h4>Histórico</h4>
			<div class="table-responsive" style="overflow:auto; height: 400px">
			<table id="tableLog" class="table table-hover table-condensed table-bordered" style="font-size: 12px">
	            <tr class="info">
	                <th>Status Anterior</th>
	                <th>Status Atual</th>
	                <th>Data</th>
	                <th>Responsável</th>
	            </tr>
	            @foreach($taskboardlog as $item)
	            <tr class="warning">
	            	<td>{{ $item->old_state }}</td>
	            	<td>{{ $item->state }}</td>
	            	<td>{{ $item->date->format('d-m-Y') }}</td>
	            	<td>{{ $item->user->name }} {{ $item->user->surname }}</td>
	            </tr>
	            @endforeach
			</table>
		</div>
	</div>


</div>

@endsection


@push('scripts')

@endpush



@section('page-head')

@stop



@section('page-script')
<script>

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@stop