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
                                    <div>Lista de Atenciones Sala de Extracción
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
                                    <div class="card-header">Lista de Atenciones
                                    <button title="Descargar Lista de Atenciones Sala" class="btn btn-success btn" onclick="descargar();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>
                                    
                                    </div>                                    
                                    <div class="table-responsive" style="padding: 10px;">
                                                   
                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>                                               
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Fecha Atención</th>
                                                <th>Hora llegada</th>
                                                <th>Tipo Atención</th>
                                                <th>Dias de Extracción</th>
                                                <th>Destino</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                                <th>Actualizar</th>
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
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT cr.nombre as nombreUsuaria,cd.fk_atributos__estados as estadoFrasco,DATEDIFF(NOW(),cd.fecha_atencion) as DiasExtraccion,DATEDIFF(cd.fecha_accion,cd.fecha_atencion) as DiasAccion,cd.*,cr.* 
                                                FROM `core__atencion_sala` cd 
                                                LEFT JOIN core__registro_sala cr ON cd.id_core__registro_sala = cr.id_core__registro_sala";
                                            }
                                            else
                                            {
                                                $consulta="SELECT cr.nombre as nombreUsuaria,cd.fk_atributos__estados as estadoFrasco,DATEDIFF(NOW(),cd.fecha_atencion) as DiasExtraccion,DATEDIFF(cd.fecha_accion,cd.fecha_atencion) as DiasAccion,cd.*,cr.*,gu.*
                                                FROM `core__atencion_sala` cd 
                                                LEFT JOIN core__registro_sala cr ON cd.id_core__registro_sala = cr.id_core__registro_sala
                                                INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales =".$hospital;
                                              
                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){  
                                                        echo "<tr>";                                                         
                                                        echo "<td>$usuario[id_core__atencion_sala]</td>";
                                                        echo "<td>$usuario[nombreUsuaria]</td>";  
                                                        echo "<td>$usuario[fecha_atencion]</td>";  
                                                        echo "<td>$usuario[hora_llegada]</td>";   
                                                        echo "<td>$usuario[atencion_prestada]</td>";  
                                                        if ($usuario['atencion_prestada'] == "Extracción")
                                                        {
                                                            if ($usuario['estadoFrasco'] == 2)
                                                            {
                                                                $label="badge-success";  
                                                                echo "<td>$usuario[DiasExtraccion]</td>";  
                                                                echo "<td>$usuario[destino_leche]</td>";
                                                                echo "<td id='estado_$usuario[id_core__atencion_sala]'><div class='mb-2 mr-2 badge $label'>ACTIVO</div></td>";
                                                                echo "<td>$usuario[accion]</td>"; 
                                                                echo "<td class='text-center' id='ar_$usuario[id_core__atencion_sala]'>
                                                                        <button type='button' class='btn mr-2 mb-2 btn-primary passigID' data-toggle='modal' data-id='$usuario[id_core__atencion_sala]' data-target='#beneficiarioModal'>Accion</button>                                                               
                                                                    </td>";
                                                            }
                                                            else
                                                            {
                                                                $label="badge-danger";
                                                                echo "<td>$usuario[DiasAccion]</td>";  
                                                                echo "<td>$usuario[destino_leche]</td>";
                                                                echo "<td id='estado_$usuario[id_core__atencion_sala]'><div class='mb-2 mr-2 badge $label'>INACTIVO</div></td>";
                                                                echo "<td>$usuario[accion]</td>";
                                                                echo "<td></td>";
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
                                                            echo "<td></td>";
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
                                                <th>Nombre</th>
                                                <th>Fecha Atención</th>
                                                <th>Hora llegada</th>
                                                <th>Tipo Atención</th>
                                                <th>Dias de Extracción</th>
                                                <th>Destino</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                                <th>Actualizar</th>
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
            $("#menuListaAtenciones").addClass("mm-active");                    
            $("#regAtencSala").addClass("mm-show");

            $('.passigID').click(function()
            {
                //alert();
               // console.warn($(this).attr('data-id')); 
               var ids = $(this).attr('data-id');  
               console.warn("ids:"+ids);   
               $("#id_core__atencion_sala").val(ids);       
            });
            
            $('#listDonantes').DataTable({

                "order": [[ 2, "asc" ]]
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

        function descargar(){
                window.open("excel/data_ListaAtencionSala.php?",'_blank');
            }
    </script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>