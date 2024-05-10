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
                                    <div>Registro Indicador IAMII: Paso 10
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
                                    <div class="card-header">Registro Indicador: Paso 10
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
                                                        <input name="paso" id="paso" placeholder="" value="10" type="hidden" readonly class="form-control">                                                      
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
                                                                        <div class="text">Porcentaje diligenciado Paso 10</div>
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
                                                        <label for="p101" class="">10.1. ¿Cuenta la institución con grupos de apoyo comunitarios y/o institucionales formados y capacitados en temas relacionados con los derechos humanos, la salud y nutrición materna e infantil?  </label>
                                                        <select name="p101" id="p101" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p102" class="">10.2. ¿Hay participación de los grupos y/o redes de apoyo en el comité institucional?</label>
                                                        <select name="p102" id="p102" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p103" class="">10.3. ¿Para la capacitación de los grupos/redes de apoyo comunitario y/o institucional en los diferentes temas de salud infantil y nutrición, existe coordinación con otros sectores que trabajen por las mujeres y primera infancia en el territorio?</label>
                                                        <select name="p103" id="p103" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p104" class="">10.4. ¿En las actividades de capacitación a los grupos/ redes de apoyo se contemplan temas como consejería en lactancia materna, pautas y prácticas de crianza que favorecen el desarrollo infantil temprano, y salud y nutrición materna e infantil en general?</label>
                                                        <select name="p104" id="p104" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p105" class="">10.5. ¿Las personas que conforman los grupos/redes de apoyo tienen conocimiento sobre temas como lactancia materna, pautas y prácticas de crianza que favorecen el desarrollo infantil temprano y salud y nutrición materna e infantil en general? </label>
                                                        <select name="p105" id="p105" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p106" class="">10.6. ¿Cuenta la IPS con mecanismos de apoyo y seguimiento (ambientes de extracción de leche materna  y/o bancos de leche humana, línea amiga, visitas domiciliarias, promotores y agentes de salud, equipos extramurales, casa de paso)  para favorecer los cuidados en salud y nutrición a las madres y sus niñas y niños después de salir de la institución? </label>
                                                        <select name="p106" id="p106" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p107" class="">10.7. ¿Antes de salir de la institución, la madre y el niño o la niña, se les informa a las madres y a sus acompañantes sobre los mecanismos institucionales, para que puedan consultar y tener respuesta efectiva en caso de tener problemas con la lactancia materna y con los demás aspectos de salud y nutrición materna e infantil?</label>
                                                        <select name="p107" id="p107" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>


                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p108" class="">10.8. ¿En el puerperio, antes del alta de la institución, en la consulta posparto y al egreso de hospitalización pediátrica se le informa a la madre y a sus acompañantes sobre la existencia de los grupos y/o redes de apoyo y se le remite a ellos?</label>
                                                        <select name="p108" id="p108" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p109" class="">10.9. ¿La institución tiene disponible el directorio de los grupos de apoyo e informa a las usuarias y usuarios sobre la existencia y funcionamiento de los mismos?</label>
                                                        <select name="p109" id="p109" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1010" class="">10.10. ¿Los coordinadores/as de los servicios de enfermería, nutrición, trabajo social, psicología y urgencias confirman que en caso de que la madre acuda a la institución por problemas relacionados con su salud o la de su hija o hijo, es atendida y se le resuelven las dudas efectivamente, y en ningún caso se le devuelve sin atención?</label>
                                                        <select name="p1010" id="p1010" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1011" class="">10.11. ¿Se hacen con periodicidad actividades de actualización y seguimiento de la capacitación y funcionamiento de los grupos comunitarios y/o institucionales de apoyo?</label>
                                                        <select name="p1011" id="p1011" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1012" class="">10.12. ¿La institución favorece la integración de los diferentes grupos y/o redes de apoyo institucional y comunitario que implementan otras estrategias o intervenciones (AIEPI, maternidad saludable, reducción de la transmisión perinatal del VIH y sífilis, servicios amigables para adolescentes y jóvenes)?  </label>
                                                        <select name="p1012" id="p1012" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1013" class="">10.13. ¿Las madres, padres y familiares conocen sobre la existencia de los grupos y/o redes de apoyo y la forma de contactarlos? </label>
                                                        <select name="p1013" id="p1013" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1014" class="">10.14. ¿El personal de la institución conoce sobre la existencia de los grupos y/o redes de apoyo, la forma de contactarlos y como promocionar su existencia con las familias que reciben atención materna e infantil?</label>
                                                        <select name="p1014" id="p1014" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1015" class="">10.15. ¿La institución tiene en cuenta las propuestas de los grupos/ redes de apoyo comunitario y/o institucional para el mejoramiento de la atención en salud? y coordina con ellos actividades que promuevan la salud y la nutrición como en el caso de la celebración de “La Semana Nacional y Mundial de la lactancia materna” y otras iniciativas.</label>
                                                        <select name="p1015" id="p1015" class="form-control"> 
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p1016" class="">10.16. ¿Los grupos y/o redes de apoyo conocen los mecanismos de seguimiento para apoyar a las madres a su salida del servicio de maternidad? </label>
                                                        <select name="p1016" id="p1016" class="form-control"> 
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
                        paso:10
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p101').val(rta.data[0].p101); 
                            $('#p102').val(rta.data[0].p102); 
                            $('#p103').val(rta.data[0].p103); 
                            $('#p104').val(rta.data[0].p104); 
                            $('#p105').val(rta.data[0].p105); 
                            $('#p106').val(rta.data[0].p106); 
                            $('#p107').val(rta.data[0].p107); 
                            $('#p108').val(rta.data[0].p108); 
                            $('#p109').val(rta.data[0].p109); 
                            $('#p1010').val(rta.data[0].p1010); 
                            $('#p1011').val(rta.data[0].p1011); 
                            $('#p1012').val(rta.data[0].p1012); 
                            $('#p1013').val(rta.data[0].p1013); 
                            $('#p1014').val(rta.data[0].p1014); 
                            $('#p1015').val(rta.data[0].p1015); 
                            $('#p1016').val(rta.data[0].p1016); 
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