<?php
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/header.php';
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
                                    <div>Crear Usuario
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="card-header">Nuevo Usuario
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Usuario creado exitosamente.</div>
                                    <div class="alert alert-warning fade show saveError" role="alert">Claves no coinciden.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_usuarios">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombre" class="">Nombre Completo:</label>
                                                        <input name="nombre" id="nombre" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="mail" class="">Correo Electrónico:</label>
                                                        <input name="mail" id="mail" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="telefono_contacto" class="">Telefono:</label>
                                                        <input name="telefono_contacto" id="telefono_contacto" type="number" class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-5 regis">
                                                        <label for="curso_iami" class="">Curso IAMII: </label>
                                                        <select name="curso_iami" id="curso_iami" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_curso_iami" class="">Fecha curso:</label>
                                                        <input class="form-control" type="date" value="" id="fecha_curso_iami" name='fecha_curso_iami'>
                                                    </div>
                                                    <div class=" form-group col-md-3 regis">
                                                        <label for="duracion_iami" class="">Duración curso(h):</label>
                                                        <input name="duracion_iami" id="duracion_iami" type="number" min="0" class="form-control">
                                                    </div>


                                                    <div class=" form-group col-md-5 regis">
                                                        <label for="curso_consejeria" class="">Curso Consejería en Lactancia Materna: </label>
                                                        <select name="curso_consejeria" id="curso_consejeria" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_curso_consejeria" class="">Fecha curso:</label>
                                                        <input class="form-control" type="date" value="" id="fecha_curso_consejeria" name='fecha_curso_consejeria'>
                                                    </div>
                                                    <div class=" form-group col-md-3 regis">
                                                        <label for="duracion_consejeria" class="">Duración curso(h):</label>
                                                        <input name="duracion_consejeria" id="duracion_consejeria" type="number" min="0" class="form-control">
                                                    </div>


                                                    <div class=" form-group col-md-5 regis">
                                                        <label for="curso_leche" class="">Curso Procesamiento y control de calidad de leche humana: </label>
                                                        <select name="curso_leche" id="curso_leche" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                    </select></div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_curso_leche" class="">Fecha curso:</label>
                                                        <input class="form-control" type="date" value="" id="fecha_curso_leche" name='fecha_curso_leche'>
                                                    </div>
                                                    <div class=" form-group col-md-3 regis">
                                                        <label for="duracion_leche" class="">Duración curso(h):</label>
                                                        <input name="duracion_leche" id="duracion_leche" type="number" min="0" class="form-control">
                                                    </div>


                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="profesion" class="">Profesión: </label>
                                                        <select name="profesion" id="profesion" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='Jefe de enfermería'>Jefe de enfermería</option>
                                                        <option value='Auxiliar de enfermería'>Auxiliar de enfermería</option>
                                                        <option value='Médico'>Médico</option>
                                                        <option value='Médico especialista'>Médico especialista</option>
                                                        <option value='Nutricionista Dietista'>Nutricionista Dietista</option>
                                                        <option value='Otro'>Otro</option>
                                                    </select></div>


                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fk_gestion__perfiles" class="">Perfil:</label>
                                                        <select id='fk_gestion__perfiles' required name='fk_gestion__perfiles' class='form-control' required>
                                                            <option value=''>--</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="hospital" class="">Hospital:</label>
                                                        <select id='hospital' required name='hospital' class='form-control' >
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="login" class="">Usuario:</label>
                                                        <input name="login" id="login" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="password" class="">Contraseña:</label>
                                                        <input name="password" id="password" placeholder="" type="password" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="password2" class="">Repita Contraseña:</label>
                                                        <input name="password2" id="password2" placeholder="" type="password" class="form-control" required>
                                                    </div>
                                                    <br>

                                            <div class=" form-group col-md-4 regis"><br>
                                            <button type="submit" class="mt-2 btn btn-primary">Crear Usuario</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


            </div>
            </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#gestionarUsuarios").addClass("mm-active");

        function listarPerfiles(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarPerfiles'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#fk_gestion__perfiles").append("<option value='"+rta.data[i].id__perfiles+"'>"+rta.data[i].nombre_perfiles+"</option>");
                    }
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

        function listarHospitales(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarHospitalUsuario'
                },
                success: function(rta){
                   $("#hospital").append("<option value=''>--</option>");
                    for(var i=0;i<rta.data.length;i++){
                        $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                    }
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

        $( "#curso_iami").change(function()
        {
            var cursoRealizado = $(this).val();
            if (cursoRealizado == "SI")
            {
                $("#fecha_curso_iami").prop( "disabled", false );
                $("#duracion_iami").prop( "disabled", false );
            }
            else
            {
                $("#fecha_curso_iami").prop( "disabled", true );
                $("#duracion_iami").prop( "disabled", true );
            }
        });

        $( "#curso_consejeria").change(function()
        {
            var cursoRealizado = $(this).val();
            if (cursoRealizado == "SI")
            {
                $("#fecha_curso_consejeria").prop( "disabled", false );
                $("#duracion_consejeria").prop( "disabled", false );
            }
            else
            {
                $("#fecha_curso_consejeria").prop( "disabled", true );
                $("#duracion_consejeria").prop( "disabled", true );
            }
        });

        $( "#curso_leche").change(function()
        {
            var cursoRealizado = $(this).val();
            if (cursoRealizado == "SI")
            {
                $("#fecha_curso_leche").prop( "disabled", false );
                $("#duracion_leche").prop( "disabled", false );
            }
            else
            {
                $("#fecha_curso_leche").prop( "disabled", true );
                $("#duracion_leche").prop( "disabled", true );
            }
        });
        listarPerfiles();
        listarHospitales();
});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>