@include('site.template.templateAdmin', compact('user'))

@section('content')

 <br>
 <br> 

@if(Request::is('*administrador*'))


@endif

@if(Request::is('*aviso*'))

<section class="main container">
    <div class="col-xs12 col-sm-12 col-md-12">
        <div class="table-responsive">
        	<a href="">Novo Aviso</a>
            <table id="tableBacklog" class="table table-hover table-condensed table-bordered">
                <tr class="info">
                    <th>Descrição</th>
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Status</th>
                    <th><center>Desativar</center></th>
                    <th><center>Excluir</center></th>
                </tr>
                <tr>
                    <td>! Sistema em Desenvolvimento !</td>
                    <td> 01-01-2017 </td>
                    <td> 01-02-2017 </td>
                    <td>Em Andamento</td>
                    <td><center><a title="Desativar aviso" href=""> <span class="glyphicon glyphicon-remove"></span></a></center></td>
                    <td><center><a title= "Excluir aviso" href=""><span class="glyphicon glyphicon-trash"></span></a></center></td>
                </tr>
                </tr>
            </table>
        </div>                 
    </div>
<hr>
		
</section>

@endif

@if(Request::is('*user*'))



@endif

@if(Request::is('*skill*'))



@endif

@if(Request::is('*achivement*'))



@endif