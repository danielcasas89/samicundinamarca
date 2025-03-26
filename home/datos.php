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
         <div>
            Estrategia Instituciones Amigas de la Mujer y la infancia con enfoque integral - IAMII
            <div class="page-title-subheading">Se debe diligenciar cada trimestre calendario
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6 offset-md-3">
      <div class="main-card mb-3 card">
         <div class="card-header">MIS DATOS
         </div>
         <div class="tab-content">
            <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card-body">
                        <form id="registro_datos_usuario">
                        <div class="form-row">
                           <div class=" form-group col-md-6 regis">
                              <label for="login" class="">Usuario:</label>
                              <input name="login" id="login" readonly type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="nombre_perfiles" class="">Perfil:</label>
                              <input name="nombre_perfiles" id="nombre_perfiles" readonly type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="nombre" class="">Nombre:</label>
                              <input name="nombre" id="nombre" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="identificacion" class="">Identificación:</label>
                              <input name="identificacion" id="identificacion" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-12 regis">
                              <label for="mail" class="">Correo electrónico:</label>
                              <input name="mail" id="mail" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="telefono_contacto" class="">Telefono contacto:</label>
                              <input name="telefono_contacto" id="telefono_contacto" placeholder="" type="number" min="0" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="dependencia" class="">Dependencia:</label>
                              <input name="dependencia" id="dependencia" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <button type="submit" class="mt-2 btn btn-primary">Actualizar</button>
                           </div>
                        </div>
                     </div>
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
        $("#menuDatos").addClass("mm-active");

        function listarDatosPersonales(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDatosUsuario'
                },
                success: function(rta){
                    if (rta.type != "error" && rta.data.length > 0)
                    {
                        console.warn(rta);
                        $('#login').val(rta.data[0].login);
                        $('#nombre_perfiles').val(rta.data[0].nombre_perfiles);
                        $('#nombre').val(rta.data[0].nombre);
                        $('#identificacion').val(rta.data[0].identificacion);
                        $('#mail').val(rta.data[0].mail);
                        $('#telefono_contacto').val(rta.data[0].telefono_contacto);
                        $('#dependencia').val(rta.data[0].dependencia);
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

        listarDatosPersonales();
});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>