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
                                    <div>Registro Indicador IAMII: Paso 4
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
                                    <div class="card-header">Registro Indicador: Paso 4
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
                                                        <input name="paso" id="paso" placeholder="" value="4" type="hidden" readonly class="form-control">                                                      
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
                                                                        <div class="text">Porcentaje diligenciado Paso 4</div>
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
                                                        <label for="p41" class="">4.1. ¿En la atención para el cuidado prenatal se explica a las gestantes sobre sus derechos a la atención del trabajo de parto y el parto con calidad y calidez, en un ambiente de respeto, libre de intervenciones innecesarias, donde prevalece el derecho a la intimidad?</label>
                                                        <select name="p41" id="p41" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p42" class="">4.2. ¿El personal de salud explica a las mujeres que tienen derecho a la compañía del compañero o de una persona significativa durante el trabajo de parto y paro,  apoyo físico, emocional y psicológico (estimulo positivo), adoptar posiciones cómodas, de tener a su niño o niña en contacto inmediato piel a piel, e iniciar la lactancia materna en la hora siguiente al nacimiento?</label>
                                                        <select name="p42" id="p42" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p43" class="">4.3.  ¿El personal de salud de la institución informa a las madres, a los padres o a algún otro acompañante sobre el derecho al nombre y al registro civil de sus hijos o hijas desde el nacimiento y les orienta en dónde pueden hacerlo?</label>
                                                        <select name="p43" id="p43" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p44" class="">4.4.  ¿Se explica a las gestantes, madres y a sus acompañantes sobre su derecho a recibir el carné de salud infantil con información veraz y completa sobre el estado del niño o la niña al nacer?</label>
                                                        <select name="p44" id="p44" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p45" class="">4.5. ¿Tiene la institución mecanismos verificables que permitan la coordinación con las EPS para favorecer la toma, el procesamiento y la entrega de resultados en forma oportuna de los exámenes realizados a las mujeres y sus recién nacidos?</label>
                                                        <select name="p45" id="p45" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p46" class="">4.6.  ¿Cuenta la institución con un protocolo para el trabajo de parto y la atención del parto que garantice el derecho a la intimidad y una atención respetuosa y amable (que ayude a disminuir el nivel de estrés), con calidad y libre de intervenciones innecesarias, que favorezca el pinzamiento oportuno del cordón umbilical, el contacto piel a piel y el inicio temprano de la lactancia materna?</label>
                                                        <select name="p46" id="p46" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p47" class="">4.7.  ¿Incluye el protocolo las normas específicas para la prevención de la transmisión perinatal del VIH durante el parto?</label>
                                                        <select name="p47" id="p47" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p48" class="">4.8. ¿El personal de salud que atiende partos utiliza sistemáticamente la historia clínica perinatal, el partograma y además registra los datos del parto en el carné materno y en el carné de salud infantil?</label>
                                                        <select name="p48" id="p48" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p49" class="">4.9.  ¿En salas de parto se promueve un ambiente de intimidad y respeto para con la madre y se facilitan las condiciones para que, si ella lo desea, esté acompañada por la persona que ella elija?</label>
                                                        <select name="p49" id="p49" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p410" class="">4.10. ¿El personal de salud informa a la madre sobre la indicación médica para intervenciones como cesárea? </label>
                                                        <select name="p410" id="p410" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p411" class="">4.11. ¿El personal de salud que brinda atención inmediata a la niña o niño recién nacido en sala de partos, procura su adaptación neonatal armoniosa y evita el uso sistemático de sondas nasogástricas, ruidos, enfriamiento y procedimientos invasivos innecesarios?</label>
                                                        <select name="p411" id="p411" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p412" class="">4.12. ¿El personal de salud favorece el contacto inmediato piel a piel durante el mayor tiempo posible y el inicio temprano de la lactancia materna en la primera hora después del nacimiento, indicando a la madre las señales de que el bebé está listo para amamantar? </label>
                                                        <select name="p412" id="p412" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p413" class="">4.13. ¿Después de un parto por cesárea se realiza contacto piel a piel y se inicia el amamantamiento cuando la madre está alerta y en capacidad de responder?</label>
                                                        <select name="p413" id="p413" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p414" class="">4.14. ¿El personal de salud que brinda atención inmediata al recién nacido en sala de partos conoce y aplica la norma técnica sobre pinzamiento tardio del cordón umbilical? (Este se realizará tras constatar los siguientes criterios : Interrupción del latido del cordón umbilical, Disminución de la ingurgitación de la vena umbilical, Satisfactoria perfusión de la piel del recién nacido, Realizarlo entre 2 y 3 minutos después del nacimiento).</label>
                                                        <select name="p414" id="p414" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p415" class="">4.15. ¿Después de permitir el contacto piel a piel, se aplican los cuidados del cordón umbilical, aplicación de antibiótico oftálmico y vitamina K, tomas de peso, longitud, perímetro cefálico y torácico al recién nacido ?</label>
                                                        <select name="p415" id="p415" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p416" class="">4.16. ¿Conoce el personal que atiende a las madres y sus hijas e hijos el procedimiento para la atención de una gestante con resultado positivo para VIH y/o sífilis que ingresa para atención del parto, sin los resultados de estas pruebas?</label>
                                                        <select name="p416" id="p416" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p417" class="">4.17. ¿En las salas de recuperación se da apoyo efectivo a la madre para amamantar y se resuelven las dudas que pueda tener sobre su capacidad para poner en práctica la lactancia materna? </label>
                                                        <select name="p417" id="p417" class="form-control">
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
                            $('#p41').val(rta.data[0].p41); 
                            $('#p42').val(rta.data[0].p42);
                            $('#p43').val(rta.data[0].p43);
                            $('#p44').val(rta.data[0].p44);
                            $('#p45').val(rta.data[0].p45);
                            $('#p46').val(rta.data[0].p46);
                            $('#p47').val(rta.data[0].p47);
                            $('#p48').val(rta.data[0].p48);
                            $('#p49').val(rta.data[0].p49);
                            $('#p410').val(rta.data[0].p410);
                            $('#p411').val(rta.data[0].p411);
                            $('#p412').val(rta.data[0].p412);
                            $('#p413').val(rta.data[0].p413);
                            $('#p414').val(rta.data[0].p414);
                            $('#p415').val(rta.data[0].p415);
                            $('#p416').val(rta.data[0].p416);
                            $('#p417').val(rta.data[0].p417);
                        }        
        
                        var totalMissing = 0;
                        var totalQuestions = 17;
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