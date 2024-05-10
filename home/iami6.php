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
                                    <div>Registro Indicador IAMII: Paso 6
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
                                    <div class="card-header">Registro Indicador: Paso 6
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
                                                        <input name="paso" id="paso" placeholder="" value="6" type="hidden" readonly class="form-control">                                                      
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
                                                                        <div class="text">Porcentaje diligenciado Paso 6</div>
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
                                                        <label for="p61" class="">6.1. ¿El personal de salud que atiende en los servicios de urgencias, de maternidad y pediatría respeta las decisiones informadas de las madres sobre el tipo de alimentación para sus hijas e hijos y las apoya para su cumplimiento sin recriminarlas, discriminarlas, excluirlas o inducirlas al uso de fórmulas artificiales ?</label>
                                                        <select name="p61" id="p61" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p62" class="">6.2. ¿El personal del área asistencial informa a las madres, padres y sus familiares sobre los beneficios de la leche materna, la importancia del calostro y la libre demanda, sin horarios ni restricciones de día y de noche, para mantener la producción de la leche y la buena nutrición de sus hijas e hijos?</label>
                                                        <select name="p62" id="p62" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p63" class="">6.3. ¿El personal de salud que atiende en los servicios orienta y brinda apoyo efectivo a las madres, para poner la niña o el niño al seno? </label>
                                                        <select name="p63" id="p63" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p64" class="">6.4. ¿El personal de salud que atiende en los servicios, orienta y brinda ayuda efectiva a las madres, padres y acompañantes para que las niñas y niños reciban solo leche materna durante los seis primeros meses de vida sin suministrarles aguas, ni ningún otro alimento, ni bebida39, salvo indicación médica?</label>
                                                        <select name="p64" id="p64" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p65" class="">6.5. ¿El personal de salud de los servicios maternidad y pediatría, detecta los problemas tempranos del amamantamiento y proporciona a la madre consejería en lactancia para mejorar la técnica y para que desarrolle confianza en su capacidad de amamantar? </label>
                                                        <select name="p65" id="p65" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p66" class="">6.6. ¿El personal que atiende madres en periodo de lactancia y niñas y niños menores de dos años brinda información y ayuda efectiva para que las usuarias aprendan a hacer la extracción manual, la conservación de la leche materna extraída y la administración de la misma con taza y/o cucharita?</label>
                                                        <select name="p66" id="p66" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p67" class="">6.7. ¿El personal del área asistencial informa a las madres y padres sobre la importancia de despertar al bebé, si duerme demasiado (3 horas o más seguidas) en las primeras semanas de vida, para ofrecerle la leche materna ?</label>
                                                        <select name="p67" id="p67" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p68" class="">6.8. ¿El personal de salud capacita y hace seguimiento a la educación impartida a las madres para mantener la lactancia materna exclusiva en las diferentes consultas que se realizan y para brindar apoyo a las madres al momento del ingreso al trabajo?   </label>
                                                        <select name="p68" id="p68" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p69" class="">6.9. ¿El personal de salud brinda orientación efectiva a las madres, padres y cuidadores sobre los riesgos y la forma de identificar la malnutrición en la población menor de 2 años?</label>
                                                        <select name="p69" id="p69" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p610" class="">6.10. ¿El personal de salud asesora a las mujeres en periodo de lactancia sobre el uso correcto y sistemático del preservativo durante todas sus relaciones sexuales y garantiza la entrega de los mismos? </label>
                                                        <select name="p610" id="p610" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p611" class="">6.11.    ¿El personal de salud de los diferentes servicios incluido odontología puede enunciar por lo menos tres beneficios de amamantar relacionadas con la salud bucal y además las desventajas del uso de chupos y biberones?</label>
                                                        <select name="p611" id="p611" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p612" class="">6.12. ¿El personal que atiende en los servicios de salud y nutrición materna e infantil, conoce las razones médicas aceptables para prescribir alimentos diferentes a la leche materna?</label>
                                                        <select name="p612" id="p612" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p613" class="">6.13. ¿El personal médico y de enfermería conoce el manejo de los medicamentos para las madres en lactancia 41 y cómo intervenir médicamente sin desestimularla, en el caso de complicaciones? </label>
                                                        <select name="p613" id="p613" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p614" class="">6.14. ¿El personal que atiende madres, lactantes, niñas y niños pequeños informa y brinda orientación efectiva a las madres, padres y cuidadores/as sobre la forma de iniciar la alimentación complementaria adecuada, utilizando las pautas establecidas para lograr una alimentación perceptiva a partir de los seis meses de vida, a la vez que se continúa con el amamantamiento hasta los dos años o más?</label>
                                                        <select name="p614" id="p614" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p615" class="">6.15. ¿El personal de salud hace seguimiento sistemático a la comprensión y a la forma cómo están poniendo en práctica los mensajes sobre la alimentación complementaria adecuada que recibieron las madres, padres y cuidadores?</label>
                                                        <select name="p615" id="p615" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p616" class="">6.16. ¿Conoce el personal de salud de la institución el Decreto 1397 de 1992, sus actualizaciones y las normas nacionales que promueven, protegen y apoyan la lactancia materna?</label>
                                                        <select name="p616" id="p616" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p617" class="">6.17. ¿El personal responsable de la sala de extracción de la leche materna y/o banco de leche humana y quienes brindan ayuda directamente a las madres, puede demostrar que en los servicios de atención materna e infantil, no se promueve ningún tipo de alimento artificial contemplado en la normatividad vigente y que se da apoyo efectivo a las madres para mantener la lactancia materna, incluso en caso de separación? </label>
                                                        <select name="p617" id="p617" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p618" class="">6.18. ¿Las fórmulas artificiales o alimentos complementarios sugeridos para las niñas y niños menores de dos años de edad se prescriben en la institución con el mismo proceso que se realiza para un medicamento y en casos claramente definidos en los protocolos Institucionales ?</label>
                                                        <select name="p618" id="p618" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p619" class="">6.19. ¿La institución no acepta donaciones de alimentos, material educativo, biberones, chupos, obsequios o productos que desestimulen la lactancia materna? </label>
                                                        <select name="p619" id="p619" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p620" class="">6.20. ¿Las madres conocen el mecanismo de producción de la leche materna, la importancia de la frecuencia de las mamadas a libre demanda y qué significa una succión efectiva?</label>
                                                        <select name="p620" id="p620" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p621" class="">6.21. ¿Las madres atendidas en la institución conocen la importancia del calostro y el por qué del inicio temprano de la lactancia?</label>
                                                        <select name="p621" id="p621" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p622" class="">6.22. ¿Las madres de recién nacidos y lactantes menores de dos años, están en capacidad de demostrar cómo poner a la niña o al niño al seno y cómo extraerse manualmente la leche?</label>
                                                        <select name="p622" id="p622" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p623" class="">6.23. ¿Las madres saben la importancia de alimentar a sus bebés sólo con leche materna durante los seis primeros meses de vida, (180 días) sin ningún otro alimento ni bebida? </label>
                                                        <select name="p623" id="p623" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p624" class="">6.24. ¿Las madres conocen la forma de iniciar, a partir de los 6 meses de edad, la alimentación complementaria adecuada y con lactancia materna hasta los dos años o más? </label>
                                                        <select name="p624" id="p624" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p625" class="">6.25. ¿La institución oferta la consulta de valoración de la lactancia materna descrita en la resolución 3280 de 2018? </label>
                                                        <select name="p625" id="p625" class="form-control">
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
                        ano:ano,
                        paso:6
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p61').val(rta.data[0].p61); 
                            $('#p62').val(rta.data[0].p62);
                            $('#p63').val(rta.data[0].p63);
                            $('#p64').val(rta.data[0].p64);
                            $('#p65').val(rta.data[0].p65);
                            $('#p66').val(rta.data[0].p66);
                            $('#p67').val(rta.data[0].p67);
                            $('#p68').val(rta.data[0].p68);
                            $('#p69').val(rta.data[0].p69);
                            $('#p610').val(rta.data[0].p610);
                            $('#p611').val(rta.data[0].p611);
                            $('#p612').val(rta.data[0].p612);
                            $('#p613').val(rta.data[0].p613);
                            $('#p614').val(rta.data[0].p614);
                            $('#p615').val(rta.data[0].p615);
                            $('#p616').val(rta.data[0].p616);
                            $('#p617').val(rta.data[0].p617);
                            $('#p618').val(rta.data[0].p618);
                            $('#p619').val(rta.data[0].p619);
                            $('#p620').val(rta.data[0].p620);
                            $('#p621').val(rta.data[0].p621);
                            $('#p622').val(rta.data[0].p622);
                            $('#p623').val(rta.data[0].p623);
                            $('#p624').val(rta.data[0].p624);
                            $('#p625').val(rta.data[0].p625);
                        }        
        
                        var totalMissing = 0;
                        var totalQuestions = 25;
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