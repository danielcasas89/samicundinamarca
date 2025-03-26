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
                                    <div>Registro Indicador IAMII: Paso 7
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
                                    <div class="card-header">Registro Indicador: Paso 7
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
                                                        <input name="paso" id="paso" placeholder="" value="7" type="hidden" readonly class="form-control">
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
                                                                        <div class="text">Porcentaje diligenciado Paso 7</div>
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
                                                        <label for="p71" class="">7.1. ¿La institución ofrece alojamiento conjunto a la madre y su niña o niño recién nacido? </label>
                                                        <select name="p71" id="p71" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p72" class="">7.2. ¿Favorece la institución el alojamiento conjunto de madres, niñas y niños, aún en casos de hospitalización de alguno de los dos? </label>
                                                        <select name="p72" id="p72" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p73" class="">7.3. ¿El personal de salud que atienden madres, niños y niñas, conoce la importancia del alojamiento conjunto madre- hijos/as? </label>
                                                        <select name="p73" id="p73" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p74" class="">7.4. ¿El personal de salud enseña a las usuarias y usuarios sobre su derecho a permanecer junto a sus hijos e hijas en caso de hospitalización? </label>
                                                        <select name="p74" id="p74" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p75" class="">7.5. ¿Cuenta la institución con estrategias de información y educación para que la familia participe en el cuidado y alimentación de los recién nacidos y lactantes? </label>
                                                        <select name="p75" id="p75" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p76" class="">7.6. ¿Permite la institución la presencia sin restricciones de la madre, del padre o de un familiar en caso de la hospitalización de niños y niñas?</label>
                                                        <select name="p76" id="p76" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p77" class="">7.7. ¿Tiene la institución horarios flexibles para permitir que la madre o el padre acompañen a sus hijos e hijas en la unidad de cuidado intensivo neonatal o pediátrica? </label>
                                                        <select name="p77" id="p77" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>


                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p78" class="">7.8. ¿El personal de salud pone especial atención en capacitar y educar a los padres sobre la importancia de su participación en el cuidado y la crianza de sus hijas e hijos? </label>
                                                        <select name="p78" id="p78" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p79" class="">7.9. ¿Tiene la institución mecanismos incluidos en los parámetros de calidad que favorezcan condiciones de comodidad a las madres o acompañantes de las niñas y niños hospitalizados?</label>
                                                        <select name="p79" id="p79" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p710" class="">7.10. ¿Las madres, padres y familiares conocen la importancia del alojamiento conjunto madre- hijo/a para favorecer el vínculo afectivo, la lactancia materna a libre demanda, el cuidado y la crianza?</label>
                                                        <select name="p710" id="p710" class="form-control">
                                                        <option value=''>--</option>
                                                        <option value='SI'>SI</option>
                                                        <option value='NO'>NO</option>
                                                        <option value='NA'>NA</option>
                                                    </select></div>

                                                    <div class="form-group col-md-10 offset-md-1 regis">
                                                        <label for="p711" class="">7.11. ¿Las madres conocen su derecho a permanecer con su hijo o hija en caso de hospitalización o cuando están en observación?</label>
                                                        <select name="p711" id="p711" class="form-control">
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
                            $('#p71').val(rta.data[0].p71);
                            $('#p72').val(rta.data[0].p72);
                            $('#p73').val(rta.data[0].p73);
                            $('#p74').val(rta.data[0].p74);
                            $('#p75').val(rta.data[0].p75);
                            $('#p76').val(rta.data[0].p76);
                            $('#p77').val(rta.data[0].p77);
                            $('#p78').val(rta.data[0].p78);
                            $('#p79').val(rta.data[0].p79);
                            $('#p710').val(rta.data[0].p710);
                            $('#p711').val(rta.data[0].p711);
                        }

                        var totalMissing = 0;
                        var totalQuestions = 11;
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