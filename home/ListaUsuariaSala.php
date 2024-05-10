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
                                    <div>Usuarias Sala de Extracción
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
                                    <div class="card-header">Lista Usuarias Sala de Extracción

                                    <button title="Descargar Lista Usuarias Sala" class="btn btn-success btn" onclick="descargar();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>
                                    </div>                                    
                                    <div class="table-responsive" style="padding: 10px;">
                                                   
                                    <table id="listDonantes" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre Donante</th>
                                                <th>Documento</th>
                                                <th>Telefono</th>
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
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                            $consulta="SELECT r.*,m.*,a.nombre as nombre_estado 
                                            FROM core__registro_sala r 
                                            LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
                                            INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados 
                                            ORDER BY `r`.`fk_atributos__estados` ASC";
                                            }
                                            else
                                            {
                                                $consulta = "SELECT r.*,m.*,a.nombre as nombre_estado 
                                                FROM core__registro_sala r 
                                                LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
                                                INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados 
                                                INNER JOIN gestion__usuarios gu ON r.creado_por = gu.id__usuarios
                                                WHERE gu.fk_aux__hospitales =".$hospital;
                                            }
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<tr>";  
                                                        echo "<td>$usuario[id_core__registro_sala]</td>";  
                                                        echo "<td>$usuario[nombre]</td>";  
                                                        echo "<td>$usuario[documento]</td>"; 
                                                        echo "<td>$usuario[celular]</td>";
                                                        ($usuario['fk_atributos__estados']==2)?$label="badge-success":$label="badge-danger";
                                                        echo "<td id='estado_$usuario[id_core__registro_sala]'><div class='mb-2 mr-2 badge $label'>$usuario[nombre_estado]</div></td>";
                                                        if($usuario['fk_atributos__estados']==2){
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__registro_sala]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea cancelar el acceso a $usuario[nombre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=5&estado=3&codigo=$usuario[id_core__registro_sala]','panel','evaluar');}\">
                                                                        <i class='fa fa-times'></i>
                                                                    </button>
                                                                </td>";
                                                        }else{
                                                            echo "<td class='text-center' id='ar_$usuario[id_core__registro_sala]'>
                                                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea reactivar el acceso a $usuario[nombre]')){
                                                                        ajax('configuracionUsuariosActualizar.php','opcion=5&estado=2&codigo=$usuario[id_core__registro_sala]','panel','evaluar');}\">
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
                                                <th>Documento</th>
                                                <th>Telefono</th>
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
            $("#menuListaUsuarias").addClass("mm-active");
            $("#regAtencSala").addClass("mm-show");
            $('#listDonantes').DataTable({
                "order": [[ 5, "asc" ]]
            });	

        });

        function descargar(){
                window.open("excel/data_ListaUsuariaSala.php?",'_blank');
            }

    </script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>