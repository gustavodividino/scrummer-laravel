@extends('site.template.template')

@section('content')
<br>
<div class="col-xs12 col-sm-12 col-md-12">
	<div class="col-xs12 col-sm-4 col-md-3">
		<center class="title"><h2>{{ $sprint->name }}</h2> 
			<span class="badge">{{ $sprint->status->name }}</span>
		<br>
		<h4>Início: {{ $sprint->start_date->format('d-m-Y') }}</h4>
		<h4>Termino: {{ $sprint->end_date->format('d-m-Y') }}</h4>
		<br>
	</div>

	<div class="col-xs12 col-sm-4 col-md-3" style="overflow:auto; height: 400px">
		<center class="title"><h4>Participantes</h4>
		<ul class="list-group">
			@foreach($users as $item)
				<li class="list-group-item">
                    <div class="col-xs12 col-sm-4 col-md-3" style="margin-left: -15px">
                        <img src="{{ URL('photos')}}/{{ $item->profile->photo }}" class="img-thumbnail" width="50" height="50">
                    </div>
                    <div class="col-xs-12 col-sm-8" style="margin-left: -20px">
                        <span class="name">
                            <a href="{{URL('profile/' . $item->id_user)}}"  data-toggle="tooltip" title="{{$item->name}}  {{$item->surname}}" target="_blank" class="menuTeam" >
                                {{$item->name}} </a>
                        </span><br/>                                                    
                    </div>
                    <div class="clearfix"></div>
                </li>
			@endforeach

		</ul>
	</div>

	<div class="col-xs12 col-sm-4 col-md-6">
		<center class="title"><h4>Products backlog</h4>
			<div class="table-responsive" style="overflow:auto; height: 400px">
				<table id="tableLog" class="table table-hover table-condensed table-bordered" style="font-size: 12px">
		            <tr class="info">
		                <th>Product BackLog</th>
		                <th>Status Atual</th>

		            </tr>
		            @foreach($products as $item)
		            <tr class="warning">
		            	<td><span class="productbackloglbl"><a href="{{URL('project/productbacklog/' .  $item->id_productbacklog )}}" target="_blank">{!! $item->name !!}</a></span>  </td>
							@if($item->id_status == 3)
	                            <td><span class="glyphicon glyphicon-star"></span> Aguardando Aprovação</td>
	                        @elseif($item->id_status == 2)
	                            <td><span class="glyphicon glyphicon-fire"></span> Em Andamento</td>
	                        @elseif($item->id_status == 6)
	                            <td><span class="glyphicon glyphicon-ban-circle"></span> Cancelado</td>
	                        @elseif($item->id_status == 8)
	                            <td><span class="glyphicon glyphicon-ok"></span> Concluído</td>
	                        @else
	                        	<td><span class="glyphicon glyphicon-minus"></span> Aguardando</td>
	                        @endif
        	
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

@stop