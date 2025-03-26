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
                                    <div>Registro Equipos Sala de Extracción
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registro de Equipos
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="card-body">
                                                <form id="registro_equipos">
                                                <div class="form-row">

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="equipo" class="">Equipo: </label>
                                                        <select name="equipo" id="equipo" class="form-control" required>
                                                            <option value=''>--</option>
                                                            <option value='Refrigerador'>Refrigerador</option>
                                                            <option value='Congelador'>Congelador</option>
                                                        </select>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="marca" class="">Marca:</label>
                                                        <input name="marca" id="marca" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="modelo" class="">Modelo:</label>
                                                        <input name="modelo" id="modelo" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="serial" class="">Serial:</label>
                                                        <input name="serial" id="serial" placeholder="" type="text" class="form-control" required>
                                                    </div>
                                                    <div class=" form-group col-md-4 regis">
                                                        <label for="identificacion" class="">Identificacion interna:</label>
                                                        <input name="identificacion" id="identificacion" placeholder="" type="text" class="form-control" required>
                                                    </div>

                                                    <div class=" form-group col-md-4 regis"><br>
                                                        <button type="submit" class="mt-3 btn btn-primary">Registrar Equipo</button>
                                                    </div>
                                            </div>


                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


            </div>
 <script>
     $(document).ready(function(){

        $("#regEquip").addClass("mm-show");
        $('.mm-active').removeClass('mm-active');
        $("#menuRegistroEquipos").addClass("mm-active");


});

 </script>
<?php
	require '../php/footer.php';
}else{
	header('Location: https://sami.cundinamarca.gov.co/');
}
?>