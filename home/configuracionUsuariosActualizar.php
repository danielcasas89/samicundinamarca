<?php
require '../includes/sesion.php';
require '../includes/Basedatos.php';

$conexion=conectar();
switch($_POST['opcion']){ 

    case 1://CANCELAR DONANTE BLH
            $consulta="UPDATE core__registro_blh SET fk_atributos__estados=$_POST[estado] WHERE id_registro_blh=$_POST[codigo]";
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
    case 2://CREAR USUARIO
        $_POST['tabla'] = "gestion__usuarios";
        $_POST['tb_password'] = md5($_POST['tb_password']); 
        $respuesta=ingresar($conexion,$_POST);        
        echo json_encode($respuesta); 
        break;
    case 3://DESPLEGAR LIDERES
            $cadena="";
            $consulta="SELECT * FROM gestion__usuarios WHERE fk_gestion__perfiles=4 AND fk_atributos__estados=2";
            $resultado=mysqli_query($conexion,$consulta);
            if(mysqli_num_rows($resultado)!=0){ 
                $cadena.="<label class='col-sm-2 control-label'>Sup. Oper:</label>";
                $cadena.="<div class='col-sm-10'><select class='form-control' name=tb_fk_gestion__usuarios>";
                while($lider=mysqli_fetch_assoc($resultado)){
                    $cadena.="<option value=$lider[id__usuarios]>$lider[nombre]</option>');";                
                }
                $cadena.="</select>";  
                $cadena.="</div>";
            }
            mysqli_free_result($resultado);
            echo $cadena;
        break;
    case 4://DESPLEGAR LIDERES
            $cadena="";
            $consulta="SELECT * FROM gestion__usuarios WHERE fk_gestion__perfiles=6 AND fk_atributos__estados=2";
            $resultado=mysqli_query($conexion,$consulta); 
            if(mysqli_num_rows($resultado)!=0){
                $cadena.="<label class='col-sm-2 control-label'>Sup. Zonal:</label>";
                $cadena.="<div class='col-sm-10'><select class='form-control' name=tb_fk_gestion__usuarios>";
                while($lider=mysqli_fetch_assoc($resultado)){
                    $cadena.="<option value=$lider[id__usuarios]>$lider[nombre]</option>');";                
                }
                $cadena.="</select>";
                $cadena.="</div>";
            }
            mysqli_free_result($resultado);
            echo $cadena;
        break;
    case 5://ACTUALIZAR USUARIO SALA
        $consulta="UPDATE core__registro_sala SET fk_atributos__estados=$_POST[estado] WHERE id_core__registro_sala=$_POST[codigo]";
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
    case 6://ACTUALIZAR Beneficiarios
        $consulta="UPDATE core__registro_beneficiario SET fk_atributos__estados=$_POST[estado] WHERE id_core__registro_beneficiario=$_POST[codigo]";
        
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
    case 7://CANCELAR USUARIO
        $consulta="UPDATE gestion__usuarios SET fk_atributos__estados=$_POST[estado],$Cmodificacion WHERE id__usuarios=$_POST[codigo]";
       // echo $consulta;exit();
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
    case 8://CANCELAR DONANTE BLH SALA
        $consulta="UPDATE core__registro_donantes SET fk_atributos__estados=$_POST[estado] WHERE id_registro_blh=$_POST[codigo]";
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
    default:
        break;
}
desconectar($conexion);
?>