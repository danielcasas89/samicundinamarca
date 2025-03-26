<?php
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/header.php';
	?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config">
                                        </i>
                                    </div>
                                    <div>Lista Stock Pasteurizada BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl                                      </div>
                                    </div>
                                    </div>

                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <a href="registroDonantesBLH.php"><button type="button" class=" btn btn-info"><span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-business-time fa-w-20"></i></span>Registrar Donante</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Lista Stock Pasteurizada
                                    <button title="Descargar Lista Stock Pasteurizada" class="btn btn-success btn" onclick="descargar();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>

                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha Registro</th>
                                                <th>Frasco Pasteurizado</th>
                                                <th>Cantidad</th>
                                                <th>Tipo de Leche</th>
                                                <th>Acidez Dornic</th>
                                                <th>Kcal/Oz</th>
                                                <th>Estado microbiológico</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="firtLine" style="display: none;" >
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT *,r.fk_atributos__estados as EstadoFrasco,r.fecha_creacion as FechaFrasco FROM core__pool_blh r
                                                WHERE r.fk_atributos__estados = 'CUMPLE' ";
                                            }
                                            else
                                            {
                                                $consulta="SELECT *,r.fk_atributos__estados as EstadoFrasco,r.fecha_creacion as FechaFrasco FROM core__pool_blh r
                                                INNER JOIN gestion__usuarios gu ON r.creado_por = gu.id__usuarios
                                                WHERE r.fk_atributos__estados = 'CUMPLE' AND gu.fk_aux__hospitales=".$hospital;
                                            }



                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__pool_blh]</td>";
                                                        echo "<td>$usuario[FechaFrasco]</td>";
                                                        echo "<td>$usuario[frasco_pasteurizado]</td>";
                                                        echo "<td>$usuario[cantidad]</td>";
                                                        echo "<td>$usuario[tipoLeche]</td>";
                                                        echo "<td>$usuario[resultado]</td>";
                                                        echo "<td>$usuario[kcal]</td>";
                                                        if ($usuario['EstadoFrasco']=="CUMPLE")
                                                        {
                                                            $label="badge-success";
                                                            $status="CUMPLE";
                                                        }
                                                        else if ($usuario['EstadoFrasco']=="NO CUMPLE")
                                                        {
                                                            $label="badge-danger";
                                                            $status="NO CUMPLE";
                                                        }
                                                        else if ($usuario['EstadoFrasco']=="")
                                                        {
                                                            $label="badge-warning";
                                                            $status="Sin definir";
                                                        }
                                                        echo "<td id='estado_$usuario[id_core__pool_blh]'><div class='mb-2 mr-2 badge $label'>$status</div></td>";

                                                        if ($usuario['beneficiario']!="asignado")
                                                        {
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__pool_blh]'>
                                                                    <button type='button' class='btn mr-2 mb-2 btn-primary buttonBenef2'  data-toggle='modal' data-id='$usuario[id_core__pool_blh]' data-target='#beneficiarioModal'>Beneficiario</button>
                                                                </td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td></td>";
                                                        }
                                                        echo "</tr>";
                                                    }
                                                }
                                                mysqli_free_result($resultado);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha Registro</th>
                                                <th>Frasco Pasteurizado</th>
                                                <th>Cantidad</th>
                                                <th>Tipo de Leche</th>
                                                <th>Acidez Dornic</th>
                                                <th>Kcal/Oz</th>
                                                <th>Estado microbiológico</th>
                                                <th>Accion</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </div>


                                    <div class="d-block text-center card-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


    </div>
    </div>
    </div>

<div class="modal fade" id="beneficiarioModal" tabindex="-99999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Beneficiario Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form id="registro_beneficiariosPool">
                <div class="form-group">
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_1" class="">Beneficiario 1 :</label>
                        <select id='beneficiario_1' name='beneficiario_1' class='form-control' >
                            <option value=''>--</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_2" class="">Beneficiario 2 :</label>
                        <select id='beneficiario_2' name='beneficiario_2' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_3" class="">Beneficiario 3 :</label>
                        <select id='beneficiario_3' name='beneficiario_3' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_4" class="">Beneficiario 4 :</label>
                        <select id='beneficiario_4' name='beneficiario_4' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_5" class="">Beneficiario 5 :</label>
                        <select id='beneficiario_5' name='beneficiario_5' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_6" class="">Beneficiario 6 :</label>
                        <select id='beneficiario_6' name='beneficiario_6' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_7" class="">Beneficiario 7 :</label>
                        <select id='beneficiario_7' name='beneficiario_7' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_8" class="">Beneficiario 8 :</label>
                        <select id='beneficiario_8' name='beneficiario_8' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_9" class="">Beneficiario 9 :</label>
                        <select id='beneficiario_9' name='beneficiario_9' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_10" class="">Beneficiario 10 :</label>
                        <select id='beneficiario_10' name='beneficiario_10' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_11" class="">Beneficiario 11 :</label>
                        <select id='beneficiario_11' name='beneficiario_11' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_12" class="">Beneficiario 12:</label>
                        <select id='beneficiario_12' name='beneficiario_12' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_13" class="">Beneficiario 13 :</label>
                        <select id='beneficiario_13' name='beneficiario_13' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario_14" class="">Beneficiario 14 :</label>
                        <select id='beneficiario_14' name='beneficiario_14' class='form-control' >
                            <option value=''>--</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="actualizarStock">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {

            $( ".buttonBenef2" ).on( "click", function() {


                var ids = $(this).attr('data-id');
                $('#id_core__pool_blh').val(ids);
                $("#beneficiario_1").empty();
                $("#beneficiario_1").append("<option value=''>--</option>");
                $("#beneficiario_2").empty();
                $("#beneficiario_2").append("<option value=''>--</option>");
                $("#beneficiario_3").empty();
                $("#beneficiario_3").append("<option value=''>--</option>");
                $("#beneficiario_4").empty();
                $("#beneficiario_4").append("<option value=''>--</option>");
                $("#beneficiario_5").empty();
                $("#beneficiario_5").append("<option value=''>--</option>");
                $("#beneficiario_6").empty();
                $("#beneficiario_6").append("<option value=''>--</option>");
                $("#beneficiario_7").empty();
                $("#beneficiario_7").append("<option value=''>--</option>");
                $("#beneficiario_8").empty();
                $("#beneficiario_8").append("<option value=''>--</option>");
                $("#beneficiario_9").empty();
                $("#beneficiario_9").append("<option value=''>--</option>");
                $("#beneficiario_10").empty();
                $("#beneficiario_10").append("<option value=''>--</option>");
                $("#beneficiario_11").empty();
                $("#beneficiario_11").append("<option value=''>--</option>");
                $("#beneficiario_12").empty();
                $("#beneficiario_12").append("<option value=''>--</option>");
                $("#beneficiario_13").empty();
                $("#beneficiario_13").append("<option value=''>--</option>");
                $("#beneficiario_14").empty();
                $("#beneficiario_14").append("<option value=''>--</option>");
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarBeneficiarios'
                    },
                    success: function(rta){
                        console.warn(rta);
                        for(var i=0;i<rta.data.length;i++){
                            $("#beneficiario_1").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_2").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_3").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_4").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_5").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_6").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_7").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_8").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_9").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_10").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_11").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_12").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_13").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario_14").append("<option value='"+rta.data[i].id_core__registro_beneficiario+"'>"+rta.data[i].nombre_bebe+"</option>");
                        }

                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        //console.debug(textStatus);
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });
            });

            $('#actualizarStock').click(function()
            {
                var id = $('#id_core__pool_blh').val();
                var values = {};
                var j = 1;
                $.each($('#registro_beneficiariosPool').serializeArray(), function(i, field) {
                    if ($("#"+field.name).val() != '')
                    {
                        if (field.name!= "id_core__pool_blh")
                        {
                            var res = field.name.split("_");
                            var name = res[0]+j;
                            values[name] = field.value;
                            j++;
                        }
                    }
                });
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'actualizarBeneficiariosPool',
                        id_core__pool_blh:id,
                        values:values
                    },
                    success: function(rta){
                        console.warn(rta);
                       // $('#exampleModal').modal('toggle');
                        location.reload();

                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        //console.debug(textStatus);
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });

            });

            $('.mm-active').removeClass('mm-active');
            $("#menuLhpDisponible").addClass("mm-active");
            $("#regBenef").addClass("mm-show");
            $('#listDonantes').DataTable( {
                "order": [[ 0, "desc" ]],
                "pageLength": 100
            });


        });

        function descargar(){
                window.open("excel/data_ListaStockPasteurizada.php?",'_blank');
            }

    </script>



<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>