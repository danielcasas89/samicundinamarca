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
include_once('../php/classes/Database.php');
include_once('../php/classes/Encuesta.php');


switch($_SESSION['perfil']){    
            case 'Director General':                 
                $query = "SELECT id_formato__trabajo_campo_ense AS codigoFormatoEnse, b.subregion, b.departamento, b.municipio, b.Codigo_municipio, nombre_sede AS Institucion_Educativa, Codigo_DANE AS Codigo_DANE, grado, salon, jornada, estado_encuesta, fecha_aplicacion, observaciones,  `1` AS p1,  `2` AS p2,  `3` AS p3,  `4` AS p4,  `5` AS p5,  `6` AS p6,  `7` AS p7,  `8` AS p8,  `9` AS p9, creado_por AS supervisor, DATE_SUB( fecha_creacion, INTERVAL 5 HOUR ) AS fecha_creacion, estado
							FROM  `formato__trabajo_campo_ense` a
							INNER JOIN  `aux__instituciones2017` b ON a.institucion = b.id_aux__instituciones
							WHERE  `estado` =  'activo' ";
                break;            
            case 'MSPS':                
                $query = "SELECT id_formato__trabajo_campo_ense AS codigoFormatoEnse, b.subregion, b.departamento, b.municipio, b.Codigo_municipio, nombre_sede AS Institucion_Educativa, Codigo_DANE AS Codigo_DANE, grado, salon, jornada, estado_encuesta, fecha_aplicacion, observaciones,  `1` AS p1,  `2` AS p2,  `3` AS p3,  `4` AS p4,  `5` AS p5,  `6` AS p6,  `7` AS p7,  `8` AS p8,  `9` AS p9, creado_por AS supervisor, DATE_SUB( fecha_creacion, INTERVAL 5 HOUR ) AS fecha_creacion, estado
                            FROM `formato__trabajo_campo_ense` a
                            INNER JOIN `aux__instituciones2017` b ON a.institucion = b.id_aux__instituciones WHERE `estado`='activo' AND DATE_SUB(fecha_creacion, INTERVAL 5 HOUR) <  '2017-04-24 23:00:00' AND fecha_aplicacion!='' ";
                break;
            case 'Supervisor Operativo':
                $query = "SELECT id_formato__trabajo_campo_ense AS codigoFormatoEnse, a.subregion, a.departamento, a.municipio,b.Codigo_municipio, nombre_sede AS Institucion_Educativa, Codigo_DANE AS Codigo_DANE, grado, salon, jornada, estado_encuesta, fecha_aplicacion,observaciones, `1` AS p1, `2` AS p2, `3` AS p3, `4` AS p4, `5` AS p5, `6` AS p6, `7` AS p7, `8` AS p8, `9` AS p9, creado_por AS supervisor,DATE_SUB(fecha_creacion, INTERVAL 5 HOUR) as fecha_creacion,estado
                FROM `formato__trabajo_campo_ense` a
                INNER JOIN `aux__instituciones2017` b ON a.institucion = b.id_aux__instituciones
                WHERE creado_por = '".$_SESSION['login_sesion']."' AND `estado`='activo' ORDER BY  `a`.`id_formato__trabajo_campo_ense` ASC ";
                break;
            default: 
                break;   
        } 
//echo $query;exit();

try{
    $dataEncuesta = Database::ejecutarQuerySelectVerificacion($query);  
}catch(Exception $ex){
    echo  'error generando reporte';
}  
  
//echo count($dataEncuesta);
//print_r($dataEncuesta);
//exit();

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$styleArray = array(
    'font'  => array(
        'bold'  => true
    ));



// Set document properties
$objPHPExcel->getProperties()->setCreator("Ing Daniel Casas Arcila")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");



// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');


// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'rafa');

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NUMERO DE FORMATO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','SUBREGION'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','DEPARTAMENTO');
$objPHPExcel->getActiveSheet()->setCellValue('D1','MUNICIPIO');  
$objPHPExcel->getActiveSheet()->setCellValue('E1','CODIGO MUNICIPIO'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','INSTITUCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','CODIGO DANE'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','GRADO'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','SALON'); 	
$objPHPExcel->getActiveSheet()->setCellValue('J1','JORNADA'); 	
$objPHPExcel->getActiveSheet()->setCellValue('K1','ESTADO ENCUESTA'); 	
$objPHPExcel->getActiveSheet()->setCellValue('L1','FECHA APLICACION'); 	
$objPHPExcel->getActiveSheet()->setCellValue('M1','OBSERVACIONES'); 	
$objPHPExcel->getActiveSheet()->setCellValue('N1','P1'); 	
$objPHPExcel->getActiveSheet()->setCellValue('O1','P2'); 	
$objPHPExcel->getActiveSheet()->setCellValue('P1','P3'); 	
$objPHPExcel->getActiveSheet()->setCellValue('Q1','P4'); 	
$objPHPExcel->getActiveSheet()->setCellValue('R1','P5'); 	
$objPHPExcel->getActiveSheet()->setCellValue('S1','P6'); 	
$objPHPExcel->getActiveSheet()->setCellValue('T1','P7'); 	
$objPHPExcel->getActiveSheet()->setCellValue('U1','P8'); 	
$objPHPExcel->getActiveSheet()->setCellValue('V1','P9'); 
$objPHPExcel->getActiveSheet()->setCellValue('W1','SUPERVISOR'); 
$objPHPExcel->getActiveSheet()->setCellValue('X1','FECHA CARGA');
$objPHPExcel->getActiveSheet()->setCellValue('Y1','ESTADO');  

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
    $cell24 = 'X'.$j;
    $cell25 = 'Y'.$j;
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['codigoFormatoEnse']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['subregion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['departamento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['municipio']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['Codigo_municipio']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['Institucion_Educativa']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['Codigo_DANE']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['grado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['salon']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['jornada']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['estado_encuesta']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['fecha_aplicacion']);	  
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['observaciones']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataEncuesta[$i]['p1']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataEncuesta[$i]['p2']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataEncuesta[$i]['p3']);  		
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataEncuesta[$i]['p4']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell18, $dataEncuesta[$i]['p5']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell19, $dataEncuesta[$i]['p6']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell20, $dataEncuesta[$i]['p7']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell21, $dataEncuesta[$i]['p8']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell22, $dataEncuesta[$i]['p9']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell23, $dataEncuesta[$i]['supervisor']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell24, $dataEncuesta[$i]['fecha_creacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell25, $dataEncuesta[$i]['estado']); 	
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Data Trabajo de Campo ENSE');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Data Trabajo Campo ENSE.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
