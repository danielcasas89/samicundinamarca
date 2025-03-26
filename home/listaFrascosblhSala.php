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
                                    <div>Donantes BLH
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
                                    <div class="card-header">Lista Frascos
                                    <button title="Descargar Lista Frascos" class="btn btn-success btn" onclick='exportData();' style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>

                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listFrascos" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID Frasco</th>
                                                <th>Fecha Registro</th>
                                                <th>Nombre Donante</th>
                                                <th>Telefono</th>
                                                <th>Fecha Extracción</th>
                                                <th>Cantidad</th>
                                                <th>Lugar Recolección</th>
                                                <th>Días</th>
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
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,DATEDIFF(cd.fecha_accion,cd.fecha_extraccion) as DiasAccion,cd.fecha_creacion as fechaRegistro,cd.fk_atributos__estados as estadoFrasco, cr.nombre as nombreDonante
                                                FROM `core__donacion_blh_sala` cd
                                                LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh";
                                            }
                                            else
                                            {
                                                $consulta="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,DATEDIFF(cd.fecha_accion,cd.fecha_extraccion) as DiasAccion,cd.fecha_creacion as fechaRegistro,cd.fk_atributos__estados as estadoFrasco, cr.nombre as nombreDonante
                                                FROM `core__donacion_blh_sala` cd
                                                LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
                                                INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales =".$hospital;



                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__donacion_blh]</td>";
                                                        echo "<td>$usuario[id_frasco]</td>";
                                                        echo "<td>$usuario[fechaRegistro]</td>";
                                                        echo "<td>$usuario[nombreDonante]</td>";
                                                        echo "<td>$usuario[celular]</td>";
                                                        echo "<td>$usuario[fecha_extraccion]</td>";
                                                        echo "<td>$usuario[cantidad]</td>";
                                                        echo "<td>$usuario[recoleccionEn]</td>";
                                                        if ($usuario['estadoFrasco'] == 2)
                                                        {
                                                            $label="badge-success";
                                                            echo "<td>$usuario[DiasExtraccion]</td>";
                                                            echo "<td id='estado_$usuario[id_core__donacion_blh]'><div class='mb-2 mr-2 badge $label'>ACTIVO</div></td>";
                                                            echo "<td class='text-center'>
                                                                        <button type='button' class='btn mr-2 mb-2 btn-primary passID' data-toggle='modal' onclick='passID($usuario[id_core__donacion_blh])' data-id='$usuario[id_core__donacion_blh]' data-target='#beneficiarioModal'>Accion</button>
                                                                    </td>";
                                                        }
                                                        else
                                                        {
                                                            $label="badge-danger";
                                                            echo "<td>$usuario[DiasAccion]</td>";
                                                            echo "<td id='estado_$usuario[id_core__donacion_blh]'><div class='mb-2 mr-2 badge $label'>INACTIVO</div></td>";
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
                                                <th>ID Frasco</th>
                                                <th>Fecha Registro</th>
                                                <th>Nombre Donante</th>
                                                <th>Telefono</th>
                                                <th>Fecha Extracción</th>
                                                <th>Cantidad</th>
                                                <th>Lugar Recolección</th>
                                                <th>Días</th>
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
                    </div>

                    </div>
                    </div>

    <div class="modal fade" id="beneficiarioModal" tabindex="-99999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Acción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class=" form-group col-md-12 regis">
                        <label for="accion" class="">Acción:</label>
                        <select name="accion" id="accion" class="form-control">
                            <option value=''>--</option>
                            <option value='ENVIADO A BLH'>ENVIADO A BLH</option>
                            <option value='DESCARTE'>DESCARTE</option>
                        </select>
                        <input name="id_core__donacion_blh" id="id_core__donacion_blh" type="hidden" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="actualizarAccionFrascoSala">Guardar</button>
            </div>
        </div>
    </div>
</div>
</div>
    <script>
        $(document).ready(function() {



            $('.mm-active').removeClass('mm-active');
            $("#menuListaFrascosSala").addClass("mm-active");
            $("#regBLH").addClass("mm-show");


            $('#listFrascos').DataTable( {
                "order": [[ 2, "desc" ]]

            });



          /*  $(".passID").click(function()
            {
               //alert();
              // var myBookId = $(this).data('id');
               var ids = $(this).data('id');
               console.warn(ids);
               $("#id_core__donacion_blh").val(ids);
            });*/

            $('#actualizarAccionFrascoSala').click(function()
            {
                var id = $('#id_core__donacion_blh').val();
                console.warn("ID:"+id);
                var accion = $('#accion').val();

                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'actualizarAccionFrascoSala',
                        id_core__donacion_blh:id,
                        accion:accion
                    },
                    success: function(rta){
                        console.warn(rta);
                        //return false;
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

        function passID(id)
        {
            console.warn("id on function: "+id);
            $("#id_core__donacion_blh").val(id);
        }

        function exportData(){
                window.open("excel/data_Frascos.php?",'_blank');
            }
    </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>