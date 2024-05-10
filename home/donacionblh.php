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
                                    <div>Registro Donaciones BLH
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="alert alert-success fade show saveSuccess" style="padding: 23px;font-size: 15px;" role="alert">Número de frasco registrado: <b><span id="numFrasco"></span></b></div>
                                   <div class="main-card mb-3 card">
                                    <div class="card-header ">Registrar Donación
                                    </div>
                                    <div class="tab-content">
                                    
                                    
                                    
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">  
                                            <div class="card-body">
                                                <form id="registro_donacion">
                                                <div class="form-row">                               
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="donantes" class="">Seleccione donante:</label>                                                       
                                                        <select id='donantes' required name='donantes' class='form-control' >
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
                                                        <label for="celular" class="">Celular:</label>
                                                        <input name="celular" id="celular" placeholder="" type="number" readonly class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="nombre_municipio" class="">Municipio:</label>
                                                        <input name="nombre_municipio" id="nombre_municipio" placeholder="" type="text" readonly class="form-control">
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_parto" class="">Fecha parto:</label>
                                                        <input name="fecha_parto" id="fecha_parto" placeholder="" type="text" readonly class="form-control">
                                                    </div>
                                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-header  ">REGISTRO DONACIÓN</div><br>
                                        <div class="form-row">

                                            <div class=" form-group col-md-4 regis">   
                                                <label for="fecha_extraccion" class="">Fecha Extracción:</label>                                                 
                                                <input class="form-control" type="date" value="" id="fecha_extraccion" name='fecha_extraccion'>
                                            </div>  

                                            <div class="col-md-4">
                                                <label for="cantidad" class="">Cantidad:</label>
                                                <div class="input-group mb-2">        
                                                <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder=""><div class="input-group-prepend">
                                                <div class="input-group-text">mL</div>
                                                </div>
                                                </div>
                                            </div>    

                                            <div class="form-group col-md-4 regis">
                                                <label for="recoleccionEn" class="">Recolección en </label>
                                                <select name="recoleccionEn" id="recoleccionEn" class="form-control">
                                                <option value='CASA'>CASA</option>
                                                <option value='BLH'>BLH</option>
                                            </select></div>    
                                            
                                            <div class=" form-group col-md-4 regis">   
                                                <label for="fecha_recepcion" class="">Fecha Recepción:</label>                                                 
                                                <input class="form-control" type="date" value="" id="fecha_recepcion" name='fecha_recepcion'>
                                            </div> 

                                            <div class="col-md-4">
                                                <label for="tipoLeche" class="">Tipo de Leche:</label>
                                                <div class="input-group mb-2">        
                                                <input type="number" class="form-control" name="tipoLeche" id="tipoLeche" readonly placeholder=""><div class="input-group-prepend">
                                                <div class="input-group-text">días</div>
                                                </div>
                                                </div>
                                            </div> 
                                            
                                            <div class="form-group col-md-4 regis">
                                                <label for="dias" class="">Días de Extracción:</label>
                                                <input name="dias" id="dias" placeholder="" readonly type="number" class="form-control">
                                            </div>                          
                                            </div> 
                                            </div> 
                                            <div class=" form-group col-md-4 regis">   
                                            <button type="submit" class="mt-2 btn btn-primary">Registrar Donación</button>
                                                                                        
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
     $(document).ready(function()
     {

        $("#registro_donacion").submit(function(e){        

            var values = {};
            $.each($('#registro_donacion').serializeArray(), function(i, field) {
                values[field.name] = field.value;
            });

            console.warn(values);
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'registrarDonacionBLH',
                    tabla:'core__donacion_blh',
                    campos: values
                },
                success: function(rta){
                    if(rta.type=='info'){             
                        $('html, body').animate({scrollTop: '0px'}, 0);
                        $('#registro_donacion')[0].reset();
                        $("#numFrasco").html(rta.id);
                        $(".saveSuccess").show();
                    }
                    else{
                        alert("Error enviando el formato. Consulte al administrador");
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
            e.preventDefault();  
            return false;
            });





        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroDonaciones").addClass("mm-active");
        function listarDonantes(){

            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDonantesBLH'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#donantes").append("<option value='"+rta.data[i].id_registro_blh+"'>"+rta.data[i].nombre+"</option>");
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

        $( "#donantes").change(function()
        {
            $('#nombre').val('');
            $('#celular').val('');
            $('#nombre_municipio').val('');
            $('#id_registro_blh').val('');
            $('#fecha_parto').val('');
            var idDonante = $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarDonanteUnico',
                        idDonante:idDonante
                    },
                    success: function(rta){
                        console.warn(rta);
                        $('#nombre').val(rta.data[0].nombre);
                        $('#celular').val(rta.data[0].celular);
                        $('#nombre_municipio').val(rta.data[0].nombre_municipio);
                        $('#id_registro_blh').val(rta.data[0].id_registro_blh);  
                        $('#fecha_parto').val(rta.data[0].fecha_parto);                        
                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });
            });  

            // new Date("dateString") is browser-dependent and discouraged, so we'll write
            // a simple parse function for U.S. date format (which does no error checking)
            function parseDate(str) {
                var mdy = str.split('/');
                return new Date(mdy[2], mdy[0]-1, mdy[1]);
            }

            function datediff(first, second) {
                // Take the difference between the dates and divide by milliseconds per day.
                // Round to nearest whole number to deal with DST.
                return Math.round((second-first)/(1000*60*60*24));
            }
            

            $('#fecha_extraccion').on('input',function(e)
            {
                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                const firstDate = new Date($(this).val());
                const currentDate = new Date();
                const secondDate = new Date($('#fecha_parto').val());
                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
                const diasExtraccion = Math.round(Math.abs((currentDate - firstDate) / oneDay));
                $("#tipoLeche").val(diffDays);
                $("#dias").val(diasExtraccion);


            }); 

        listarDonantes();
});

 </script>
 </div>
 </div>
 </div>
 </div>
     <div id="Modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modal Header</h4>
    </div>
    <div class="modal-body">
    <p>Some text in the modal.</p>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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