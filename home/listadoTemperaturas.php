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
                                    <div>Lista de Temperaturas Sala de Extracción
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
                                    <div class="card-header">Lista de Temperaturas
                                    <button title="Descargar Lista de Temperaturas" class="btn btn-success btn" onclick="dwd();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>

                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Equipo</th>
                                                <th>Identificación</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Temperatura Actual</th>
                                                <th>Temperatura Mínima</th>
                                                <th>Temperatura Máxima</th>
                                                <th>Observaciones</th>
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
                                                $consulta="SELECT hosp.nombre_hospital,gu.nombre as UsuarioRegistro,ct.fecha_creacion as fechaRegistro,ct.*,ce.equipo, ce.identificacion
                                                FROM core__temperaturas ct
                                                INNER JOIN core__equipos ce ON ct.fk_equipos = ce.id_core__equipos
                                                INNER JOIN gestion__usuarios gu ON ct.creado_por = gu.id__usuarios
                                                INNER JOIN aux__hospitales hosp ON gu.fk_aux__hospitales = hosp.id_hospital";
                                            }
                                            else
                                            {
                                                $consulta="SELECT ct.*,ce.equipo, ce.identificacion
                                                FROM core__temperaturas ct
                                                INNER JOIN core__equipos ce ON ct.fk_equipos = ce.id_core__equipos
                                                INNER JOIN gestion__usuarios gu ON ct.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales ='".$hospital."' ORDER BY ct.fecha_creacion  ";

                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__temperaturas]</td>";
                                                        echo "<td>$usuario[equipo]</td>";
                                                        echo "<td>$usuario[identificacion]</td>";
                                                        echo "<td>$usuario[fecha]</td>";
                                                        echo "<td>$usuario[hora]</td>";
                                                        echo "<td>$usuario[temp_actual]</td>";
                                                        echo "<td>$usuario[temp_minima]</td>";
                                                        echo "<td>$usuario[temp_maxima]</td>";
                                                        echo "<td>$usuario[observaciones]</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                mysqli_free_result($resultado);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Equipo</th>
                                                <th>Identificación</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>Temperatura Actual</th>
                                                <th>Temperatura Mínima</th>
                                                <th>Temperatura Máxima</th>
                                                <th>Observaciones</th>
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



 <div class="modal fade" id="beneficiarioModal" tabindex="-99999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terminar Atención Sala</h5>
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
                            <option value='SALIDA PARA CONSUMO'>SALIDA PARA CONSUMO</option>
                            <option value='DESCARTE'>DESCARTE</option>
                            <option value='DONACIÓN'>DONACIÓN</option>
                        </select>
                        <input name="id_core__atencion_sala" id="id_core__atencion_sala" placeholder="" type="hidden" readonly class="form-control">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="actualizarAccionSala">Guardar</button>
            </div>
        </div>
    </div>
</div>



    <script>
        $(document).ready(function() {

            $('.mm-active').removeClass('mm-active');
            $("#menuListaTemperaturas").addClass("mm-active");
            $("#regEquip").addClass("mm-show");

            $('.passigID').click(function()
            {
                //alert();
               // console.warn($(this).attr('data-id'));
               var ids = $(this).attr('data-id');
               console.warn("ids:"+ids);
               $("#id_core__atencion_sala").val(ids);
            });

            $('#listDonantes').DataTable({

                "order": [[ 3, "desc" ]]
            });



            $('#actualizarAccionSala').click(function()
            {
                var id = $('#id_core__atencion_sala').val();
                console.warn("ID:"+id);
                var accion = $('#accion').val();

                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'actualizarAccionAtencionSala',
                        id_core__atencion_sala:id,
                        accion:accion
                    },
                    success: function(rta){
                        console.warn(rta);
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

        function dwd(){
                window.open("excel/data_ListaTemperaturas.php?",'_blank');
            }
    </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>