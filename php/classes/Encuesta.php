<?php 

class Encuesta{

	private $totalCampos = 120;

	//REALIZA UNA INSERCION
	public function insert($values){
		return Database::ejecutarInsert('core__encuestas', $values);
	}
 
	//REALIZA UNA ACTUALIZACION DE UN REGISTRO POR ID
	public function updateOne($values){
		return Database::ejecutarUpdate('core__encuestas', $values);
	}

	//REALIZA UNA ACTUALIZACION DE UN REGISTRO POR ID
	public function ejecutarSelect($filter){
		return Database::ejecutarSelect('core__encuestas', $filter);
	}

	function convertObject2array($object){
		$arreglo = array();
		foreach ($object as $attr => $valueAttr) {
			$arreglo[$attr] = $valueAttr;
		}
		return $arreglo;
	}

	function convertItemsOfObjet2Array($arrayOfObjects){
		$arrayOfArrays = array();
		foreach ($arrayOfObjects as $object) {
			$arrayOfArrays[] = $this->convertObject2array($object);
		}
		return $arrayOfArrays;
	}

	public function obtenerUsuarios()
 	{

 		$query = "SELECT * FROM `gestion__usuarios` a INNER JOIN `gestion__perfiles` b ON ( a.fk_gestion__perfiles = b.id__perfiles) WHERE a.fk_atributos__estados =2; ";

 		$rta = new StdClass();
		$rta->msg = ''; 
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;					

 	}

 	public function ActualizarFormatos($tabla,$campos)
 	{


 		$rta = new StdClass();
		$rta->msg = ''; 
		try{
			$rta->data = Database::ejecutarInsertJson($tabla,$campos);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

 	}
	
 	 
	public function listarProgresoIami($hospital,$trimestre,$paso,$year)
	 { 	
		$date = date('Y-m-d H:i:s');
		$totalp1 = 12;
		$totalEmpty = 0;
		$query = "SELECT * FROM `core__indicador_iami` WHERE hospital = ".$hospital." AND trimestre = '".$trimestre."' AND ano = '".$year."' ";
		$rta = new StdClass(); 
	    $rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarRegistroPasteurizacion($curva)
	{ 	
	   $date = date('Y-m-d H:i:s');
	   $totalp1 = 12;
	   $totalEmpty = 0;
	   $query = "SELECT * FROM `core__pasteurizacion_blh` WHERE `curva` = '".$curva."'";
	   $rta = new StdClass(); 
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQuerySelect($query);
		   $rta->type = 'info';
		   $rta->query = $query;
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;
   }

	public function listarPerfiles()
	{ 
		$query = "SELECT * FROM `gestion__perfiles`";
		$rta = new StdClass(); 
	    $rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}

	public function listarFasesCanguro($hospital)
	{	
		$queryFases = "SELECT fase FROM `core__fases_canguro` WHERE `hospital` = ".$hospital;

		$rta = new StdClass(); 
	    $rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($queryFases);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}

	public function listarProgresoCanguro($hospital,$mes)
	 { 	
		$date = date('Y-m-d H:i:s');
		$totalp1 = 12;
		$totalEmpty = 0;
		$query = "SELECT * FROM `core__indicador_canguro` WHERE hospital = ".$hospital." AND fecha_registro = '".$mes."'";
		$queryFases = "SELECT fase FROM `core__fases_canguro` WHERE `hospital` = ".$hospital;

		$rta = new StdClass(); 
	    $rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->dataFases = Database::ejecutarQuerySelect($queryFases);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}	

	public function listarProgresoBLH($hospital,$mes)
	 { 	
		$date = date('Y-m-d H:i:s');
		$totalp1 = 12;
		$totalEmpty = 0;
		$query = "SELECT * FROM `core__indicador_BLH` WHERE hospital = ".$hospital." AND fecha_registro = '".$mes."'";
		$rta = new StdClass(); 
	    $rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}	

	function insert_data( $tabla, $campos )
	{
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)
		$query ="INSERT INTO $tabla (`creado_por`, `fecha_creacion`, `fk_atributos__estados`, ". implode(',' , $key) .") VALUES('".$_SESSION['usuario_sesion']."','".$today_formatted."',2,'". implode("','" , $value) ."')";
		return $query;
	}
	
	function update_data( $tabla, $campos, $year)
	{
		$date = date('Y-m-d H:i:s');
		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)

		$query = "UPDATE $tabla SET fecha_modificacion='".$date."' ,";
		$comma = " ";
		foreach($campos as $key => $val) {
			//if( ! empty($val)) {
				$query .= $comma . $key . " = '".$val."'";
				$comma = ", ";
			//}
		}
		$query .= " WHERE hospital = '".$campos['hospital']."' AND trimestre = '".$campos['trimestre']."' AND ano = '".$year."' ; ";
		return $query;
	}

	function update_dataPasteurizacion( $tabla, $campos )
	{
		$date = date('Y-m-d H:i:s');
		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)

		$query = "UPDATE $tabla SET fecha_modificacion='".$date."' ,";
		$comma = " ";
		foreach($campos as $key => $val) {
			//if( ! empty($val)) {
				$query .= $comma . $key . " = '".$val."'";
				$comma = ", ";
			//}
		}
		$query .= " WHERE curva = '".$campos['curva']."';";
		return $query;
	}

	function update_dataDatosGenerales($tabla,$campos)
	{
		$date = date('Y-m-d H:i:s');
		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)

		$query = "UPDATE $tabla SET fecha_modificacion='".$date."' ,";
		$comma = " ";
		foreach($campos as $key => $val) {
			//if( ! empty($val)) {
				$query .= $comma . $key . " = '".$val."'";
				$comma = ", ";
			//}
		}
		$query .= " WHERE hospital = '".$campos['hospital']."'; ";
		return $query;
	}

	function update_dataCanguro( $tabla, $campos )
	{
		$date = date('Y-m-d H:i:s'); 
		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)

		$query = "UPDATE $tabla SET fecha_modificacion='".$date."' ,";
		$comma = " ";
		foreach($campos as $key => $val) {
			//if( ! empty($val)) {
				$query .= $comma . $key . " = '".$val."'";
				$comma = ", ";
			//}
		}
		$query .= " WHERE hospital = '".$campos['hospital']."' AND fecha_registro = '".$campos['fecha_registro']."'; ";
		return $query;
	}	

	function update_dataIndBLH( $tabla, $campos )
	{
		$date = date('Y-m-d H:i:s'); 
		$key = array_keys($campos);  //get key( column name)
		$value = array_values($campos);  //get values (values to be inserted)

		$query = "UPDATE $tabla SET fecha_modificacion='".$date."' ,";
		$comma = " ";
		foreach($campos as $key => $val) {
			//if( ! empty($val)) {
				$query .= $comma . $key . " = '".$val."'";
				$comma = ", ";
			//}
		}
		$query .= " WHERE hospital = '".$campos['hospital']."' AND fecha_registro = '".$campos['fecha_registro']."'; ";
		return $query;
	}

	public function actualizarClaveUsuario($idUsuario,$claveNueva)
	{
		$rta = new StdClass();
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		$queryUpd = "UPDATE gestion__usuarios SET password=MD5('$claveNueva'),`fecha_modificacion`='".$today_formatted."' where id__usuarios = ".$idUsuario."";
		//echo $queryUpd;exit();
		$updateNuevaClave = Database::ejecutarQueryInsert($queryUpd);
		if ($updateNuevaClave == "ok")
		{
			$rta->type = "info";
			$rta->query = $queryUpd;
			$rta->msj = "Clave actualizada correctamente.";
		}		
		return $rta;

	}

	public function cambiarClaveActual($nuevaClave,$claveActual)
	{
		$rta = new StdClass();

		$query = "SELECT * FROM gestion__usuarios where login = '".$_SESSION['login_sesion']."' and password=MD5('$claveActual')";
		$validarClaveActual = Database::ejecutarQuerySelect($query);

		if (count($validarClaveActual) == 0)
		{
			$rta->type = "error";
			$rta->msj = "Clave Actual no coincide.";
			$rta->query = $query;
		}
		else
		{			
			$queryUpd = "UPDATE gestion__usuarios SET password=MD5('$nuevaClave') where login = '".$_SESSION['login_sesion']."'";
			$updateNuevaClave = Database::ejecutarQueryInsert($queryUpd);
			if ($updateNuevaClave == "ok")
			{
				$rta->type = "info";
				$rta->query = $queryUpd;
				$rta->msj = "Clave actualizada correctamente.";
			}
		}
		return $rta;	
	}

	public function registrarPasoIami($tabla,$campos,$paso,$year)
	{  
	    $date = date('Y-m-d H:i:s');
		$querySelect = $this->listarProgresoIami($campos['hospital'],$campos['trimestre'],$paso,$year);
		
		if (count($querySelect->data)>0)
		{
			$query = $this->update_data($tabla,$campos,$year);		
		}
		else
		{
			$query = $this->insert_data($tabla,$campos);

		}
		//echo $query;
		//exit();
		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->query = $query;
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}

	public function registrarIndicadoresBLH($tabla,$campos)
	{  
	    $date = date('Y-m-d H:i:s');
		$querySelect = $this->listarProgresoBLH($campos['hospital'],$campos['fecha_registro']);
		
		if (count($querySelect->data)>0)
		{
			$query = $this->update_dataIndBLH($tabla,$campos);		
		}
		else
		{
			$query = $this->insert_data($tabla,$campos);

		}
		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->query = $query;
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}

	public function registrarIndicadorCanguro($tabla,$campos)
	{  
	    $date = date('Y-m-d H:i:s');
		$querySelect = $this->listarProgresoCanguro($campos['hospital'],$campos['fecha_registro']);

		if (count($querySelect->data)>0)
		{
			$query = $this->update_dataCanguro($tabla,$campos);		
		}
		else
		{
			$query = $this->insert_data($tabla,$campos);

		}
		$rta = new StdClass();
		$rta->msg = '';  
		try{ 
			$rta->data = json_encode(Database::ejecutarQueryInsert($query));
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->query = $query;
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}


	public function registrarUsuariaSala($tabla,$campos)
	{  
	   $query = $this->insert_data($tabla,$campos);
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	
	}

	public function registrarFasesCanguro($tabla,$campos)
	{
		$sql = "";
		$fases = $campos['fases'];	
		unset($campos['myMulti']);
		$idHispital = $campos['hospital'];

		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		for ($i = 0; $i < count($fases); $i++) {
			$beneficiario = "beneficiario".$i;
			$sql .= "INSERT INTO core__fases_canguro(`hospital`,`fase`, `creado_por`, `fecha_creacion`, `fk_atributos__estados`) 
			VALUES ('".$idHispital."','".$fases[$i]."','".$_SESSION['usuario_sesion']."','".$today_formatted."','2');";
		}

		$rta = new StdClass();
	    $rta->msg = '';  
	    try{
		   $rta->data = Database::ejecutarMultiQueryInsert($sql);		   
		   $rta->type = 'info';
	    }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	    }
	    return $rta;		
	}

	public function registro_pasteurizacionNew($tabla,$campos)
	{ 
		$frascos = $campos['frascos'];
		$idCurva = $campos['curva'];

		unset($campos['myMulti']);
		unset($campos['frascos']);
	

		$queryCiclos = "SELECT ciclos FROM `core__registro_curva` WHERE `id_core__registro_curva` = ".$idCurva;		
		$ejecutarSelectCiclo = Database::ejecutarQuerySelect($queryCiclos);
		$numCiclos = (int)$ejecutarSelectCiclo[0]->ciclos; //Numero de Ciclos actual
		$numCiclos++;

		$queryUpdateNumCiclos = "UPDATE `core__registro_curva` SET `ciclos`='".$numCiclos."'
		WHERE `id_core__registro_curva`=".$idCurva;	


		$ejecutarUpdateCiclos = Database::ejecutarQueryInsert($queryUpdateNumCiclos);
		$query = $this->insert_data($tabla,$campos); //Insert data Pasteurizacion
		$insertPasteurizacion = Database::ejecutarQueryInsert($query);


		for ($i = 0; $i <count($frascos); $i++) {
			$updateCorePool = "UPDATE `core__pool_blh` SET `id_core__pasteurizacion_blh`=".$insertPasteurizacion." WHERE `id_core__pool_blh`=".$frascos[$i];
			$ejecutarUpd = Database::ejecutarQueryInsert($updateCorePool);
		}	
	
 
		$rta->msg = '';  
		try{
			$rta->data = 'ok';
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	
	}

	

	public function registrarCurva($tabla,$campos)
	{  
	   $query = $this->insert_data($tabla,$campos);
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	
	}

	public function registrarEquipos($tabla,$campos)
	{  
	   $query = $this->insert_data($tabla,$campos);
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	
	}
	

	
	public function registrarDatosGenerales($tabla,$campos)
	{  
		$querySelect = $this->cargarDatosGenerales($campos["hospital"]);	

		if (count($querySelect->data)>0)
		{
			$query = $this->update_dataDatosGenerales($tabla,$campos);
		}
		else
		{
			$query = $this->insert_data($tabla,$campos); 
		}

	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
		   $rta->query = $query;
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	
	}


	public function registrarBeneficiario($tabla,$campos)
	{  
	   $query = $this->insert_data($tabla,$campos);
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
		   $rta->query = $query;
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	
	}	

	public function registrarTemperatura($tabla,$campos)
	{
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		$query = "INSERT INTO `core__temperaturas`(`creado_por`, `fecha_creacion`, `fk_atributos__estados`, `fk_equipos`, `fecha`, `hora`, `temp_actual`, `temp_minima`, `temp_maxima`, `observaciones`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."',2,'".$campos['equipo']."','".$campos['fecha']."','".$campos['hora']."','".$campos['temp_actual']."','".$campos['temp_minima']."','".$campos['temp_maxima']."','".$campos['observaciones']."')";

		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
	   return $rta;	
	}

	public function listarBeneficiarios()
	{  
		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT * FROM `core__registro_beneficiario` WHERE fk_atributos__estados=2";
		}
		else
		{
			$query = "SELECT * FROM core__registro_beneficiario crb			
			INNER JOIN gestion__usuarios gu ON crb.creado_por = gu.id__usuarios
			WHERE crb.fk_atributos__estados=2 AND gu.fk_aux__hospitales =".$idHospital;

		}

		$rta = new StdClass();
	    $rta->msg = '';  
	    try{
		   $rta->data = Database::ejecutarQuerySelect($query);
		   $rta->type = 'info';
	    }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	    }
	    return $rta;
	}

	public function listarEquipos()
	{		
		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];		
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT ce.*, ae.nombre as estadoEquipo 
			FROM core__equipos ce 
			INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados 
			WHERE fk_atributos__estados = 2";		 
		}
		else
		{
			$query = "SELECT ce.*, ae.nombre as estadoEquipo 
			FROM core__equipos ce 
			INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados
			INNER JOIN gestion__usuarios gu ON ce.creado_por = gu.id__usuarios
			WHERE ce.fk_atributos__estados = 2 and gu.fk_aux__hospitales =".$idHospital;

		}
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQuerySelect($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}
	
	public function listarCurvas()
	{		
		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];		
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT * FROM `core__registro_curva`
			WHERE fk_atributos__estados = 2";		 
		}
		else
		{
			$query = "SELECT * FROM `core__registro_curva` cr
			INNER JOIN gestion__usuarios gu ON cr.creado_por = gu.id__usuarios
			WHERE cr.fk_atributos__estados = 2 and gu.fk_aux__hospitales =".$idHospital;

		}
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQuerySelect($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}	

	public function registrarUsuarioSistema($tabla,$campos)
	{  
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		$query = "INSERT INTO `gestion__usuarios`(`login`, `password`, `nombre`,`mail`, `telefono_contacto`,`fk_gestion__perfiles`, `fk_aux__hospitales`, `fk_gestion__usuarios`,`fk_atributos__estados`,`profesion`, `curso_iami`, `fecha_curso_iami`, `duracion_iami`, `curso_consejeria`, `fecha_curso_consejeria`, `duracion_consejeria`, `curso_leche`, `fecha_curso_leche`, `duracion_leche`, `creado_por`, `fecha_creacion`) 
		VALUES ('".$campos['login']."',MD5('".$campos['password']."'),'".$campos['nombre']."','".$campos['mail']."','".$campos['telefono_contacto']."','".$campos['fk_gestion__perfiles']."','".$campos['hospital']."',1,2,'".$campos['profesion']."','".$campos['curso_iami']."','".$campos['fecha_curso_iami']."','".$campos['duracion_iami']."','".$campos['curso_consejeria']."','".$campos['fecha_curso_consejeria']."','".$campos['duracion_consejeria']."','".$campos['curso_leche']."','".$campos['fecha_curso_leche']."','".$campos['duracion_leche']."','".$_SESSION['usuario_sesion']."','".$today_formatted."')";


		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
	   return $rta;	
	}


	public function registrarAtencionSala($tabla,$campos)
	{  		 
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');

		$query = "INSERT INTO `core__atencion_sala`(`creado_por`, `fecha_creacion`, `fk_atributos__estados`, `id_core__registro_sala`, `fecha_atencion`, `hora_llegada`, `hora_salida`, `atencion_prestada`, `tipo_extraccion`, `tipoLeche`, `num_frascos`, `cantidad`, `total`, `destino_leche`, `observaciones`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."',2,'".$campos['id_core__registro_sala']."','".$campos['fecha_atencion']."','".$campos['hora_llegada']."','".$campos['hora_salida']."','".$campos['atencion_prestada']."','".$campos['tipo_extraccion']."','".$campos['tipoLeche']."','".$campos['num_frascos']."','".$campos['cantidad']."','".$campos['total']."','".$campos['destino_leche']."','".$campos['observaciones']."')";
	
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	
	}	

 	public function registrarDonanteBLH($tabla,$campos)
 	{
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO `core__registro_blh`(`creado_por`, `fecha_creacion`,`fk_atributos__estados`,`nombre`, `documento`, `fecha_nacimiento`, `edad`, `celular`, `direccion`, `departamento`, `municipio`, `profesion`, `pesoBebe`, `nombreHijo`,`controlPrenatal`, `tipoIps`, `control`, `pesoInicial`, `pesoFinal`, `talla`,`semanas`, `fecha_parto`, `vdrl`, `fecha_vdrl`, `hbsag`, `fecha_hbsag`, `hiv`, `fecha_hiv`, `hemoglobina`, `hematocrito`, `transfusion`, `enfermedades`, `medicamentos`, `cuales_medicamentos`, `fuma`, `alcohol`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$date."','2','".$campos['nombre']."','".$campos['documento']."','".$campos['fecha_nacimiento']."','".$campos['edad']."','".$campos['celular']."','".$campos['direccion']."','".$campos['departamento']."','".$campos['municipio']."','".$campos['profesion']."','".$campos['pesoBebe']."','".$campos['nombreHijo']."','".$campos['controlPrenatal']."','".$campos['tipoIps']."','".$campos['control']."','".$campos['pesoInicial']."','".$campos['pesoFinal']."','".$campos['talla']."','".$campos['semanas']."','".$campos['fecha_parto']."','".$campos['vdrl']."','".$campos['fecha_vdrl']."','".$campos['hbsag']."','".$campos['fecha_hbsag']."','".$campos['hiv']."','".$campos['fecha_hiv']."','".$campos['hemoglobina']."','".$campos['hematocrito']."','".$campos['transfusion']."','".$campos['enfermedades']."','".$campos['medicamentos']."','".$campos['cuales_medicamentos']."','".$campos['fuma']."','".$campos['alcohol']."')";
	 

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
 	}

	public function registrarDonanteBLHSala($tabla,$campos)
 	{
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO `core__registro_donantes`(`creado_por`, `fecha_creacion`,`fk_atributos__estados`,`nombre`, `documento`, `fecha_nacimiento`, `edad`, `celular`, `direccion`, `departamento`, `municipio`, `profesion`, `pesoBebe`, `nombreHijo`,`controlPrenatal`, `tipoIps`, `control`, `pesoInicial`, `pesoFinal`, `talla`,`semanas`, `fecha_parto`, `vdrl`, `fecha_vdrl`, `hbsag`, `fecha_hbsag`, `hiv`, `fecha_hiv`, `hemoglobina`, `hematocrito`, `fecha_hb_hto`, `transfusion`, `enfermedades`, `medicamentos`, `cuales_medicamentos`, `fuma`, `alcohol`) 
				  VALUES ('".$_SESSION['usuario_sesion']."','".$date."','2','".$campos['nombre']."','".$campos['documento']."','".$campos['fecha_nacimiento']."','".$campos['edad']."','".$campos['celular']."','".$campos['direccion']."','".$campos['departamento']."','".$campos['municipio']."','".$campos['profesion']."','".$campos['pesoBebe']."','".$campos['nombreHijo']."','".$campos['controlPrenatal']."','".$campos['tipoIps']."','".$campos['control']."','".$campos['pesoInicial']."','".$campos['pesoFinal']."','".$campos['talla']."','".$campos['semanas']."','".$campos['fecha_parto']."','".$campos['vdrl']."','".$campos['fecha_vdrl']."','".$campos['hbsag']."','".$campos['fecha_hbsag']."','".$campos['hiv']."','".$campos['fecha_hiv']."','".$campos['hemoglobina']."','".$campos['hematocrito']."','".$campos['fecha_hb_hto']."','".$campos['transfusion']."','".$campos['enfermedades']."','".$campos['medicamentos']."','".$campos['cuales_medicamentos']."','".$campos['fuma']."','".$campos['alcohol']."')";

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}
	 
	public function registrarDonacionBLH($tabla,$campos)
 	{  
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');
		$dateShortYear = date('Y');
		$time = $today->format('His');
		$id_frasco = $dateShortYear."-".$campos['id_registro_blh']."-".$time;
		//echo $id_frasco;exit();

		$query = "INSERT INTO `core__donacion_blh`(`creado_por`, `fecha_creacion`, `id_registro_blh`, `id_frasco`, `fecha_extraccion`, `cantidad`, `recoleccionEn`, `fecha_recepcion`, `tipoLeche`, `dias`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."','".$campos['id_registro_blh']."','".$id_frasco."','".$campos['fecha_extraccion']."','".$campos['cantidad']."','".$campos['recoleccionEn']."','".$campos['fecha_recepcion']."','".$campos['tipoLeche']."','".$campos['dias']."')";
		
		//echo $query;exit();
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
			$rta->id = $id_frasco;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}

	public function registrarDonacionBLHSala($tabla,$campos)
 	{  
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');
		$dateShortYear = date('Y');

		$getCount = "SELECT COUNT(*) as TOTAL FROM `core__donacion_blh_sala`";
		$getTotalValues = Database::ejecutarQuerySelect($getCount)[0]->TOTAL;
		$total = (int)$getTotalValues +1;

		$id_frasco = $dateShortYear."-".$campos['id_registro_blh']."-".$total;
		
		//echo $id_frasco;		
		//exit();

		$query = "INSERT INTO `core__donacion_blh_sala`(`creado_por`, `fecha_creacion`, `fk_atributos__estados`,`id_registro_blh`, `id_frasco`, `fecha_extraccion`, `cantidad`, `recoleccionEn`, `fecha_recepcion`, `tipoLeche`, `dias`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."',2,'".$campos['id_registro_blh']."','".$id_frasco."','".$campos['fecha_extraccion']."','".$campos['cantidad']."','".$campos['recoleccionEn']."','".$campos['fecha_recepcion']."','".$campos['tipoLeche']."','".$campos['dias']."')";
		
		//echo $query;exit();
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
			$rta->id = $id_frasco;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}

	public function registrarProcesamientoBLH($tabla,$campos)
 	{  
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');
		$dateShortYear = date('Y');
		$time = $today->format('His');
		//$id_frasco = $dateShortYear."-".$campos['id_registro_blh']."-".$time;


		$query = "INSERT INTO `core__procesamiento_blh`(`creado_por`, `fecha_creacion`, `id_registro_blh`, `id_frasco`,`reuso_frasco`, `fecha_extraccion`, `cantidad`, `recoleccionEn`,`fecha_recepcion`, `tipoLeche`, `dias`, `fecha_procesamiento`, `responsable`,`embalaje`, `impurezas`, `color`, `flavor`, `acidez1`, `acidez2`, `acidez3`, `media`, `factor`, `resultado`,  `ct1`, `ct2`, `ct3`, `mediact`, `cc1`, `cc2`, `cc3`, `mediacc`, `crema`, `kcal`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."','".$campos['id_registro_blh']."','".$campos['frasco1']."','SI','".$campos['fecha_extraccion']."','".$campos['cantidad']."','".$campos['recoleccionEn']."','".$campos['fecha_recepcion']."','".$campos['tipoLeche']."','".$campos['dias']."','".$campos['fecha_procesamiento']."','".$campos['responsable']."','".$campos['embalaje']."','".$campos['impurezas']."','".$campos['color']."','".$campos['flavor']."','".$campos['acidez1']."','".$campos['acidez2']."','".$campos['acidez3']."','".$campos['media']."','".$campos['factor']."','".$campos['resultado']."','".$campos['ct1']."','".$campos['ct2']."','".$campos['ct3']."','".$campos['mediact']."','".$campos['cc1']."','".$campos['cc2']."','".$campos['cc3']."','".$campos['mediacc']."','".$campos['crema']."','".$campos['kcal']."')";
		
		$desactivarFrasco = $this->desactivarFrasco($campos['frasco1']);

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQueryInsert($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }
	 
	 
	public function registrarPoolBLH($tabla,$campos)
	{  
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');
		$dateShortYear = date('Y');
		$hours_formated = $today->format('His');


		$getCount = "SELECT COUNT(*) as TOTAL FROM `core__pool_blh`";
		$getTotalValues = Database::ejecutarQuerySelect($getCount)[0]->TOTAL;
		$total = (int)$getTotalValues +1;

		$frasco_pasteurizado = "P-".$dateShortYear."-".$total;

		if ($campos['reuso_frascos'] == "NO")
		{
			$this->desactivarFrascoProcesado($campos['frasco1']);		
		}
		else if ($campos['reuso_frasco2'] == "NO")
		{
			$this->desactivarFrascoProcesado($campos['frasco2']);	

		}
		else if ($campos['reuso_frasco3'] == "NO")
		{
			$this->desactivarFrascoProcesado($campos['frasco3']);

		}

	   $query = "INSERT INTO `core__pool_blh`(`creado_por`, `fecha_creacion`, `frasco1`, `frasco2`, `frasco3`,`frasco_pasteurizado`,`cantidad`, `acidez1`, `acidez2`, `acidez3`, `media`,`factor`,`resultado`,`ct1`, `ct2`, `ct3`, `mediact`, `cc1`, `cc2`, `cc3`, `mediacc`, `crema`, `kcal`, `tipoLeche`) 
	   VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."','".$campos['frasco1']."','".$campos['frasco2']."','".$campos['frasco3']."','".$frasco_pasteurizado."','".$campos['cantidad']."','".$campos['acidez1']."','".$campos['acidez2']."','".$campos['acidez3']."','".$campos['media']."','".$campos['factor']."','".$campos['resultado']."','".$campos['ct1']."','".$campos['ct2']."','".$campos['ct3']."','".$campos['mediact']."','".$campos['cc1']."','".$campos['cc2']."','".$campos['cc3']."','".$campos['mediacc']."','".$campos['crema']."','".$campos['kcal']."','".$campos['tipoLeche']."')";
	   
	 
	  // echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
		   $rta->id = $frasco_pasteurizado;
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}


	public function actualizarBeneficiariosPool($id_core__pool_blh,$values)
	{ 
		$sql = "";
		$tz = 'America/Bogota';
		$tz_obj = new DateTimeZone($tz);		
		$today = new DateTime("now", $tz_obj);
		$today_formatted = $today->format('Y-m-d H:i:s');
	
		for ($i = 1; $i <=count($values); $i++) {
			$beneficiario = "beneficiario".$i;
			$sql .= "INSERT INTO core__beneficiarios_pool(`id_core__pool_blh`,`id_core__registro_beneficiario`, `creado_por`, `fecha_creacion`, `fk_atributos__estados`) 
			VALUES ('".$id_core__pool_blh."','".$values[$beneficiario]."','".$_SESSION['usuario_sesion']."','".$today_formatted."','2');";
		}

		$queryUpdatePool = "UPDATE `core__pool_blh` SET `beneficiario`='asignado' WHERE `id_core__pool_blh`=".$id_core__pool_blh;	
		$upd = Database::ejecutarQueryInsert($queryUpdatePool);

		$rta = new StdClass();
	    $rta->msg = '';  
	    try{
		   $rta->data = Database::ejecutarMultiQueryInsert($sql);		   
		   $rta->type = 'info';
	    }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	    }
	    return $rta;	

	}

	public function registrarPasteurizacionBLH($tabla,$campos)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');

		$query = "INSERT INTO `core__pasteurizacion_blh`(`creado_por`, `fecha_creacion`, `frasco_pasteurizado`, `volumen`, `sgdonante`, `diasleche`, `d`, `kcal`) 
		VALUES ('".$_SESSION['usuario_sesion']."','".$today_formatted."','".$campos['frasco_pasteurizado']."','".$campos['volumen']."','".$campos['sgdonante']."','".$campos['diasleche']."','".$campos['d']."','".$campos['kcal']."')";

		
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	public function actualizarEstadoPool($id_core__pool_blh,$fk_atributos__estados)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');

		$query = "UPDATE `core__pool_blh` SET `fk_atributos__estados`='".$fk_atributos__estados."' WHERE `id_core__pool_blh`=".$id_core__pool_blh;
	//	echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	public function actualizarAccionAtencionSala($id_core__atencion_sala,$accion)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');

		$query = "UPDATE `core__atencion_sala` 
					SET `fecha_accion`='".$today_formatted."',
					`responsable_accion`='".$_SESSION['nombre']."',
					fk_atributos__estados=3, 
					`accion`='".$accion."' 
					WHERE `id_core__atencion_sala`=".$id_core__atencion_sala;
		//echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	public function actualizarAccionFrascoSala($id_core__donacion_blh,$accion)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');

		$query = "UPDATE `core__donacion_blh_sala` 
					SET `fecha_accion`='".$today_formatted."',
					`responsable_accion`='".$_SESSION['nombre']."',
					fk_atributos__estados=3, 
					`accion`='".$accion."' 
					WHERE `id_core__donacion_blh`=".$id_core__donacion_blh;
		//echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	public function desactivarFrasco($id_frasco)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');

		$query = "UPDATE `core__donacion_blh_sala` 
					SET `fecha_accion`='".$today_formatted."',
					`responsable_accion`='".$_SESSION['nombre']."',
					fk_atributos__estados=3
					WHERE `id_frasco`='".$id_frasco."'";
		//echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
		  // $rta->query = $query;
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->query = $query;
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	public function desactivarFrascoProcesado($id_frasco)
	{  
	   $tz = 'America/Bogota';
	   $tz_obj = new DateTimeZone($tz);		
	   $today = new DateTime("now", $tz_obj);
	   $today_formatted = $today->format('Y-m-d H:i:s');
	   $query = "UPDATE `core__procesamiento_blh` SET `reuso_frasco`='NO' 
				  WHERE `id_frasco`='".$id_frasco."'";

		//echo $query;exit();
		$rta = new StdClass();
	   $rta->msg = '';  
	   try{
		   $rta->data = Database::ejecutarQueryInsert($query);
		   $rta->type = 'info';
	   }catch(Exception $ex){
		   $rta->type = 'error';
		   $rta->msg = $ex->getMessage().'('.$ex->getCode().')';
	   }
	   return $rta;	

	}

	
	public function listarDonantesBLH()
 	{  
 	
		$date = date('Y-m-d H:i:s');
		$query = "SELECT * FROM `core__registro_blh` WHERE fk_atributos__estados = 2";
		 

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	}

	public function listarDonantesBLHSala()
 	{ 
		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];

		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT *,crd.nombre as NombreUsuaria FROM `core__registro_donantes` WHERE fk_atributos__estados = 2";
		}
		else
		{
			$query = "SELECT *,crd.nombre as NombreUsuaria FROM core__registro_donantes crd
			INNER JOIN gestion__usuarios gu ON crd.creado_por = gu.id__usuarios
			WHERE crd.fk_atributos__estados = 2 and gu.fk_aux__hospitales =".$idHospital;
		}
		
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarUsuariasSala()
 	{  
		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT * FROM `core__registro_sala` WHERE fk_atributos__estados = 2";		 
		}
		else
		{
			$query = "SELECT cs.nombre as nombreUsuaria, cs.* FROM core__registro_sala cs
			INNER JOIN gestion__usuarios gu ON cs.creado_por = gu.id__usuarios
			WHERE cs.fk_atributos__estados = 2 and gu.fk_aux__hospitales =".$idHospital;	
		}
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }

	public function calcularDiligenciamiento($trimeste,$idHospital,$year)
	{
		
		$query = "SELECT `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p110`, `p111`, `p112`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p31`, `p32`, `p33`, `p34`, `p35`, `p36`, `p37`, `p38`, `p39`, `p310`, `p311`, `p312`, `p313`, `p314`, `p315`, `p316`, `p317`, `p318`, `p319`, `p320`, `p321`, `p41`, `p42`, `p43`, `p44`, `p45`, `p46`, `p47`, `p48`, `p49`, `p410`, `p411`, `p412`, `p413`, `p414`, `p415`, `p416`, `p417`, `p51`, `p52`, `p53`, `p54`, `p55`, `p56`, `p57`, `p58`, `p59`, `p510`, `p511`, `p512`, `p513`, `p514`, `p515`, `p516`, `p61`, `p62`, `p63`, `p64`, `p65`, `p66`, `p67`, `p68`, `p69`, `p610`, `p611`, `p612`, `p613`, `p614`, `p615`, `p616`, `p617`, `p618`, `p619`, `p620`, `p621`, `p622`, `p623`, `p624`, `p625`, `p71`, `p72`, `p73`, `p74`, `p75`, `p76`, `p77`, `p78`, `p79`, `p710`, `p711`, `p81`, `p82`, `p83`, `p84`, `p85`, `p86`, `p87`, `p88`, `p89`, `p810`, `p811`, `p812`, `p813`, `p814`, `p815`, `p816`, `p817`, `p818`, `p819`, `p820`, `p821`, `p822`, `p823`, `p91`, `p92`, `p93`, `p94`, `p95`, `p96`, `p97`, `p98`, `p99`, `p910`, `p911`, `p912`, `p913`, `p914`, `p915`, `p916`, `p917`, `p918`, `p919`, `p101`, `p102`, `p103`, `p104`, `p105`, `p106`, `p107`, `p108`, `p109`, `p1010`, `p1011`, `p1012`, `p1013`, `p1014`, `p1015`, `p1016` FROM `core__indicador_iami` WHERE trimestre='".$trimeste."' AND hospital ='".$idHospital."' AND ano='".$year."'";	
		//echo $query;exit();
		$arrEncuestas = Database::ejecutarQuerySelect($query);			
		$rta = new StdClass();
		$totalAnswered = 0;
		foreach ($arrEncuestas as $numReg=>$registro) {			
			foreach ($registro as $key=>$valCampo){	
				if(!is_null($valCampo) && ($valCampo != "" || $valCampo !=null))
				{
					$totalAnswered++;
				}					
			}
		}
		$rta->diligenciamiento = $totalAnswered*100/169;
		$rta->totalAnswered = $totalAnswered;
		return $rta;

	}

	public function calcularCumplimientoPasos($trimeste,$idHospital,$arrPaso1,$year)
	{
		
		$query = "SELECT * FROM `core__indicador_iami` WHERE trimestre='".$trimeste."' AND hospital ='".$idHospital."' AND ano='".$year."'";	
		//echo $query;exit();
		$arrEncuestas = Database::ejecutarQuerySelect($query);			
		$rta = new StdClass();
		$p1Good = 0;
		$totalAplicable = 0;
		foreach ($arrEncuestas as $numReg=>$registro) {			
			foreach ($registro as $key=>$valCampo){		
				if(in_array($key,$arrPaso1))
				{
					if($valCampo == "SI"){						
						$p1Good++;			
					}
					if($valCampo == "SI" || $valCampo == "NO"){						
						$totalAplicable++;			
					}
				}
					
			}
		}
		if ($totalAplicable != 0)
		{
			$totalCumplido = $p1Good*100/$totalAplicable;
			$rta->cumplimiento = $totalCumplido;		
		}
		else
		{
			$rta->cumplimiento = $p1Good*100/count($arrPaso1);
		}
		$rta->trimestre = $trimeste;
		$rta->totalPregunta = count($arrPaso1);
		$rta->totalSi = $p1Good;
		$rta->totalAplicable = $totalAplicable;
		return $rta;
	}

	public function calcularCumplimientoCanguroMes($idHospital,$mes)
	{
		

		$query = "SELECT * FROM `core__indicador_canguro` WHERE `hospital` = '".$idHospital."' AND `fecha_registro` LIKE '%-$mes%'";
		//echo $query;exit();
		$arrCumpCanguro = Database::ejecutarQuerySelect($query);	
		
		$rta = new StdClass();
		$p1Good = 0;
		$i = 1;
		foreach ($arrCumpCanguro as $numReg=>$registro) {
			foreach ($registro as $key=>$valCampo)
			{
				if (strpos($key, 'valor') !== false) {
					$rta->$i  = $valCampo;
					$i++;
				}					
			}
		}
		return $rta;
	}
	public function cumplimientoCanguro($idHospital)
	{
		$rta = new StdClass();
		$rta->msg = ''; 

		try{
			$rta->type = 'info';
			$rta->dataMes01 = $this->calcularCumplimientoCanguroMes($idHospital,'01');
			$rta->dataMes02 = $this->calcularCumplimientoCanguroMes($idHospital,'02');
			$rta->dataMes03 = $this->calcularCumplimientoCanguroMes($idHospital,'03');
			$rta->dataMes04 = $this->calcularCumplimientoCanguroMes($idHospital,'04');
			$rta->dataMes05 = $this->calcularCumplimientoCanguroMes($idHospital,'05');
			$rta->dataMes06 = $this->calcularCumplimientoCanguroMes($idHospital,'06');
			$rta->dataMes07 = $this->calcularCumplimientoCanguroMes($idHospital,'07');
			$rta->dataMes08 = $this->calcularCumplimientoCanguroMes($idHospital,'08');
			$rta->dataMes09 = $this->calcularCumplimientoCanguroMes($idHospital,'09');
			$rta->dataMes10 = $this->calcularCumplimientoCanguroMes($idHospital,'10');
			$rta->dataMes11 = $this->calcularCumplimientoCanguroMes($idHospital,'11');
			$rta->dataMes12 = $this->calcularCumplimientoCanguroMes($idHospital,'12');

		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}

	 public function cumplimientoIami($idHospital,$year)
 	{  		
		$arrPaso1= array("p11","p12","p13","p14","p15","p16","p17","p18","p19","p110","p111","p112");
		$arrPaso2= array("p21","p22","p23","p24","p25","p26","p27","p28","p29");
		$arrPaso3= array("p31","p32","p33","p34","p35","p36","p37","p38","p39","p310","p311","p312","p313","p314","p315","p316","p317","p318","p319","p320","p321");
		$arrPaso4= array("p41","p42","p43","p44","p45","p46","p47","p48","p49","p410","p411","p412","p413","p414","p415","p416","p417");
		$arrPaso5= array("p51","p52","p53","p54","p55","p56","p57","p58","p59","p510","p511","p512","p513","p514","p515","p516");
		$arrPaso6= array("p61","p62","p63","p64","p65","p66","p67","p68","p69","p610","p611","p612","p613","p614","p615","p616","p617","p618","p619","p620","p621","p622","p623","p624","p625");
		$arrPaso7= array("p71","p72","p73","p74","p75","p76","p77","p78","p79","p710","p711");
		$arrPaso8= array("p81","p82","p83","p84","p85","p86","p87","p88","p89","p810","p811","p812","p813","p814","p815","p816","p817","p818","p819","p820","p821","p822","p823");
		$arrPaso9= array("p91","p92","p93","p94","p95","p96","p97","p98","p99","p910","p911","p912","p913","p914","p915","p916","p917","p918","p919");
		$arrPaso10= array("p101","p102","p103","p104","p105","p106","p107","p108","p109","p1010","p1011","p1012","p1013","p1014","p1015","p1016");

		$paso1Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso1,$year);

		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->type = 'info';
			$rta->dataPaso1Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso1,$year);
			$rta->dataPaso1Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso1,$year);
			$rta->dataPaso1Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso1,$year);
			$rta->dataPaso1Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso1,$year);

			$rta->dataDiligTrimestre1 = $this->calcularDiligenciamiento("primer",$idHospital,$year);
			
			$rta->dataDiligTrimestre2 = $this->calcularDiligenciamiento("segundo",$idHospital,$year);
			$rta->dataDiligTrimestre3 = $this->calcularDiligenciamiento("tercero",$idHospital,$year);
			$rta->dataDiligTrimestre4 = $this->calcularDiligenciamiento("cuarto",$idHospital,$year);
			
			$rta->dataPaso2Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso2,$year);
			$rta->dataPaso2Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso2,$year);
			$rta->dataPaso2Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso2,$year);
			$rta->dataPaso2Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso2,$year);
			
			$rta->dataPaso3Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso3,$year);
			$rta->dataPaso3Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso3,$year);
			$rta->dataPaso3Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso3,$year);
			$rta->dataPaso3Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso3,$year);
			
			$rta->dataPaso4Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso4,$year);
			$rta->dataPaso4Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso4,$year);
			$rta->dataPaso4Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso4,$year);
			$rta->dataPaso4Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso4,$year);
			
			$rta->dataPaso5Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso5,$year);
			$rta->dataPaso5Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso5,$year);
			$rta->dataPaso5Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso5,$year);
			$rta->dataPaso5Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso5,$year);
			
			$rta->dataPaso6Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso6,$year);
			$rta->dataPaso6Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso6,$year);
			$rta->dataPaso6Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso6,$year);
			$rta->dataPaso6Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso6,$year);
			
			$rta->dataPaso7Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso7,$year);
			$rta->dataPaso7Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso7,$year);
			$rta->dataPaso7Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso7,$year);
			$rta->dataPaso7Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso7,$year);
			
			$rta->dataPaso8Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso8,$year);
			$rta->dataPaso8Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso8,$year);
			$rta->dataPaso8Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso8,$year);
			$rta->dataPaso8Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso8,$year);
			
			$rta->dataPaso9Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso9,$year);
			$rta->dataPaso9Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso9,$year);
			$rta->dataPaso9Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso9,$year);
			$rta->dataPaso9Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso9,$year);
			
			$rta->dataPaso10Trimestre1 = $this->calcularCumplimientoPasos("primer",$idHospital,$arrPaso10,$year);
			$rta->dataPaso10Trimestre2 = $this->calcularCumplimientoPasos("segundo",$idHospital,$arrPaso10,$year);
			$rta->dataPaso10Trimestre3 = $this->calcularCumplimientoPasos("tercero",$idHospital,$arrPaso10,$year);
			$rta->dataPaso10Trimestre4 = $this->calcularCumplimientoPasos("cuarto",$idHospital,$arrPaso10,$year);

		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;


	}

	public function listarDetalleEnvase($idFrasco)
	{  
 	
		$date = date('Y-m-d H:i:s');
		$query = "SELECT cr.nombre,cr.celular,cd.id_registro_blh,cd.id_frasco,cd.cantidad,cd.fecha_extraccion,cd.recoleccionEn,cd.tipoLeche 
		FROM core__donacion_blh_sala cd 
		INNER JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh where id_frasco='".$idFrasco."' ";
		//echo $query;exit();
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}
	 
	 public function listarDetalleFrasco($idFrasco)
 	{  
 	
		$date = date('Y-m-d H:i:s');
		$query = "SELECT cr.nombre,cr.celular,cd.id_registro_blh,cd.id_frasco,cd.cantidad,cd.fecha_extraccion,cd.recoleccionEn,cd.tipoLeche 
		FROM core__donacion_blh_sala cd 
		INNER JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh where id_frasco='".$idFrasco."' ";
		//echo $query;exit();
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }

	 public function listarDetalleFrascoProcesado($idFrasco)
 	{  
 	
		$date = date('Y-m-d H:i:s');
		$query = "SELECT * FROM `core__procesamiento_blh` WHERE id_frasco='".$idFrasco."' ";
		//echo $query;exit();
 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }

	 public function listarFrascosBLH()
 	{  
		$perfil = $_SESSION['perfil'];
		$hospital = $_SESSION['fk_aux__hospitales'];
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,cd.fecha_creacion as fechaRegistro,cd.fk_atributos__estados as estadoFrasco, cr.nombre as nombreDonante
			FROM `core__donacion_blh_sala` cd 
			LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
            WHERE cd.fk_atributos__estados = 2";
		}
		else
		{
			$query="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,cd.fecha_creacion as fechaRegistro,cd.fk_atributos__estados as estadoFrasco, cr.nombre as nombreDonante 
			FROM `core__donacion_blh_sala` cd 
			LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
			INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios
			WHERE gu.fk_aux__hospitales =".$hospital." AND cd.fk_atributos__estados = 2";

		}

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }
	 
	 public function listarDonacionFrasco()
 	{  
		$perfil = $_SESSION['perfil'];
		$hospital = $_SESSION['fk_aux__hospitales'];
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT * FROM core__procesamiento_blh cp WHERE kcal != '' AND reuso_frasco = 'SI'";
		}
		else
		{
			$query="SELECT * FROM core__procesamiento_blh cp 
			INNER JOIN gestion__usuarios gu ON cp.creado_por = gu.id__usuarios
			WHERE gu.fk_aux__hospitales =".$hospital." AND kcal != '' AND reuso_frasco = 'SI'";

		}

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }

	 public function listarDetallePool($id)
 	{  
 	
		$date = date('Y-m-d H:i:s');
		$query = "SELECT * FROM `core__pool_blh` WHERE id_core__pool_blh=".$id;


 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }
	 public function listarFrascosPasteurizadosBLH()
 	{   
		$perfil = $_SESSION['perfil'];
		$hospital = $_SESSION['fk_aux__hospitales'];
		if ($perfil == "Administrador Sistema")
		{
			$query = "SELECT * FROM `core__pool_blh` WHERE id_core__pasteurizacion_blh IS NULL";
		}
		else
		{
			$query = "SELECT * FROM `core__pool_blh` cp 
			INNER JOIN gestion__usuarios gu ON cp.creado_por = gu.id__usuarios
			WHERE id_core__pasteurizacion_blh IS NULL AND gu.fk_aux__hospitales =".$hospital;
		}

		//echo $query;exit();


 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }
	 
	 
	 public function listarDetalleFrascoPool($idFrasco)
 	{  
		$query = "SELECT * FROM core__pool_blh WHERE id_core__pool_blh =".$idFrasco;

 		$rta = new StdClass();
		$rta->msg = '';  
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;	

	 }	 

	public function listarDonanteUnico($idDonante)
 	{ 
		$query = "SELECT r.*, m.nombre_municipio FROM core__registro_blh r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio WHERE id_registro_blh =".$idDonante;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	 }

	public function listarDonanteUnicoBlhSala($idDonante)
 	{ 
		$query = "SELECT r.*, m.nombre_municipio FROM core__registro_donantes r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio WHERE id_registro_blh =".$idDonante;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	 }

	public function listarUsuariaSalaUnica($idUsuaria)
	{ 
		$query = "SELECT r.*, m.nombre_municipio FROM core__registro_sala r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio WHERE id_core__registro_sala=".$idUsuaria;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}		

	public function listarCurvaUnica($idCurva)
	{ 

		$query = "SELECT * FROM `core__registro_curva` WHERE `id_core__registro_curva`=".$idCurva;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarEquipoUnico($idEquipo)
	{ 
		
		$query = "SELECT * FROM `core__equipos` WHERE `id_core__equipos` =".$idEquipo;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
			$rta->query = $query;
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}	
	
	public function listarDepartamentos(){

		$query = "SELECT id_departamento, nombre_departamento FROM `aux__departamentos` WHERE fk__atributos_estados =2;";

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarHospitales(){	

		$query = "SELECT * FROM `aux__hospitales`;";

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarEAPB(){	

		$query = "SELECT * FROM `aux__eapb`;";

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}

	public function listarHospitalUsuario(){	

		$idHospital = $_SESSION['fk_aux__hospitales'];
		$perfil = $_SESSION['perfil'];
		if ($perfil == "Administrador Sistema" || $perfil == "Administrador IAMII")
		{
			$query = "SELECT * FROM `aux__hospitales`";
		}
		else
		{
			$query = "SELECT * FROM `aux__hospitales` WHERE id_hospital=".$idHospital;
		}

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->query = $query;
			$rta->type = 'info';
			$rta->perfil = $_SESSION['perfil'];
			$rta->idHospital = $_SESSION['fk_aux__hospitales'];
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;
	}
	
	public function cargarDatosGenerales($idHospital)
	{
		$query = "SELECT * FROM `core__datos_generales` dg INNER JOIN aux__municipios mun ON dg.municipio = mun.id_municipio  WHERE `hospital` = ".$idHospital;

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;		
	}
	


	public function listarMunicipiosDepartamentos($idDepartamento){

		$query = "SELECT id_municipio,nombre_municipio 
				FROM `aux__municipios` mun
				inner join `aux__departamentos` dep ON mun.id_departamento = dep.id_departamento
				where dep.nombre_departamento = '".$idDepartamento."' ORDER BY id_municipio";

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}
	public function listarMunicipiosPorDepartamentos($idDepartamento){

		$query = "SELECT *
					FROM `aux__departamentos` a
					INNER JOIN `aux__instituciones` b ON ( a.nombre_departamento = b.departamento )
					WHERE nombre_departamento  ='".$idDepartamento."' GROUP BY municipio";
		//echo $query;exit();
		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;

	}
	

	public function estadisticasPorDepartamentoAplicado(){

		$query = "SELECT SUM(`9`) AS total, departamento
				FROM  `formato__trabajo_campo_ense` WHERE `estado`='activo'
				GROUP BY departamento
				ORDER BY  `total` DESC  ";

		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;				

	}


	public function estadisticaDonacionesMesBLH()
	{

		$query="SELECT COUNT(DISTINCT(id_registro_blh)) as totalDonaciones,MONTHNAME(STR_TO_DATE(MONTH(fecha_extraccion), '%m')) as mes FROM `core__procesamiento_blh` group by MONTH(fecha_extraccion)";
		
		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;		
	}

	public function estadisticaVolumenMesBLH()
	{

		$query="SELECT SUM(cantidad) as cantidad,MONTHNAME(STR_TO_DATE(MONTH(fecha_extraccion), '%m')) as mes FROM `core__procesamiento_blh` GROUP by MONTH(fecha_extraccion)";
		
		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;		
	}

	public function volumentLechePasteurizadaAdministradaBLH()
	{

		$query="SELECT SUM(volumen) as cantidad,MONTHNAME(STR_TO_DATE(MONTH(fecha_creacion), '%m')) as mes FROM `core__pasteurizacion_blh` GROUP BY fecha_creacion";
		
		$rta = new StdClass();
		$rta->msg = '';
		try{
			$rta->data = Database::ejecutarQuerySelect($query);
			$rta->type = 'info';
		}catch(Exception $ex){
			$rta->type = 'error';
			$rta->msg = $ex->getMessage().'('.$ex->getCode().')';
		}
		return $rta;		
	}


	private function adicionarPorcentaje(&$arrEncuestas){
		$arrCuentan = array("salon","grado","subregion","departamento","institucion","municipio","p1","p2","p3","p4","p5","p6","p7","p8","p9","p10","p11","p12","p13","p14","p15","p16","p17","p18","p19","p20","p21","p22","p23","p24","p25","p26","p27","p28","p30","p31","p32","p33","p34","p35","p36","p37","p38","p39","p40","p41","p42","p43","p44","p45","p46","p47","p48","p49","p50","p51","p52","p53","p54","p55","p56","p57","p58","p59","p60","p61","p62","p63");		
		$totalCampos = count($arrCuentan);
		foreach ($arrEncuestas as $numReg=>$registro) {
			$respondidas = 0;
			foreach ($registro as $key=>$valCampo){				
				if(in_array($key,$arrCuentan))
					if(!is_null($valCampo) && ($valCampo != "" || $valCampo !=null)){
						$respondidas++;
					}
			}

			$arrEncuestas[$numReg]->{'id'} = $arrEncuestas[$numReg]->{'id__encuestas'};
			unset($arrEncuestas[$numReg]->{'id__encuestas'});
			$arrEncuestas[$numReg]->{'porcentaje'} = number_format($respondidas*100/$totalCampos, 0);
		}
	}
}