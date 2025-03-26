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
                                    <div>Lista de Pasteurización
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
                                    <div class="card-header">Lista de Pasteurización
                                   <!-- <button title="Descargar Lista Donantes" class="btn btn-success btn" onclick="dwd();" style="margin-left: 20px;"><i class="fa fa-download fa-5"></i></button>-->

                                    </div>
                                    <div class="table-responsive" style="padding: 10px;">

                                    <table id="listCurvas" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha</th>
                                                <th>Curva</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="firtLine" style="display: none;" >
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $perfil = $_SESSION['perfil'];
                                            $hospital = $_SESSION['fk_aux__hospitales'];
                                            if ($perfil == "Administrador Sistema")
                                            {
                                                $consulta="SELECT *,cr.fecha_creacion as FechaFrasco  FROM core__pasteurizacion_blh cr
                                                INNER JOIN core__registro_curva rc ON cr.curva = rc.id_core__registro_curva";

                                                //$usuario["fecha_elaboracion"]."/".$usuario["tipoFrasco"]."/".$usuario["cantidadFrascos"]."/".$usuario["volumenFrasco"];
                                            }
                                            else
                                            {
                                                $consulta="SELECT *,cr.fecha_creacion as FechaFrasco FROM core__pasteurizacion_blh cr
                                                INNER JOIN core__registro_curva rc ON cr.curva = rc.id_core__registro_curva
                                                INNER JOIN gestion__usuarios ge ON cr.creado_por = ge.id__usuarios
                                                where ge.fk_aux__hospitales=".$hospital;
                                            }
                                                $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){
                                                        $id = $usuario["fecha_elaboracion"]."/".$usuario["tipoFrasco"]."/".$usuario["cantidadFrascos"]."/".$usuario["volumenFrasco"];
                                                        echo "<tr>";
                                                        echo "<td>$usuario[id_core__pasteurizacion_blh]</td>";
                                                        echo "<td>$usuario[FechaFrasco]</td>";
                                                        echo "<td>$id</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                mysqli_free_result($resultado);
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha</th>
                                                <th>Curva</th>
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
            $("#menuListaCiclos").addClass("mm-active");
            $("#regCurva").addClass("mm-show");
            $('#listCurvas').DataTable({
                "order": [[ 0, "desc" ]]

            });
        });

        function dwd(){
            window.open("excel/data_DonantesSala.php?",'_blank');
            }
    </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>