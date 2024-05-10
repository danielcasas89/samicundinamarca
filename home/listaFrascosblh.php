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
                                    <div class="d-inline-block dropdown">
                                        <a href="registroDonantesBLH.php"><button type="button" class=" btn btn-info"><span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa fa-business-time fa-w-20"></i></span>Registrar Donante</button></a>
                                    </div>
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
                                                <th>Fecha Recepción</th>
                                                <th>Días</th>
                                                <th>Estado</th>
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
                                            $consulta="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,cd.fecha_creacion as fechaRegistro FROM `core__donacion_blh` cd LEFT JOIN core__registro_blh cr ON cd.id_registro_blh = cr.id_registro_blh ORDER BY `DiasExtraccion` ASC";
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<tr>";  
                                                        echo "<td>$usuario[id_core__donacion_blh]</td>";
                                                        echo "<td>$usuario[id_frasco]</td>";  
                                                        echo "<td>$usuario[fechaRegistro]</td>";   
                                                        echo "<td>$usuario[nombre]</td>";    
                                                        echo "<td>$usuario[celular]</td>";  
                                                        echo "<td>$usuario[fecha_extraccion]</td>"; 
                                                        echo "<td>$usuario[cantidad]</td>";
                                                        echo "<td>$usuario[recoleccionEn]</td>";
                                                        echo "<td>$usuario[fecha_recepcion]</td>";
                                                        echo "<td>$usuario[DiasExtraccion]</td>";
                                                        if ($usuario['DiasExtraccion']<16)
                                                        {
                                                            $label="badge-success";
                                                            echo "<td id='estado_$usuario[id_core__donacion_blh]'><div class='mb-2 mr-2 badge $label'>ACTIVO</div></td>";
                                                        }
                                                        else
                                                        {
                                                            $label="badge-danger";
                                                            echo "<td id='estado_$usuario[id_core__donacion_blh]'><div class='mb-2 mr-2 badge $label'>DESCARTAR</div></td>";

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
                                                <th>Fecha Recepción</th>
                                                <th>Días</th>
                                                <th>Estado</th>
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
            $("#menuListaFrascos").addClass("mm-active");


            $('#listFrascos').DataTable( {
            "order": [[ 9, "asc" ]]
            
            });
        });

        function exportData(){
                window.open("excel/data_Frascos.php?",'_blank');
            }
    </script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>