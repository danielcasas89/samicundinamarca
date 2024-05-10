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
                                    <div>Registro Temperaturas
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="alert alert-success fade show saveSuccess" style="padding: 23px;font-size: 15px;" role="alert">Registro guardado exitosamente.</b></div>
                                   <div class="main-card mb-3 card">
                                    <div class="card-header ">Registro Temperaturas
                                    </div>
                                    <div class="tab-content">                                    
                                            
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <div class="card-body">
                                                        <form id="registro_temperaturas">
                                                        <div class="form-row">                               
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="equipo" class="">Seleccione Equipo:</label>                                                       
                                                                <select id='equipo' name='equipo' class='form-control' required>
                                                                    <option value=''>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <hr/>
                                                        <div class="form-row"> 

                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="marca" class="">Marca:</label>
                                                                <input name="marca" id="marca" placeholder="" type="text" class="form-control" readonly>
                                                                <input name="id_core__equipos" id="id_core__equipos" placeholder="" type="hidden" readonly class="form-control"> 
                                                            </div>
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="modelo" class="">Modelo:</label>
                                                                <input name="modelo" id="modelo" placeholder="" type="text" class="form-control" readonly>
                                                            </div>
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="serial" class="">Serial:</label>
                                                                <input name="serial" id="serial" placeholder="" type="text" class="form-control" readonly>
                                                            </div>
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="identificacion" class="">Identificacion interna:</label>
                                                                <input name="identificacion" id="identificacion" placeholder="" type="text" class="form-control" readonly>
                                                            </div> 

                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="fecha" class="">Fecha:</label>
                                                                <input name="fecha" id="fecha" placeholder="" type="date" class="form-control" required>
                                                            </div>
                                                              
                                                            <div class=" form-group col-md-4 regis">   
                                                                <label for="hora" class="">Hora:</label>                                                 
                                                                <input class="form-control" type="time" value="" id="hora" name='hora' required>
                                                            </div> 

                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="temp_actual" class="">Temperatura actual(°C):</label>
                                                                <input name="temp_actual" id="temp_actual" type="number" min="-50" max="35" step="0.1" class="form-control" required>                                                   
                                                            </div>      
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="temp_minima" class="">Temperatura minima(°C):</label>
                                                                <input name="temp_minima" id="temp_minima" type="number" min="-50" max="35" step="0.1" class="form-control" required>                                                   
                                                            </div>    
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="temp_maxima" class="">Temperatura máxima(°C):</label>
                                                                <input name="temp_maxima" id="temp_maxima" min="-50" max="35" type="number" step="0.1" class="form-control" required>                                                   
                                                            </div>  
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="observaciones" class="">Observaciones:</label>
                                                                <input name="observaciones" id="observaciones" type="text" class="form-control">                                                   
                                                            </div> 
                                                        </div>
                                                    <div class=" form-group col-md-4 regis">   
                                                        <button type="submit" class="mt-2 btn btn-primary">Registrar Temperatura</button><br>                                                                                                
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
        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroTemperaturas").addClass("mm-active");
        $("#regEquip").addClass("mm-show");

        function listarEquipos()
        {
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarEquipos'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#equipo").append("<option value='"+rta.data[i].id_core__equipos+"'>"+rta.data[i].equipo+"-"+rta.data[i].identificacion+"</option>");
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

        $( "#equipo").change(function()
        {
            $('#marca').val('');
            $('#modelo').val('');
            $('#serial').val('');
            $('#identificacion').val('');
            $('#id_core__equipos').val('');
            var idEquipo = $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarEquipoUnico',
                        idEquipo:idEquipo
                    },
                    success: function(rta){
                        $('#marca').val(rta.data[0].marca);
                        $('#modelo').val(rta.data[0].modelo);
                        $('#serial').val(rta.data[0].serial);
                        $('#identificacion').val(rta.data[0].identificacion);  
                        $("#id_core__equipos").val(rta.data[0].id_core__equipos);               
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

            listarEquipos();
});

 </script>
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