<?php 
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/header.php';
	?>
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config">
                                        </i>
                                    </div>
                                    <div>Indicadores Madre Canguro
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Asignación de Fases
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">                                       
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_fases_canguro">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="hospital" class="">Seleccione Hospital:</label>                                                       
                                                        <select id='hospital' required name='hospital' class='form-control' >
                                                        </select>
                                                    </div>   

                                                    <div class=" form-group col-md-6 regis" id="selectMultipleFases"> 
                                                        <h5 class="card-title">Seleccione Fases</h5>
                                                        <select multiple="multiple" class="multiselect-dropdown form-control" id="myMulti" name="myMulti">
                                                        <option value=''>--</option> 
                                                        <option value='FASEIA'>FASE I A - INTRAHOSPITALARIA: ADAPTACIÓN</option>
                                                        <option value='FASEIB'>FASE I B - AMBULATORIO:  ENTRADA HASTA 40 SEMANAS EG</option>
                                                        <option value='FASEII'>FASE II - AMBULATORIO HASTA UN AÑO ECG</option>
                                                        <option value='FASEIII'>FASE III - AMBULATORIO HASTA DOS EC</option>
                                                        </select>
                                                    </div>
                                                    <div class=" form-group col-md-6 regis" id="selectMultipleFasesAsignadas">
                                                    
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>                             
                            <div class=" form-group col-md-4 regis">   
                            <button type="submit" class="mt-2 btn btn-primary">Registras fases</button>
                            </div>                                      
                            </div>
                            </div>
                            </form>                                       
                            </div>

                            </div>
                            </div>
                            </div>                                   

 <script>
     $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuFasesCanguro").addClass("mm-active");

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
                    if (rta.perfil == "Canguro")
                    {                          
                        $("#hospital").append("<option value='"+rta.data[0].id_hospital+"'>"+rta.data[0].nombre_hospital+"</option>");
                        $('#hospital').prop('disabled',true);
                    }
                    else
                    {                        
                        $("#hospital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospital").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
                    }
                    $('#hospital').trigger("change");
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
        
        $('#hospital').change(function()
        {
                      
            var hospital = $('#hospital').val();
            $("#selectMultipleFasesAsignadas").html('');
            $("#selectMultipleFasesAsignadas").hide();
            $("#selectMultipleFases").show();
            $("#myMulti").show();
            var values = {};

            if (hospital!='')
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarFasesCanguro',
                        hospital:hospital
                    },
                    success: function(rta){
                        
                        if(rta.data.length > 0)
                        {
                            $("#selectMultipleFases").hide();
                            console.warn(rta);
                            $("#selectMultipleFasesAsignadas").show();
                            $("#selectMultipleFasesAsignadas").append("<h5 class='card-title'>Fases asignadas</h5>");

                            for (i = 0;i<rta.data.length;i++)
                            {
                                $("#selectMultipleFasesAsignadas").append("<span class='badge badge-primary' style='padding: 12px;margin-right: 5px;font-size: 15px;'>"+rta.data[i].fase+'</span></div>');
                            }

                            
                        }


                    },
                    error: function(objAjax, textStatus, strErrorThrown ){
                        if(typeof callbackError != 'undefined'){
                            callbackError(textStatus);
                        }else{
                            alert('Error en la conexion con el servidor: '+ textStatus);
                        }
                    }
                });
            }
            return false;

        }); 


        listarHospitales();
});

 </script>  
     <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>
         
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>