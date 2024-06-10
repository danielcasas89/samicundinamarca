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
                                    <div>Gestión de Usuarios
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <a href="crearUsuario.php"><button type="button" class=" btn btn-info"><span class="btn-icon-wrapper pr-2 opacity-7"><i class="fas fa-user-plus fa-w-20"></i></span>Crear Usuario</button></a>
                                </div>    </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Usuarios Activos
                                    </div>                                    
                                    <div class="table-responsive" style="padding: 15px;">
                                        <table id="userTables" class="align-middle mb-0 table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Login</th>
                                                <th class="text-center">Perfil</th>
                                                <th class="text-center">Hospital</th>
                                                <th class="text-center">Correo</th>
                                                <th class="text-center">Último acceso</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Clave</th>
                                                <th class="text-center">Activar /   Desactivar</th>
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
                                            $consulta="SELECT usuario.id__usuarios,nombre_perfiles,superior.nombre AS ns,usuario.nombre AS nu,usuario.mail,usuario.dependencia,usuario.telefono_contacto,nombre_hospital,
                                            usuario.login,usuario.ultimo_acceso,atributos__estados.nombre AS ne,id__estados
                                            FROM ((gestion__usuarios AS usuario INNER JOIN gestion__usuarios AS superior ON usuario.fk_gestion__usuarios=superior.id__usuarios)
                                            INNER JOIN atributos__estados ON usuario.fk_atributos__estados=id__estados)
                                            INNER JOIN gestion__perfiles ON usuario.fk_gestion__perfiles=id__perfiles 
                                            INNER JOIN aux__hospitales ON usuario.fk_aux__hospitales = aux__hospitales.id_hospital
                                            ORDER BY  `usuario`.`id__usuarios` asc;";
                                            $resultado=mysqli_query($conexion,$consulta);

                                            
            if(mysqli_num_rows($resultado)){
                while($usuario=mysqli_fetch_assoc($resultado)){  
                    echo "<td>$usuario[id__usuarios]</td>";  
                    echo "<td>$usuario[login]</td>"; 
                    echo "<td>$usuario[nombre_perfiles]</td>";
                    echo "<td>$usuario[nombre_hospital]</td>";
                    echo "<td>$usuario[mail]</td>";
                    if($usuario['ultimo_acceso']=='0000-00-00 00:00:00'){
                        echo "<TD><span class='label label-warning'>$usuario[ultimo_acceso]</span></td>";
                    }else{
                        echo "<td>$usuario[ultimo_acceso]</td>";
                    }
                    ($usuario['id__estados']==2)?$label="badge badge-success":$label="badge badge-danger";
                    echo "<td id='estado_$usuario[id__usuarios]'><div class='$label'>$usuario[ne]</div></td>";

                    if($_SESSION['perfil']=='Administrador Sistema'){
                        echo "<td class='text-center'>
                                    <button class='btn btn-primary btn-sm passigID' onclick='passID($usuario[id__usuarios])' data-toggle='modal' data-backdrop='false' data-id='$usuario[id__usuarios]' data-target='#cambioClaveModal'>Cambiar Clave</button>
                                </td>";
                        
                        if($usuario['id__estados']==2){
                            echo "<td class='text-center' id='ar_$usuario[id__usuarios]'>
                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea cancelar el acceso a $usuario[login]')){
                                        ajax('configuracionUsuariosActualizar.php','opcion=7&estado=3&codigo=$usuario[id__usuarios]','panel','evaluar');}\">
                                        <i class='fa fa-times'></i>
                                    </button>
                                </td>";
                        }else{
                            echo "<td class='text-center' id='ar_$usuario[id__usuarios]'>
                                    <button class='btn btn-default btn-xs' onClick=\"if(confirm('Confirma que desea reactivar el acceso a $usuario[login]')){
                                        ajax('configuracionUsuariosActualizar.php','opcion=7&estado=2&codigo=$usuario[id__usuarios]','panel','evaluar');}\">
                                        <i class='fa fa-check'></i>
                                    </button>
                                </td>";
                        }    
                    }else{
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
                                                <th class="text-center">#</th>
                                                <th class="text-center">Login</th>
                                                <th class="text-center">Perfil</th>
                                                <th class="text-center">Hospital</th>
                                                <th class="text-center">Correo</th>
                                                <th class="text-center">Último acceso</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Clave</th>
                                                <th class="text-center">Activar / Desactivar</th>
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
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>
                    <script>
        $(document).ready(function() {
            
            $('.mm-active').removeClass('mm-active');
            $("#gestionarUsuarios").addClass("mm-active");

            
            
            $('#userTables').DataTable({
                "order": [[ 5, "desc" ]]
                });

            $('.passigID').click(function()
            {
                var id = $(this).attr('data-id');    
                console.warn(id);
                $("#id__usuario").val(id); 
                    
            });

            

            $('#actualizarClave').click(function()
            {
                $(".passNotMatch").hide();
                var idNew = $(this).attr('data-id');  
                var id = $('#id__usuario').val();   
                var clave1 =  $('#clave1').val();  
                var clave2 =  $('#clave2').val(); 
                if (clave1 != clave2)
                {
                    $(".passNotMatch").show();
                    return;
                }
                else
                {
                    $.ajax({
                        url: '../php/services/Front.php',
                        type: 'POST',
                        async: true,
                        dataType: 'json',
                        data: {
                            command: 'actualizarClaveUsuario',
                            id__usuario:id,
                            clave: clave1

                        },
                        success: function(rta){  
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
                }
            });

        });

        function passID(id)
            {  
                console.warn(id);
                $("#id__usuario").val(id); 

            }
    </script>
<div class="modal fade" id="cambioClaveModal" tabindex="-999999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:999999999999999 !important;">
        <div class="modal-dialog" role="document" style="width:400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning fade show passNotMatch" role="alert">Contraseñas no coinciden.</div>
                    <div class="form-group ">  
                        <div class=" form-group col-md-12">
                            <label for="clave1" class="">Nueva Contraseña:</label>
                            <input name="clave1" id="clave1" placeholder="" type="password" class="form-control">
                        </div>
                        <div class=" form-group col-md-12">
                            <label for="clave2" class="">Repita Contraseña:</label>
                            <input name="clave2" id="clave2" placeholder="" type="password" class="form-control">
                        </div>
                            <input name="id__usuario" id="id__usuario" placeholder="" type="hidden" readonly class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success" id="actualizarClave">Actualizar</button>
                </div>
            </div>
        </div>
    </div>