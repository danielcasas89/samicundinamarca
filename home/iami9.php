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
                                    <div>Registro Indicador IAMII: Paso 9
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
                                    <div class="card-header">Registro Indicador: Paso 9
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
                                                        <input name="paso" id="paso" placeholder="" value="9" type="hidden" readonly class="form-control">
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
                                                                        <div class="text">Porcentaje diligenciado Paso 9</div>
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
                                                        <label for="p91" class="">9.1. ¿El personal de salud recibe capacitación en los principios básicos de derechos humanos, y los aplica en forma práctica durante la prestación de la atención?</label>
                                                        <select name="p91" id="p91" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p92" class="">9.2. ¿El personal de salud tiene una actitud positiva para escuchar las preguntas, utiliza lenguaje respetuoso, percibe las necesidades de madres e hijos/as, y les brinda información clara, veraz y objetiva para facilitarles la toma de decisiones?   </label>
                                                        <select name="p92" id="p92" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p93" class="">9.3. ¿El personal conoce los mecanismos de atención a las mujeres víctimas de violencia y les da atención preferencial poniéndolas en contacto inmediato con el personal responsable de dicho procedimiento? </label>
                                                        <select name="p93" id="p93" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p94" class="">9.4. ¿El personal de salud brinda atención oportuna, cálida y eficaz a las mujeres víctimas de violencia física, sicológica o sexual? </label>
                                                        <select name="p94" id="p94" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p95" class="">9.5. ¿El personal de salud presta atención especial a las mujeres que presentan algún tipo de discapacidad sea física, cognitiva o sensorial para asegurar la no discriminación y el disfrute de sus derechos sexuales y reproductivos? </label>
                                                        <select name="p95" id="p95" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p96" class="">9.6. ¿El personal de la institución en su totalidad porta su carné, se identifica y mantiene una actitud amable y respetuosa frente a las y los usuarios, acompañantes y visitantes? </label>
                                                        <select name="p96" id="p96" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p97" class="">9.7. ¿Los servicios de la institución están debidamente iluminados, aireados y señalizados y la información que se exhibe está escrita en lenguaje sencillo y comprensible para todas las personas? </label>
                                                        <select name="p97" id="p97" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>


                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p98" class="">9.8. ¿Tiene la institución dotación básica para garantizar la comodidad en salas de espera, servicios de consulta externa, hospitalización y urgencias?</label>
                                                        <select name="p98" id="p98" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p99" class="">9.9. ¿Cuenta la institución con espacios adecuados en salas de espera y/o en las áreas de hospitalización para promover el derecho de las niñas y niños al juego?</label>
                                                        <select name="p99" id="p99" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p910" class="">9.10. ¿Ha creado la institución mecanismos que faciliten la atención oportuna, preferencial y no discriminatoria, durante la prestación de servicios? </label>
                                                        <select name="p910" id="p910" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p911" class="">9.11. ¿La Institución dispone de material propio, que no hace alusión a ninguna empresa en especial, para su uso con las usuarias y usuarios (rotafolios, afiches, modelos de bebés, de glándulas mamarias, de tazas, curvas de crecimiento, tallímetros, hojas de prescripción médica entre otros)? </label>
                                                        <select name="p911" id="p911" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p912" class="">9.12. ¿El personal de salud da explicaciones a las niñas y niños sobre su estado de salud, utilizando un lenguaje apropiado de acuerdo a su edad y condiciones? </label>
                                                        <select name="p912" id="p912" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p913" class="">9.13. ¿El personal de salud verifica sistemáticamente que usuarias y usuarios de los servicios maternos e infantiles han comprendido la educación que se brinda en salud y nutrición?</label>
                                                        <select name="p913" id="p913" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p914" class="">9.14. ¿El personal de salud informa a las madres, padres, cuidadores e incluso a los mismos niños y niñas sobre los cuidados de la salud y la nutrición teniendo en cuenta su pertenencia étnica y su cultura ?</label>
                                                        <select name="p914" id="p914" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p915" class="">9.15. ¿La institución cuenta con servicios amigables de salud para adolescentes o mecanismos para ponerlos en contacto y les brinda la atención que responde a sus necesidades específicas?</label>
                                                        <select name="p915" id="p915" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p916" class="">9.16. ¿Manifiestan las mujeres, las gestantes, las madres y sus familias que durante la estancia en la institución de salud encontraron condiciones físicas, sociales y afectivas dignas?</label>
                                                        <select name="p916" id="p916" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p917" class="">9.17. ¿Las madres, padres y familiares consideran que durante los distintos momentos de atención, el personal de salud orienta y da respuesta oportuna y pertinente a los problemas de salud planteados? </label>
                                                        <select name="p917" id="p917" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p918" class="">9.18. ¿La institución cuenta con mecanismos efectivos de seguimiento a las remisiones que se hacen de la población materna e infantil atendida?</label>
                                                        <select name="p918" id="p918" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p919" class="">9.19. ¿La institución y su red de prestadores hacen contrarreferencia de los casos remitidos?  </label>
                                                        <select name="p919" id="p919" class="form-control">
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
                        paso:9
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p91').val(rta.data[0].p91);
                            $('#p92').val(rta.data[0].p92);
                            $('#p93').val(rta.data[0].p93);
                            $('#p94').val(rta.data[0].p94);
                            $('#p95').val(rta.data[0].p95);
                            $('#p96').val(rta.data[0].p96);
                            $('#p97').val(rta.data[0].p97);
                            $('#p98').val(rta.data[0].p98);
                            $('#p99').val(rta.data[0].p99);
                            $('#p910').val(rta.data[0].p910);
                            $('#p911').val(rta.data[0].p911);
                            $('#p912').val(rta.data[0].p912);
                            $('#p913').val(rta.data[0].p913);
                            $('#p914').val(rta.data[0].p914);
                            $('#p915').val(rta.data[0].p915);
                            $('#p916').val(rta.data[0].p916);
                            $('#p917').val(rta.data[0].p917);
                            $('#p918').val(rta.data[0].p918);
                            $('#p919').val(rta.data[0].p919);
                        }

                        var totalMissing = 0;
                        var totalQuestions = 19;
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