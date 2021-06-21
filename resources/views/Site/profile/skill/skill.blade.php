@extends('site.template.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section>
                <h1 class="entry-title"><span>Adicionar Skills</span> </h1>
                <hr>
                <form class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <p id="idProfile" hidden="true">{{ $skillProfile[0]->id_profile }}</p>
                    <div class="col-md-4 col-sm-4">
                        <select class="" title="Escolha sua habilidade" id="habilidades" name="habilidade" onchange="addNewUserTable();">
                            <option id="0" value="0">Escolha uma Habilidade</option>
                            @foreach($skill as $item)
                            <option id="{!! $item->id_skill !!}" value="{!! $item->id_skill !!}">{!! $item->name !!}</option>

                            @endforeach

                        </select>                            
                    </div>  

                    <div class="col-md-8 col-sm-8" >
                        <div style="overflow:auto; height: 300px">
                        <table id="skillProfileTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Skill</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($skillProfile as $item)
                            <script>
                                var name = "{{ $item->skill->name }}";
                                var id_user = "{{ $item->id_skill }}";
                                addUserTable(id_user, name);
                            </script>                                

                            @endforeach                                
                            </tbody>

                        </table>
                    </div>
                        <div class="col-xs-offset-3 col-xs-10">
                            <input name="Cancel" type="submit" value="Concluir" onclick="cancel()" class="btn btn-info">
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


@endpush


@section('page-head')
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


<!--  PAGINACAO de TABELAS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script src="<?php echo asset('js/jquery-3.2.1.js') ?>"></script>
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

    function criaLinha(id, usuario) {

        var linha = $("<tr>");
        var colunaID = $("<td>").text(id);
        colunaID.attr("id", "idSkill");

        var colunaNome = $("<td>").text(usuario);
        colunaNome.attr("id", "name");


        var remover = $("<td>");

        var link = $("<a>").addClass("botao-remover").attr("href", "#");		//cria um link "<a href"
        var icone = $("<i>").addClass("glyphicon").addClass("glyphicon-remove");							//Cria um <i> para o icone

        link.append(icone);
        remover.append(link);


        linha.append(colunaID);
        linha.append(colunaNome);
        linha.append(remover);

        linha.find(".botao-remover").click(RemoveTableRow);
                    removeItem(id);
        return linha;

    }

    function RemoveTableRow() {
        var r = confirm("Confirma remoção?");

        if (r == true) {
            
            event.preventDefault();																//Previne as coisas padrão que irão acontecer por padrão
            var linha = $(this).parent().parent();
            var idSkill = linha.find('#idSkill').text();
            var idProfile = $("#idProfile").text();

            removeItem(linha.find('#idSkill').text());

            $.post("/removeskill",
                {
                    "_token": $('meta[name=token]').attr('content'),
                    "idProfile": idProfile,
                    "idSkill": idSkill
                },
                function (data, status) {
                    
                });


            linha.fadeOut(600);
            //Transforma o "this" para o jQuery para ter a funcao remove, parent sobe um nível da arvore da tabela
            setTimeout(
                    function () {
                        $(this).parent().parent().remove();
                    }
            , 350);

        }
    }

    function removeItem(id) {
        var item = $("#habilidades");
        item.find('option[value=' + id + ']').toggle();
    }

    function addUserTable(id, name) {
        if (id != 0) {
            var linha = criaLinha(id, name);

            var corpoTabela = $("#skillProfileTable").find("tbody");	//Localiza o tbody da tabela

            corpoTabela.append(linha);
        }
    }

    function addNewUserTable() {


        var id = $("#habilidades option:selected").val();
        var usuario = $("#habilidades option:selected").text();
        if (id != 0) {
            var linha = criaLinha(id, usuario);

            var corpoTabela = $("#skillProfileTable").find("tbody");	//Localiza o tbody da tabela

            corpoTabela.append(linha);
            save();
        }
    }

    function cancel() {
        event.preventDefault();
        window.location.href = "/profile/" + $("#idProfile").text() + "/skill";

    }


    function save() {

        $.ajaxSetup({
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var idProfile = $("#idProfile").text();
        var idSkill = $("#habilidades option:selected").val();

        event.preventDefault();


        $.post("/saveskill",
                {
                    "_token": $('meta[name=token]').attr('content'),
                    "user": idProfile,
                    "skill": idSkill
                },
                function (data, status) {
                    
                });

    }


</script>

@stop