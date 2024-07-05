<?php

session_start();

$idUsuario = $_SESSION['login_sesion'];
$perfil = $_SESSION['perfil'];


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
include_once('../../php/classes/Classes.php');


$query = "SELECT r.*,m.*,a.nombre as nombre_estado FROM core__registro_blh r LEFT JOIN aux__municipios m ON r.municipio = m.id_municipio INNER JOIN atributos__estados a ON r.fk_atributos__estados = a.id__estados ORDER BY `r`.`fk_atributos__estados` ASC ";
//echo $query;exit();

try{
    $dataEncuesta = Database::ejecutarQuerySelectVerificacion($query);  
}catch(Exception $ex){
    echo  'error generando reporte';
}  
  

//print_r($dataEncuesta);
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
$objPHPExcel->getActiveSheet()->setCellValue('E1','EDAD'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','TELEFONO'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','CELULAR'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','DIRECCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','DEPARTAMENTO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('J1','MUNICIPIO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('K1','PROFESION'); 	
$objPHPExcel->getActiveSheet()->setCellValue('L1','PESO BEBE'); 	
$objPHPExcel->getActiveSheet()->setCellValue('M1','NOMBRE HIJO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('N1','CONTROL PRENATAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('O1','TIPO EPS'); 	
$objPHPExcel->getActiveSheet()->setCellValue('P1','CONTROL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('Q1','PESO INICIAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('R1','PESO FINAL'); 	
$objPHPExcel->getActiveSheet()->setCellValue('S1','TALLA'); 	
$objPHPExcel->getActiveSheet()->setCellValue('T1','PARTO'); 	
$objPHPExcel->getActiveSheet()->setCellValue('U1','SEMANAS'); 	
$objPHPExcel->getActiveSheet()->setCellValue('V1','FECHA PARTO'); 
$objPHPExcel->getActiveSheet()->setCellValue('W1','ESTADO DONANTE');  

$j=2;
for ($i=0; $i < count($dataEncuesta); $i++) { 

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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['id_registro_blh']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['nombre']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['documento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['fecha_nacimiento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['edad']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['telefono']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['celular']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['direccion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['departamento']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['nombre_municipio']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['profesion']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['pesoBebe']);	  
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['nombreHijo']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataEncuesta[$i]['controlPrenatal']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataEncuesta[$i]['tipoIps']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataEncuesta[$i]['control']);  		
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataEncuesta[$i]['pesoInicial']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell18, $dataEncuesta[$i]['pesoFinal']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell19, $dataEncuesta[$i]['talla']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell20, $dataEncuesta[$i]['parto']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell21, $dataEncuesta[$i]['semanas']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell22, $dataEncuesta[$i]['fecha_parto']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell23, $dataEncuesta[$i]['nombre_estado']); 	
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Listado Donantes BLH');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Donantes BLH.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
