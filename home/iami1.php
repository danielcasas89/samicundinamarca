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
                                    <div>Registro Indicador IAMII: Paso 1
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
                                    <div class="card-header">Registro Indicador: Paso 1
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
                                                        <input name="paso" id="paso" placeholder="" value="1" type="hidden" readonly class="form-control">
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
                                                        <label for="trimestre" class="">Seleccione trimestre:</label>
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
                                                                        <div class="text">Porcentaje diligenciado Paso 1</div>
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
                                                        <label for="p11" class="">1.1 ¿Dispone la institución de una política escrita que incluya los 10 pasos de la Estrategia Instituciones Amigas de la Mujer y la Infancia Integral IAMII? </label>
                                                        <select name="p11" id="p11" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p12" class="">1.2 ¿La Política IAMII está integrada al SOGC (habilitación, incluyendo el sistema de información y el PAMEC) y articulada por servicios al Plan de Desarrollo Institucional y éste a las políticas de salud y nutrición materna e infantil de los territorios, departamentos y la nación?
</label>
                                                        <select name="p12" id="p12" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p13" class="">1.3 ¿Incorpora la política el enfoque integral, diferencial e inclusivo que tenga en cuenta las necesidades e intereses de las mujeres y contribuya a la inclusión del hombre en los procesos de la salud y la nutrición de la mujer y de sus hijas e hijos?
</label>
                                                        <select name="p13" id="p13" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p14" class="">1.4 ¿Contempla la política actividades de promoción de la salud, prevención de la enfermedad y atención en salud y nutrición materna e infantil con características de integralidad, calidad y continuidad?
</label>
                                                        <select name="p14" id="p14" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p15" class="">1.5 ¿La política institucional se refiere explícitamente a la promoción, protección y apoyo efectivo a la lactancia materna, el inicio y seguimiento apropiado de la alimentación complementaria adecuada a los niños y las niñas entre los 6 y 24 meses de edad?
</label>
                                                        <select name="p15" id="p15" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p16" class="">1.6 ¿La política se refiere explícitamente a la forma como se hace atención integral en salud y nutrición, incluyendo la identificación oportuna de las alteraciones nutricionales y el desarrollo  la detección de los casos de malnutrición en las niñas y los niños menores de 5 años, entre otras?
</label>
                                                        <select name="p16" id="p16" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p17" class="">1.7 ¿Existe un comité con presencia de la comunidad que se reúne periódicamente, documenta a través de actas sus acciones y que es responsable de la coordinación y seguimiento de las actividades que se desarrollan para hacer operativa la política?
</label>
                                                        <select name="p17" id="p17" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p18" class="">1.8 ¿La institución tiene implementadas estrategias de difusión de la política para todos los funcionarios, usuarias, usuarios, grupos de apoyo y comunidad en general?
</label>
                                                        <select name="p18" id="p18" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p19" class="">1.9 ¿Todos los miembros del personal asistencial, conocen y ponen en práctica las acciones descritas para la atención en salud y nutrición materna e infantil que están en la política IAMII institucional? </label>
                                                        <select name="p19" id="p19" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p110" class="">1.10 ¿Todos los miembros del personal administrativo o vinculado a la institución, conocen y practican la política IAMII de atención en salud y nutrición materna e infantil? </label>
                                                        <select name="p110" id="p110" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p111" class="">1.11 ¿Se aplica periódicamente el formulario de autoapreciación para monitorear el cumplimiento y los avances en el desarrollo y la implementación de la política? </label>
                                                        <select name="p111" id="p111" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p112" class="">1.12 ¿Los resultados de la autoapreciación, el seguimiento a los indicadores de los datos generales, así como las preevaluaciones y sus análisis son usados para introducir mejoras, fortalecer o mantener procesos institucionales?</label>
                                                        <select name="p112" id="p112" class="form-control">
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
                    console.warn(rta);
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
                        paso:1
                    },
                    success: function(rta){
                        if (rta.data.length > 0)
                        {
                            $('#p11').val(rta.data[0].p11);
                            $('#p12').val(rta.data[0].p12);
                            $('#p13').val(rta.data[0].p13);
                            $('#p14').val(rta.data[0].p14);
                            $('#p15').val(rta.data[0].p15);
                            $('#p16').val(rta.data[0].p16);
                            $('#p17').val(rta.data[0].p17);
                            $('#p18').val(rta.data[0].p18);
                            $('#p19').val(rta.data[0].p19);
                            $('#p110').val(rta.data[0].p110);
                            $('#p111').val(rta.data[0].p111);
                            $('#p112').val(rta.data[0].p112);
                        }

                        var totalMissing = 0;
                        var totalQuestions = 12;
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