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
                                    <div>Listado Equipos Sala de Extracción
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
                                    <div class="card-header">Listado Equipos
                                    <button title="Descargar Lista de Equipos" class="btn btn-success btn" onclick="dwd();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>

                                    </div>                                    
                                    <div class="table-responsive" style="padding: 10px;">
                                                   
                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Equipo</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Serial</th>
                                                <th>Identificación</th>
                                                <th>Estado</th>
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
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT ce.*, ae.nombre as estadoEquipo 
                                                FROM core__equipos ce 
                                                INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados";
                                            }
                                            else
                                            {
                                                $consulta="SELECT ce.*, ae.nombre as estadoEquipo 
                                                FROM core__equipos ce 
                                                INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados
                                                INNER JOIN gestion__usuarios gu ON ce.creado_por = gu.id__usuarios
                                                where gu.fk_aux__hospitales = ".$hospital;
                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<tr>";  
                                                        echo "<td>$usuario[id_core__equipos]</td>";  
                                                        echo "<td>$usuario[equipo]</td>";  
                                                        echo "<td>$usuario[marca]</td>"; 
                                                        echo "<td>$usuario[modelo]</td>";
                                                        echo "<td>$usuario[serial]</td>";
                                                        echo "<td>$usuario[identificacion]</td>";
                                                        ($usuario['fk_atributos__estados']==2)?$label="badge-success":$label="badge-danger";                                                        
                                                        echo "<td id='estado_$usuario[id_core__equipos]'><div class='mb-2 mr-2 badge $label'>$usuario[estadoEquipo]</div></td>";
                                                        if($usuario['estadoEquipo']=='Activo'){
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__equipos]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea inactivar el equipo $usuario[identificacion]')){
                                                                        ajax('configuracionEquiposActualizar.php','opcion=1&estado=3&codigo=$usuario[id_core__equipos]','panel','evaluar');}\">
                                                                        <i class='fa fa-times'></i>
                                                                    </button>
                                                                </td>";
                                                        }else{
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__equipos]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea activar el equipo $usuario[identificacion]')){
                                                                        ajax('configuracionEquiposActualizar.php','opcion=1&estado=2&codigo=$usuario[id_core__equipos]','panel','evaluar');}\">
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
                                                <th>Equipo</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Serial</th>
                                                <th>Identificación</th>
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

    <script>
        $(document).ready(function() {
            
            $('.mm-active').removeClass('mm-active');
            $("#menuListadoEquipos").addClass("mm-active");
            $("#regEquip").addClass("mm-show");
            $('#listDonantes').DataTable({
                "order": [[ 0, "asc" ]]
                });

             });

        function dwd(){
                window.open("excel/data_ListaEquipos.php?",'_blank');
            }

    </script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>