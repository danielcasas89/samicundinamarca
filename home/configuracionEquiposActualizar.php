<?php
require '../includes/sesion.php';
require '../includes/Basedatos.php';

$conexion=conectar();
$tz = 'America/Bogota';
$tz_obj = new DateTimeZone($tz);		
$today = new DateTime("now", $tz_obj);
$today_formatted = $today->format('Y-m-d H:i:s');
       
switch($_POST['opcion']){ 

    case 1://ACTIVAR/DESACTIVAR EQUIPO
            $consulta = "UPDATE core__equipos SET 
                        fk_atributos__estados = $_POST[estado],
                        responsable_accion = '".$_SESSION['nombre']."',
                        fecha_accion = '$today_formatted' WHERE id_core__equipos = $_POST[codigo]";
            //echo $consulta;exit();
            mysqli_query($conexion,$consulta);            
            if(!mysqli_error($conexion)){                
                echo "$('#ar_$_POST[codigo]').html(\"\");";
                if($_POST['estado'] == 3){
                    echo "$('#estado_$_POST[codigo]').attr('class','mb-2 mr-2 badge badge-danger').text('Inactivo');";
                }else{
                    echo "$('#estado_$_POST[codigo]').attr('class','mb-2 mr-2 badge badge-success').text('Activo');";
                }               
            }else{
                echo mysqli_error($conexion);
            } 
    break;
        break;
}
desconectar($conexion);
?>