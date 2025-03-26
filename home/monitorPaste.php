    <?php
    session_start();
    if(isset($_SESSION['usuario_sesion'])){
        @require '../php/cabecera.php';
        ?>
<link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">

                    <div class="app-main__outer">
                        <div class="app-main__inner">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-heading">
                                        <div class="page-title-icon">
                                            <i class="pe-7s-config">
                                            </i>
                                        </div>
                                        <div>Monitoreo Pasteurización
                                            <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="alert alert-success fade show saveSuccess" style="padding: 23px;font-size: 15px;" role="alert">Registro creado exitosamente.<b><span id="numFrasco"></span></b></div>
                                    <div class="main-card mb-3 card">
                                        <div class="card-header ">Monitoreo Pasteurización
                                        </div>
                                        <div class="tab-content">

                                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <div class="card-body">
                                                            <form id="registro_pasteurizacionNew">
                                                            <div class="form-row">
                                                                <div class=" form-group col-md-4 regis">
                                                                    <label for="curva" class="">Seleccione curva:</label>
                                                                    <select id='curva' required name='curva' class='form-control' >
                                                                        <option value=''>--</option>
                                                                    </select>
                                                                    </div>

                                                                <div class=" form-group col-md-6 regis">
                                                                    <h5 class="card-title">Seleccione frascos</h5>
                                                                    <select multiple="multiple" class="multiselect-dropdown form-control" id="myMulti" name="myMulti">
                                                                    </select>
                                                                </div>


                                                            </div>
                                                                <hr/>
                                                            <div class="form-row">

                                                                <div class=" form-group col-md-2 regis">
                                                                    <label for="tPrecalentamiento" class="">Precalentamiento:</label>
                                                                    <input id="tPrecalentamiento" placeholder="" type="number" class="form-control" readonly>
                                                                </div>
                                                                <div class=" form-group col-md-2 regis">
                                                                    <label for="pasteurizacion" class="">Pasteurizacion:</label>
                                                                    <input id="pasteurizacion" placeholder="" type="number" class="form-control" value="30" readonly>
                                                                </div>
                                                                <div class=" form-group col-md-2 regis">
                                                                    <label for="tEnfriamiento" class="">Enfriamiento:</label>
                                                                    <input id="tEnfriamiento" placeholder="" type="number" class="form-control" readonly>
                                                                </div>
                                                                <div class=" form-group col-md-2 regis">
                                                                    <label for="tiempoTotalCurva" class="">Total Ciclo:</label>
                                                                    <input id="tiempoTotalCurva" placeholder="" readonly type="int" class="form-control">
                                                                </div>
                                                                <div class=" form-group col-md-2 regis">
                                                                    <label for="hora_inicio" class="">Hora Inicio:</label>
                                                                    <input class="form-control" type="time" value="" id="hora_inicio"  name="hora_inicio" required >
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6 regis">
                                                        <table class="table table-striped table-bordered">
                                                        <div class="card-header  ">Precalentamiento y Pasteurización</div>
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Minuto</th>
                                                                <th scope="col">Hora</th>
                                                                <th scope="col">T (°C) Baño María</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                <th scope="row">0</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo1" readonly></td>
                                                                    <td><input name="time1" id="time1" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                <th scope="row">5</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo2" readonly></td>
                                                                    <td><input name="time2" id="time2" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                <th scope="row">10</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo3"  readonly></td>
                                                                    <td><input name="time3" id="time3" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row">15</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo4"  readonly></td>
                                                                    <td><input name="time4" id="time4" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row">20</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo5"  readonly></td>
                                                                    <td><input name="time5" id="time5" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row">25</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo6"  readonly></td>
                                                                    <td><input name="time6" id="time6" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row" ><span id="value0">30</span</th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo7" readonly></td>
                                                                    <td><input name="time7" id="time7" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value1"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo8" readonly></td>
                                                                    <td><input name="time8" id="time8" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value2"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo9" readonly></td>
                                                                    <td><input name="time9" id="time9" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value3"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo10" readonly></td>
                                                                    <td><input name="time10" id="time10" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value4"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo11" readonly></td>
                                                                    <td><input name="time11" id="time11" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value5"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo12" readonly></td>
                                                                    <td><input name="time12" id="time12" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value6"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo13" readonly></td>
                                                                    <td><input name="time13" id="time13" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        </div>

                                                        <div class="form-group col-md-6 regis">
                                                        <table class="table table-striped table-bordered">
                                                        <div class="card-header ">Enfriamiento</div>
                                                            <thead>
                                                                <tr>
                                                                <th scope="col">Minuto</th>
                                                                <th scope="col">Hora</th>
                                                                <th scope="col">T (°C) Baño María</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                <th scope="row"><span id="value7"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo14" readonly></td>
                                                                    <td><input name="time14" id="time14" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                <th scope="row"><span id="value8"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo15" readonly></td>
                                                                    <td><input name="time15" id="time15" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                <th scope="row"><span id="value9"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo16" readonly></td>
                                                                    <td><input name="time16" id="time16" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value10"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo17" readonly></td>
                                                                    <td><input name="time17" id="time17" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value11"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo18" readonly></td>
                                                                    <td><input name="time18" id="time18" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value12"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo19" readonly></td>
                                                                    <td><input name="time19" id="time19" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <!--<th scope="row" ><span id="value13"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo20" readonly></td>
                                                                    <td><input name="time20" id="time20" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>
                                                                <th scope="row"><span id="value14"></span></th>
                                                                    <td><input class="form-control" type="time" value="" id="tiempo21" readonly></td>
                                                                    <td><input name="time21" id="time21" step=".01" placeholder="" type="number" class="form-control"></td>
                                                                </tr>-->
                                                            </tbody>
                                                        </table>
                                                        </div>

                                                        </div>

                                                        <div class=" form-group col-md-4 regis">
                                                            <button type="submit" class="mt-2 btn btn-primary">Registrar Pasteurizacion</button><br><br>
                                                        </div>
                                                    </form>
                                                    </div>

    <script>
        $(document).ready(function()
        {
            $('.mm-active').removeClass('mm-active');
            $("#menuMonitoreoPast").addClass("mm-active");
            $("#regCurva").addClass("mm-show");



            $(document).keypress(
            function(event){
                if (event.which == '13') {
                event.preventDefault();
                return false;
                }
            });

            $("#registro_pasteurizacionNew").submit(function(e){
                  var values = {};
                $.each($('#registro_pasteurizacionNew').serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
                values["frascos"] =$('#myMulti').val();
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'registro_pasteurizacionNew',
                        tabla:'core__pasteurizacion_blh',
                        campos: values
                    },
                    success: function(rta){
                        if(rta.type=='info'){
                            $('html, body').animate({scrollTop: '0px'}, 0);
                            $('#registro_pasteurizacionNew')[0].reset();
                            $(".saveSuccess").show();
                        }
                        else{
                            alert("Error enviando el formato. Consulte al administrador");
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
                e.preventDefault();
                return false;
            });

            $( "#curva").change(function()
            {
                clearInputs();
                clearTimes();
                $('#tPrecalentamiento').val('');
                $('#tEnfriamiento').val('');
                $('#tiempoTotalCurva').val('');
                $('#totalCiclo').val('');
                var idCurva = $(this).val();
                $("#municipio").html('<option value="">--</option>');
                    $.ajax({
                        url: '../php/services/Front.php',
                        type: 'POST',
                        async: true,
                        dataType: 'json',
                        data: {
                            command: 'listarCurvaUnica',
                            idCurva:idCurva
                        },
                        success: function(rta){
                            $('#tPrecalentamiento').val(rta.data[0].tPrecalentamiento);
                            $('#tEnfriamiento').val(rta.data[0].tEnfriamiento);
                            $('#tiempoTotalCurva').val(rta.data[0].tiempoTotalCurva);
                        },
                        error: function(objAjax, textStatus, strErrorThrown ){
                            if(typeof callbackError != 'undefined'){
                                callbackError(textStatus);
                            }else{
                                alert('Error en la conexion con el servidor: '+ textStatus);
                            }
                        }
                    });
            });


            function listarCurvas()
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarCurvas'
                    },
                    success: function(rta){
                        for(var i=0;i<rta.data.length;i++){
                            var id = rta.data[i].fecha_elaboracion+"/"+rta.data[i].tipoFrasco+"/"+rta.data[i].cantidadFrascos+"/"+rta.data[i].volumenFrasco;
                            $("#curva").append("<option value='"+rta.data[i].id_core__registro_curva+"'>"+id+"</option>");
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

            function listarFrascos()
            {
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarFrascosPasteurizadosBLH'
                    },
                    success: function(rta){
                        for(var i=0;i<rta.data.length;i++){
                            $("#myMulti").append("<option value='"+rta.data[i].id_core__pool_blh+"'>"+rta.data[i].frasco_pasteurizado+"</option>");
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


            $('#hora_inicio').on('input',function(e)
            {
                var hora_inicio = $(this).val();
                var pasteurizacion = parseInt($("#pasteurizacion").val());
                var tPrecalentamiento = parseInt($("#tPrecalentamiento").val());
                var tEnfriamiento = parseInt($("#tEnfriamiento").val());
                var lastMinute = parseInt($("#value30").text());
                var lastMinute = parseInt($("#value30").text());

                var j =7;

                var initialTime = $('#hora_inicio').val();
                $('#tiempo1').val(initialTime);

                addMinutesToDate("tiempo1","tiempo2");
                addMinutesToDate("tiempo2","tiempo3");
                addMinutesToDate("tiempo3","tiempo4");
                addMinutesToDate("tiempo4","tiempo5");
                addMinutesToDate("tiempo5","tiempo6");
                addMinutesToDate("tiempo6","tiempo7");
                var valueToAdd = 0;
                for (var i = 0; i <= 6; i++)
                {
                    if ((parseInt($("#value"+i).text())) >= tPrecalentamiento+30)
                    {
                        break;
                    }
                    else
                    {
                        var index = i+1;
                        if ((parseInt($("#value"+i).text())+5) <= tPrecalentamiento+30)
                        {
                            valueToAdd = parseInt($("#value"+i).text())+5;
                            $("#value"+index).text(parseInt($("#value"+i).text())+5);
                            var k = j+1;
                            var newTime = "tiempo"+k;
                            addMinutesToDateSpecific("hora_inicio",newTime,valueToAdd);
                        }
                        else
                        {
                            valueToAdd = tPrecalentamiento+30;
                            $("#value"+index).text(valueToAdd);
                            var k = j+1;
                            var newTime = "tiempo"+k;
                            addMinutesToDateSpecific("hora_inicio",newTime,valueToAdd);
                            break;
                        }
                        j++;
                    }
                }
                if (k<13)
                {
                    for (var i = k+1; i <= 13; i++)
                    {
                        $("#time"+i).attr('readonly', true);
                    }
                }
                var firstEnfriamiento = tPrecalentamiento+31;

                $("#value7").text(firstEnfriamiento);
                addMinutesToDateSpecific("hora_inicio","tiempo14",valueToAdd+1);

                if (k>=13)
                {
                    var currTime = k;
                }
                else
                {
                    var currTime = 13;
                }
                for (var i = 7; i <= 14; i++)
                {
                    if ((parseInt($("#value"+i).text())) >= tPrecalentamiento+30+tEnfriamiento)
                    {
                        break;
                    }
                    else
                    {
                        var index = i+1;
                        if ((parseInt($("#value"+i).text())+5) <= tPrecalentamiento+30+tEnfriamiento)
                        {
                            var valueToAdd = parseInt($("#value"+i).text())+5;
                            $("#value"+index).text(parseInt($("#value"+i).text())+5);
                            var l = currTime+1+1;
                            var newTime = "tiempo"+l;
                            addMinutesToDateSpecific("hora_inicio",newTime,valueToAdd);
                        }
                        else
                        {
                            var valueToAdd = tPrecalentamiento+30+tEnfriamiento;
                            $("#value"+index).text(valueToAdd);
                            var l = currTime+1+1;
                            var newTime = "tiempo"+l;
                            addMinutesToDateSpecific("hora_inicio",newTime,valueToAdd);
                            //return;
                        }
                        currTime++;
                    }
                }
                if (k<19)
                {
                    for (var i = l+1; i <= 19; i++)
                    {
                        $("#time"+i).attr('readonly', true);
                    }
                }

            });
            function clearInputs()
            {
                for (var i = 1; i <= 14; i++)
                {
                    $("#value"+i).text('');
                }

            }

            function clearTimes()
            {
                for (var i = 1; i <=19; i++)
                {
                    $("#tiempo"+i).val('');
                    $("#time"+i).val('');
                    $("#time"+i).attr('readonly', false);
                }

            }

            function addMinutesToDate(current,newtime)
            {
                var currentTime = $("#"+current).val();
                let hours = parseInt(currentTime.split(':')[0]);
                let minutes = parseInt(currentTime.split(':')[1]);

                minutes += 5;
                if (minutes >= 60) {
                    hours = (hours + 1) % 24;
                    minutes -= 60;
                }

                hours = (hours < 10 ? `0${hours}` : `${hours}`);
                minutes = (minutes < 10 ? `0${minutes}` : `${minutes}`);
                var finalTime = `${hours}:${minutes}`;
                $('#'+newtime).val(finalTime);
            }

            function addMinutesToDateSpecific(current,newtime,valueToAdd)
            {
                var currentTime = $("#"+current).val();
                let hours = parseInt(currentTime.split(':')[0]);
                let minutes = parseInt(currentTime.split(':')[1]);

                minutes += valueToAdd;

                if (minutes >= 60 && minutes < 120) {
                    hours = (hours + 1) % 24;
                    minutes -= 60;
                }

                if (minutes >= 120) {
                    hours = (hours + 1) % 24;
                    minutes -= 120;
                }

               /* if (minutes >=120) {
                    hours = (hours + 2) % 24;
                    minutes -= 120;
                }*/

                hours = (hours < 10 ? `0${hours}` : `${hours}`);
                minutes = (minutes < 10 ? `0${minutes}` : `${minutes}`);
                var finalTime = `${hours}:${minutes}`;
                $('#'+newtime).val(finalTime);
            }
            listarCurvas();
            listarFrascos();
    });

    </script>
     <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.d810cf0ae7f39f28f336.js"></script></body>

    </div>
    </div>
    </div>
    </div>

        </div>
        </div>
    <?php
        require '../php/footer.php';
    }else{
	header('Location: https://sami.cundinamarca.gov.co/');
    }
    ?>