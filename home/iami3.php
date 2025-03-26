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
                                    <div>Registro Indicador IAMII: Paso 3
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
                                    <div class="card-header">Registro Indicador: Paso 3
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
                                                        <input name="paso" id="paso" placeholder="" value="3" type="hidden" readonly class="form-control">
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
                                                            <option value='2025'>2025</option>
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
                                                                        <div class="text">Porcentaje diligenciado Paso 3</div>
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
                                                        <label for="p31" class="">3.1. ¿Desarrolla la IPS mecanismos de coordinación verificables, con las EPS, y con los entes territoriales en sus acciones colectivas, para lograr que las gestantes asistan a la atención para el cuidado prenatal y que la primera consulta se realice antes de las 10 semanas de gestación y éstos son conocidos por todo el personal de la institución, las y los usuarios y los grupos de apoyo, agentes y gestores comunitarios, promotores de salud, parteras (en zonas dispersas), madres comunitarias entre otros? </label>
                                                        <select name="p31" id="p31" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p32" class="">3.2.  ¿La IPS tiene mecanismos verificables para ir actualizando las necesidades de información, educación o refuerzo educativo a las gestantes, familias y comunidad? Y ¿estos son tenidos en cuenta como prioridades en el PAMEC?</label>
                                                        <select name="p32" id="p32" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p33" class="">3.3. ¿Tiene la IPS mecanismos verificables que permitan a las gestantes que asisten a sus servicios, la oportunidad en la toma y entrega de resultados de exámenes diagnósticos, al igual que al manejo indicado, con énfasis en aquellas usuarias que tienen barreras de acceso, o con necesidades adicionales?</label>
                                                        <select name="p33" id="p33" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p34" class="">3.4. ¿Tiene la institución mecanismos o estrategias para verificar que la atención de todas las gestantes, ha sido amable y respetuosa, y se realiza aplicando las técnicas de consejería?</label>
                                                        <select name="p34" id="p34" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p35" class="">3.5. ¿Todas las gestantes atendidas en la institución se les realiza Valoración integral del estado de salud e identificación de factores de riesgo y se registra en historia clínica?</label>
                                                        <select name="p35" id="p35" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p36" class="">3.6. ¿A las madres que asisten a  la atención para el cuidado prenatal  se les lleva adecuadamente el carné materno y se les dan explicaciones sobre su contenido, uso e importancia de llevarlo siempre consigo?</label>
                                                        <select name="p36" id="p36" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p37" class="">3.7. ¿A las madres que asisten a  la atención para el cuidado prenatal , se les hace la evaluación sistemática de sus necesidades educativas, alimentación y nutrición y psicosocial, y ellas conocen su interpretación y recomendaciones para vivir una gestación saludable?</label>
                                                        <select name="p37" id="p37" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p38" class="">3.8. ¿Tiene la institución mecanismos o estrategias para verificar que la educación y adherencia al programa de suplementación con micronutrientes son efectivas</label>
                                                        <select name="p38" id="p38" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p39" class="">3.9. ¿A todas las gestantes atendidas a  la atención para el cuidado prenatal  se les informa sobre la importancia de la salud bucal, se remiten sistemáticamente a valoración por odontología con el fin de recibir, asesoría en higiene oral, establecer su diagnóstico de salud oral y definir un plan integral de cuidado</label>
                                                        <select name="p39" id="p39" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p310" class="">3.10. ¿Se realizan actividades de educación en salud y nutrición individuales y/o grupales (Curso de preparación de la maternidad y paternidad) para todas las gestantes que asisten a  la atención para el cuidado prenatal  aplicando las técnicas de consejería según necesidades educativas, e incluyendo compañeros y otros familiares o personas significativas?</label>
                                                        <select name="p310" id="p310" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p311" class="">3.11. ¿Todas las gestantes atendidas pueden describir nociones básicas de temas como signos de alarma durante la gestación y el puerperio, mecanismos de trasmisión del VIH e ITS incluyendo sífilis, entre otros?   </label>
                                                        <select name="p311" id="p311" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p312" class="">3.12. ¿Las gestantes y madres atendidas en la institución están en capacidad de demostrar que conocen los beneficios de la lactancia materna, la forma de ponerla en práctica, la importancia de la lactancia materna exclusiva durante los seis primeros meses de vida y con alimentación complementaria adecuada hasta los dos años o más, la   libre demanda y las desventajas y peligros del uso de chupos y biberones?</label>
                                                        <select name="p312" id="p312" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p313" class="">3.13. ¿Se registran las actividades educativas que reciben las gestantes y sus acompañantes en la historia clínica correspondiente?</label>
                                                        <select name="p313" id="p313" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p314" class="">3.14. ¿Se realizan entrevistas periódicas a las gestantes y sus familias para indagar sobre el grado de conocimiento y aplicación de las prácticas en salud y nutrición aprendidas</label>
                                                        <select name="p314" id="p314" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p315" class="">3.15. ¿Si la madre lo desea, la institución facilita la presencia del esposo, compañero o de un acompañante significativo durante   la atención para el cuidado prenatal?</label>
                                                        <select name="p315" id="p315" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p316" class="">3.16. ¿Brinda la institución apoyo especial a aquellas mujeres, parejas y familias con condiciones especiales como dificultad para aceptar la gestación, la maternidad en adolescentes, la discapacidad, un resultado positivo de VIH, sífilis o cualquier otra ITS, anomalías congénitas del recién nacido, o haber sido víctima de violencia (incluida la doméstica) y cuando se encuentran en situación de desplazamiento forzado, entre otras? </label>
                                                        <select name="p316" id="p316" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p317" class="">3.17. ¿Se ofrece y garantiza a todas las gestantes atendidas en la institución la prueba voluntaria para VIH, acompañada de asesoría pre y posprueba?</label>
                                                        <select name="p317" id="p317" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p318" class="">3.18. ¿A todas las gestantes atendidas en la institución se les aplica y/o remite para aplicación de las vacunas, se les explica su importancia y se les registra en la historia clínica y en el carné materno, respectivamente? </label>
                                                        <select name="p318" id="p318" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p319" class="">3.19. ¿Se garantiza a todas las gestantes y madres atendidas en la institución, y a sus parejas, asesoría formal anticonceptiva, brindando información sobre el uso de condones y su entrega para la prevención de las ITS (sífilis gestacional y congénita) VIH y la Hepatitis B; durante la gestación y el periodo de la lactancia materna  y la información del método elegido para ser iniciado desde el post parto antes de dada el alta hospitalaria. esta incluida en la historia clínica y también en el carné perinatal.?</label>
                                                        <select name="p319" id="p319" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p320" class="">3.20. ¿El personal de salud ofrece información completa, veraz y oportuna a las madres y sus familias sobre el proceso de su gestación, utilizando las técnicas de consejería y favoreciendo la toma de decisiones informadas sobre su condición de salud? </label>
                                                        <select name="p320" id="p320" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p321" class="">3.21. ¿Conocen las gestantes y sus familias el derecho de sus hijos o hijas a un nombre y una nacionalidad, y la importancia del registro civil desde el nacimiento?</label>
                                                        <select name="p321" id="p321" class="form-control">
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
                            $('#p31').val(rta.data[0].p31);
                            $('#p32').val(rta.data[0].p32);
                            $('#p33').val(rta.data[0].p33);
                            $('#p34').val(rta.data[0].p34);
                            $('#p35').val(rta.data[0].p35);
                            $('#p36').val(rta.data[0].p36);
                            $('#p37').val(rta.data[0].p37);
                            $('#p38').val(rta.data[0].p38);
                            $('#p39').val(rta.data[0].p39);
                            $('#p310').val(rta.data[0].p310);
                            $('#p311').val(rta.data[0].p311);
                            $('#p312').val(rta.data[0].p312);
                            $('#p313').val(rta.data[0].p313);
                            $('#p314').val(rta.data[0].p314);
                            $('#p315').val(rta.data[0].p315);
                            $('#p316').val(rta.data[0].p316);
                            $('#p317').val(rta.data[0].p317);
                            $('#p318').val(rta.data[0].p318);
                            $('#p319').val(rta.data[0].p319);
                            $('#p320').val(rta.data[0].p320);
                            $('#p321').val(rta.data[0].p321);
                        }

                        var totalMissing = 0;
                        var totalQuestions = 21;
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
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>