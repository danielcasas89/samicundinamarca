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
                                    <div>Donantes BLH Sala de Extracción
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
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
                                    <div class="card-header">Lista Donantes
                                    
                                    <button title="Descargar Lista Donantes" class="btn btn-success btn" onclick="dwd();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>

                                    </div>                                    
                                    <div class="table-responsive" style="padding: 10px;">
                                                   
                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre Donante</th>
                                                <th>Edad</th>
                                                <th>Celular</th>
                                                <th>Municipio</th>
                                                <th>Fecha Parto</th>
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
                                                $consulta="SELECT r.nombre as nombreUsuaria,r.*,m.*,a.nombre as nombre_estado 
                                                FROM core__registro_donantes r 
                                                LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
                                                INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados
                                                INNER JOIN gestion__usuarios ge ON r.creado_por = ge.id__usuarios";
                                            }
                                            else
                                            {
                                                $consulta="SELECT r.nombre as nombreUsuaria,r.*,m.*,a.nombre as nombre_estado 
                                                FROM core__registro_donantes r 
                                                LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
                                                INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados
                                                INNER JOIN gestion__usuarios ge ON r.creado_por = ge.id__usuarios
                                                where ge.fk_aux__hospitales=".$hospital;                                               
                                            }
                                                $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<tr>";  
                                                        echo "<td>$usuario[id_registro_blh]</td>";  
                                                        echo "<td>$usuario[nombreUsuaria]</td>";  
                                                        echo "<td>$usuario[edad]</td>"; 
                                                        echo "<td>$usuario[celular]</td>";
                                                        echo "<td>$usuario[nombre_municipio]</td>";
                                                        echo "<td>$usuario[fecha_parto]</td>";
                                                        ($usuario['fk_atributos__estados']==2)?$label="badge-success":$label="badge-danger";
                                                        echo "<td id='estado_$usuario[id_registro_blh]'><div class='mb-2 mr-2 badge $label'>$usuario[nombre_estado]</div></td>";
                                                        if($usuario['fk_atributos__estados']==2){
                                                            echo "<td class='text-center' id='ar_$usuario[id_registro_blh]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea cancelar el acceso a $usuario[nombre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=8&estado=3&codigo=$usuario[id_registro_blh]','panel','evaluar');}\">
                                                                        <i class='fa fa-times'></i>
                                                                    </button>
                                                                </td>";
                                                        }else{
                                                            echo "<td class='text-center' id='ar_$usuario[id_registro_blh]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea reactivar el acceso a $usuario[nombre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=8&estado=2&codigo=$usuario[id_registro_blh]','panel','evaluar');}\">
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
                                                <th>Nombre Donante</th>
                                                <th>Edad</th>
                                                <th>Celular</th>
                                                <th>Municipio</th>
                                                <th>Fecha Parto</th>
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
            $("#menuListaDonanteSala").addClass("mm-active");                   
            $("#regBLH").addClass("mm-show");
            $('#listDonantes').DataTable({
                "order": [[ 6, "desc" ]]
            });	
        });

        function dwd(){
            window.open("excel/data_DonantesSala.php?",'_blank');
            }
    </script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>