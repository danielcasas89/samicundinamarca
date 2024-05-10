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
    $consulta="SELECT hosp.nombre_hospital,ce.*, ae.nombre as estadoEquipo 
    FROM core__equipos ce 
    INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados
    INNER JOIN gestion__usuarios ge ON ge.id__usuarios = ce.creado_por
    INNER JOIN aux__hospitales hosp ON ge.fk_aux__hospitales = hosp.id_hospital";
}
else
{
    $consulta="SELECT hosp.nombre_hospital,ge.fk_aux__hospitales,ce.*, ae.nombre as estadoEquipo 
    FROM core__equipos ce 
    INNER JOIN atributos__estados ae ON ce.fk_atributos__estados = ae.id__estados
    INNER JOIN gestion__usuarios ge ON ge.id__usuarios = ce.creado_por
    INNER JOIN aux__hospitales hosp ON ge.fk_aux__hospitales = hosp.id_hospital
    where ge.fk_aux__hospitales = ".$hospital;
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

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','TIPO EQUIPO'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','MARCA');
$objPHPExcel->getActiveSheet()->setCellValue('D1','MODELO');  
$objPHPExcel->getActiveSheet()->setCellValue('E1','SERIAL'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','IDENTIFICACION'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','RESPONSABLE ACCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','FECHA ACCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','ESTADO EQUIPO');
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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['id_core__equipos']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['equipo']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['marca']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['modelo']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['serial']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['identificacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['responsable_accion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['fecha_accion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['estadoEquipo']); 
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
$objPHPExcel->getActiveSheet()->setTitle('Listado Equipos');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Equipos.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
