<?php 

session_start();
if(isset($_SESSION['usuario_sesion'])){
    @require '../php/header.php';
    include_once('../php/classes/Encuesta.php');
}

$estadistica = new Encuesta();
$estadisticaIami = new Encuesta();

$resultadoIami = $estadisticaIami->calcularDiligenciamientoAll();
print_r($resultadoIami);exit();

?>