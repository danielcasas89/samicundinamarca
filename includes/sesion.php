<?php
session_start();

//se comprueba que la entrada a la aplicacion se hizo por la pagina inicial
if(!isset($_SESSION['usuario_sesion'])){
	header ("Location: http://samicundinamarca.com/");
    exit();
}
?>