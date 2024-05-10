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
                                    <div>Selección y Clasificación
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
                                                        <input type="number" class="form-control" readonly name="cantidad" id="cantidad" placeholder=""><div class="input-group-prepend">
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
                                                            <input type="number" class="form-control" name="tipoLeche" id="tipoLeche" readonly placeholder=""><div class="input-group-prepend">
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
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroProcesamiento").addClass("mm-active");

        function listarFrascos()
        {
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarFrascosBLH'
                },
                success: function(rta){                               
                    $('#frasco1').attr("disabled", false);  
                    for(var i=0;i<rta.data.length;i++){
                        $("#frasco1").append("<option value='"+rta.data[i].id_frasco+"'>"+rta.data[i].id_frasco+"</option>");
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

        
        $("#mediacc").on("change keyup", function() {
            var mediacc = $(this).val();
            var mediact = $('#mediact').val();
            var crema = mediacc*100/mediact;
            var result = crema.toFixed(2);
            $('#crema').val(result);
        });

        $("#crema").on("change keyup", function() {
            var crema = $('#crema').val();
            var kcal = (crema*66.8+290)/33.3;
            var result = kcal.toFixed(2);
            $('#kcal').val(result);
        });
              

        $('#acidez3').on('input',function(e)
        { 
            var acidez3 = $(this).val();
            var acidez2 = $('#acidez2').val();
            var acidez1 = $('#acidez1').val();
            var factor = $('#factor').val();
            if (acidez1 !="" && acidez2 !="" ){
                var media = (parseFloat(acidez1)+parseFloat(acidez2)+parseFloat(acidez3))/3;
                $('#media').val(media.toFixed(2));
                var resultado = media*factor;
                $('#resultado').val(resultado.toFixed(2));
                if (resultado > 8)
                {  
                    $('#ct1').attr("disabled", true);  
                    $('#ct2').attr("disabled", true);  
                    $('#ct3').attr("disabled", true);  
                    $('#mediact').attr("disabled", true); 
                    $('#cc1').attr("disabled", true); 
                    $('#cc2').attr("disabled", true); 
                    $('#cc3').attr("disabled", true); 
                    $('#mediacc').attr("disabled", true); 
                    $('#crema').attr("disabled", true); 
                    $('#kcal').attr("disabled", true); 
                }else{    
                    $('#ct1').attr("disabled", false);  
                    $('#ct2').attr("disabled", false);  
                    $('#ct3').attr("disabled", false);  
                    $('#mediact').attr("disabled", false); 
                    $('#cc1').attr("disabled", false); 
                    $('#cc2').attr("disabled", false); 
                    $('#cc3').attr("disabled", false); 
                    $('#mediacc').attr("disabled", false); 
                    $('#crema').attr("disabled", false); 
                    $('#kcal').attr("disabled", false); 
                }
                }           
        }); 

        $('#acidez2').on('input',function(e)
        { 
            var acidez2 = $(this).val();
            var acidez3 = $('#acidez3').val();
            var acidez1 = $('#acidez1').val();
            var factor = $('#factor').val();
            if (acidez1 !="" && acidez3 !="" ){
                var media = (parseFloat(acidez1)+parseFloat(acidez2)+parseFloat(acidez3))/3;
                $('#media').val(media.toFixed(2));
                var resultado = media*factor;
                $('#resultado').val(resultado.toFixed(2));
                if (resultado > 8)
                {  
                    $('#ct1').attr("disabled", true);  
                    $('#ct2').attr("disabled", true);  
                    $('#ct3').attr("disabled", true);  
                    $('#mediact').attr("disabled", true); 
                    $('#cc1').attr("disabled", true); 
                    $('#cc2').attr("disabled", true); 
                    $('#cc3').attr("disabled", true); 
                    $('#mediacc').attr("disabled", true); 
                    $('#crema').attr("disabled", true); 
                    $('#kcal').attr("disabled", true); 
                }else{    
                    $('#ct1').attr("disabled", false);  
                    $('#ct2').attr("disabled", false);  
                    $('#ct3').attr("disabled", false);  
                    $('#mediact').attr("disabled", false); 
                    $('#cc1').attr("disabled", false); 
                    $('#cc2').attr("disabled", false); 
                    $('#cc3').attr("disabled", false); 
                    $('#mediacc').attr("disabled", false); 
                    $('#crema').attr("disabled", false); 
                    $('#kcal').attr("disabled", false);   

                }
            }
        }); 

        $('#acidez1').on('input',function(e)
        { 
            var acidez1 = $(this).val();
            var acidez2 = $('#acidez2').val();
            var acidez3 = $('#acidez3').val();
            var factor = $('#factor').val();
            if (acidez2 !="" && acidez3 !="" ){
                var media = (parseFloat(acidez1)+parseFloat(acidez2)+parseFloat(acidez3))/3;
                $('#media').val(media.toFixed(2));
                var resultado = media*factor;
                $('#resultado').val(resultado.toFixed(2));
                if (resultado > 8)
                {  
                    $('#ct1').attr("disabled", true);  
                    $('#ct2').attr("disabled", true);  
                    $('#ct3').attr("disabled", true);  
                    $('#mediact').attr("disabled", true); 
                    $('#cc1').attr("disabled", true); 
                    $('#cc2').attr("disabled", true); 
                    $('#cc3').attr("disabled", true); 
                    $('#mediacc').attr("disabled", true); 
                    $('#crema').attr("disabled", true); 
                    $('#kcal').attr("disabled", true); 
                }else{    
                    $('#ct1').attr("disabled", false);  
                    $('#ct2').attr("disabled", false);  
                    $('#ct3').attr("disabled", false);  
                    $('#mediact').attr("disabled", false); 
                    $('#cc1').attr("disabled", false); 
                    $('#cc2').attr("disabled", false); 
                    $('#cc3').attr("disabled", false); 
                    $('#mediacc').attr("disabled", false); 
                    $('#crema').attr("disabled", false); 
                    $('#kcal').attr("disabled", false);   

                }
            }
        });

        $('#ct1').on('input',function(e)
        { 
            var ct1 = $(this).val();
            var ct2 = $('#ct2').val();
            var ct3 = $('#ct3').val();
            if (ct2 !="" && ct3 !="" ){
                var mediact = (parseFloat(ct1)+parseFloat(ct2)+parseFloat(ct3))/3;
                $('#mediact').val(mediact.toFixed(2));
            }
        });
 
        $('#ct2').on('input',function(e)
        { 
            var ct2 = $(this).val();
            var ct1 = $('#ct1').val();
            var ct3 = $('#ct3').val();
            if (ct1 !="" && ct3 !="" ){
                var mediact = (parseFloat(ct1)+parseFloat(ct2)+parseFloat(ct3))/3;
                $('#mediact').val(mediact.toFixed(2));
            }
        });
        
        $('#ct3').on('input',function(e)
        { 
            var ct3 = $(this).val();
            var ct2 = $('#ct2').val();
            var ct1 = $('#ct1').val();
            if (ct2 !="" && ct1 !="" ){
                var mediact = (parseFloat(ct1)+parseFloat(ct2)+parseFloat(ct3))/3;
                $('#mediact').val(mediact.toFixed(2));
            }
        });
        
        $('#cc1').on('input',function(e)
        { 
            var cc1 = $(this).val();
            var cc2 = $('#cc2').val();
            var cc3 = $('#cc3').val();
            if (cc2 !="" && cc3 !="" ){
                var mediacc = (parseFloat(cc1)+parseFloat(cc2)+parseFloat(cc3))/3;
                $('#mediacc').val(mediacc.toFixed(2));
            }
        });

        $('#cc2').on('input',function(e)
        { 
            var cc2 = $(this).val();
            var cc1 = $('#cc1').val();
            var cc3 = $('#cc3').val();
            if (cc2 !="" && cc3 !="" ){
                var mediacc = (parseFloat(cc1)+parseFloat(cc2)+parseFloat(cc3))/3;
                $('#mediacc').val(mediacc.toFixed(2));
            }
        });


        $('#cc3').on('input',function(e)
        { 
            var cc3 = $(this).val();
            var cc1 = $('#cc1').val();
            var cc2 = $('#cc2').val();
            if (cc2 !="" && cc3 !="" ){
                var mediacc = (parseFloat(cc1)+parseFloat(cc2)+parseFloat(cc3))/3;
                $('#mediacc').val(mediacc.toFixed(2));
            }
        });

        
        
        $( ".selectEvent").change(function()
        {
            var status = $(this).val();
           // var id = $(this).children(":selected").attr("id");
            console.warn(this.id);
            if (status == "NO CUMPLE" || ($("#embalaje").val() =='NO CUMPLE' || $("#impurezas").val() =='NO CUMPLE' || $("#color").val() =='NO CUMPLE' || $("#flavor").val() =='NO CUMPLE'))
            {                          
                $('#acidez1').attr("disabled", true);  
                $('#acidez2').attr("disabled", true);  
                $('#acidez3').attr("disabled", true);  
                $('#media').attr("disabled", true);  
                $('#factor').attr("disabled", true);  
                $('#resultado').attr("disabled", true);  
                $('#ct1').attr("disabled", true);  
                $('#ct2').attr("disabled", true);  
                $('#ct3').attr("disabled", true);  
                $('#mediact').attr("disabled", true); 
                $('#cc1').attr("disabled", true); 
                $('#cc2').attr("disabled", true); 
                $('#cc3').attr("disabled", true); 
                $('#mediacc').attr("disabled", true); 
                $('#crema').attr("disabled", true); 
                $('#kcal').attr("disabled", true);                 
                $('#embalaje').attr("disabled", true); 
                $('#impurezas').attr("disabled", true); 
                $('#color').attr("disabled", true); 
                $('#flavor').attr("disabled", true); 
                if (this.id == "embalaje" || this.id == "impurezas" || this.id == "color" || this.id == "flavor")
                {
                     $('#'+this.id).attr("disabled", false); 

                }
                
            }
            else{                          
                $('#acidez1').attr("disabled", false);  
                $('#acidez2').attr("disabled", false);  
                $('#acidez3').attr("disabled", false);  
                $('#media').attr("disabled", false);  
                $('#factor').attr("disabled", false);  
                $('#resultado').attr("disabled", false);  
                $('#ct1').attr("disabled", false);  
                $('#ct2').attr("disabled", false);  
                $('#ct3').attr("disabled", false);  
                $('#mediact').attr("disabled", false); 
                $('#cc1').attr("disabled", false); 
                $('#cc2').attr("disabled", false); 
                $('#cc3').attr("disabled", false); 
                $('#mediacc').attr("disabled", false); 
                $('#crema').attr("disabled", false); 
                $('#kcal').attr("disabled", false); 
                
                $('#embalaje').attr("disabled", false); 
                $('#impurezas').attr("disabled", false); 
                $('#color').attr("disabled", false); 
                $('#flavor').attr("disabled", false); 

            }
            console.warn($(this).val());
        });

        $( "#frasco1").change(function()
        {
            $('#nombre').val('');
            $('#celular').val('');
            $('#id_registro_blh').val('');
            $('#fecha_extraccion').val('');
            $('#cantidad').val('');
            $('#recoleccionEn').val('');
            $('#tipoLeche').val('');            
            
            var idFrasco = $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarDetalleFrasco',
                        idFrasco:idFrasco
                    },
                    success: function(rta){
                        console.warn(rta);
                        $('#nombre').val(rta.data[0].nombre);
                        $('#celular').val(rta.data[0].celular);
                        $('#id_registro_blh').val(rta.data[0].id_registro_blh); 
                        $('#fecha_extraccion').val(rta.data[0].fecha_extraccion);
                        $('#cantidad').val(rta.data[0].cantidad);
                        $('#recoleccionEn').val(rta.data[0].recoleccionEn);
                        $('#tipoLeche').val(rta.data[0].tipoLeche);                       
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
            });  

            listarFrascos();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>