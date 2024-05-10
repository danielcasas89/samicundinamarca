<?php
session_start();

$idUsuario = $_SESSION['login_sesion'];
$perfil = $_SESSION['perfil'];

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('America/Bogota');
ini_set('memory_limit', '-1');
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
include_once('../php/classes/Database.php');
include_once('../php/classes/Encuesta.php');




switch($_SESSION['perfil']){    
            case 'MSPS':  
            case 'Supervisor Verificacion':
            case 'Director General':                
                $query = "SELECT *, a.departamento AS Departamento
                            FROM `formato__conteo_encuestas` a
                            LEFT JOIN `aux__instituciones2017` b ON a.institucion_educativa = b.id_aux__instituciones
                            LEFT JOIN `gestion__usuarios` c ON a.supervisor = c.id__usuarios WHERE  `id_formato__conteo_encuestas` >4720";
                break;
            case 'verificador':
                $query = "SELECT *, a.departamento AS Departamento
                            FROM `formato__conteo_encuestas` a
                            LEFT JOIN `aux__instituciones2017` b ON a.institucion_educativa = b.id_aux__instituciones
                            LEFT JOIN `gestion__usuarios` c ON a.supervisor = c.id__usuarios WHERE verificador = '".$idUsuario."' AND `id_formato__conteo_encuestas` >4720";
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
            ->setCellValue('A4', '');
        

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NUMERO DE FORMATO'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','FECHA REVISION'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','SUBREGION'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1','DEPARTAMENTO'); 
$objPHPExcel->getActiveSheet()->setCellValue('E1','MUNICIPIO'); 
$objPHPExcel->getActiveSheet()->setCellValue('F1','INSTITUCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','GRADO'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','SALON'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','SUPERVISOR'); 
$objPHPExcel->getActiveSheet()->setCellValue('J1','ENCUESTAS RELACIONADAS'); 
$objPHPExcel->getActiveSheet()->setCellValue('K1','ENCUESTAS CONTEO'); 
$objPHPExcel->getActiveSheet()->setCellValue('L1','TIPO DE ENCUESTA'); 
$objPHPExcel->getActiveSheet()->setCellValue('M1','VERIFICADOR'); 

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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['id_formato__conteo_encuestas']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['fecha_aplicacion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['subregion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['Departamento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['municipio']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['nombre_sede']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['grado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['salon']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['nombre']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['encuestas_relacionadas']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['encuestas_conteo']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['tipo_encuesta']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['verificador']);
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Formato Conteo Encuestas');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DatosFormato Conteo Encuestas.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
