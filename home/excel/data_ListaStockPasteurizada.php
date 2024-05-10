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

$perfil = $_SESSION['perfil'];
$hospital = $_SESSION['fk_aux__hospitales'];
if ($perfil == "Administrador Sistema")
{
    $consulta="SELECT *,r.fk_atributos__estados as EstadoFrasco,r.fecha_creacion as FechaFrasco FROM core__pool_blh r";
}
else
{
    $consulta="SELECT *,r.fk_atributos__estados as EstadoFrasco,r.fecha_creacion as FechaFrasco FROM core__pool_blh r 
    INNER JOIN gestion__usuarios gu ON r.creado_por = gu.id__usuarios
    WHERE  gu.fk_aux__hospitales=".$hospital;
}

//echo $consulta;exit();
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

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID FRASCO PASTEURIZADO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'CANTIDAD'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'ACIDEZ 1'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'ACIDEZ 2'); 
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ACIDEZ 3'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'MEDIA'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'RESULTADO'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'CT1'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'CT2'); 
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'CT3'); 
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'MEDIA CT'); 
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'CC1'); 
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'CC2'); 
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'CC3');
$objPHPExcel->getActiveSheet()->setCellValue('O1', 'MEDIA CC'); 
$objPHPExcel->getActiveSheet()->setCellValue('P1', 'CREMA'); 
$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'KCAL'); 


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

    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['frasco_pasteurizado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['cantidad']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['acidez1']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['acidez2']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['acidez3']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['media']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['resultado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['ct1']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['ct2']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['ct3']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['mediact']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['cc1']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['cc2']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataEncuesta[$i]['cc3']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataEncuesta[$i]['mediacc']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataEncuesta[$i]['crema']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataEncuesta[$i]['kcal']);   
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


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Lista Stock Pasteurizada BLH');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Stock Pasteurizada.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
