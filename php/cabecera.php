<?php
require '../includes/sesion.php';
require '../includes/Basedatos.php';
require '../php/classes/Database.php';
$conexion=conectar();
session_write_close();
session_start(); 
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>SAMI</title>
	<link rel="icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <script src="../librerias/jquery/jquery-1.11.2.min.js"></script>
    <script src="../js/funciones.js"></script> 
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>    

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>  

<!-- Start of  Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=49e28534-a39f-4b5d-afe7-a1a7e402258b"> </script>
<!-- End of  Zendesk Widget script -->

</head>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
            <a href="index.php" class="mm-active"><div class="logo-src">
                <img  class="img-fluid" src="../imagenes/logo_head.png" alt="">
                </div></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                    <span class="badge badge-pill badge-primary"><?php echo ucwords(str_replace("_"," ",$_SESSION['nombre_hospital']));?></span>
                      <!--  <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>-->
                    </div>
                    
                   <!-- <ul class="header-menu nav">
                        <li class="dropdown nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon fa fa-cog"></i>
                                Configuracion
                            </a>
                        </li>
                    </ul> -->       
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                
                            <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                    <?php echo ucwords(str_replace("_"," ",$_SESSION['nombre']));?>
                                    </div>
                                    <div class="widget-subheading">
                                    <?php echo ucwords(str_replace("_"," ",$_SESSION['perfil']));?>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/admin_icon.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" id="cambiarClavebtn" tabindex="0" class="dropdown-item"><a href="cambiarClave.php">Cambiar Clave</a></button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item"><a href="../logout.php">Cerrar sesión</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>        <div class="ui-theme-settings">
            <div class="theme-settings__inner">
                <div class="scrollbar-container">
                    <div class="theme-settings__options-wrapper">
                        <h3 class="themeoptions-heading">Layout Options
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Header
                                                </div>
                                                <div class="widget-subheading">Makes the header top fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                    <div class="switch-animate switch-on">
                                                        <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Sidebar
                                                </div>
                                                <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                    <div class="switch-animate switch-off">
                                                        <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Fixed Footer
                                                </div>
                                                <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>
                                Header Options
                            </div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                        </div>
                                        <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Sidebar Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                                Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Choose Color Scheme
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                        </div>
                                       
                                        <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                        </div>
                                        <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h3 class="themeoptions-heading">
                            <div>Main Content Options</div>
                            <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                            </button>
                        </h3>
                        <div class="p-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h5 class="pb-2">Page Section Tabs
                                    </h5>
                                    <div class="theme-settings-swatches">
                                        <div role="group" class="mt-2 btn-group">
                                            <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                                Line
                                            </button>
                                            <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                                Shadow
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                    <a id="menuHome" href="index.php">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Inicio
                                    </a>
                                </li>
                                <li>
                                    <a id="menuDatos" href="datosGenerales.php">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Datos Generales
                                    </a>
                                </li>
                                <?php                                 
                                    if($_SESSION['perfil'] == 'Banco de leche' || $_SESSION['perfil'] == 'Administrador Sistema'){
                                ?>
                                <li class="app-sidebar__heading">Bancos de Leche</li>                               
                                <li>
                                    <a id="menuRegistroProcesamiento" href="procesamientoblh.php">
                                        <i class="metismenu-icon pe-7s-display2">
                                        </i>Selección y Clasificación
                                    </a>
                                </li>
                                <li>
                                    <a id="menuPool"  href="poolblh.php">
                                        <i class="metismenu-icon pe-7s-display2">
                                        </i>Reenvase
                                    </a>
                                </li>
                                <li>
                                <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Pasteurización
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                    <ul id="regCurva">
                                        <li>
                                            <a id="menuCurva" href="registroCurva.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Creación Curva
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaCurvas" href="ListaCurvas.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de Curvas
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuMonitoreoPast" href="monitorPaste.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Monitoreo Pasteurización
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaCiclos" href="ListaCiclos.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Ciclos Pasteurizacion
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a id="menuPasteurizacion" href="ListaPasteurizacion.php">
                                        <i class="metismenu-icon pe-7s-note2">
                                        </i>Control Microbiológico
                                    </a>
                                </li>
                                <li>
                                <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Beneficiarios
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                    <ul id="regBenef">
                                        <li>
                                            <a id="menuBeneficiarios" href="registroBeneficiarios.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Registro de Beneficiarios
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaBeneficiarios" href="ListaBeneficiarios.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de Beneficiarios
                                            </a>
                                        </li>                                       
                                        <li>
                                            <a id="menuLhpDisponible" href="lhpDisponible.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>LHP Disponible
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li>
                                    <a id="menuReportesBlh"  href="reportesBlh.php">
                                        <i class="metismenu-icon pe-7s-display2">
                                        </i>Reportes
                                    </a>
                                </li>
                                <?php  
                                }                                 
                                    if($_SESSION['perfil'] == 'Sala de Extraccion' || $_SESSION['perfil'] == 'Administrador Sistema' || $_SESSION['perfil'] == 'Banco de leche'){
                                ?>
                                <li class="app-sidebar__heading">Sala de Extracción</li>                                
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Registro y atenciones
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul id="regAtencSala">
                                        <li>
                                            <a id="menuRegistroUsuariasSala" href="registroUsuariasExt.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro de Usuarias
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaUsuarias" href="ListaUsuariaSala.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de Usuarias
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuRegistroAtencion" href="registroAtencionSala.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro de atención
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaAtenciones" href="ListaAtencionSala.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de atenciones 
                                            </a>
                                        </li>
                                    </ul>
                                </li> 
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Donación de leche
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul id="regBLH">
                                        <li>
                                            <a id="menuRegistroDonanteSala" href="registroDonantesBLHSala.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro Donantes BLH
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaDonanteSala" href="ListaDonanteSala.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de Donantes BLH
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuRegistroDonacioneSala" href="donacionblhSala.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro Donación BLH
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaFrascosSala" href="listaFrascosblhSala.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Lista leche donada
                                            </a>
                                        </li>
                                    </ul>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-browser"></i>
                                        Equipos y temperaturas
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul id="regEquip">
                                        <li>                                            
                                            <a id="menuRegistroEquipos" href="registroEquiposSala.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro Equipos
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListadoEquipos" href="listadoEquiposSala.php">
                                                <i class="metismenu-icon pe-7s-note2">
                                                </i>Lista de Equipos
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuRegistroTemperaturas" href="registroTemperaturas.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Registro Temperaturas
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuListaTemperaturas" href="listadoTemperaturas.php">
                                                <i class="metismenu-icon pe-7s-mouse">
                                                </i>Lista de Temperaturas
                                            </a>
                                        </li>
                                        
                                
                                    </ul>
                                    <li>
                                    <a id="menuRegistroIndBancoLeche" href="registroIndBL.php">
                                        <i class="metismenu-icon pe-7s-note2">
                                        </i>Registro indicadores
                                    </a>
                                </li>                                 
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Normatividad
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a id="menuCumplimientoiami" href="Lineamientos BLH Colombia 2019.pdf" target="_blank">
                                            <i class="metismenu-icon pe-7s-note2"></i>
                                                Lineamientos BLH 2019
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    }                                
                                    if($_SESSION['perfil'] == 'IAMII' || $_SESSION['perfil'] == 'Administrador Sistema' || $_SESSION['perfil'] == 'Administrador IAMII'){
                                ?>
                                <li class="app-sidebar__heading">IAMII</li>
                                <li>
                                    <a id="menuIndiami" href="indiami.php">
                                        <i class="metismenu-icon pe-7s-graph3"></i>
                                        Indicadores IAMII
                                    </a>
                                </li>
                                <li>
                                    <a id="menuCumplimientoiami2" href="cumpiami.php">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                        % Cumplimiento
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Normatividad
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a id="menuCumplimientoiami" href="LINEAMIENTOS E. IAMII 2017.pdf" target="_blank">
                                            <i class="metismenu-icon pe-7s-note2"></i>
                                                Lineamientos IAMII 2017
                                            </a>
                                        </li>
                                        <li>
                                            <a id="menuCumplimientoiami" href="21. Resolucion-3280-de-2018.pdf" target="_blank">
                                                <i class="metismenu-icon pe-7s-note2"></i>
                                                Resolución 3280 del 2018
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                    }
                                    if($_SESSION['perfil'] == 'Canguro' || $_SESSION['perfil'] == 'Administrador Sistema'){
                                ?>
                                <li class="app-sidebar__heading">Madres Canguro</li>
                                <li>
                                    <a id="menuFasesCanguro" href="fasesCanguro.php">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                        Asignacion Fases
                                    </a>
                                </li>
                                <li>
                                    <a id="menuIndCanguro" href="indCanguro.php">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                        Indicadores Canguro
                                    </a>
                                </li>
                                <li>
                                    <a id="menuReporteCanguro" href="reportesCanguro.php">
                                        <i class="metismenu-icon pe-7s-graph2"></i>
                                        Reportes
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Normatividad
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a id="menuCumplimientoiami" href="Lineamientos Implmentación PMC 2017.pdf" target="_blank">
                                            <i class="metismenu-icon pe-7s-note2"></i>
                                                Implementación PMC 2017
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <?php
                                    }                                
                                    if($_SESSION['perfil'] == 'Administrador Sistema'){
                                ?>
                                <li class="app-sidebar__heading">Usuarios</li>
                                <li>
                                    <a id="gestionarUsuarios" href="usuarios.php">
                                        <i class="metismenu-icon pe-7s-note2">
                                        </i>Gestionar usuarios
                                    </a>
                                </li>
                                <?php
                                    } 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div> 
