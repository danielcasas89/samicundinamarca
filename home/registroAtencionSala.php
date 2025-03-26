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
                                    <div>Registro Atención Sala
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="alert alert-success fade show saveSuccess" style="padding: 23px;font-size: 15px;" role="alert">Número de frasco registrado: <b><span id="numFrasco"></span></b></div>
                                   <div class="main-card mb-3 card">
                                    <div class="card-header ">Registrar atención Sala
                                    </div>
                                    <div class="tab-content">

                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                    <div class="card-body">
                                                        <form id="registro_atencion_sala">
                                                        <div class="form-row">
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="usuaria" class="">Seleccione usuaria:</label>
                                                                <select id='usuaria' required name='usuaria' class='form-control' >
                                                                    <option value=''>--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            <hr/>
                                                        <div class="form-row">
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="nombre" class="">Nombre:</label>
                                                                <input name="nombre" id="nombre" placeholder="" type="text" readonly class="form-control">
                                                                <input name="id_core__registro_sala" id="id_core__registro_sala" placeholder="" type="hidden" readonly class="form-control">
                                                            </div>

                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="celular" class="">Celular:</label>
                                                                <input name="celular" id="celular" placeholder="" type="number" readonly class="form-control">
                                                            </div>
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="nombre_municipio" class="">Municipio:</label>
                                                                <input name="nombre_municipio" id="nombre_municipio" placeholder="" type="text" readonly class="form-control">
                                                            </div>
                                                            <div class=" form-group col-md-4 regis">
                                                                <label for="fecha_parto" class="">Fecha parto:</label>
                                                                <input name="fecha_parto" id="fecha_parto" placeholder="" type="text" readonly class="form-control">
                                                            </div>
                                                                    </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-header  ">REGISTRO ATENCIÓN</div><br>
                                                <div class="form-row">

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_atencion" class="">Fecha de Atención:</label>
                                                        <input class="form-control" type="date" value="" id="fecha_atencion" name='fecha_atencion' required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="hora_llegada" class="">Hora de Llegada:</label>
                                                        <input class="form-control" type="time" value="" id="hora_llegada" name='hora_llegada' required >
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="hora_salida" class="">Hora de Salida:</label>
                                                        <input class="form-control" type="time" value="" id="hora_salida" name='hora_salida' required>
                                                    </div>

                                                    <div class="form-group col-md-4 regis">
                                                        <label for="atencion_prestada" class="">Atención Prestada:</label>
                                                        <select name="atencion_prestada" id="atencion_prestada" class="form-control" required>
                                                        <option value=''>--</option>
                                                        <option value='Extracción'>Extracción</option>
                                                        <option value='Consejería en LM'>Consejería en LM</option>
                                                        <option value='Informativa'>Informativa</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4 regis">
                                                        <label for="tipo_extraccion" class="">Tipo de Extracción:</label>
                                                        <select name="tipo_extraccion" id="tipo_extraccion" class="form-control" required>
                                                            <option value='-'>--</option>
                                                            <option value='Manual'>Manual</option>
                                                            <option value='Mecánica-Manual'>Mecánica-Manual</option>
                                                            <option value='Mecánica-Electrica'>Mecánica-Electrica</option>
                                                            <option value='Succión Directa'>Succión Directa</option>
                                                    </select></div>

                                                    <div class="col-md-4">
                                                        <label for="tipoLeche" class="">Tipo de Leche:</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number" class="form-control" name="tipoLeche" id="tipoLeche" readonly placeholder=""><div class="input-group-prepend">
                                                        <div class="input-group-text">días</div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="cantidad" class="">Cantidad:</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="" value=0 required><div class="input-group-prepend">
                                                        <div class="input-group-text">mL</div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-4 regis">
                                                        <label for="destino_leche" class="">Destino de la leche:</label>
                                                        <select name="destino_leche" id="destino_leche" class="form-control">
                                                            <option value='-'>--</option>
                                                            <option value='Congelador sala de extracción'>Congelador sala de extracción</option>
                                                            <option value='Refrigerador sala de extracción'>Refrigerador sala de extracción</option>
                                                            <option value='Consumo inmediato'>Consumo inmediato</option>
                                                            <option value='Bebe en casa'>Bebe en casa</option>
                                                            <option value='Descarte'>Descarte</option>
                                                    </select></div>

                                                    <div class="col-md-4">
                                                        <label for="observaciones" class="">Observaciones:</label>
                                                        <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="observaciones" id="observaciones">
                                                        </div>
                                                    </div>

                                                    </div>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                    <button type="submit" class="mt-2 btn btn-primary">Registrar Atención</button><br><br>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
 <script>
     $(document).ready(function()
     {
        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroAtencion").addClass("mm-active");
        $("#regAtencSala").addClass("mm-show");

        $("#registro_atencion_sala").submit(function(e){

            var atencion_prestada = $("#atencion_prestada").val();
            var tipo_extraccion = $("#tipo_extraccion").val();
            var cantidad = $("#cantidad").val();
            var destino_leche = $("#destino_leche").val();



            if (atencion_prestada == 'Extracción')
            {
                if (tipo_extraccion == '-')
                {
                    alert("Debe diligenciar tipo de extracción");
                    return false;
                }
                if (cantidad == '0')
                {
                    alert("Debe diligenciar la cantidad de leche");
                    return false;
                }
                if (destino_leche == '-')
                {
                    alert("Debe diligenciar destino de leche");
                    return false;
                }
            }

            var values = {};
            $.each($('#registro_atencion_sala').serializeArray(), function(i, field) {

                values[field.name] = field.value;

            });
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'registrarAtencionSala',
                    tabla:'core__atencion_sala',
                    campos: values
                },
                success: function(rta){
                    if(rta.type=='info'){
                        $('html, body').animate({scrollTop: '0px'}, 0);
                        $('#registro_atencion_sala')[0].reset();
                        $("#numFrasco").html(rta.id);
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


        function listarUsuariasSala()
        {
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarUsuariasSala'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#usuaria").append("<option value='"+rta.data[i].id_core__registro_sala+"'>"+rta.data[i].nombre+"</option>");
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

        $( "#atencion_prestada").change(function()
        {
            var tipoAtencion = $(this).val();
            console.warn(tipoAtencion);
            if (tipoAtencion == "Consejería en LM" || tipoAtencion == "Informativa")
            {
                $("#tipo_extraccion").prop( "disabled", true );
                $("#tipoLeche").prop( "disabled", true );
                $("#cantidad").prop( "disabled", true );
                $("#destino_leche").prop( "disabled", true );
                $("#tipoLeche").val(0);
            }
            else
            {
                $("#tipo_extraccion").prop( "disabled", false );
                $("#tipoLeche").prop( "disabled", false );
                $("#cantidad").prop( "disabled", false );
                $("#destino_leche").prop( "disabled", false );
            }

        });


        $( "#usuaria").change(function()
        {
            $('#nombre').val('');
            $('#celular').val('');
            $('#nombre_municipio').val('');
            $('#id_core__registro_sala').val('');
            $('#fecha_parto').val('');
            var idUsuaria = $(this).val();
            $("#municipio").html('<option value="">--</option>');
                $.ajax({
                    url: '../php/services/Front.php',
                    type: 'POST',
                    async: true,
                    dataType: 'json',
                    data: {
                        command: 'listarUsuariaSalaUnica',
                        idUsuaria:idUsuaria
                    },
                    success: function(rta){
                        $('#nombre').val(rta.data[0].nombre);
                        $('#celular').val(rta.data[0].celular);
                        $('#nombre_municipio').val(rta.data[0].nombre_municipio);
                        $('#id_core__registro_sala').val(rta.data[0].id_core__registro_sala);
                        $('#fecha_parto').val(rta.data[0].fecha_parto);
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

            $('#fecha_atencion').on('input',function(e)
            {
                const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
                const firstDate = new Date($(this).val());
                const currentDate = new Date();
                const secondDate = new Date($('#fecha_parto').val());
                const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
                const diasExtraccion = Math.round(Math.abs((currentDate - firstDate) / oneDay));
                $("#tipoLeche").val(diffDays);
               // $("#dias").val(diasExtraccion);
            });

            $('#num_frascos, #cantidad').on('input',function(e)
            {
                var num_frascos = $('#num_frascos').val();
                var cantidad = $('#cantidad').val();
                if (num_frascos!='' && cantidad!='')
                {
                    $('#total').val(num_frascos*cantidad);
                }
            });

        listarUsuariasSala();
});

 </script>
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