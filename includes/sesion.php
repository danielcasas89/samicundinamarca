<?php
session_start();

//se comprueba que la entrada a la aplicacion se hizo por la pagina inicial
if(!isset($_SESSION['usuario_sesion'])){
	header ("Location: https://sami.cundinamarca.gov.co/");
    exit();
}
?>