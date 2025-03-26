<?php
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/cabecera.php';
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
                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha Registro</th>
                                                <th>Frasco Pasteurizado</th>
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
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT *,cpb.fk_atributos__estados as estadoFrasco,cpb.fecha_creacion as FechaFrasco FROM `core__pool_blh` cpb";
                                            }
                                            else
                                            {
                                                $consulta="SELECT *,cpb.fk_atributos__estados as estadoFrasco,cpb.fecha_creacion as FechaFrasco FROM `core__pool_blh` cpb
                                                INNER JOIN gestion__usuarios gu ON cpb.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales =".$hospital;

                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__pool_blh]</td>";
                                                        echo "<td>$usuario[FechaFrasco]</td>";
                                                        echo "<td>$usuario[frasco_pasteurizado]</td>";
                                                        if ($usuario['estadoFrasco']=="CUMPLE")
                                                        {
                                                            $label="badge-success";
                                                            $status="CUMPLE";
                                                            echo "<td id='estado_$usuario[id_core__pool_blh]'><div class='mb-2 mr-2 badge $label'>$status</div></td>";
                                                            echo "<td></td>";
                                                        }
                                                        else if ($usuario['estadoFrasco']=="NO CUMPLE")
                                                        {
                                                            $label="badge-danger";
                                                            $status="NO CUMPLE";
                                                            echo "<td id='estado_$usuario[id_core__pool_blh]'><div class='mb-2 mr-2 badge $label'>$status</div></td>";
                                                            echo "<td></td>";
                                                        }
                                                        else if ($usuario['estadoFrasco']=="")
                                                        {
                                                            $label="badge-warning";
                                                            $status="Sin definir";
                                                            echo "<td id='estado_$usuario[id_core__pool_blh]'><div class='mb-2 mr-2 badge $label'>$status</div></td>";
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__pool_blh]'>
                                                                    <button type='button' class='btn mr-2 mb-2 btn-primary passigID' data-toggle='modal' data-id='$usuario[id_core__pool_blh]' data-target='#StatusModal'>Estado</button>
                                                                </td>";
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
                                                <th>Estado</th>
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

<!-- Modal -->
<div class="modal fade" id="StatusModal" tabindex="-99999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="fk_atributos__estados" class="">Estado </label>
                        <select name="fk_atributos__estados" id="fk_atributos__estados" class="selectEvent form-control">
                            <option value='CUMPLE'>CUMPLE</option>
                            <option value='NO CUMPLE'>NO CUMPLE</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                    <!--<label for="beneficiario" class="">Beneficiario:</label>
                    <input name="beneficiario" id="beneficiario" placeholder="" type="text" class="form-control">
                    <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">-->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizarStock">Guardar</button>
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
                <div class="form-group">
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario1" class="">Beneficiario 1 :</label>
                        <select id='beneficiario1' name='beneficiario1' class='form-control' >
                            <option value=''>--</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario2" class="">Beneficiario 2 :</label>
                        <select id='beneficiario2' name='beneficiario2' class='form-control' >
                            <option value=''>--</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario3" class="">Beneficiario 3 :</label>
                        <select id='beneficiario3' name='beneficiario3' class='form-control' >
                            <option value=''>--</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                    <div class=" form-group col-md-12 regis">
                        <label for="beneficiario4" class="">Beneficiario 4 :</label>
                        <select id='beneficiario4' name='beneficiario4' class='form-control' >
                            <option value=''>--</option>
                        </select>
                        <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="actualizarStock">Guardar</button>
            </div>
        </div>
</div>
</div>
</div>

<script>
        $(document).ready(function() {

            $('.passigID').on('click', function(event){

                var ids = $(this).attr('data-id');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarDetallePool',
                        id_core__pool_blh:ids
                    },
                    success: function(rta){
                        console.warn(rta);
                        console.warn("listarDetallePool");
                        $('#fk_atributos__estados').val(rta.data[0].fk_atributos__estados);
                        $('#id_core__pool_blh').val(rta.data[0].id_core__pool_blh);
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

            $('#listDonantes').DataTable( {
            "order": [[ 1, "desc" ]],
            "pageLength": 15

            });

            $('.mm-active').removeClass('mm-active');
            $("#menuPasteurizacion").addClass("mm-active");



            $('.buttonBenef').click(function()
            {
                var ids = $(this).attr('data-id');
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
                            $("#beneficiario1").append("<option value='"+rta.data[i].nombre_bebe+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario2").append("<option value='"+rta.data[i].nombre_bebe+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario3").append("<option value='"+rta.data[i].nombre_bebe+"'>"+rta.data[i].nombre_bebe+"</option>");
                            $("#beneficiario4").append("<option value='"+rta.data[i].nombre_bebe+"'>"+rta.data[i].nombre_bebe+"</option>");
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
                var ids = $('#id_core__pool_blh').val();
                var fk_atributos__estados = $('#fk_atributos__estados').val();
                var beneficiario = $('#beneficiario').val();

                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'actualizarEstadoPool',
                        id_core__pool_blh:ids,
                        fk_atributos__estados:fk_atributos__estados
                    },
                    success: function(rta){
                        console.warn(rta);

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

        });
    </script>



<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>