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
                                    <div>Lista Beneficiarios BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                    </div>

                                <div class="page-title-actions">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Lista Beneficiarios BLH
                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fecha de registro</th>
                                                <th>Receptor</th>
                                                <th>Documento Beneficiario</th>
                                                <th>Nombre Madre</th>
                                                <th>Nombre Beneficiario</th>
                                                <th>Fecha Parto</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
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
                                            $consulta="SELECT r.*,a.nombre as nombre_estado
                                            FROM core__registro_beneficiario r
                                            INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados
                                            ORDER BY `r`.`fecha_creacion` DESC";
                                            }
                                            else
                                            {
                                                $consulta="SELECT r.*,a.nombre as nombre_estado
                                                FROM core__registro_beneficiario r
                                                INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados
                                                INNER JOIN gestion__usuarios gu ON r.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales =".$hospital;
                                            }

                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__registro_beneficiario]</td>";
                                                        echo "<td>$usuario[fecha_creacion]</td>";
                                                        echo "<td>$usuario[receptor]</td>";
                                                        echo "<td>$usuario[registro_civil]</td>";
                                                        echo "<td>$usuario[nombre_madre]</td>";
                                                        echo "<td>$usuario[nombre_bebe]</td>";
                                                        echo "<td>$usuario[fecha_parto]</td>";
                                                        ($usuario['fk_atributos__estados']==2)?$label="badge-success":$label="badge-danger";
                                                        echo "<td id='estado_$usuario[id_core__registro_beneficiario]'><div class='mb-2 mr-2 badge $label'>$usuario[nombre_estado]</div></td>";
                                                        if($usuario['fk_atributos__estados']==2){
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__registro_beneficiario]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea cancelar el acceso a $usuario[nombre_madre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=6&estado=3&codigo=$usuario[id_core__registro_beneficiario]','panel','evaluar');}\">
                                                                        <i class='fa fa-times'></i>
                                                                    </button>
                                                                </td>";
                                                        }else{
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__registro_beneficiario]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea reactivar el acceso a $usuario[nombre_madre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=6&estado=2&codigo=$usuario[id_core__registro_beneficiario]','panel','evaluar');}\">
                                                                        <i class='fa fa-check'></i>
                                                                    </button>
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
                                                <th>Fecha de registro</th>
                                                <th>Receptor</th>
                                                <th>Documento Beneficiario</th>
                                                <th>Nombre Madre</th>
                                                <th>Nombre Beneficiario</th>
                                                <th>Fecha Parto</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
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

    <script>
        $(document).ready(function() {

            $('.mm-active').removeClass('mm-active');
            $("#menuListaBeneficiarios").addClass("mm-active");


            $('#listDonantes').DataTable({

                "order": [[ 1, "desc" ]]
            });
            $("#regBenef").addClass("mm-show");

            $('.passigID').click(function()
            {
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
                        $('#beneficiario').val(rta.data[0].beneficiario);
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
                        command: 'actualizarPool',
                        id_core__pool_blh:ids,
                        fk_atributos__estados:fk_atributos__estados,
                        beneficiario:beneficiario
                    },
                    success: function(rta){
                        //$('#exampleModal').modal('toggle');
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

    </div>
    </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-99999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999999;">
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
                    </select></div>
                    <label for="beneficiario" class="">Beneficiario:</label>
                    <input name="beneficiario" id="beneficiario" placeholder="" type="text" class="form-control">
                    <input name="id_core__pool_blh" id="id_core__pool_blh" placeholder="" type="hidden" readonly class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actualizarStock">Guardar</button>
            </div>
        </div>
    </div>
</div>
</div>

<?php
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>