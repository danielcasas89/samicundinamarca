<?php 

if(!empty($_POST['g-recaptcha-response'])){ 
 
	// Google reCAPTCHA verification API Request 
	$api_url = 'https://www.google.com/recaptcha/api/siteverify'; 
	$resq_data = array( 
		'secret' => '6LfcN98pAAAAAF_WFHmGPl1DakbsFYQdRou4J5Dd',  // Google reCAPTCHA API keys settings 
		'response' => $_POST['g-recaptcha-response'], 
		'remoteip' => $_SERVER['REMOTE_ADDR'] 
	); 

	$curlConfig = array( 
		CURLOPT_URL => $api_url, 
		CURLOPT_POST => true, 
		CURLOPT_RETURNTRANSFER => true, 
		CURLOPT_POSTFIELDS => $resq_data, 
		CURLOPT_SSL_VERIFYPEER => false 
	); 
	$ch = curl_init(); 
	curl_setopt_array($ch, $curlConfig); 
	$response = curl_exec($ch); 
	if (curl_errno($ch)) { 
		$api_error = curl_error($ch); 
	} 
	curl_close($ch); 

	// Decode JSON data of API response in array 
	$responseData = json_decode($response); 
	// If the reCAPTCHA API response is valid 
	
	$rta = new stdClass();
	if(!empty($responseData) && $responseData->success && $responseData->score>= 0.5){ 
		if(isset($_REQUEST['usuario']) && isset($_REQUEST['usuario'])){ 
			$conexion = mysqli_connect("localhost", "admin_sami", "15demarzoDc5051", "sami_db");

			$tz = 'America/Bogota';
			$tz_obj = new DateTimeZone($tz);		
			$today = new DateTime("now", $tz_obj);
			$today_formatted = $today->format('Y-m-d H:i:s');
		
			mysqli_set_charset($conexion, "utf8");
			$consulta="SELECT *,gestion__usuarios.fk_atributos__estados AS estado, nombre_hospital,
				gestion__perfiles.fk_atributos__estados AS estado_perfil
				FROM gestion__usuarios 
				INNER JOIN gestion__perfiles ON fk_gestion__perfiles=id__perfiles
				INNER JOIN aux__hospitales ON gestion__usuarios.fk_aux__hospitales = aux__hospitales.id_hospital
				AND login='$_REQUEST[usuario]' AND password=MD5('$_REQUEST[password]')";

			//echo $consulta;exit();	
			$resultado=mysqli_query($conexion,$consulta);
			if($usuario = mysqli_fetch_array($resultado)){
				//print_r($usuario);exit();
				if($usuario['estado']!=2 or $usuario['estado_perfil']!=2){
					$rta = new stdClass();
					$rta->type = 'error';
					$rta->msg = 'Su perfil se encuentra deshabilitado. Contacte al administrador.';
					echo json_encode($rta); 
				}else{
		
					// server should keep session data for AT LEAST 1 hour
					ini_set('session.gc_maxlifetime', 3600);
					// each client should remember their session id for EXACTLY 1 hour
					session_set_cookie_params(3600);					
					session_start();
					//ingreso al sistema fecha de ingreso
					$consulta="UPDATE gestion__usuarios SET ultimo_acceso='$today_formatted' WHERE id__usuarios=$usuario[id__usuarios]";
					//echo  $consulta;exit();
					mysqli_query($conexion, $consulta);
					$_SESSION['usuario_sesion']=$usuario['id__usuarios'];
					  $_SESSION['nombre']=$usuario['nombre'];	
					$_SESSION['login_sesion']=$usuario['login'];
					$_SESSION['fk_aux__hospitales']=$usuario['fk_aux__hospitales'];
					$_SESSION['nombre_hospital']=$usuario['nombre_hospital'];
					$_SESSION['perfil']=$usuario['nombre_perfiles'];
					session_write_close();
		
					$rta->type = 'info';
					$rta->msg = '';
					$rta->data = $_SESSION['perfil'];
					echo json_encode($rta);  
				}
			}else{				
				$rta->type = 'error';
				$rta->msg = 'Usuario y/o contraseña incorrectos.';
				echo json_encode($rta);
			}
			
			mysqli_free_result($resultado);
			mysqli_close($conexion);
		}else{
			$rta->type = 'error';
			$rta->msg = 'No se enviaron usuario y/o contraseña.';
			echo json_encode($rta);
		}		
	}
	else{		
		$rta->type = 'error';
		$rta->msg = 'No bots allowed.';
		echo json_encode($rta);
	}	
}
