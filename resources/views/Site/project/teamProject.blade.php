@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section>
                <h1 class="entry-title"><span>Time do Projeto</span> </h1>
                <hr>

                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                <div class="col-md-4 col-sm-4">
                    <select class="selectpicker" title="Escolha um membro" id="users" name="user" onchange="addNewUserTable();">

                        @foreach($users as $item)
                        <option value="{!! $item->id_user !!}">{!! $item->name !!} {!! $item->surname !!}</option>

                        @endforeach

                    </select>                            
                </div> 
                <p id="idProjeto" hidden="true">{{ $teamProject[0]->id_project }}</p>
                <div class="col-md-8 col-sm-8">
                    <table id="teamProjectTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Posição</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teamProject as $itemP)
                        <script>
                            var name = "{{ $itemP->user->name }} {{ $itemP->user->surname }}";
                            var id_user = "{{ $itemP->user->id_user }}";
                            var id_cargo = "{{ $itemP->id_position }}";
                            addUserTable(id_user, name, id_cargo);
                        </script>
                        @endforeach                                

                        </tbody>

                    </table>
                    <div class="col-xs-offset-3 col-xs-10">
                        <button onclick="save()">Salvar</button>
                        <button onclick="cancel()">Cancelar</button>
                    </div>
                </div>

        </div>
    </div>

    <!-- Static Modal -->
    <div class="modal modal-static fade" id="processing-modal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-refresh fa-5x fa-spin"></i>
                        <h4>Processando...</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="<?php echo asset('css/scrummer.css') ?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo asset('css/project.css') ?>" type="text/css"/>


@endpush


@section('page-head')
<script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>

<!-- Grafico -->

<link rel="stylesheet" href="<?php echo asset('amcharts/plugins/export/export.css') ?>" type="text/css"/>
<script src="<?php echo asset('amcharts/amcharts.js') ?>"></script>
<script src="<?php echo asset('amcharts/serial.js') ?>"></script>
<script src="<?php echo asset('amcharts/plugins/export/export.min.js') ?>"></script>
<script src="<?php echo asset('amcharts/lang/pt.js') ?>"></script>
<script src="<?php echo asset('amcharts/themes/light.js') ?>"></script>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo asset('js/bootstrap-select.min.js') ?>"></script>
<!-- BootStrap -->


<!--  PAGINACAO de TABELAS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script type="text/javascript" language="javascript" src="<?php echo asset('js/jquery.dataTables.min.js') ?>"></script>

<script type="text/javascript" class="init">
                                $(document).ready(function () {
                                    $('#tableHistoryBacklog').DataTable();
                                });
                                $(document).ready(function () {
                                    $('#tableSprint').DataTable();
                                });
                                $(document).ready(function () {
                                    $('#tableArtifacts').DataTable();
                                });
</script>

@stop

@section('page-script')
<script>

    function criaLinha(id, usuario, cargo) {
        var selectCargo = getCargo(cargo);

        var linha = $("<tr>");
        var colunaID = $("<td>").text(id);
        colunaID.attr("id", "idUser");
        var colunaNome = $("<td>").text(usuario);
        colunaNome.attr("id", "name");
        var colunaCargo = $("<td>");
        var remover = $("<td>");

        var link = $("<a>").addClass("botao-remover").attr("href", "#");		//cria um link "<a href"
        var icone = $("<i>").addClass("glyphicon").addClass("glyphicon-remove");							//Cria um <i> para o icone

        link.append(icone);
        remover.append(link);

        colunaCargo.append(selectCargo);

        linha.append(colunaID);
        linha.append(colunaNome);
        linha.append(colunaCargo);
        linha.append(remover);

        linha.find(".botao-remover").click(RemoveTableRow);
        return linha;

    }

    function RemoveTableRow() {
        var r = confirm("Confirma remoção?");

        if (r == true) {

            var linhas = $("tbody > tr");

            var cont = 0;

            linhas.each(function () {
                if ($(this).is(':visible') == true) {
                    cont++;
                }
            });

            if(cont <= 1){
                alert("Não é possível remover, é necessário pelo menos 1 membro no time");    
            }else{
                event.preventDefault();                       //Previne as coisas padrão que irão acontecer por padrão
                var linha = $(this).parent().parent();
                linha.fadeOut(600);
                //Transforma o "this" para o jQuery para ter a funcao remove, parent sobe um nível da arvore da tabela
                setTimeout(
                        function () {
                            $(this).parent().parent().remove();
                        }
                , 350);
            }
            



        }
    }

    function addUserTable(id, name, id_cargo) {
        var linha = criaLinha(id, name, id_cargo);

        var corpoTabela = $("#teamProjectTable").find("tbody");	//Localiza o tbody da tabela

        corpoTabela.append(linha);
    }

    function addNewUserTable() {
        var id = $("#users option:selected").val();
        var usuario = $("#users option:selected").text();
        var linha = criaLinha(id, usuario, 0);

        var corpoTabela = $("#teamProjectTable").find("tbody");	//Localiza o tbody da tabela

        corpoTabela.append(linha);

        $("#users").val($("#users option:first").val());
    }

    function getCargo(cargo) {
        var selectCargo = $("<select>");
        selectCargo.attr("id", "cargo");
        var option = $("<option>").text("Escolha uma posição");
        option.attr("id", 0);
        option.prop('selected', true);
        selectCargo.append(option);
        $.get('/position/getPosition', function (data) {
            for (i = 0; i < data.length; i++) {
                option = $("<option>").text(data[i].name);
                option.attr("id", data[i].id_position);
                option.attr("value", data[i].id_position);
                if (cargo == data[i].id_position) {
                    option.prop('selected', true);
                }
                selectCargo.append(option);
            }
        });
        return selectCargo;
    }

    function cancel() {
        event.preventDefault();
        var r = confirm("Deseja cancelar alterações?");

        if (r == true) {
            window.location.href = "/project/" + $("#idProjeto").text();
        }
    }


    function save() {

        $.ajaxSetup({
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //$('#processing-modal').modal('show'); // after post

        var project = $("#idProjeto").text();
        event.preventDefault();
        var linhas = $("tbody > tr");


            $.post("/dropteam",
                {
                    "_token": $('meta[name=token]').attr('content'),
                    "project": project
                },
                function (data, status) {
                    //alert("Drop:" + status);
                    linhas.each(function () {
                        var usuario = $(this).find("#idUser").text();
                        var cargo = $(this).find("#cargo option:selected").val();

                        if ($(this).is(':visible') == true) {
                            $.post("/team",
                                    {
                                        "_token": $('meta[name=token]').attr('content'),
                                        "project": project,
                                        "usuario": usuario,
                                        "cargo": cargo
                                    },
                                    function (data, status) {
                                        //alert("Save:" + status);
                                    });
                        }
                    });
                    //$('#processing-modal').modal('hidden'); // after post
                    window.location.href = "/project/" + $("#idProjeto").text() + "/edit";
                });



        
    }


</script>

@stop