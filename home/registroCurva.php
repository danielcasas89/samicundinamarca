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
                                    <div>Registro Curva
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Datos de Registro Curva
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="card-title"></h5>
                                            <div class="card-body">
                                                <form id="registro_curva">
                                                <div class="form-row">

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="fecha_elaboracion" class="">Fecha de Elaboración:</label>
                                                        <input class="form-control" type="date" id="fecha_elaboracion" name="fecha_elaboracion" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="tipoFrasco" class="">Tipo Frasco:</label>
                                                        <input name="tipoFrasco" id="tipoFrasco"  type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="cantidadFrascos" class="">Cantidad de Frascos:</label>
                                                        <input name="cantidadFrascos" id="cantidadFrascos" type="number" min="0" max="40" class="form-control" required>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="volumenFrasco" class="">Volumen por frasco (mL)</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="volumenFrasco" name="volumenFrasco" min="0" max="900" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">mL</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="termometro" class="">Marca de termometro:</label>
                                                        <input name="termometro" id="termometro"  type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="certificadoTermometro" class="">Certificado de calibración del termometro:</label>
                                                        <input name="certificadoTermometro" id="certificadoTermometro"  type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="vencimientoCalibrador" class="">Fecha vencimiento certificado de calibración:</label>
                                                        <input class="form-control" type="date" id="vencimientoCalibrador" name="vencimientoCalibrador" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="temperaturaPasteurizador" class="">T° Pasteurizador</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="temperaturaPasteurizador" name="temperaturaPasteurizador" min="40" step=".1" max="80" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tInicialFrasco" class="">T° Inicial frasco testigo</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tInicialFrasco" name="tInicialFrasco" min="0" step=".01"  max="10" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tFinalFrascoPre" class="">T° final frasco testigo precalentamiento</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tFinalFrascoPre" name="tFinalFrascoPre" min="50" step=".01" max="80" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tEnfriadorInicial" class="">T° Enfriador Inicial</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tEnfriadorInicial" name="tEnfriadorInicial" step=".01" min="-20" max="5" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tEnfriadorFinal" class="">T° Enfriador Final</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tEnfriadorFinal" name="tEnfriadorFinal" step=".01" min="-20" max="20" max="5000" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tFinalFrascoEnf" class="">T° final frasco testigo enfriamiento</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tFinalFrascoEnf" name="tFinalFrascoEnf" step=".01" min="-5"  max="15" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">°C</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tPrecalentamiento" class="">Tiempo precalentamiento (minutos)</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tPrecalentamiento" name="tPrecalentamiento" min="2" max="30" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">Min</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tEnfriamiento" class="">Tiempo enfriamiento (minutos)</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tEnfriamiento" name="tEnfriamiento" min="2" max="30" required>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">Min</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tiempoTotalCurva" class="">Tiempo total curva (minutos)</label>
                                                        <div class="input-group mb-2">
                                                        <input type="number"  class="form-control" id="tiempoTotalCurva" name="tiempoTotalCurva" min="0" max="5000" readonly>
                                                        <div class="input-group-prepend">
                                                        <div class="input-group-text">Min</div>
                                                        </div>
                                                        </div>
                                                    </div>
                                            <div class=" form-group col-md-4 regis">
                                                <br>
                                            <button type="submit" class="mt-2 btn btn-primary">Registrar Curva</button>
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
     $(document).ready(function()
     {
        $('.mm-active').removeClass('mm-active');
        $("#menuCurva").addClass("mm-active");
        $("#regCurva").addClass("mm-show");

        function listarDepartamentos(){
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'listarDepartamentos'
                },
                success: function(rta){
                    for(var i=0;i<rta.data.length;i++){
                        $("#departamento").append("<option value='"+rta.data[i].nombre_departamento+"'>"+rta.data[i].nombre_departamento+"</option>");
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

        $('#tPrecalentamiento').on('input',function(e)
        {
            var tPrecalentamiento = $(this).val();
            var tEnfriamiento = $('#tEnfriamiento').val();
            if (tEnfriamiento !=""){
                var tiempoTotalCurva = parseInt(tPrecalentamiento)+parseInt(tEnfriamiento)+30;
                $('#tiempoTotalCurva').val(tiempoTotalCurva);
            }

        });

        $('#tEnfriamiento').on('input',function(e)
        {
            var tEnfriamiento = $(this).val();
            var tPrecalentamiento = $('#tPrecalentamiento').val();
            if (tPrecalentamiento !=""){
                var tiempoTotalCurva = parseInt(tEnfriamiento)+parseInt(tPrecalentamiento)+30;
                $('#tiempoTotalCurva').val(tiempoTotalCurva);
            }

        });



    listarDepartamentos();
});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>