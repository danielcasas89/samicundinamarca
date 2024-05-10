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
                                    <div>Pool BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" style="padding: 23px;font-size: 15px;" role="alert">Número de frasco registrado: <b><span id="numFrasco"></span></b></div>
                             <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">  
                                            <div class="card-body">
                                                <form id="registro_pool">
                                        <div class="card-header  ">REGISTRAR REENVASE</div><br>
                                        <div class="form-row"> 
                                            <div class=" form-group col-md-2 regis">
                                                <label for="pool" class="">Realiza Pool:</label>                                                       
                                                <select id='pool' required name='pool' class='form-control' >
                                                    <option value=''>--</option>
                                                    <option value='SI'>SI</option>
                                                    <option value='NO'>NO</option>
                                                </select>
                                            </div> 
                                            <div class="col-md-2">
                                                <label for="cantidad" class="">Cantidad:</label>
                                                <div class="input-group mb-2">        
                                                <input type="number" required class="form-control" name="cantidad" id="cantidad" min="10" max="900"><div class="input-group-prepend">
                                                <div class="input-group-text">mL</div>
                                                </div>
                                                </div>
                                            </div> </div>
                                            <div class="form-row">                                          
                                            <div class=" form-group col-md-2 regis">
                                                <label for="frasco1" class="">Frasco 1:</label>                                                       
                                                <select id='frasco1' name='frasco1' class='form-control' required>
                                                    <option value=''>--</option>
                                                </select>
                                            </div>
                                            <div class=" form-group col-md-2 regis">
                                                <label for="reuso_frascos" class="">Continuar Reenvase:</label>                                                       
                                                <select id='reuso_frascos' required name='reuso_frascos' class='form-control' >
                                                    <option value=''>--</option>
                                                    <option value='SI'>SI</option>
                                                    <option value='NO'>NO</option>
                                                </select>
                                            </div> 
                                            
                                            <div class=" form-group col-md-2 regis">
                                                <label for="frasco2" class="">Frasco 2:</label>                                                       
                                                <select id='frasco2' name='frasco2' class='form-control' >
                                                    <option value=''>--</option>
                                                </select>
                                            </div> 
                                            
                                            <div class=" form-group col-md-2 regis">
                                                <label for="reuso_frasco2" class="">Continuar Reenvase:</label>                                                       
                                                <select id='reuso_frasco2' required name='reuso_frasco2' class='form-control' >
                                                    <option value=''>--</option>
                                                    <option value='SI'>SI</option>
                                                    <option value='NO'>NO</option>
                                                </select>
                                            </div> 
                                            <div class=" form-group col-md-2 regis">
                                                <label for="frasco3" class="">Frasco 3:</label>                                                       
                                                <select id='frasco3' name='frasco3' class='form-control' >
                                                    <option value=''>--</option>
                                                </select>
                                            </div> 
                                            <div class=" form-group col-md-2 regis">
                                                <label for="reuso_frasco3" class="">Continuar Reenvase:</label>                                                       
                                                <select id='reuso_frasco3' name='reuso_frasco3' class='form-control' >
                                                    <option value=''>--</option>
                                                    <option value='SI'>SI</option>
                                                    <option value='NO'>NO</option>
                                                </select>
                                            </div>                                           
                                        <div class="col-md-12"><br>
                                            <div class="card-header">Acidez Dornic (°D)</div><br>
                                            <div class="form-row">
                                                <div class="form-group col-md-2 regis">
                                                    <label for="tipoLeche" class="">Tipo de Leche:</label>
                                                    <input name="tipoLeche" id="tipoLeche" placeholder="" type="number" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2 regis">
                                                    <label for="acidez1" class="">Acidez 1:</label>
                                                    <input name="acidez1" id="acidez1" placeholder="" type="number" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2 regis">
                                                    <label for="acidez2" class="">Acidez 2:</label>
                                                    <input name="acidez2" id="acidez2" placeholder="" type="number" class="form-control">
                                                </div>
                                                <div class="form-group col-md-1 regis">
                                                    <label for="acidez3" class="">Acidez 3:</label>
                                                    <input name="acidez3" id="acidez3" placeholder="" type="number" class="form-control">
                                                </div>                                            
                                                <div class="form-group col-md-2 regis">
                                                    <label for="media" class="">Media</label>
                                                    <input name="media" id="media" placeholder="" readonly type="number" min="0"  class="form-control">
                                                </div>
                                                <div class="form-group col-md-1 regis">
                                                    <label for="factor" class="">Factor:</label>
                                                    <input name="factor" id="factor" placeholder="" type="number" class="form-control" value="1">
                                                </div>
                                                <div class="form-group col-md-2 regis">
                                                    <label for="resultado" class="">Resultado:</label>
                                                    <input name="resultado" id="resultado" placeholder="" readonly type="number" class="form-control">
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
                                                        <input name="mediact" id="mediact" placeholder="" readonly type="text" class="form-control">
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
                                                        <input name="mediacc" id="mediacc" placeholder="" readonly type="text" class="form-control">
                                                    </div>                                        
                                                    <div class="form-group col-md-2 regis">
                                                        <label for="crema" class="">% Crema</label>
                                                        <input name="crema" id="crema" placeholder="" readonly type="text" class="form-control">
                                                    </div>                                        
                                                    <div class="form-group col-md-2 regis">
                                                        <label for="kcal" class="">Kcal/Onz</label>
                                                        <input name="kcal" id="kcal" placeholder="" readonly type="text" class="form-control">
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

                        <div class="d-block text-center card-footer">
                        </div>
                    </div>
                </div>
            </div>
            </div>
 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuPool").addClass("mm-active");
        $('#frasco1').attr("disabled", true); 
        $('#frasco2').attr("disabled", true); 
        $('#frasco3').attr("disabled", true); 

        function listarFrascos()
        {
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDonacionFrasco'
                },
                success: function(rta){    
                    console.warn(rta);                           
                    $('#frasco1').attr("disabled", false); 
                    $('#frasco2').attr("disabled", false); 
                    $('#frasco3').attr("disabled", false); 
                    for(var i=0;i<rta.data.length;i++){
                        $("#frasco1").append("<option value='"+rta.data[i].id_frasco+"'>"+rta.data[i].id_frasco+"</option>");
                        $("#frasco2").append("<option value='"+rta.data[i].id_frasco+"'>"+rta.data[i].id_frasco+"</option>");
                        $("#frasco3").append("<option value='"+rta.data[i].id_frasco+"'>"+rta.data[i].id_frasco+"</option>");
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

        $( "#pool").change(function()
        {
            var pool = $(this).val();
            if (pool == "NO")
            {
                $('#frasco2').attr("disabled", true); 
                $('#frasco3').attr("disabled", true);
                $('#reuso_frasco2').attr("disabled", true);
                $('#reuso_frasco3').attr("disabled", true);

                $('#tipoLeche').attr("disabled", true);                 
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
            }
            else
            {
                $('#frasco2').attr("disabled", false); 
                $('#frasco3').attr("disabled", false);
                $('#reuso_frasco2').attr("disabled", false);
                $('#reuso_frasco3').attr("disabled", false);
                $('#tipoLeche').attr("disabled", false); 
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

                
                $('#tipoLeche').val(''); 
                $('#acidez1').val(''); 
                $('#acidez2').val(''); 
                $('#acidez3').val(''); 
                $('#media').val(''); 
                $('#factor').val('1'); 
                $('#resultado').val(''); 
                $('#ct1').val('');  
                $('#ct2').val('');  
                $('#ct3').val('');
                $('#mediact').val(''); 
                $('#cc1').val(''); 
                $('#cc2').val(''); 
                $('#cc3').val(''); 
                $('#mediacc').val(''); 
                $('#crema').val(''); 
                $('#kcal').val(''); 
          
            }
        });

        $( "#frasco1").change(function()
        {
            var pool = $('#pool').val();
            var idFrasco = $(this).val();
            if (pool == "NO")
            {
                $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDetalleFrascoProcesado',
                    idFrasco: idFrasco
                },
                success: function(rta){  

                    $('#tipoLeche').val(rta.data[0]["tipoLeche"]); 
                    $('#acidez1').val(rta.data[0]["acidez1"]); 
                    $('#acidez2').val(rta.data[0]["acidez2"]); 
                    $('#acidez3').val(rta.data[0]["acidez3"]); 
                    $('#media').val(rta.data[0]["media"]); 
                    $('#factor').val(rta.data[0]["factor"]); 
                    $('#resultado').val(rta.data[0]["resultado"]); 
                    $('#ct1').val(rta.data[0]["ct1"]);  
                    $('#ct2').val(rta.data[0]["ct2"]);  
                    $('#ct3').val(rta.data[0]["ct3"]);
                    $('#mediact').val(rta.data[0]["mediact"]); 
                    $('#cc1').val(rta.data[0]["cc1"]); 
                    $('#cc2').val(rta.data[0]["cc2"]); 
                    $('#cc3').val(rta.data[0]["cc3"]); 
                    $('#mediacc').val(rta.data[0]["mediacc"]); 
                    $('#crema').val(rta.data[0]["crema"]); 
                    $('#kcal').val(rta.data[0]["kcal"]);   
                    
                    $('#tipoLeche').attr("disabled", true); 
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
                console.warn("resultado");
                console.warn(resultado);
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

        listarFrascos();
});

 </script>           
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>