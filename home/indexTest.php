<?php 

session_start();
if(isset($_SESSION['usuario_sesion'])){
    @require '../php/header.php';
    include_once('../php/classes/Encuesta.php');

$estadistica = new Encuesta();
$estadisticaIami = new Encuesta();

$resultado = $estadistica->listarTotalDonacionesBLHHospital();
$resultadoDonantes = $estadistica->listarTotalDonantesBLHHospital();

$estadisticaIami = new Encuesta();

$resultadoIami = $estadisticaIami->calcularDiligenciamientoAll();

$serie = "";

$totalAplicado =0;
for ($i=0;$i<count($resultado->data);$i++) {  
	$totalAplicado += $resultado->data[$i]->total;
	$serie .= "{name:'".$resultado->data[$i]->nombre."',data: [";

	$cantidad = $resultado->data[$i]->total;
	$serie .= "$cantidad]},";

}

$serie = rtrim($serie, ",");

$serieDonantes = "{ data: [";
$totalAplicado =0;
for ($i=0;$i<count($resultadoDonantes->data);$i++) {   

	$totalAplicado += $resultadoDonantes->data[$i]->total;    
	$serieDonantes .= "{name:'".$resultadoDonantes->data[$i]->nombre."',y: ";
	$cantidad = $resultadoDonantes->data[$i]->total;
	$serieDonantes .= "$cantidad},";

}

$serieDonantes = rtrim($serieDonantes, ",");
$serieDonantes .= "]}";

 
// Cumplimieneto IAMII
$serieIami = "[{";
$totalAplicado =0;
for ($i=0;$i<count($resultadoIami);$i++) {    
   
    $serieIami .= "name:'".$resultadoIami[$i]->hospital."',data: [";
    $cumIami = round($resultadoIami[$i]->cumplimiento,2);
    $serieIami .= "$cumIami]},{";

}
$serieIami = rtrim($serieIami, ",{}");
$serieIami .= "}]";
//echo $serieIami;exit();
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
                            </ul>
                        </div>
                    </div>
                </div>    
            </div>
        </div>      
        <?php                            
            if($_SESSION['perfil'] == 'Administrador Sistema' || $_SESSION['perfil'] == 'Banco de leche' || $_SESSION['perfil'] == 'Sala de Extraccion'){
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
                            if ($_SESSION['perfil'] == 'Banco de leche'){
                                
                                $hospital = $_SESSION['fk_aux__hospitales'];
                                $consulta = "SELECT COUNT(*)  as total
                                FROM core__registro_donantes r 
                                INNER JOIN gestion__usuarios ge ON r.creado_por = ge.id__usuarios
                                WHERE ge.fk_aux__hospitales =".$hospital;
                            }else{
                                $consulta="SELECT COUNT(*) as total FROM `core__registro_donantes`;";
                            }

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
                            <div class="widget-heading">BLH</div>
                            <div class="widget-subheading">Total donaciones BLH</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                            <?php
                            
                            if ($_SESSION['perfil'] == 'Banco de leche'){
                                
                                $hospital = $_SESSION['fk_aux__hospitales'];
                                $consulta = "SELECT COUNT(*) as total
                                FROM `core__donacion_blh_sala` cd 
                                LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
                                INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios
                                WHERE gu.fk_aux__hospitales = ".$hospital;
                            }else{
                                $consulta="SELECT COUNT(*) as total
                                FROM `core__donacion_blh_sala` cd 
                                LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
                                INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios";
                            }
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
                            <div class="widget-heading">BLH</div>
                            <div class="widget-subheading">Total usuarias sala de extracción</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">                                            
                            <?php 
                            if ($_SESSION['perfil'] == 'Banco de leche' || $_SESSION['perfil'] == 'Sala de Extraccion' ){
                                
                                $hospital = $_SESSION['fk_aux__hospitales'];
                                $consultaUsuarias = "SELECT COUNT(*) as total
                                FROM core__registro_sala r
                                INNER JOIN gestion__usuarios gu ON r.creado_por = gu.id__usuarios
                                 WHERE gu.fk_aux__hospitales = ".$hospital;
                                 
                                
                            }else{
                                $consultaUsuarias="SELECT COUNT(DISTINCT(documento)) as total FROM `core__registro_sala`;";
                            }                          
                            $resultado=mysqli_query($conexion,$consultaUsuarias);
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
            
            <!--<div class="col-md-12 col-lg-6">
            <iframe title="SAMI - IAMII_Dil" width="1100" height="500" src="https://app.powerbi.com/view?r=eyJrIjoiOGU4NzQ0ZDItM2EzNC00OTFlLWJlMzgtMjg1OWY3ZWMxODY0IiwidCI6IjkwMjliMTUwLTg4NjQtNDBiNS1iYTM1LTQ1MGFmYTE5ZWJkZCJ9" frameborder="0" allowFullScreen="true"></iframe>
            </div>-->
            
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
                    <div class="card-header">CUMPLIMIENTO INDICADORES IAMII -  <span id="mostrarHospital"></span></span> - <script>document.write(new Date().getFullYear())</script>
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
            if($_SESSION['perfil'] == 'Sala de Extraccion'  || $_SESSION['perfil'] == 'Canguro' ){
            ?> 
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Sistema de Acompañamiento Materno Infantíl
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
En el componente “Equipos y temperaturas” están las herramientas para realizar el seguimiento y monitoreo de las condiciones en las que se almacena la leche humana de las usuarias de la sala y la leche humana donada, garantizando la cadena de frio requerida para conservar las características físicas, químicas, organolépticas e inmunológicas de la leche humana.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            if($_SESSION['perfil'] == 'Administrador Sistema'){
            ?> 
            <div class="container">
                <div class="row">
                    <div id="graphDonantesByHosp"  class="col-md-6 col-lg-6"></div>
                    <div id="graphDonationsByHosp"  class="col-md-6 col-lg-6"></div>
                </div>
                <div class="row iamiGraph"> 
                   <div id="graphCumplIami"  class="col-md-12 col-lg-12"></div>
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
    //    listarHospitales();
        Highcharts.chart('graphDonationsByHosp', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Donaciones BLH por Hospital',
                align: 'center'
            },
            subtitle: {
                text:
                    'Fuente: samicundinamarca.com',
                align: 'center'
            },
	        xAxis: {
	            categories: ['Hospitales']
	        },
	        yAxis: {
	            title: {
	                text: 'Número de donaciones BLH'
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

        Highcharts.chart('graphDonantesByHosp', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Total Donantes BLH por Hospital',
                align: 'center'
            },
            tooltip: {
                valueSuffix: ''
            },
            subtitle: {
                text:
                    'Fuente: samicundinamarca.com',
                align: 'center'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [
                        {
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
	        series: [<?=$serieDonantes?>]
	    });

  

Highcharts.chart('graphCumplIami', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cumplimiento IAMII - I Trimestre 2024',
        align: 'left'
    },
    subtitle: {
        text:
            'Fuente: samicundinamarca.com',
        align: 'center'
    },
    xAxis: {
	            categories: ['Hospitales'],
        title: {
            text: null
        },
        gridLineWidth: 1,
        lineWidth: 0
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        },
        gridLineWidth: 0
    },
    tooltip: {
        valueSuffix: '%'
    },
    plotOptions: { 
    column: {
        zones: [{
            value: 50, // Values up to 10 (not including) ...
            color: 'red' // ... have the color blue.
        },{
            value: 70, // Values up to 10 (not including) ...
            color: 'yellow' // ... have the color blue.
        },{
            color: 'green' // Values from 10 (including) and up have the color red
        }]
    }
    },
    legend:{ enabled:false },
    credits: {
        enabled: false
    },
	series: <?=$serieIami?>
	    });

        
    });
</script>
<?php 
	require '../php/footer.php';
}else{
	header('Location: http://samicundinamarca.com/');
}
?>