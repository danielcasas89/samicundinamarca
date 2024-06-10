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
                                    <div>Registro Indicador IAMII: Paso 5
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <div class="d-inline-block dropdown">
                                        <a href="indiami.php"><button type="button" class=" btn btn-success">Regresar a indicadores</button></a>
                                    </div>
                                </div>     
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registro Indicador: Paso 5
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
                                                <div class=" form-group col-md-5 regis">
                                                        <label for="hospital" class="">Seleccione Hospital:</label>                 
                                                        <input name="paso" id="paso" placeholder="" value="5" type="hidden" readonly class="form-control">                                                      
                                                        <select id='hospital' required name='hospital' class='form-control' >
                                                        </select>
                                                    </div>  
                                                    <div class=" form-group col-md-3 regis">   
                                                        <label for="ano" class="">Seleccione año:</label>
                                                        <select name="ano" id="ano" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='2021'>2021</option>
                                                            <option value='2022'>2022</option>
                                                            <option value='2023'>2023</option>
                                                            <option value='2024'>2024</option>
                                                        </select>
                                                    </div> 
                                                    <div class=" form-group col-md-4 regis">   
                                                        <label for="trimestre" class="">Seleccione trimestre a diligenciar:</label>
                                                        <select name="trimestre" id="trimestre" class="form-control">
                                                            <option value=''>--</option>
                                                            <option value='primer'>I TRIMESTRE CALENDARIO ENE- FEB - MAR</option>
                                                            <option value='segundo'>II TRIMESTRE CALENDARIO ABR- MAY - JUN</option>
                                                            <option value='tercero'>III TRIMESTRE CALENDARIO JUL - AGO - SEPT</option>
                                                            <option value='cuarto'>IV TRIMESTRE CALENDARIO OCT - NOV - DIC</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12 col-lg-12 progressBarIami">
                                                        <div class="card-shadow-danger mb-3 widget-chart widget-chart2 text-left card">
                                                            <div class="widget-content">
                                                                <div class="widget-content-outer">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left pr-2 fsize-1">
                                                                            <div id="textProgress" class="widget-numbers mt-0 fsize-3 text-warning textProgress"></div>
                                                                        </div>
                                                                        <div class="widget-content-right w-100">
                                                                            <div class="progress-bar-xs progress">
                                                                                <div id="loading-bar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: %;"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left fsize-1">
                                                                        <div class="text">Porcentaje diligenciado Paso 5</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 


                                                    </div>
                                        </div>
                                    
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                                         
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <div class="form-row">                                                                                     
                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p51" class="">5.1 ¿El personal de salud brinda información oportuna y confiable a las madres, padres, familiar o persona cercana (incluyendo las usuarias en situaciones especiales y/o con necesidades adicionales) sobre promoción de la salud y la nutrición relacionados con su puerperio, fortalecimiento de los vínculos afectivos , la autoestima y el autocuidado, la importancia de la actividad física, anticoncepción, formas de violencia de género y sexual y los mecanismos de denuncia de las mismas,. información sobre los hábitos de sueño y descanso y se realiza tamizaje para depresión posparto, reevaluar el riesgo de presentar eventos tromboembólicos venosos , Proveer los anticonceptivos antes del alta hospitalaria?</label>
                                                        <select name="p51" id="p51" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p52" class="">5.2 ¿Las madres, padres y familias de niñas y niños recién nacidos atendidos en salas de maternidad y pediatría conocen sobre los temas de promoción de la salud y la nutrición relacionados con su puerperio?  </label>
                                                        <select name="p52" id="p52" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p53" class="">5.3 ¿El personal de la institución informa y orienta a las madres y sus familias sobre la importancia de su nutrición durante la lactancia y la institución cuenta con estrategias de intervención oportuna en caso de riesgo o de malnutrición materna?</label>
                                                        <select name="p53" id="p53" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p54" class="">5.4 ¿El personal de salud que atiende madres, niños y niñas brinda ayuda efectiva (uso de técnicas de consejería) para el amamantamiento (posición recomendada, agarre efectivo, respiración, succión, deglución, lactancia a libre demanda), técnica de extracción manual y conservación de la leche materna, y hace seguimiento permanente al conocimiento que logran apropiar sus usuarias? </label>
                                                        <select name="p54" id="p54" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p55" class="">5.5 ¿Saben las madres identificar si sus hijos o hijas están realizando una succión efectiva y por qué ésta es importante para la producción de la leche materna?</label>
                                                        <select name="p55" id="p55" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p56" class="">5.6 ¿Las madres de niñas y niños recién nacidos están en capacidad de demostrar cómo colocar al niño/a al seno y cómo hacer la extracción manual de la leche? </label>
                                                        <select name="p56" id="p56" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p57" class="">5.7 ¿Se verifica que las madres y sus familiares conocen dónde y cuándo acudir en caso de identificar signos de alarma en las madres y/o recién nacidos?</label>
                                                        <select name="p57" id="p57" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p58" class="">5.8 ¿Tiene la institución un mecanismo establecido para asesorar a las madres con resultado VIH positivo sobre el cuidado de la salud y nutrición de ellas y de su hijo o hija e informarles sobre la importancia del control médico y nutricional periódico?</label>
                                                        <select name="p58" id="p58" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p59" class="">5.9 ¿La asesoría y atención a las madres con resultado VIH positivo contempla criterios de confidencialidad, respeto y no discriminación? </label>
                                                        <select name="p59" id="p59" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p510" class="">5.10 ¿Tiene la institución un mecanismo establecido de coordinación con el ente de salud correspondiente y las aseguradoras que permita a las madres con resultado VIH positivo y sus recién nacidos acceder al tratamiento médico y nutricional correspondiente bajo condiciones de discrecionalidad y trato no discriminatorio?  </label>
                                                        <select name="p510" id="p510" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p511" class="">5.11 ¿Se aplican a los recién nacidos, de manera oportuna antes de ser dados de alta de la institución, los biológicos de acuerdo con el esquema de vacunación establecido por el Programa Ampliado de Inmunizaciones, PAI?</label>
                                                        <select name="p511" id="p511" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p512" class="">5.12 ¿Se agenda  cita de control del posparto como parte de las actividades en el ámbito intrahospitalario, que deberá realizarse entre el tercer y el quinto día posparto y se indaga a las madres atendidas sobre la importancia para ellas de asistir al control posparto entre el tercer y quinto día? </label>
                                                        <select name="p512" id="p512" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p513" class="">5.13 ¿Se realiza valoración integral al recién nacido, que incluye tamizaje de cardiopatía congénita, Realizar tamizaje visual, auditivo y  la toma de la muestra para errores innatos del metabolismo como TSH y se tiene una estrategia para garantizar que éstos estén disponibles para el control de las 72 horas y se registra en la historia clínica su realización y resultado?</label>
                                                        <select name="p513" id="p513" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p514" class="">5.14 ¿Cuenta la institución con mecanismos establecidos de coordinación con su red de atención, para garantizar la oportunidad del control posparto entre el tercer y el quinto día posparto?</label>
                                                        <select name="p514" id="p514" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p515" class="">5.15 ¿Cuenta la institución con estrategias verificables que garanticen la entrega de registro de nacido vivo y promuevan el registro civil del recién nacido o tiene mecanismos de coordinación para facilitar el trámite a sus usuarias y usuarios inmediatamente ?</label>
                                                        <select name="p515" id="p515" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p516" class="">5.16 ¿Se entrega el carné materno y el carné de salud infantil completamente diligenciados antes de ser dadas de alta de la institución, se indaga sobre la comprensión de su contenido y se les indica la importancia de portarlos cada vez que asistan a la institución de salud?</label>
                                                        <select name="p516" id="p516" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    </div>
                                                    <div class=" form-group col-md-10 offset-md-1 regis">   
                                                    <a href="indiami.php"><button type="submit" class="mt-2 btn btn-lg btn-primary">Registrar Indicador</button></a>
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
       // $('.mm-active').removeClass('mm-active');
       // $("#menuRegistroDonantes").addClass("mm-active");

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

        $('#trimestre, #hospital').change(function()
        {
            $(".progressBarIami").hide();
            $("#textProgress").removeClass();
            $('#loading-bar').removeClass();
            $.each($('#registro_paso').serializeArray(), function(i, field) {
                if (field.name!='paso' && field.name!='hospital' && field.name!='trimestre' && field.name!='ano')
                {
                    $('#'+field.name).val(''); 
                }
                                            
            }); 
            var hospital = $('#hospital').val();
            var trimestre = $('#trimestre').val();
            var ano = $('#ano').val();
            var values = {};

            if (hospital!='' && trimestre!='' && ano!='')
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarProgresoIami',
                        hospital:hospital,
                        trimestre:trimestre,
                        ano: ano,
                        paso:3
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p51').val(rta.data[0].p51); 
                            $('#p52').val(rta.data[0].p52);
                            $('#p53').val(rta.data[0].p53);
                            $('#p54').val(rta.data[0].p54);
                            $('#p55').val(rta.data[0].p55);
                            $('#p56').val(rta.data[0].p56);
                            $('#p57').val(rta.data[0].p57);
                            $('#p58').val(rta.data[0].p58);
                            $('#p59').val(rta.data[0].p59);
                            $('#p510').val(rta.data[0].p510);
                            $('#p511').val(rta.data[0].p511);
                            $('#p512').val(rta.data[0].p512);
                            $('#p513').val(rta.data[0].p513);
                            $('#p514').val(rta.data[0].p514);
                            $('#p515').val(rta.data[0].p515);
                            $('#p516').val(rta.data[0].p516);
                        }        
        
                        var totalMissing = 0;
                        var totalQuestions = 16;
                        var barra = $('#loading-bar');
                        $.each($('#registro_paso').serializeArray(), function(i, field) {
                            values[field.name] = field.value;
                            if (field.value=='')
                            {
                                totalMissing++;
                            }                          
                        });
                        var totalProgress = (totalQuestions-totalMissing)*100/totalQuestions;
                        barra.attr('aria-valuenow', totalProgress).attr('style', 'width: '+totalProgress+'%');
                        if (totalProgress <100 && totalProgress>0)
                        { 
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-warning");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-warning");
                        }
                        else if (totalProgress == 0)
                        {
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-danger");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-danger");

                        }else if (totalProgress == 100)
                        {
                            barra.addClass("progress-bar progress-bar-striped progress-bar-animated bg-success");
                            $("#textProgress").addClass("widget-numbers mt-0 fsize-3 textProgress text-success");
                        }
                        $(".textProgress").html(totalProgress.toFixed(2)+"%");                        
                        $(".progressBarIami").show();

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
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>