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
            Selección y Clasificación
            <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="main-card mb-3 card">
         <div class="card-header ">Selección y Clasificación
         </div>
         <div class="tab-content">
            <div class="alert alert-success fade show saveSuccess" role="alert">Procesamiento creado exitosamente.</div>
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card-body">
                        <form id="registro_procesamiento">
                           <div class="form-row">
                              <div class=" form-group col-md-4 regis">
                                 <label for="frasco1" class="">Seleccione frasco:</label>
                                 <select id='frasco1' required name='frasco1' class='form-control' >
                                    <option value=''>--</option>
                                 </select>
                              </div>
                           </div>
                           <hr/>
                           <div class="form-row">
                              <div class=" form-group col-md-4 regis">
                                 <label for="nombre" class="">Nombre:</label>
                                 <input name="nombre" id="nombre" placeholder="" type="text" readonly class="form-control">
                                 <input name="id_registro_blh" id="id_registro_blh" placeholder="" type="hidden" readonly class="form-control">
                              </div>
                              <div class=" form-group col-md-4 regis">
                                 <label for="fecha_extraccion" class="">Fecha Extracción:</label>
                                 <input class="form-control" type="text" value="" id="fecha_extraccion" readonly name='fecha_extraccion'>
                              </div>
                              <div class="col-md-4">
                                 <label for="cantidad" class="">Cantidad:</label>
                                 <div class="input-group mb-2">
                                    <input type="number" class="form-control" readonly name="cantidad" id="cantidad" placeholder="">
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">mL</div>
                                    </div>
                                 </div>
                              </div>
                              <div class=" form-group col-md-4 regis">
                                 <label for="recoleccionEn" class="">Recolección en:</label>
                                 <input name="recoleccionEn" id="recoleccionEn" placeholder="" type="text" readonly class="form-control">
                              </div>
                              <div class="col-md-4">
                                 <label for="tipoLeche" class="">Tipo de Leche:</label>
                                 <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="tipoLeche" id="tipoLeche" readonly placeholder="">
                                    <div class="input-group-prepend">
                                       <div class="input-group-text">días</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="col-md-12">
                     <div class="card-header">Organoleptica</div><br>
                     <div class="form-row">
                     <div class=" form-group col-md-3 regis">
                     <label for="embalaje" class="">Embalaje </label>
                     <select name="embalaje" id="embalaje" class="selectEvent form-control">
                     <option value=''>--</option>
                     <option value='CUMPLE'>CUMPLE</option>
                     <option value='NO CUMPLE'>NO CUMPLE</option>
                     </select></div>
                     <div class=" form-group col-md-3 regis">
                     <label for="impurezas" class="">Impurezas </label>
                     <select name="impurezas" id="impurezas" class="selectEvent form-control">
                     <option value=''>--</option>
                     <option value='CUMPLE'>CUMPLE</option>
                     <option value='NO CUMPLE'>NO CUMPLE</option>
                     </select></div>
                     <div class=" form-group col-md-3 regis">
                     <label for="color" class="">Color </label>
                     <select name="color" id="color" class="selectEvent form-control">
                     <option value=''>--</option>
                     <option value='CUMPLE'>CUMPLE</option>
                     <option value='NO CUMPLE'>NO CUMPLE</option>
                     </select></div>
                     <div class=" form-group col-md-3 regis">
                     <label for="flavor" class="">Flavor </label>
                     <select name="flavor" id="flavor" class="selectEvent form-control">
                     <option value=''>--</option>
                     <option value='CUMPLE'>CUMPLE</option>
                     <option value='NO CUMPLE'>NO CUMPLE</option>
                     </select></div>
                     </div>
                     </div>
                     <div class="col-md-12">
                     <div class="card-header">Acidez Dornic (°D)</div><br>
                     <div class="form-row">
                     <div class="form-group col-md-2 regis">
                     <label for="acidez1" class="">Acidez 1</label>
                     <input name="acidez1" id="acidez1" placeholder="" type="number" min="0" class="form-control invent">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="acidez2" class="">Acidez 2</label>
                     <input name="acidez2" id="acidez2" placeholder="" type="number" min="0"  class="form-control invent">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="acidez3" class="">Acidez 3</label>
                     <input name="acidez3" id="acidez3" placeholder="" type="number" min="0"  class="form-control invent">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="media" class="">Media</label>
                     <input name="media" id="media" placeholder="" readonly type="number" min="0"  class="form-control">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="factor" class="">Factor</label>
                     <input name="factor" id="factor" placeholder="" type="text" class="form-control" value="1">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="resultado" class="">Resultado</label>
                     <input name="resultado" id="resultado" placeholder="" readonly type="text" class="form-control">
                     </div>
                     </div>
                     </div>
                     <div class="col-md-12">
                     <div class="card-header">Crematocrito (Kcal/L)</div><br>
                     <div class="form-row">
                     <div class="form-group col-md-1 regis">
                     <label for="ct1" class="">CT 1</label>
                     <input name="ct1" id="ct1" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="ct2" class="">CT 2</label>
                     <input name="ct2" id="ct2" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="ct3" class="">CT 3</label>
                     <input name="ct3" id="ct3" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="mediact" class="">Media CT</label>
                     <input name="mediact" id="mediact" placeholder="" type="text" readonly class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="cc1" class="">CC 1</label>
                     <input name="cc1" id="cc1" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="cc2" class="">CC 2</label>
                     <input name="cc2" id="cc2" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="cc3" class="">CC 3</label>
                     <input name="cc3" id="cc3" placeholder="" type="text" class="form-control">
                     </div>
                     <div class="form-group col-md-1 regis">
                     <label for="mediacc" class="">Media CC</label>
                     <input name="mediacc" id="mediacc" placeholder="" type="text" readonly class="form-control">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="crema" class="">% Crema</label>
                     <input name="crema" id="crema" placeholder="" type="text" readonly class="form-control">
                     </div>
                     <div class="form-group col-md-2 regis">
                     <label for="kcal" class="">Kcal/Onz</label>
                     <input name="kcal" id="kcal" placeholder="" type="text" readonly class="form-control">
                     </div>
                     <div class=" form-group col-md-4 regis">
                     <button type="submit" class="mt-2 btn btn-primary">Registrar</button>
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
</div>
<?php
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>
 <script>
  $(document).ready(function(){$(".mm-active").removeClass("mm-active"),$("#menuRegistroProcesamiento").addClass("mm-active"),$("#mediacc").on("change keyup",function(){var a=$(this).val(),t=$("#mediact").val(),d=(100*a/t).toFixed(2);$("#crema").val(d)}),$("#crema").on("change keyup",function(){var a,t=((66.8*$("#crema").val()+290)/33.3).toFixed(2);$("#kcal").val(t)}),$("#acidez3").on("input",function(a){var t=$(this).val(),d=$("#acidez2").val(),e=$("#acidez1").val(),i=$("#factor").val();if(""!=e&&""!=d){var c=(parseFloat(e)+parseFloat(d)+parseFloat(t))/3;$("#media").val(c.toFixed(2));var l=c*i;$("#resultado").val(l.toFixed(2)),l>8?($("#ct1").attr("disabled",!0),$("#ct2").attr("disabled",!0),$("#ct3").attr("disabled",!0),$("#mediact").attr("disabled",!0),$("#cc1").attr("disabled",!0),$("#cc2").attr("disabled",!0),$("#cc3").attr("disabled",!0),$("#mediacc").attr("disabled",!0),$("#crema").attr("disabled",!0),$("#kcal").attr("disabled",!0)):($("#ct1").attr("disabled",!1),$("#ct2").attr("disabled",!1),$("#ct3").attr("disabled",!1),$("#mediact").attr("disabled",!1),$("#cc1").attr("disabled",!1),$("#cc2").attr("disabled",!1),$("#cc3").attr("disabled",!1),$("#mediacc").attr("disabled",!1),$("#crema").attr("disabled",!1),$("#kcal").attr("disabled",!1))}}),$("#acidez2").on("input",function(a){var t=$(this).val(),d=$("#acidez3").val(),e=$("#acidez1").val(),i=$("#factor").val();if(""!=e&&""!=d){var c=(parseFloat(e)+parseFloat(t)+parseFloat(d))/3;$("#media").val(c.toFixed(2));var l=c*i;$("#resultado").val(l.toFixed(2)),l>8?($("#ct1").attr("disabled",!0),$("#ct2").attr("disabled",!0),$("#ct3").attr("disabled",!0),$("#mediact").attr("disabled",!0),$("#cc1").attr("disabled",!0),$("#cc2").attr("disabled",!0),$("#cc3").attr("disabled",!0),$("#mediacc").attr("disabled",!0),$("#crema").attr("disabled",!0),$("#kcal").attr("disabled",!0)):($("#ct1").attr("disabled",!1),$("#ct2").attr("disabled",!1),$("#ct3").attr("disabled",!1),$("#mediact").attr("disabled",!1),$("#cc1").attr("disabled",!1),$("#cc2").attr("disabled",!1),$("#cc3").attr("disabled",!1),$("#mediacc").attr("disabled",!1),$("#crema").attr("disabled",!1),$("#kcal").attr("disabled",!1))}}),$("#acidez1").on("input",function(a){var t=$(this).val(),d=$("#acidez2").val(),e=$("#acidez3").val(),i=$("#factor").val();if(""!=d&&""!=e){var c=(parseFloat(t)+parseFloat(d)+parseFloat(e))/3;$("#media").val(c.toFixed(2));var l=c*i;$("#resultado").val(l.toFixed(2)),l>8?($("#ct1").attr("disabled",!0),$("#ct2").attr("disabled",!0),$("#ct3").attr("disabled",!0),$("#mediact").attr("disabled",!0),$("#cc1").attr("disabled",!0),$("#cc2").attr("disabled",!0),$("#cc3").attr("disabled",!0),$("#mediacc").attr("disabled",!0),$("#crema").attr("disabled",!0),$("#kcal").attr("disabled",!0)):($("#ct1").attr("disabled",!1),$("#ct2").attr("disabled",!1),$("#ct3").attr("disabled",!1),$("#mediact").attr("disabled",!1),$("#cc1").attr("disabled",!1),$("#cc2").attr("disabled",!1),$("#cc3").attr("disabled",!1),$("#mediacc").attr("disabled",!1),$("#crema").attr("disabled",!1),$("#kcal").attr("disabled",!1))}}),$("#ct1").on("input",function(a){var t=$(this).val(),d=$("#ct2").val(),e=$("#ct3").val();if(""!=d&&""!=e){var i=(parseFloat(t)+parseFloat(d)+parseFloat(e))/3;$("#mediact").val(i.toFixed(2))}}),$("#ct2").on("input",function(a){var t=$(this).val(),d=$("#ct1").val(),e=$("#ct3").val();if(""!=d&&""!=e){var i=(parseFloat(d)+parseFloat(t)+parseFloat(e))/3;$("#mediact").val(i.toFixed(2))}}),$("#ct3").on("input",function(a){var t=$(this).val(),d=$("#ct2").val(),e=$("#ct1").val();if(""!=d&&""!=e){var i=(parseFloat(e)+parseFloat(d)+parseFloat(t))/3;$("#mediact").val(i.toFixed(2))}}),$("#cc1").on("input",function(a){var t=$(this).val(),d=$("#cc2").val(),e=$("#cc3").val();if(""!=d&&""!=e){var i=(parseFloat(t)+parseFloat(d)+parseFloat(e))/3;$("#mediacc").val(i.toFixed(2))}}),$("#cc2").on("input",function(a){var t=$(this).val(),d=$("#cc1").val(),e=$("#cc3").val();if(""!=t&&""!=e){var i=(parseFloat(d)+parseFloat(t)+parseFloat(e))/3;$("#mediacc").val(i.toFixed(2))}}),$("#cc3").on("input",function(a){var t=$(this).val(),d=$("#cc1").val(),e=$("#cc2").val();if(""!=e&&""!=t){var i=(parseFloat(d)+parseFloat(e)+parseFloat(t))/3;$("#mediacc").val(i.toFixed(2))}}),$(".selectEvent").change(function(){"NO CUMPLE"==$(this).val()||"NO CUMPLE"==$("#embalaje").val()||"NO CUMPLE"==$("#impurezas").val()||"NO CUMPLE"==$("#color").val()||"NO CUMPLE"==$("#flavor").val()?($("#acidez1").attr("disabled",!0),$("#acidez2").attr("disabled",!0),$("#acidez3").attr("disabled",!0),$("#media").attr("disabled",!0),$("#factor").attr("disabled",!0),$("#resultado").attr("disabled",!0),$("#ct1").attr("disabled",!0),$("#ct2").attr("disabled",!0),$("#ct3").attr("disabled",!0),$("#mediact").attr("disabled",!0),$("#cc1").attr("disabled",!0),$("#cc2").attr("disabled",!0),$("#cc3").attr("disabled",!0),$("#mediacc").attr("disabled",!0),$("#crema").attr("disabled",!0),$("#kcal").attr("disabled",!0),$("#embalaje").attr("disabled",!0),$("#impurezas").attr("disabled",!0),$("#color").attr("disabled",!0),$("#flavor").attr("disabled",!0),("embalaje"==this.id||"impurezas"==this.id||"color"==this.id||"flavor"==this.id)&&$("#"+this.id).attr("disabled",!1)):($("#acidez1").attr("disabled",!1),$("#acidez2").attr("disabled",!1),$("#acidez3").attr("disabled",!1),$("#media").attr("disabled",!1),$("#factor").attr("disabled",!1),$("#resultado").attr("disabled",!1),$("#ct1").attr("disabled",!1),$("#ct2").attr("disabled",!1),$("#ct3").attr("disabled",!1),$("#mediact").attr("disabled",!1),$("#cc1").attr("disabled",!1),$("#cc2").attr("disabled",!1),$("#cc3").attr("disabled",!1),$("#mediacc").attr("disabled",!1),$("#crema").attr("disabled",!1),$("#kcal").attr("disabled",!1),$("#embalaje").attr("disabled",!1),$("#impurezas").attr("disabled",!1),$("#color").attr("disabled",!1),$("#flavor").attr("disabled",!1))}),$("#frasco1").change(function(){$("#nombre").val(""),$("#celular").val(""),$("#id_registro_blh").val(""),$("#fecha_extraccion").val(""),$("#cantidad").val(""),$("#recoleccionEn").val(""),$("#tipoLeche").val("");var a=$(this).val();$("#municipio").html('<option value="">--</option>'),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"listarDetalleFrasco",idFrasco:a},success:function(a){console.warn(a),$("#nombre").val(a.data[0].nombre),$("#celular").val(a.data[0].celular),$("#id_registro_blh").val(a.data[0].id_registro_blh),$("#fecha_extraccion").val(a.data[0].fecha_extraccion),$("#cantidad").val(a.data[0].cantidad),$("#recoleccionEn").val(a.data[0].recoleccionEn),$("#tipoLeche").val(a.data[0].tipoLeche)},error:function(a,t,d){"undefined"!=typeof callbackError?callbackError(t):alert("Error en la conexion con el servidor: "+t)}})}),$.ajax({url:"../php/services/Front.php",type:"POST",async:!0,dataType:"json",data:{command:"listarFrascosBLH"},success:function(a){$("#frasco1").attr("disabled",!1);for(var t=0;t<a.data.length;t++)$("#frasco1").append("<option value='"+a.data[t].id_frasco+"'>"+a.data[t].id_frasco+"</option>")},error:function(a,t,d){"undefined"!=typeof callbackError?callbackError(t):alert("Error en la conexion con el servidor: "+t)}})});
 </script>