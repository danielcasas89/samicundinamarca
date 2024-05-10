<?php
/**
 * Description of Basedatos
 */
//CONSTANTES
global $Ccreacion;
global $Cmodificacion;
global $Ccancelacion;

if(isset($_SESSION['usuario_sesion'])){
    $Ccreacion="creado_por=$_SESSION[usuario_sesion],fecha_creacion=NOW()";
    $Cmodificacion="modificado_por=$_SESSION[usuario_sesion],fecha_modificacion=NOW()";
    $Ccancelacion="cancelado_por=$_SESSION[usuario_sesion],fecha_cancelacion=NOW()";
}
 
function conectar(){
    $conexion = mysqli_connect("localhost", "admin_sami", "15demarzoDc5051", "sami_db"); 
    //$conexion = mysqli_connect("localhost", "cedetes_lact_u", "C3d3T35", "cedetes_lactancia");
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }else{
        return $conexion;
    }
} 

function desconectar($conexion){
    mysqli_close($conexion);
}

function get_select($conexion,$table, $columns, $where='', $order=''){
    $consulta = "select $columns from $table";
    if($where!=''){
        $consulta.=" where $where";
    } 
    if($order!=''){
        $consulta.=" order by $order";
    }    
    $resultado=mysqli_query($conexion,$consulta);
    return $resultado;
}

function form_select($conexion,$table, $columns, $where='', $order='',$preseleccion=0,$id=0,$name=1){
    $cadena="";
    $resultado=get_select($conexion,$table, $columns, $where, $order);
    while($valores=mysqli_fetch_row($resultado)){
        if($valores[0]==$preseleccion){
            $cadena.="<option value='{$valores[$id]}' SELECTED>{$valores[$name]}</option>";
        }else{
            $cadena.="<option value='{$valores[$id]}'>{$valores[$name]}</option>";
        }
    }            
    mysqli_free_result($resultado);
    echo $cadena;
    return $cadena;
}
    
function ingresar($conexion,$arreglo){      
    $mensaje = array();
    $consulta = "INSERT INTO $arreglo[tabla] SET ";
    foreach ($arreglo as $clave=>$valor ){
        if(substr($clave,0,3)=="tb_" and $valor != ""){
            $clave = str_replace("tb_","",$clave);       			
            $consulta .= "$clave = '$valor',";       		
    	}
    }
    $consulta .= "creado_por='$_SESSION[usuario_sesion]',fecha_creacion=NOW()";
    mysqli_query($conexion,$consulta);
    if(!mysqli_error($conexion)){        
        $id=mysqli_insert_id($conexion);
        $mensaje['bandera']=1;
        $mensaje['mensaje']="Se ingreso correctamente.";
        $mensaje['id']=$id;
    }else{
        $mensaje['bandera']=0;
        if(preg_match("/Duplicate/",mysqli_error($conexion))){
            $mensaje['mensaje']="El registro ya existe!!!";
        }else{
            $mensaje['mensaje']="Ocurrieron errores en el ingreso";
        }                
    }        
    return $mensaje;
}

function actualizar($conexion,$arreglo){    
    $mensaje=array();        
    $consulta = "UPDATE $arreglo[tabla] SET ";
    foreach ($arreglo as $clave=>$valor){
        if(substr($clave,0,3)=="tb_" and $valor != ""){
            $clave =  str_replace("tb_","",$clave);
            $consulta .= "$clave = '$valor',";
        }
    }
    $consulta .= "modificado_por_i='$_SESSION[usuario_sesion]',fecha_modificacion_i=NOW()";
    $clave_llave=  explode("__",$arreglo['tabla']);
    $identificador="id__".$clave_llave[1]; 	
    $consulta .= " WHERE $identificador = $arreglo[$identificador]";      
    mysqli_query($conexion,$consulta);
    if(!mysqli_error($conexion)){
        $mensaje['bandera']=1;
        $mensaje['mensaje']="Se actualizo correctamente";
    }else{
        $mensaje['bandera']=0;
        $mensaje['mensaje']="Ocurrieron errores en la actualización";
    }    
    return $mensaje;    
}
?>