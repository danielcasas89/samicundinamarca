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
                                    <div>Registro Indicador IAMII: Paso 8
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
                                    <div class="card-header">Registro Indicador: Paso 8
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
                                                        <input name="paso" id="paso" placeholder="" value="8" type="hidden" readonly class="form-control">                                                      
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
                                                                        <div class="text">Porcentaje diligenciado Paso 8</div>
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
                                                        <label for="p81" class="">8.1. 8.1. ¿Aplica la institución un protocolo de atención en la consulta externa para favorecer  la valoración integral de la salud y el desarrollo infantil temprano de las niñas y los niños menores de 6 años?</label>
                                                        <select name="p81" id="p81" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p82" class="">8.2. ¿Tiene la institución estrategias para garantizar el seguimiento sistemático del Esquema de intervenciones/atenciones en salud individuales para niños y niñas en primera infancia "uno a uno” ?</label>
                                                        <select name="p82" id="p82" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p83" class="">8.3. ¿Tiene la institución un mecanismo establecido de coordinación con el ente de salud correspondiente, las aseguradoras y su red, que permita a las niñas y niños, con alteraciones en su estado nutricional (malnutrición, anemia) recibir intervención integral oportuna hasta lograr su recuperación? </label>
                                                        <select name="p83" id="p83" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p84" class="">8.4. ¿Tiene la institución un mecanismo establecido de coordinación con el ente de salud correspondiente, las aseguradoras y su red, que permita a las niñas y niños, víctimas o en riesgo de maltrato, recibir atención integral oportuna?</label>
                                                        <select name="p84" id="p84" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p85" class="">8.5. ¿Durante la atención integral en salud individual, las consultas y la hospitalización de niños y niñas menores de seis años se hace seguimiento dinámico y sistemático del crecimiento y desarrollo según los estándares adoptados por el país y el marco de la política de primera infancia? </label>
                                                        <select name="p85" id="p85" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p86" class="">8.6. ¿El personal de salud encargado de la atención a niñas y niños, explica a las madres, padres y cuidadoras/es cómo evoluciona el crecimiento y desarrollo de los niños y las niñas?</label>
                                                        <select name="p86" id="p86" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p87" class="">8.7. ¿Durante la valoración integral,  las consultas y/o la hospitalización de niños y niñas, se revisa y diligencia sistemáticamente el carné de salud infantil?</label>
                                                        <select name="p87" id="p87" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p88" class="">8.8. ¿El personal de salud que atiende a niños y niñas orienta a las madres, padres y cuidadores/as sobre cuándo y cómo iniciar la alimentación complementaria adecuada (alimentación perceptiva) y la continuidad del amamantamiento hasta los dos años o más?</label>
                                                        <select name="p88" id="p88" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p89" class="">8.9. ¿Durante la valoración integral y/o las consultas de niños y niñas menores de seis años se detectan oportunamente las alteraciones del crecimiento y desarrollo, se remite inmediatamente para su intervención oportuna y se hace seguimiento a esa remisión?</label>
                                                        <select name="p89" id="p89" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p810" class="">8.10. ¿En la valoración integral y las consultas de niñas y niños se pone especial atención a la desparasitación periódica y a la suplementación con micronutrientes?</label>
                                                        <select name="p810" id="p810" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p811" class="">8.11. ¿El personal de salud que atiende niños y niñas conoce y aplica las Guías Alimentarías para la población Colombiana?48 </label>
                                                        <select name="p811" id="p811" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p812" class="">8.12. ¿Durante la valoración integral, las consultas y/o la hospitalización de niños y niñas, se evalúa la alimentación y nutrición, y en caso de ser diagnosticados con anemia o malnutrición se remiten para su intervención oportuna, se hace seguimiento del caso y se registra en la historia clínica?</label>
                                                        <select name="p812" id="p812" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p813" class="">8.13. ¿Se explica a las madres, padres y cuidadores/as la importancia de llevar a los niños y las niñas a consulta de salud bucal, se les remite a ella y se hace seguimiento de su participación en la misma? </label>
                                                        <select name="p813" id="p813" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p814" class="">8.14. ¿Se orienta a las madres, padres y cuidadores sobre las desventajas de la utilización del chupo y el biberón y se brinda ayuda especial para las familias que los utilizan, permitiéndoles tomar decisiones informadas? </label>
                                                        <select name="p814" id="p814" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p815" class="">8.15. ¿El personal de salud proporciona apoyo especial a las niñas y los niños que se encuentran en condiciones de vulnerabilidad?</label>
                                                        <select name="p815" id="p815" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p816" class="">8.16. ¿En casos de enfermedad de las niñas y los niños menores de 6 años, el personal de salud de todos los servicios, 49 brinda información oportuna y sencilla a las madres, padres y cuidadores sobre cómo tratar la enfermedad, la importancia de la alimentación y nutrición adecuadas (para los menores de 2 años: incrementar la frecuencia de alimentación durante la convalecencia sin suspender la lactancia materna) y mantener las actividades que favorecen el desarrollo infantil temprano? </label>
                                                        <select name="p816" id="p816" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p817" class="">8.17. ¿La institución cuenta con mecanismos verificables para hacer seguimiento a padres y cuidadores de la adherencia a las recomendaciones y educación impartida sobre la salud y nutrición infantil?</label>
                                                        <select name="p817" id="p817" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p818" class="">8.18. En caso de remisión de niñas o niños atendidos a otros servicios o institución ¿El personal de salud informa a madres, padres y familiares sobre los mecanismos institucionales para continuar su atención? </label>
                                                        <select name="p818" id="p818" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p819" class="">8.19. ¿Las madres, padres y familiares que asisten a la institución, pueden responder preguntas sobre factores protectores para la salud y nutrición infantil, y en especial sobre pautas y prácticas de crianza que favorecen el desarrollo infantil temprano</label>
                                                        <select name="p819" id="p819" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p820" class="">8.20. ¿Las madres que asisten a consulta con las y los recién nacidos, al control de valoración integral o, a las consultas pediátricas, o cuando están hospitalizados, pueden demostrar la técnica para amamantar: posición, agarre, succión efectiva; la extracción manual de la leche materna y la técnica de conservación y ofrecimiento con taza y cuchara de la misma?</label>
                                                        <select name="p820" id="p820" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p821" class="">8.21. ¿Las madres, padres y familiares conocen específicamente sobre cuándo y cómo iniciar la alimentación complementaria adecuada y garantizar la continuidad del amamantamiento hasta los dos años o más? </label>
                                                        <select name="p821" id="p821" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p822" class="">8.22. ¿Las madres, padres y familiares conocen sobre la existencia y cómo contactarse con redes/grupos institucionales y comunitarios de apoyo, que refuerzan las prácticas de cuidado para niñas y niños, enseñadas en la institución, para continuarlas en los espacios en donde trascurre su cotidianidad (hogar, escuelas, espacios públicos, entre otros)?</label>
                                                        <select name="p822" id="p822" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p823" class="">8.23. ¿Todos los niños y las niñas menores de 6 años que son llevados a consulta externa o urgencias son valorados en forma integral? </label>
                                                        <select name="p823" id="p823" class="form-control">
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
                        paso:8
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p81').val(rta.data[0].p81); 
                            $('#p82').val(rta.data[0].p82);
                            $('#p83').val(rta.data[0].p83);
                            $('#p84').val(rta.data[0].p84);
                            $('#p85').val(rta.data[0].p85);
                            $('#p86').val(rta.data[0].p86);
                            $('#p87').val(rta.data[0].p87);
                            $('#p88').val(rta.data[0].p88);
                            $('#p89').val(rta.data[0].p89);
                            $('#p810').val(rta.data[0].p810);
                            $('#p811').val(rta.data[0].p811);
                            $('#p812').val(rta.data[0].p812);
                            $('#p813').val(rta.data[0].p813);
                            $('#p814').val(rta.data[0].p814);
                            $('#p815').val(rta.data[0].p815);
                            $('#p816').val(rta.data[0].p816);
                            $('#p817').val(rta.data[0].p817);
                            $('#p818').val(rta.data[0].p818);
                            $('#p819').val(rta.data[0].p819);
                            $('#p820').val(rta.data[0].p820);
                            $('#p821').val(rta.data[0].p821);
                            $('#p822').val(rta.data[0].p822);
                            $('#p823').val(rta.data[0].p823);
                        }        
        
                        var totalMissing = 0;
                        var totalQuestions = 23;
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