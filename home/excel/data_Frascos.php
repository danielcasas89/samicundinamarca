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
include_once('../../php/classes/Encuesta.php');


$query = "SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,cd.fecha_creacion as fechaRegistro FROM `core__donacion_blh` cd LEFT JOIN core__registro_blh cr ON cd.id_registro_blh = cr.id_registro_blh ORDER BY `DiasExtraccion` ASC";
//echo $query;exit();

$perfil = $_SESSION['perfil'];
$hospital = $_SESSION['fk_aux__hospitales'];
if ($perfil == "Administrador Sistema")
{
    $consulta="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,cd.fecha_creacion as fechaRegistro,
    cd.fk_atributos__estados as estadoFrasco, 
    cr.nombre as nombreDonante,
    gu.nombre as ResponsableRegistroDonacion
    FROM `core__donacion_blh_sala` cd 
    LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh    
    INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios";
}
else
{
    $consulta="SELECT *, DATEDIFF(NOW(),cd.fecha_extraccion) as DiasExtraccion,
    cd.fecha_creacion as fechaRegistro,cd.fk_atributos__estados as estadoFrasco, 
    cr.nombre as nombreDonante,gu.nombre as ResponsableRegistroDonacion
    FROM `core__donacion_blh_sala` cd 
    LEFT JOIN core__registro_donantes cr ON cd.id_registro_blh = cr.id_registro_blh
    INNER JOIN gestion__usuarios gu ON cd.creado_por = gu.id__usuarios
    WHERE gu.fk_aux__hospitales =".$hospital;



}


try{
    $dataEncuesta = Database::ejecutarQuerySelectVerificacion($consulta);  
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

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID FASCO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','FECHA REGISTRO'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','NOMBRE DONANTE');
$objPHPExcel->getActiveSheet()->setCellValue('D1','TELEFONO');  
$objPHPExcel->getActiveSheet()->setCellValue('E1','FECHA EXTRACCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','CANTIDAD');  
$objPHPExcel->getActiveSheet()->setCellValue('G1','LUGAR RECEPCIÓN'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','FECHA RECEPCIÓN'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','DIAS');  
$objPHPExcel->getActiveSheet()->setCellValue('J1','TIPO LECHE'); 
$objPHPExcel->getActiveSheet()->setCellValue('K1','RESPONSABLE REGISTRO DONACION'); 
$objPHPExcel->getActiveSheet()->setCellValue('L1','ACCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('M1','RESPONSABLE ACCION'); 



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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['id_frasco']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['fecha_creacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['nombreDonante']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['telefono']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['fecha_extraccion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['cantidad']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['recoleccionEn']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['fecha_recepcion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['DiasExtraccion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['tipoLeche']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['ResponsableRegistroDonacion']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['accion']);   
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['responsable_accion']);   

    
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
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Listado Frascos BLH');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Frascos BLH.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
