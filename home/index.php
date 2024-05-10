<?php 
session_start();
if(isset($_SESSION['usuario_sesion'])){
    @require '../php/cabecera.php';
    include_once('../php/classes/Database.php');
    include_once('../php/classes/Encuesta.php');

    $estadistica = new Encuesta();
    $resultado = $estadistica->estadisticaDonacionesMesBLH();

    $serie = "";

    for ($i=0;$i<count($resultado->data);$i++) { 
        $serie .= "{name:'".$resultado->data[$i]->mes."',data: [";
        $cantidad = $resultado->data[$i]->totalDonaciones;
        $serie .= "$cantidad]},";
    }
    $serie = rtrim($serie, ",");

    $estadisticaVolumen = new Encuesta();
    $resultadoVolumen = $estadisticaVolumen->estadisticaVolumenMesBLH();

    $serieVolumen = "";

    for ($i=0;$i<count($resultadoVolumen->data);$i++) { 
        $serieVolumen .= "{name:'".$resultadoVolumen->data[$i]->mes."',data: [";
        $cantidadVolumen = $resultadoVolumen->data[$i]->cantidad;
        $serieVolumen .= "$cantidadVolumen]},";
    }
    $serieVolumen = rtrim($serieVolumen, ",");


    $estadisticaPasteurizadaAdmin = new Encuesta();
    $resultadoPasteAdmin = $estadisticaPasteurizadaAdmin->volumentLechePasteurizadaAdministradaBLH();
    $serieVolumenPasteAdmin = "";

    for ($i=0;$i<count($resultadoPasteAdmin->data);$i++) { 
        $serieVolumenPasteAdmin .= "{name:'".$resultadoPasteAdmin->data[$i]->mes."',data: [";
        $cantidadPasteAdmin = $resultadoPasteAdmin->data[$i]->cantidad;
        $serieVolumenPasteAdmin .= "$cantidadPasteAdmin]},";
    }
    $serierPasteAdmin = rtrim($serieVolumenPasteAdmin, ",");
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
                                    <div>SAMI
                                        <div class="page-title-subheading">Sistema de Acompañamiento Materno Infantíl
                                        </div>
                                    </div>
                                </div>
                                <div class="page-title-actions">
                                    <button type="button" data-toggle="tooltip" title="Secretaría de Salud Cundinamarca" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                        <i class="fa fa-star"></i>
                                    </button>
                                    <div class="d-inline-block dropdown">
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-inbox"></i>
                                                        <span>
                                                            Inbox
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-book"></i>
                                                        <span>
                                                            Book
                                                        </span>
                                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">
                                                        <i class="nav-link-icon lnr-picture"></i>
                                                        <span>
                                                            Picture
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                                        <i class="nav-link-icon lnr-file-empty"></i>
                                                        <span>
                                                            File Disabled
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>    </div>


                        </div>      
                        <?php                            
                                    if($_SESSION['perfil'] == 'Administrador Sistema' || $_SESSION['perfil'] == 'Administrador IAMII'){
                                ?>      
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">BLH</div>
                                            <div class="widget-subheading">Total donantes</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                            <?php
                                            $consulta="SELECT COUNT(*) as total FROM `core__registro_blh`";
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<span>$usuario[total]</span>";  
                                                    }
                                                }
                                                mysqli_free_result($resultado);         
                                            ?>                                        
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Usuarios</div>
                                            <div class="widget-subheading">Total Usuarios</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">
                                            <?php
                                            $consulta="SELECT count(*) as total FROM `gestion__usuarios`";
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<span>$usuario[total]</span>";  
                                                    }
                                                }
                                                mysqli_free_result($resultado);         
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Hospitales</div>
                                            <div class="widget-subheading">Total Hospitales inscritos</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white">                                            
                                            <?php
                                            $consulta="SELECT count(*) as total FROM `aux__hospitales`";
                                            $resultado=mysqli_query($conexion,$consulta);
                                                if(mysqli_num_rows($resultado)){
                                                    while($usuario=mysqli_fetch_assoc($resultado)){ 
                                                        echo "<span>$usuario[total]</span>";  
                                                    }
                                                }
                                                mysqli_free_result($resultado);         
                                            ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            SISTEMA BÁSICO DE RECOLECCIÓN DE INDICADORES
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="">
                                                Bienvenido al aplicativo SAMI, Sistema de Acompañamiento a las estrategias Materno Infantiles de Cundinamarca, lideradas desde la Dirección de Salud Pública por la Dimensión de Seguridad Alimentaria.<br>Esta es una herramienta diseñada para el fortalecimiento de las estrategias Instituciones Amigas de la Mujer y de la Infancia con enfoque Integral IAMII, Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun, Programa Madre Canguro PMC y Salas Amigas de la Familia Lactante SAFL, por medio de la gestión efectiva de la información.<br>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12 col-lg-6">
                            <iframe title="SAMI - IAMII_Dil" width="1100" height="500" src="https://app.powerbi.com/view?r=eyJrIjoiOGU4NzQ0ZDItM2EzNC00OTFlLWJlMzgtMjg1OWY3ZWMxODY0IiwidCI6IjkwMjliMTUwLTg4NjQtNDBiNS1iYTM1LTQ1MGFmYTE5ZWJkZCJ9" frameborder="0" allowFullScreen="true"></iframe>
                            </div>
                            
                            <?php
                                }
                                if($_SESSION['perfil'] == 'IAMII'){
                            ?>
                            
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            SISTEMA DE INFORMACIÓN SAMI
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="">
                                                Bienvenido al aplicativo SAMI, Sistema de Acompañamiento a las estrategias Materno Infantiles de Cundinamarca, lideradas desde la Dirección de Salud Pública por la Dimensión de Seguridad Alimentaria.
Esta es una herramienta diseñada para el fortalecimiento de las estrategias IAMII Instituciones Amigas de la Mujer y de la Infancia con enfoque Integral, BLH Bancos de Leche Humana, PMC Programa Madre Canguro y SAFL Salas Amigas de la Familia Lactante, por medio de la gestión efectiva de la información. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main-card mb-3 card">
                                    <div class="card-header">Indicador IAMII:  <?php echo ucwords(str_replace("_"," ",$_SESSION['nombre']));?>
                                    </div>
                                    <div class="tab-content">
                                    <div class="alert alert-success fade show saveSuccess" role="alert">Registro creado exitosamente.</div>
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                
                                    <div class="col-md-12">         
                                                <form id="registro_paso">
                                                <div class="form-row">
                                                    <div class=" form-group col-md-6 regis">                                              
                                                            <select id='hospital' required name='hospital' class='form-control' style="display:none;">
                                                        </select>
                                                    </div>
                                                </div>
                                    
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">                      
                                            <div class="card-body">                   
                                        <h5 class="card-title">TRAZABILIDAD POR PASOS</h5>
                                                <div class="form-row">                                                                                     
                                                    <div class="form-group col-md-12">
                                                    <table class="mb-0 table table-bordered table-hover" id="tableIndicadores">
                                                <thead>
                                                <tr>
                                                    <th>PERIODO</th>
                                                    <th>Paso 1</th>
                                                    <th>Paso 2</th>
                                                    <th>Paso 3</th>
                                                    <th>Paso 4</th>
                                                    <th>Paso 5</th>
                                                    <th>Paso 6</th>
                                                    <th>Paso 7</th>
                                                    <th>Paso 8</th>
                                                    <th>Paso 9</th>
                                                    <th>Paso 10</th>
                                                    <th>% Diligenciado</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">I TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr1"></td>
                                                    <td class="tableiami" id="paso2tr1"></td>
                                                    <td class="tableiami" id="paso3tr1"></td>
                                                    <td class="tableiami" id="paso4tr1"></td>
                                                    <td class="tableiami" id="paso5tr1"></td>
                                                    <td class="tableiami" id="paso6tr1"></td>
                                                    <td class="tableiami" id="paso7tr1"></td>
                                                    <td class="tableiami" id="paso8tr1"></td>
                                                    <td class="tableiami" id="paso9tr1"></td>
                                                    <td class="tableiami" id="paso10tr1"></td>
                                                    <td class="tableiami" id="dilig1"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">II TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr2"></td>
                                                    <td class="tableiami" id="paso2tr2"></td>
                                                    <td class="tableiami" id="paso3tr2"></td>
                                                    <td class="tableiami" id="paso4tr2"></td>
                                                    <td class="tableiami" id="paso5tr2"></td>
                                                    <td class="tableiami" id="paso6tr2"></td>
                                                    <td class="tableiami" id="paso7tr2"></td>
                                                    <td class="tableiami" id="paso8tr2"></td>
                                                    <td class="tableiami" id="paso9tr2"></td>
                                                    <td class="tableiami" id="paso10tr2"></td>
                                                    <td class="tableiami" id="dilig2"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">III TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr3"></td>
                                                    <td class="tableiami" id="paso2tr3"></td>
                                                    <td class="tableiami" id="paso3tr3"></td>
                                                    <td class="tableiami" id="paso4tr3"></td>
                                                    <td class="tableiami" id="paso5tr3"></td>
                                                    <td class="tableiami" id="paso6tr3"></td>
                                                    <td class="tableiami" id="paso7tr3"></td>
                                                    <td class="tableiami" id="paso8tr3"></td>
                                                    <td class="tableiami" id="paso9tr3"></td>
                                                    <td class="tableiami" id="paso10tr3"></td>
                                                    <td class="tableiami" id="dilig3"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">IV TRIMESTRE</th>
                                                    <td class="tableiami" id="paso1tr4"></td>
                                                    <td class="tableiami" id="paso2tr4"></td>
                                                    <td class="tableiami" id="paso3tr4"></td>
                                                    <td class="tableiami" id="paso4tr4"></td>
                                                    <td class="tableiami" id="paso5tr4"></td>
                                                    <td class="tableiami" id="paso6tr4"></td>
                                                    <td class="tableiami" id="paso7tr4"></td>
                                                    <td class="tableiami" id="paso8tr4"></td>
                                                    <td class="tableiami" id="paso9tr4"></td>
                                                    <td class="tableiami" id="paso10tr4"></td>
                                                    <td class="tableiami" id="dilig4"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                                    
                                                
                                                </div>


                                                    </div>
                                                </div>
                                            </div>                                                                                         
                                            </div>
                                        </form>                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            if($_SESSION['perfil'] == 'Sala de Extraccion' ){
                            ?> 
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Sala de Extracción
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="text-​justify">
                                                Bienvenido al aplicativo SAMI, Sistema de Acompañamiento a las estrategias Materno Infantiles de Cundinamarca, lideradas desde la Dirección de Salud Pública por la Dimensión de Seguridad Alimentaria.<br>Esta es una herramienta diseñada para el fortalecimiento de las estrategias Instituciones Amigas de la Mujer y de la Infancia con enfoque Integral IAMII, Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun, Programa Madre Canguro PMC y Salas Amigas de la Familia Lactante SAFL, por medio de la gestión efectiva de la información.<br>
Usted se encuentra en el módulo para la gestión de la información de las salas de extracción, por medio del cual se articula y consolidad la Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun.<br>
En el componente “Registros y atenciones” están las herramientas para la gestión y seguimiento de las usuarias de la sala de extracción y las atenciones que a ellas se les brindan.<br>
En el componente “Donación de leche” están las herramientas para la gestión y seguimiento de las donantes de leche humana identificadas por su institución, desde este componente la Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun realiza el seguimiento y trazabilidad de las donantes y sus donaciones.<br> 
En el componente “Equipos y temperaturas” están las herramientas para realizar el seguimiento y monitoreo de las condiciones en las que se almacena la leche humana de las usuarias de la sala y la leche humana donada, garantizando la cadena de frio requerida para conservar las características físicas, químicas, organolépticas e inmunológicas de la leche humana.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            if($_SESSION['perfil'] == 'Banco de leche' ){
                            ?> 
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                                            Banco de Leche Humana
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <div class="text-​justify">
                                                Bienvenido al aplicativo SAMI, Sistema de Acompañamiento a las estrategias Materno Infantiles de Cundinamarca, lideradas desde la Dirección de Salud Pública por la Dimensión de Seguridad Alimentaria.<br>Esta es una herramienta diseñada para el fortalecimiento de las estrategias Instituciones Amigas de la Mujer y de la Infancia con enfoque Integral IAMII, Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun, Programa Madre Canguro PMC y Salas Amigas de la Familia Lactante SAFL, por medio de la gestión efectiva de la información.<br>
Usted se encuentra en el módulo para la gestión de la información de las salas de extracción, por medio del cual se articula y consolidad la Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun.<br>
En el componente “Registros y atenciones” están las herramientas para la gestión y seguimiento de las usuarias de la sala de extracción y las atenciones que a ellas se les brindan.<br>
En el componente “Donación de leche” están las herramientas para la gestión y seguimiento de las donantes de leche humana identificadas por su institución, desde este componente la Red Departamental de Bancos de Leche Humana de Cundinamarca rBLHCun realiza el seguimiento y trazabilidad de las donantes y sus donaciones.<br> 
En el componente “Equipos y temperaturas” están las herramientas para realizar el seguimiento y monitoreo de las condiciones en las que se almacena la leche humana de las usuarias de la sala y la leche humana donada, garantizando la cadena de frio requerida para conservar las características físicas, químicas, organolépticas e inmunológicas de la leche humana.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?> 


                        </div>
                    </div>

                    <script>
                             $(document).ready(function(){
        $('.mm-active').removeClass('mm-active');
        $("#menuHome").addClass("mm-active");


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
                    $('#hospital').trigger("change");
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

        $('#hospital').change(function()
        {
            var hospital = $('#hospital').val();
            var values = {};
            if (hospital=='')
            {
                return;
            }

            $('table > tbody > tr').each(function() {
                $(this).children('td').each(function(){
                    $(this).html('');
                    $(this).css("background-color", "white");
                    
                })

                });
            $.ajax({
                url: '../php/services/Front.php',
                type: 'POST',
                async: true,
                dataType: 'json',
                data: {
                    command: 'cumplimientoIami',
                    hospital:hospital
                },
                success: function(rta)
                {
                    console.warn("cumplimientoIami");
                    console.warn(rta);
                    $("#dilig1").html((rta.dataDiligTrimestre1.diligenciamiento).toFixed(1)+"%");
                    $("#dilig2").html((rta.dataDiligTrimestre2.diligenciamiento).toFixed(1)+"%");
                    $("#dilig3").html((rta.dataDiligTrimestre3.diligenciamiento).toFixed(1)+"%");
                    $("#dilig4").html((rta.dataDiligTrimestre4.diligenciamiento).toFixed(1)+"%");
                    $("#paso1tr1").html((rta.dataPaso1Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso1tr2").html((rta.dataPaso1Trimestre2.cumplimiento).toFixed(1)+"%");                    
                    $("#paso1tr3").html((rta.dataPaso1Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso1tr4").html((rta.dataPaso1Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr1").html((rta.dataPaso2Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr2").html((rta.dataPaso2Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr3").html((rta.dataPaso2Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso2tr4").html((rta.dataPaso2Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr1").html((rta.dataPaso3Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr2").html((rta.dataPaso3Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr3").html((rta.dataPaso3Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso3tr4").html((rta.dataPaso3Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr1").html((rta.dataPaso4Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr2").html((rta.dataPaso4Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr3").html((rta.dataPaso4Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso4tr4").html((rta.dataPaso4Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr1").html((rta.dataPaso5Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr2").html((rta.dataPaso5Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr3").html((rta.dataPaso5Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso5tr4").html((rta.dataPaso5Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr1").html((rta.dataPaso6Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr2").html((rta.dataPaso6Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr3").html((rta.dataPaso6Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso6tr4").html((rta.dataPaso6Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr1").html((rta.dataPaso7Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr2").html((rta.dataPaso7Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr3").html((rta.dataPaso7Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso7tr4").html((rta.dataPaso7Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr1").html((rta.dataPaso8Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr2").html((rta.dataPaso8Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr3").html((rta.dataPaso8Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso8tr4").html((rta.dataPaso8Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso9tr1").html((rta.dataPaso9Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso9tr2").html((rta.dataPaso9Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso9tr3").html((rta.dataPaso9Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso9tr4").html((rta.dataPaso9Trimestre4.cumplimiento).toFixed(1)+"%");
                    $("#paso10tr1").html((rta.dataPaso10Trimestre1.cumplimiento).toFixed(1)+"%");
                    $("#paso10tr2").html((rta.dataPaso10Trimestre2.cumplimiento).toFixed(1)+"%");
                    $("#paso10tr3").html((rta.dataPaso10Trimestre3.cumplimiento).toFixed(1)+"%");
                    $("#paso10tr4").html((rta.dataPaso10Trimestre4.cumplimiento).toFixed(1)+"%");


                    $('table > tbody > tr').each(function() {
                        $(this).children('td').each(function(){
                            var data = $(this).html();
                            var res = data.replace("%","");
                            if (res == 0.00)
                            {
                                $(this).css("background-color", "white");
                                $(this).css("color", "black");
                            }                          
                            else if (res > 0 && res <= 59)
                            {
                                $(this).css("background-color", "rgb(241 87 87)");
                                $(this).css("color", "white");
                            }
                            else if (res >= 60 && res <= 79)
                            {
                                $(this).css("background-color", "yellow");
                                $(this).css("color", "black");

                            }
                            else if (res >= 80)
                            {
                                $(this).css("background-color", "rgb(74 171 74)");
                                $(this).css("color", "white");
                            }
                        })

                        });

                },
                error: function(objAjax, textStatus, strErrorThrown ){
                    if(typeof callbackError != 'undefined'){
                        callbackError(textStatus);
                    }else{
                        alert('Error en la conexion con el servidor: '+ textStatus);
                    }
                }
            });
           
            return false;

        }); 

        listarHospitales();



                             });
        Highcharts.chart('container', {
	        chart: {
	            type: 'column'
	        },
	        colors: ['#FC2B36','#10CA2F', '#ADB1AF','#2BB0FC','#f0ad4e','#337ab7'],
	        title: {
	            text: 'Total Usuarias del BLH por mes'
	        },
	        xAxis: {
	            categories: ['Mes']
	        },
	        yAxis: {
	            title: {
	                text: 'Numero Donaciones'
	            }
	        },
	        plotOptions: {
            	series: {
                	dataLabels: {
                    	align: 'center',
                    	enabled: true
                	}
            	}
        	}, 
	        series: [<?=$serie?>]
        });	  
        Highcharts.chart('estadisticaVolumen', {
	        chart: {
	            type: 'column'
	        },
	        colors: ['#ADB1AF','#2BB0FC','#f0ad4e','#337ab7'],
	        title: {
	            text: 'Volumen recolectado BLH'
	        },
	        xAxis: {
	            categories: ['Mes']
	        },
	        yAxis: {
	            title: {
	                text: 'Cantidad (mL)'
	            }
	        },
	        plotOptions: {
            	series: {
                	dataLabels: {
                    	align: 'center',
                    	enabled: true
                	}
            	}
        	}, 
	        series: [<?=$serieVolumen?>]
        });	
       Highcharts.chart('estadisticaAdminPaste', {
	        chart: {
	            type: 'column'
	        },
	        colors: ['#2BB0FC','#f0ad4e','#337ab7'],
	        title: {
	            text: 'Volumen LH pasteurizada administrada'
	        },
	        xAxis: {
	            categories: ['Mes']
	        },
	        yAxis: {
	            title: {
	                text: 'Cantidad (mL)'
	            }
	        },
	        plotOptions: {
            	series: {
                	dataLabels: {
                    	align: 'center',
                    	enabled: true
                	}
            	}
        	}, 
	        series: [<?=$serierPasteAdmin?>]
        }); 
        Highcharts.chart('estadisticaVolumenHijoPropio', {
	        chart: {
	            type: 'column'
	        },
	        colors: ['#FC2B36','#337ab7','#2BB0FC'],
	        title: {
	            text: 'Volumen recolectado hijo propio'
	        },
	        xAxis: {
	            categories: ['Mes']
	        },
	        yAxis: {
	            title: {
	                text: 'Cantidad (mL)'
	            }
	        },
	        plotOptions: {
            	series: {
                	dataLabels: {
                    	align: 'center',
                    	enabled: true
                	}
            	}
        	}, 
	        series: [<?=$serieVolumen?>]
        });	
</script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>