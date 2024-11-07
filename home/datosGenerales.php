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
         <div>
            Estrategia Instituciones Amigas de la Mujer y la infancia con enfoque integral - IAMII
            <div class="page-title-subheading">Se debe diligenciar cada trimestre calendario
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="main-card mb-3 card">
         <div class="card-header">DATOS GENERALES DE LA INSTITUCIÒN
         </div>
         <div class="tab-content">
            <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
               <div class="row">
                  <div class="col-md-12">
                     <h5 class="card-title"></h5>
                     <div class="card-body">
                        <form id="registro_datos_generales">
                        <div class="form-row">
                           <div class=" form-group col-md-5 regis">
                              <label for="hospital" class="">Institución:</label>
                              <select id='hospital' required name='hospital' class='form-control' >
                              </select>
                           </div>
                           <div class=" form-group col-md-3 regis">
                              <label for="direccion" class="">Dirección:</label>
                              <input name="direccion" id="direccion" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="departamento" class="">Departamento:</label>
                              <select id='departamento' required name='departamento' class='form-control' >
                                 <option value=''>--</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="municipio" class="">Municipio:</label>
                              <select id='municipio' required name='municipio' class='form-control' >
                                 <option value=''>--</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="telefono" class="">Telefono institucional:</label>
                              <input name="telefono" id="telefono" placeholder="" type="number" class="form-control">
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="correo" class="">Correo institucional:</label>
                              <input name="correo" id="correo" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="gerente" class="">Nombre del Gerente y/o representante legal de la Institución</label>
                              <input name="gerente" id="gerente" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="tel_gerente" class="">Teléfono Gerente</label>
                              <input name="tel_gerente" id="tel_gerente" placeholder="" type="number" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="referente_iami" class="">Referente IAMII:</label>
                              <input name="referente_iami" id="referente_iami" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="profesion" class="">Profesion:</label>
                              <input name="profesion" id="profesion" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="telefono_referente" class="">Teléfono referente:</label>
                              <input name="telefono_referente" id="telefono_referente" placeholder="" type="number" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="correo_referente" class="">Correo referente:</label>
                              <input name="correo_referente" id="correo_referente" placeholder="" type="text" class="form-control">
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="tipoInstitucion" class="">Tipo de institución</label>
                              <select name="tipoInstitucion" id="tipoInstitucion" class="form-control">
                                 <option value=''>--</option>
                                 <option value='PUBLICA'>PUBLICA</option>
                                 <option value='PRIVADA'>PRIVADA</option>
                                 <option value='MIXTA'>MIXTA</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-2 regis">
                              <label for="nivel_complejidad" class="">Nivel de Complejidad</label>
                              <input name="nivel_complejidad" id="nivel_complejidad" placeholder="" type="number" class="form-control">
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="cuidadoPreconcepcional" class="">Ofrece atención para el cuidado preconcepcional:</label>
                              <select name="cuidadoPreconcepcional" id="cuidadoPreconcepcional" class="form-control">
                                 <option value=''>--</option>
                                 <option value='SI'>SI</option>
                                 <option value='NO'>NO</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-2 regis">
                              <label for="consultaPrenatal" class="">Ofrece control y/o Consulta prenatal:</label>
                              <select name="consultaPrenatal" id="consultaPrenatal" class="form-control">
                                 <option value=''>--</option>
                                 <option value='SI'>SI</option>
                                 <option value='NO'>NO</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-4 regis">
                              <label for="partos" class="">Ofrece atención<br> del parto:</label>
                              <select name="partos" id="partos" class="form-control">
                                 <option value=''>--</option>
                                 <option value='SI'>SI</option>
                                 <option value='NO'>NO</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-6 regis">
                              <label for="controlNinoSanoEnf" class="">Ofrece atención integral en salud individual para niños y niñas en primera infancia</label>
                              <select name="controlNinoSanoEnf" id="controlNinoSanoEnf" class="form-control">
                                 <option value=''>--</option>
                                 <option value='SI'>SI</option>
                                 <option value='NO'>NO</option>
                              </select>
                           </div>
                           <div class=" form-group col-md-4 regis">
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
<?php
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>
 <script>
    $(document).ready(function(){function a(a){$("#registro_datos_generales")[0].reset(),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"cargarDatosGenerales",idHospital:a},success:function(e){console.warn("rta2"),console.warn(e),"error"!=e.type&&e.data.length>0&&($("#direccion").val(e.data[0].direccion),$("#departamento").val(e.data[0].departamento),$("#municipio").append("<option value='"+e.data[0].id_municipio+"'>"+e.data[0].nombre_municipio+"</option>"),$("#municipio").val(e.data[0].id_municipio),$("#telefono").val(e.data[0].telefono),$("#correo").val(e.data[0].correo),$("#gerente").val(e.data[0].gerente),$("#tel_gerente").val(e.data[0].tel_gerente),$("#referente_iami").val(e.data[0].referente_iami),$("#profesion").val(e.data[0].profesion),$("#telefono_referente").val(e.data[0].telefono_referente),$("#correo_referente").val(e.data[0].correo_referente),$("#cuidadoPreconcepcional").val(e.data[0].cuidadoPreconcepcional),$("#coordIami").val(e.data[0].coordIami),$("#tel_coordIami").val(e.data[0].tel_coordIami),$("#subgerenteCient").val(e.data[0].subgerenteCient),$("#tel_subgerenteCient").val(e.data[0].tel_subgerenteCient),$("#subGerAdmin").val(e.data[0].subGerAdmin),$("#tel_subGerAdmin").val(e.data[0].tel_subGerAdmin),$("#subGerComu").val(e.data[0].subGerComu),$("#tel_subGerComu").val(e.data[0].tel_subGerComu),$("#repCalidad").val(e.data[0].repCalidad),$("#tel_repCalidad").val(e.data[0].tel_repCalidad),$("#tipoInstitucion").val(e.data[0].tipoInstitucion),$("#nivel_complejidad").val(e.data[0].nivel_complejidad),$("#consultaPrenatal").val(e.data[0].consultaPrenatal),$("#partos").val(e.data[0].partos),$("#controlNinoSanoEnf").val(e.data[0].controlNinoSanoEnf)),$("#hospital").val(a)},error:function(a,e,o){"undefined"!=typeof callbackError?callbackError(e):alert("Error en la conexion con el servidor: "+e)}})}$(".mm-active").removeClass("mm-active"),$("#menuDatos").addClass("mm-active"),$("#departamento").change(function(){var a=$(this).val();$("#municipio").html('<option value="">--</option>'),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"listarMunicipiosPorDepartamentos",idDepartamento:a},success:function(a){console.warn(a);for(var e=0;e<a.data.length;e++)$("#municipio").append("<option value='"+a.data[e].id_municipio+"'>"+a.data[e].nombre_municipio+"</option>")},error:function(a,e,o){"undefined"!=typeof callbackError?callbackError(e):alert("Error en la conexion con el servidor: "+e)}})}),$("#hospital").change(function(){a($(this).val())}),$("#fecha_nacimiento").on("input",function(a){var e=$(this).val(),o=new Date(e),t=Date.now()-o.getTime(),n=Math.abs(new Date(t).getUTCFullYear()-1970);n>1&&n<90&&$("#edad").val(n)}),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"listarDepartamentos"},success:function(a){for(var e=0;e<a.data.length;e++)$("#departamento").append("<option value='"+a.data[e].nombre_departamento+"'>"+a.data[e].nombre_departamento+"</option>")},error:function(a,e,o){"undefined"!=typeof callbackError?callbackError(e):alert("Error en la conexion con el servidor: "+e)}}),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"listarHospitalUsuario"},success:function(e){if("IAMII"==e.perfil)$("#hospital").append("<option value='"+e.data[0].id_hospital+"'>"+e.data[0].nombre_hospital+"</option>"),$("#hospital").prop("disabled",!0);else if("Administrador Sistema"==e.perfil||"Administrador IAMII"==e.perfil){$("#hospital").append("<option value=''>--</option>");for(var o=0;o<e.data.length;o++)$("#hospital").append("<option value='"+e.data[o].id_hospital+"'>"+e.data[o].nombre_hospital+"</option>")}else{$("#hospital").append("<option value=''>--</option>");for(var o=0;o<e.data.length;o++)$("#hospital").append("<option value='"+e.data[o].id_hospital+"'>"+e.data[o].nombre_hospital+"</option>");$("#hospital").prop("disabled",!0)}null!=e.idHospital&&a(e.idHospital)},error:function(a,e,o){"undefined"!=typeof callbackError?callbackError(e):alert("Error en la conexion con el servidor: "+e)}})});
 </script>