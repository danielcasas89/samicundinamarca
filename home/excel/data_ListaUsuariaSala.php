<?php

session_start();

$idUsuario = $_SESSION['login_sesion'];
$perfil = $_SESSION['perfil'];
$hospital = $_SESSION['fk_aux__hospitales'];



/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Bogota');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
include_once('../../php/classes/Database.php');
include_once('../../php/classes/Encuesta.php');


if ($perfil == "Administrador Sistema")
{
    $query = "SELECT r.nombre as nombreUsuaria, r.*,m.*,a.nombre as nombre_estado,gu.nombre,hosp.nombre_hospital,r.fecha_creacion as fechaRegistro 
            FROM core__registro_sala r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
            INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados 
            INNER JOIN gestion__usuarios gu ON gu.id__usuarios = r.creado_por 
            INNER JOIN aux__hospitales hosp ON hosp.id_hospital = gu.fk_aux__hospitales
            ORDER BY `r`.`fk_atributos__estados` ASC";
}
else
{
    $query = " SELECT r.nombre as nombreUsuaria, r.*,m.*,a.nombre as nombre_estado,gu.nombre,nombre_hospital,r.fecha_creacion as fechaRegistro, gu.*
               FROM core__registro_sala r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio 
               INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados 
               INNER JOIN gestion__usuarios gu ON gu.id__usuarios = r.creado_por
               INNER JOIN aux__hospitales hosp ON hosp.id_hospital = gu.fk_aux__hospitales
               WHERE gu.fk_aux__hospitales = '".$hospital."'
               ORDER BY `r`.`fk_atributos__estados` ASC";
}
    //echo $query;exit();

try{
    $dataListaUsuarias = Database::ejecutarQuerySelectVerificacion($query);  
}catch(Exception $ex){
    echo  'error generando reporte';
}  
  

//print_r($dataListaUsuarias);
//exit();

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$styleArray = array(
    'font'  => array(
        'bold'  => true
    ));



// Set document properties
$objPHPExcel->getProperties()->setCreator("Secretaria Salud Cundinamarca")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID REGISTRO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','NOMBRE'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','DOCUMENTO');
$objPHPExcel->getActiveSheet()->setCellValue('D1','FECHA NACIMIENTO'); 
$objPHPExcel->getActiveSheet()->setCellValue('E1','TIPO USUARIA'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','EDAD'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','TELEFONO'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','CELULAR'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','DIRECCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('J1','DEPARTAMENTO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('K1','MUNICIPIO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('L1','PROFESION'); 	
$objPHPExcel->getActiveSheet()->setCellValue('M1','PESO AL NACER DEL BEBE'); 	
$objPHPExcel->getActiveSheet()->setCellValue('N1','NOMBRE HIJO'); 
$objPHPExcel->getActiveSheet()->setCellValue('O1','CONTROL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('P1','LUGAR CONTROL PRENATAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('Q1','TIPO EPS'); 		
$objPHPExcel->getActiveSheet()->setCellValue('R1','PESO INICIAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('S1','PESO FINAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('T1','TALLA'); 	
$objPHPExcel->getActiveSheet()->setCellValue('U1','SEMANAS'); 	
$objPHPExcel->getActiveSheet()->setCellValue('V1','FECHA PARTO'); 
$objPHPExcel->getActiveSheet()->setCellValue('W1','ESTADO USUARIA');  
$objPHPExcel->getActiveSheet()->setCellValue('X1','USUARIO REGISTRO'); 
$objPHPExcel->getActiveSheet()->setCellValue('Y1','HOSPITAL');  
$objPHPExcel->getActiveSheet()->setCellValue('Z1','FECHA REGISTRO');  

$j=2;
for ($i=0; $i < count($dataListaUsuarias); $i++) { 

	$cell1 = 'A'.$j; 
    $cell2 = 'B'.$j; 
    $cell3 = 'C'.$j; 
    $cell4 = 'D'.$j; 
    $cell5 = 'E'.$j; 
    $cell6 = 'F'.$j; 
    $cell7 = 'G'.$j; 
    $cell8 = 'H'.$j; 
    $cell9 = 'I'.$j; 
    $cell10 = 'J'.$j;
    $cell11 = 'K'.$j; 
    $cell12 = 'L'.$j; 
    $cell13 = 'M'.$j; 
    $cell14 = 'N'.$j; 
    $cell15 = 'O'.$j;  
    $cell16 = 'P'.$j; 
    $cell17 = 'Q'.$j; 
    $cell18 = 'R'.$j; 
    $cell19 = 'S'.$j; 
    $cell20 = 'T'.$j; 
    $cell21 = 'U'.$j; 
    $cell22 = 'V'.$j;
    $cell23 = 'W'.$j;
    $cell24 = 'X'.$j;
    $cell25 = 'Y'.$j;
    $cell26 = 'Z'.$j;
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataListaUsuarias[$i]['id_core__registro_sala']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataListaUsuarias[$i]['nombreUsuaria']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataListaUsuarias[$i]['documento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataListaUsuarias[$i]['fecha_nacimiento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataListaUsuarias[$i]['tipo_usuaria']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataListaUsuarias[$i]['edad']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataListaUsuarias[$i]['telefono']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataListaUsuarias[$i]['celular']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataListaUsuarias[$i]['direccion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataListaUsuarias[$i]['departamento']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataListaUsuarias[$i]['nombre_municipio']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataListaUsuarias[$i]['profesion']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataListaUsuarias[$i]['pesoBebe']);	  
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataListaUsuarias[$i]['nombreHijo']);	
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataListaUsuarias[$i]['control']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataListaUsuarias[$i]['controlPrenatal']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataListaUsuarias[$i]['tipoIps']);   		
    $objPHPExcel->getActiveSheet()->setCellValue($cell18, $dataListaUsuarias[$i]['pesoInicial']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell19, $dataListaUsuarias[$i]['pesoFinal']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell20, $dataListaUsuarias[$i]['talla']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell21, $dataListaUsuarias[$i]['semanas']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell22, $dataListaUsuarias[$i]['fecha_parto']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell23, $dataListaUsuarias[$i]['nombre_estado']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell24, $dataListaUsuarias[$i]['nombre']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell25, $dataListaUsuarias[$i]['nombre_hospital']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell26, $dataListaUsuarias[$i]['fechaRegistro']);	 
    $j++;	
}


$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('K1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('L1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('M1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('N1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('O1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('P1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('Q1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('R1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('S1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('T1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('U1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('V1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('W1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('X1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('Y1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle('Z1')->applyFromArray($styleArray);

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Listado Usuarias Sala');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Usuarias Sala.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
