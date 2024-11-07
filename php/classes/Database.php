<?php
class Database{
	static $mysqli = null;

	static $tables = array(
			//'core__encuestas'=>array('estado','creado_por','fecha_creacion','modificado_por','fecha_modificacion','latitud','longitud','eps','ips','lugar','sector','p1','p2','p3','p4','p5','p6','p7','p8','p9','p10','p11','p12','p13','p14','p15','p16','p17','p18','p19','p20','p21','p22','p23','p24','p25','p26_1','p27','p28','p30','p31','p32','p33','p34','p35','p36','p37','p38','p39','p40','p41','p42','p43','p44','p45','p46','p47','p48','p49','p50','p51','p52','p53','p54','p55','p56','p57','p58','p26_2','p26_3','p26_4','p26_5','p59'),
			'gestion__usuarios'=>array("id__usuarios","login","password","fk_gestion__perfiles","ultimo_acceso","fk_atributos__estados","creado_por_i","fecha_creacion_i","modificado_por_i","fecha_modificacion_i","observaciones", "fk_gestion__usuarios"),
			'aux__instituciones'=>array('id__aux_instituciones', 'nombre_institucion', 'sede_institucion')
		);
	static $types = array(
			'gestion__usuarios'=>array("number","text","text","number","number","number","number","number","number","number","number","text", "number"),
			'aux__instituciones'=>array('number', 'text', 'text')
		);


	/*NOS CONECTAMOS SI ES NECESARIO*/
	static function conectar(){
		if(is_null(static::$mysqli)){
			static::$mysqli =
				new mysqli("localhost", "admin_sami", "15demarzoDc5051", "sami_db");
				//new mysqli("localhost", "cedetes_lact_u", "C3d3T35", "cedetes_lactancia");
				static::$mysqli->set_charset("utf8");
			if (static::$mysqli->connect_errno) {
				static::$mysqli = null;
				throw new Exception("No ha sido posible conectarse a la base de datos (" .
					static::$mysqli->connect_errno . ") " . static::$mysqli->connect_error);
			}
		}
	}
	/*DESCONEXION*/
	static function desconectar(){
		if(!is_null(static::$mysqli)){
			static::$mysqli->close();
			static::$mysqli = null;
		}
	}


	/*EJECUTA UN UPDATE Y RETORNA EL NUMERO DE FILAS AFECTADAS*/
	static function ejecutarUpdate($table, $object){

		if(!isset($object['id'])){
			throw new Exception("El atributo id no existe y es obligatorio.", 1666);
		}

		$partsTable = explode('__', $table);
		$id =$object['id'];
		unset($object['id']);

		static::conectar();
		$set = array();
		foreach ($object as $nameField => $value) {
			if(in_array( $nameField, static::$tables[$table] ) ) {
				if(is_null($value) || $value == ''){
					$set[] = '`'.$nameField."` = NULL";
				}else{
					$set[] = '`'.$nameField."` = '".static::$mysqli->real_escape_string($value)."'";
				}
			}
		}

		$query = "UPDATE `sami_db`.`".$table."` SET ".implode(",", $set)." WHERE `".$table."`.`id__".$partsTable[1]."` = ".$id.";";
		//echo $query;exit();
		if(static::$mysqli->query($query)){
			return static::$mysqli->affected_rows;
		}else{
			throw new Exception("La actualización no se ejecutó de manera correcta. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}
	}

	/*EJECUTA UN INSERT Y RETORNA EL ID GENERADO SI ES Q SE GENERÓ*/
	static function ejecutarInsert($table, $object){
		static::conectar();
		$values = array();
		$fields = array();
		foreach ($object as $nameField => $value) {
			if(in_array( $nameField, static::$tables[$table] ) ) {
				$fields[] = $nameField;
				$values[] = static::$mysqli->real_escape_string($value);
			}
		}
		$query = "INSERT INTO `sami_db`.`".$table."` (`".implode('`,`', $fields)."`) VALUES ('".implode("','", $values)."');";
		if(static::$mysqli->query($query)){
			return static::$mysqli->insert_id;
		}else{
			throw new Exception("La inserción no se ejecutó de manera correcta. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}
	}

	/*EJECUTA UN INSERT Y RETORNA EL ID GENERADO SI ES Q SE GENERÓ*/
	static function ejecutarInsertJson($table, $object){
		static::conectar();
		$values = array();
		$fields = array();
		$dataDecoded=json_encode($object);
		foreach ($object as $nameField => $value) {
			if(in_array( $nameField, static::$tables[$table] ) ) {
				$fields[] = $nameField;
				$values[] = static::$mysqli->real_escape_string($value);
			}
		}
		$query = "INSERT INTO `sami_db`.`".$table."` (`data`,`nombre`,`perfil`,`fecha`) VALUES ('".$dataDecoded."','".$_SESSION['login_sesion']."','".$_SESSION['perfil']."',now());";

		if(static::$mysqli->query($query)){
			return static::$mysqli->insert_id;
		}else{
			throw new Exception("La inserción no se ejecutó de manera correcta. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}
	}


	/*EJECUTA UN INSERT Y RETORNA EL ID GENERADO SI ES Q SE GENERÓ*/
	static function ejecutarMultiInsert($table, $registros){

		static::conectar();
		$valuesCollection = array();
		$fields = static::$tables[$table];
		foreach ($registros as $object) {
			$values = array();
			//AGREGAMOS LOS CAMPOS QUE FALTAN
			foreach ($fields as $nameField) {
				if(isset($object[$nameField])){
					if(is_null($object[$nameField]) || $object[$nameField] == ''){
						$values[] = "NULL";
					}else{
						$values[] = "'".static::$mysqli->real_escape_string($object[$nameField])."'";
					}
				}else{
					$values[] = "NULL";
				}
			}
			$valuesCollection[] = "(".implode(",", $values).")";
		}

		$query = "INSERT INTO `cedetes_lactancia`.`".$table."` (`".implode('`,`', $fields)."`) VALUES ".implode(',', $valuesCollection);
		echo $query;exit();
		if(static::$mysqli->query($query)){
			return static::$mysqli->insert_id;
		}else{
			throw new Exception("La inserción no se ejecutó de manera correcta. $query (".
				static::$mysqli->errno . ") " .$query. static::$mysqli->error);
		}
	}

	/*EJECUTA UN SELECT */
	static function ejecutarSelect($table, $filter){
		$partsTable = explode('__', $table);
		$nameTablePart = $partsTable[1];

		if(isset($filter['id'])){
			$filter['id__'.$table] = $filter['id'];
			unset($filter['id']);
		}

		static::conectar();
		$where = array();

		foreach ($filter as $nameField => $value) {
			if(($indice = array_search( $nameField, static::$tables[$table] )) !== false ) {
				$where[] = "`".$nameField."` ".(static::$types[$table][$indice]=='number'?"='".static::$mysqli->real_escape_string($value)."'":" LIKE '%".static::$mysqli->real_escape_string($value)."%'");
			}
		}

		if(count($where)>0)
			$query = "SELECT * FROM `sami_db`.`".$table."` WHERE ".implode(' AND ', $where);
		else
			$query = "SELECT * FROM `sami_db`.`".$table."` WHERE 1;";

		//echo $query;
		if($result = static::$mysqli->query($query)){
			$registros = array();
			while($reg = $result->fetch_object()){
				$reg->id = $reg->{'id__'.$nameTablePart};
				unset($reg->{'id__'.$nameTablePart});
				$registros[] = $reg;
			}
			return $registros;
		}else{
			throw new Exception("La búsqueda no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}
	}


	static function ejecutarDelete($table, $filter){
		$partsTable = explode('__', $table);
		$nameTablePart = $partsTable[1];

		if(isset($filter['id'])){
			$filter['id__'.$table] = $filter['id'];
			unset($filter['id']);
		}

		static::conectar();
		$where = array();

		foreach ($filter as $nameField => $value) {
			if(($indice = array_search( $nameField, static::$tables[$table] )) !== false ) {
				$where[] = "`".$nameField."` ".(static::$types[$table][$indice]=='number'?"='".static::$mysqli->real_escape_string($value)."'":" LIKE '%".static::$mysqli->real_escape_string($value)."%'");
			}
		}
		//echo "DELETE FROM `cedetes_lactancia`.`".$table."` WHERE ".implode(' AND ', $where);
		if(count($where)>0)
			$query = "DELETE FROM `sami_db`.`".$table."` WHERE ".implode(' AND ', $where);
		else
			throw new Exception("Intento de eliminar todos los registros de tabla '".$table."'.");

		//echo $query;
		if($result = static::$mysqli->query($query)){
			return static::$mysqli->affected_rows;
		}else{
			throw new Exception("La eliminación no se ejecutó de manera correcta. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}
	}

	static function ejecutarQuerySelect($query){
		static::conectar();
		if($result = static::$mysqli->query($query)){
			$registros = array();
			while($reg = $result->fetch_object()){
				$registros[] = $reg;
			}
			//print_r($registros);
			return $registros;
		}else{
			throw new Exception("La búsqueda no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}

	static function ejecutarQueryDelete($query){
		static::conectar();
		$rta = new StdClass();
		if($result = static::$mysqli->query($query)){
			$rta->type = "info";
			return $rta;

			//return $registros;
		}else{
			throw new Exception("La búsqueda no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}

	static function ejecutarQueryNumRows($query){

		static::conectar();
		if($result = static::$mysqli->query($query)){

			$rowcount=mysqli_num_rows($result);

			return $rowcount;
		}else{
			throw new Exception("La búsqueda no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}

	static function ejecutarQuerySelectVerificacion($query){
		static::conectar();
		if($result = static::$mysqli->query($query)){
			$registros = array();
			while($reg = $result->fetch_assoc()){
				$registros[] = $reg;
			}
			//print_r($registros);
			return $registros;
		}else{
			throw new Exception("La búsqueda no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}

	static function ejecutarQueryInsert($query){
		static::conectar();
		//echo $query;exit();
		if($result = static::$mysqli->query($query)){
			return static::$mysqli->insert_id;
			//return "ok";
		}else{
			throw new Exception("La insersion no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}

	static function ejecutarMultiQueryInsert($query){
		static::conectar();
		//echo $query;exit();
		if($result = static::$mysqli->multi_query($query)){
			return "ok";
		}else{
			throw new Exception("La insersion no pudo realizarse. $query (".
				static::$mysqli->errno . ") " . static::$mysqli->error);
		}

	}


}