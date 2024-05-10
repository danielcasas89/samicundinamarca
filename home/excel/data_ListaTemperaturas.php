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
    $consulta="SELECT hosp.nombre_hospital,gu.nombre as UsuarioRegistro,ct.fecha_creacion as fechaRegistro,ct.*,ce.equipo, ce.identificacion 
    FROM core__temperaturas ct
    INNER JOIN core__equipos ce ON ct.fk_equipos = ce.id_core__equipos
    INNER JOIN gestion__usuarios gu ON ct.creado_por = gu.id__usuarios
    INNER JOIN aux__hospitales hosp ON gu.fk_aux__hospitales = hosp.id_hospital";
}
else
{
    $consulta="SELECT hosp.nombre_hospital,gu.nombre as UsuarioRegistro,ct.fecha_creacion as fechaRegistro,ct.*,ce.equipo, ce.identificacion 
    FROM core__temperaturas ct
    INNER JOIN core__equipos ce ON ct.fk_equipos = ce.id_core__equipos
    INNER JOIN gestion__usuarios gu ON ct.creado_por = gu.id__usuarios
    INNER JOIN aux__hospitales hosp ON gu.fk_aux__hospitales = hosp.id_hospital
    where gu.fk_aux__hospitales = ".$hospital;
}
//echo $consulta;exit();

try{
    $dataEncuesta = Database::ejecutarQuerySelectVerificacion($consulta);  
}catch(Exception $ex){
    echo  'error generando reporte';
}  
  



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

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID EQUIPO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','TIPO EQUIPO'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','FECHA TEMPERATURA');
$objPHPExcel->getActiveSheet()->setCellValue('D1','HORA TEMPERATURA');  
$objPHPExcel->getActiveSheet()->setCellValue('E1','TEMPERATURA ACTUAL'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','TEMPERATURA MINIMA'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','TEMPERATURA MAXIMA'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','FECHA REGISTRO'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','USUARIO REGISTRO');
$objPHPExcel->getActiveSheet()->setCellValue('J1','HOSPITAL');

$j=2;
for ($i=0; $i < count($dataEncuesta); $i++) 
{
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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['identificacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['equipo']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['fecha']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['hora']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['temp_actual']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['temp_minima']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['temp_maxima']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['fechaRegistro']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['UsuarioRegistro']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['nombre_hospital']); 
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Listado Temperaturas');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Temperaturas.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
