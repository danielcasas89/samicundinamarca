<?php 
session_start();
if(isset($_SESSION['usuario_sesion'])){
	@require '../php/cabecera.php';
	?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-config">
                                        </i>
                                    </div>
                                    <div>Cumplimiento Indicadores IAMII
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <a href="indiami.php"><button type="button" class=" btn btn-info">Regresar a indicadores</button></a>
                                    </div>
                                </div>     
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Cumplimiento Indicadores IAMII
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                
                                    <div class="col-md-12">
                                        <div class="">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_paso">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="hospitalIami" class="">Seleccione un Hospital:</label>                                                       
                                                         <select id='hospitalIami' required name='hospitalIami' class='form-control' >
                                                            
                                                        </select>
                                                    </div> 
                                                    <div class=" form-group col-md-6 regis">
                                                        <label for="year" class="">Año:</label>                                                       
                                                         <select id='year' required name='year' class='form-control' >
                                                         <option value=''>--</option>
                                                                <option value='2021'>2021</option>
                                                                <option value='2022'>2022</option>
                                                                <option value='2023'>2023</option>
                                                                <option value='2024'>2024</option>
                                                        </select>
                                                    </div>   

                                                    </div>
                                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                      
                                            <div class="card-body">                   
                                        <h5 class="card-title">TRAZABILIDAD POR PASOS</h5>
                                                <div class="form-row">                                                                                     
                                                    <div class="form-group col-md-12">
                                                    <table class="mb-0 table table-bordered table-hover" id="tableIndicadores">
                                                <thead>
                                                <tr>
                                                    <th>PERIODO</th>
                                                    <th>Paso 1</th>
                                                    <th>Paso 2</th>
                                                    <th>Paso 3</th>
                                                    <th>Paso 4</th>
                                                    <th>Paso 5</th>
                                                    <th>Paso 6</th>
                                                    <th>Paso 7</th>
                                                    <th>Paso 8</th>
                                                    <th>Paso 9</th>
                                                    <th>Paso 10</th>
                                                    <th>% Diligenciado</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">I TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr1"></td>
                                                    <td class="tableiami" id="paso2tr1"></td>
                                                    <td class="tableiami" id="paso3tr1"></td>
                                                    <td class="tableiami" id="paso4tr1"></td>
                                                    <td class="tableiami" id="paso5tr1"></td>
                                                    <td class="tableiami" id="paso6tr1"></td>
                                                    <td class="tableiami" id="paso7tr1"></td>
                                                    <td class="tableiami" id="paso8tr1"></td>
                                                    <td class="tableiami" id="paso9tr1"></td>
                                                    <td class="tableiami" id="paso10tr1"></td>
                                                    <td class="tableiami" id="dilig1"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">II TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr2"></td>
                                                    <td class="tableiami" id="paso2tr2"></td>
                                                    <td class="tableiami" id="paso3tr2"></td>
                                                    <td class="tableiami" id="paso4tr2"></td>
                                                    <td class="tableiami" id="paso5tr2"></td>
                                                    <td class="tableiami" id="paso6tr2"></td>
                                                    <td class="tableiami" id="paso7tr2"></td>
                                                    <td class="tableiami" id="paso8tr2"></td>
                                                    <td class="tableiami" id="paso9tr2"></td>
                                                    <td class="tableiami" id="paso10tr2"></td>
                                                    <td class="tableiami" id="dilig2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">III TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr3"></td>
                                                    <td class="tableiami" id="paso2tr3"></td>
                                                    <td class="tableiami" id="paso3tr3"></td>
                                                    <td class="tableiami" id="paso4tr3"></td>
                                                    <td class="tableiami" id="paso5tr3"></td>
                                                    <td class="tableiami" id="paso6tr3"></td>
                                                    <td class="tableiami" id="paso7tr3"></td>
                                                    <td class="tableiami" id="paso8tr3"></td>
                                                    <td class="tableiami" id="paso9tr3"></td>
                                                    <td class="tableiami" id="paso10tr3"></td>
                                                    <td class="tableiami" id="dilig3"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IV TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr4"></td>
                                                    <td class="tableiami" id="paso2tr4"></td>
                                                    <td class="tableiami" id="paso3tr4"></td>
                                                    <td class="tableiami" id="paso4tr4"></td>
                                                    <td class="tableiami" id="paso5tr4"></td>
                                                    <td class="tableiami" id="paso6tr4"></td>
                                                    <td class="tableiami" id="paso7tr4"></td>
                                                    <td class="tableiami" id="paso8tr4"></td>
                                                    <td class="tableiami" id="paso9tr4"></td>
                                                    <td class="tableiami" id="paso10tr4"></td>
                                                    <td class="tableiami" id="dilig4"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                                    
                                                
                                                </div>


                                                    </div>
                                                </div>
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
            </div>
 <script>
     $(document).ready(function(){
       $('.mm-active').removeClass('mm-active');
       $("#menuCumplimientoiami2").addClass("mm-active");

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
                    if (rta.perfil == "IAMII")
                    {                          
                        $("#hospitalIami").append("<option value='"+rta.data[0].id_hospital+"'>"+rta.data[0].nombre_hospital+"</option>");
                        $('#hospitalIami').prop('disabled',true);
                    }
                    else
                    {                        
                        $("#hospihospitalIamital").append("<option value=''>--</option>");
                        for(var i=0;i<rta.data.length;i++){
                            $("#hospitalIami").append("<option value='"+rta.data[i].id_hospital+"'>"+rta.data[i].nombre_hospital+"</option>");
                        }
                    }
                    $('#hospitalIami').trigger("change");
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

        $('#hospitalIami, #year').change(function()
        {
            var hospital = $('#hospitalIami').val();
            var year = $('#year').val();
            var values = {};

            $('table > tbody > tr').each(function() {
                $(this).children('td').each(function(){
                    $(this).html('');
                    $(this).css("background-color", "white");
                    
                })

                });
            if (hospital!='' && year!='')
            { 
            $.ajax({ 
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'cumplimientoIami',
                    hospital:hospital,
                    year:year
                },
                success: function(rta)
                {
                    console.warn("cumpiiami");
                    console.warn(rta);
                    $("#dilig1").html((rta.dataDiligTrimestre1.diligenciamiento).toFixed(1)+"%");
                    $("#dilig2").html((rta.dataDiligTrimestre2.diligenciamiento).toFixed(1)+"%");
                    $("#dilig3").html((rta.dataDiligTrimestre3.diligenciamiento).toFixed(1)+"%");
                    $("#dilig4").html((rta.dataDiligTrimestre4.diligenciamiento).toFixed(1)+"%");
                    $("#paso1tr1").html((rta.dataPaso1Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso1tr2").html((rta.dataPaso1Trimestre2.cumplimiento).toFixed(1)+"%");                    
                    $("#paso1tr3").html((rta.dataPaso1Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso1tr4").html((rta.dataPaso1Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr1").html((rta.dataPaso2Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr2").html((rta.dataPaso2Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr3").html((rta.dataPaso2Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr4").html((rta.dataPaso2Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr1").html((rta.dataPaso3Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr2").html((rta.dataPaso3Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr3").html((rta.dataPaso3Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr4").html((rta.dataPaso3Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr1").html((rta.dataPaso4Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr2").html((rta.dataPaso4Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr3").html((rta.dataPaso4Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr4").html((rta.dataPaso4Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr1").html((rta.dataPaso5Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr2").html((rta.dataPaso5Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr3").html((rta.dataPaso5Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr4").html((rta.dataPaso5Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr1").html((rta.dataPaso6Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr2").html((rta.dataPaso6Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr3").html((rta.dataPaso6Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr4").html((rta.dataPaso6Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr1").html((rta.dataPaso7Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr2").html((rta.dataPaso7Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr3").html((rta.dataPaso7Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr4").html((rta.dataPaso7Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr1").html((rta.dataPaso8Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr2").html((rta.dataPaso8Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr3").html((rta.dataPaso8Trimestre3.totalSi*100/rta.dataPaso8Trimestre3.totalPregunta).toFixed(1)+"%");
                    $("#paso8tr4").html((rta.dataPaso8Trimestre4.totalSi*100/rta.dataPaso8Trimestre4.totalPregunta).toFixed(1)+"%");
                    $("#paso9tr1").html((rta.dataPaso9Trimestre1.totalSi*100/rta.dataPaso9Trimestre1.totalPregunta).toFixed(1)+"%");
                    $("#paso9tr2").html((rta.dataPaso9Trimestre2.totalSi*100/rta.dataPaso9Trimestre2.totalPregunta).toFixed(1)+"%");
                    $("#paso9tr3").html((rta.dataPaso9Trimestre3.totalSi*100/rta.dataPaso9Trimestre3.totalPregunta).toFixed(1)+"%");
                    $("#paso9tr4").html((rta.dataPaso9Trimestre4.totalSi*100/rta.dataPaso9Trimestre4.totalPregunta).toFixed(1)+"%");
                    $("#paso10tr1").html((rta.dataPaso10Trimestre1.totalSi*100/rta.dataPaso10Trimestre1.totalPregunta).toFixed(1)+"%");
                    $("#paso10tr2").html((rta.dataPaso10Trimestre2.totalSi*100/rta.dataPaso10Trimestre2.totalPregunta).toFixed(1)+"%");
                    $("#paso10tr3").html((rta.dataPaso10Trimestre3.totalSi*100/rta.dataPaso10Trimestre3.totalPregunta).toFixed(1)+"%");
                    $("#paso10tr4").html((rta.dataPaso10Trimestre4.totalSi*100/rta.dataPaso10Trimestre4.totalPregunta).toFixed(1)+"%");


                    $('table > tbody > tr').each(function() {
                        $(this).children('td').each(function(){
                            var data = $(this).html();
                            var res = data.replace("%","");
                            if (res == 0.00)
                            {
                                $(this).css("background-color", "white");
                                $(this).css("color", "black");
                            }                         
                            if (res > 0 && res <= 59)
                            {
                                $(this).css("background-color", "rgb(241 87 87)");
                                $(this).css("color", "white");
                            }
                            else if (res >= 60 && res <= 79)
                            {
                                $(this).css("background-color", "yellow");
                                $(this).css("color", "black");

                            }
                            else if (res >= 80)
                            {
                                $(this).css("background-color", "rgb(74 171 74)");
                                $(this).css("color", "white");
                            }
                        })

                        });

                },
                error: function(rta ){
                    
                    console.warn(" error cumpiiami");
                    console.warn(rta);
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
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>