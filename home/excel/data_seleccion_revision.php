<?php
session_start();
ini_set('memory_limit', '-1'); 

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
            case 'MSPS':  
            case 'Director General':                
                $query = "SELECT *, a.departamento AS Departamento, c.nombre AS SupervisorOperativo
                            FROM `formato__seleccion_revision` a
                            LEFT JOIN `aux__instituciones` b ON a.institucion_educativa = b.id_aux__instituciones
                            LEFT JOIN `gestion__usuarios` c ON a.supervisor = c.id__usuarios";
                break;
            case 'Supervisor Verificacion':                
                $query = "SELECT *, a.departamento AS Departamento, c.nombre AS SupervisorOperativo
                            FROM `formato__seleccion_revision` a
                            LEFT JOIN `aux__instituciones` b ON a.institucion_educativa = b.id_aux__instituciones
                            LEFT JOIN `gestion__usuarios` c ON a.supervisor = c.id__usuarios";
                break;
            case 'verificador':
                $query = "SELECT *, a.departamento AS Departamento
                            FROM `formato__seleccion_revision` a
                            LEFT JOIN `aux__instituciones` b ON a.institucion_educativa = b.id_aux__instituciones
                            LEFT JOIN `gestion__usuarios` c ON a.supervisor = c.id__usuarios WHERE verificador = '".$idUsuario."'";
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
            ->setCellValue('A1', '')
            ->setCellValue('B2', '')
            ->setCellValue('C1', '')
            ->setCellValue('D2', '');


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
$objPHPExcel->getActiveSheet()->setCellValue('J1','NUMERO DE CAJA'); 
$objPHPExcel->getActiveSheet()->setCellValue('K1','NUMERO DE SOBRE');
$objPHPExcel->getActiveSheet()->setCellValue('L1','NUMERO DE ENCUESTA'); 
$objPHPExcel->getActiveSheet()->setCellValue('M1','TIPO DE ERROR');  
$objPHPExcel->getActiveSheet()->setCellValue('N1','OTRO ERROR'); 
$objPHPExcel->getActiveSheet()->setCellValue('O1','VERIFICADOR'); 

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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['id_formato__seleccion_revision']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['fecha_revison']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['subregion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['Departamento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['municipio']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['nombre_sede']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['grado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['salon']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['SupervisorOperativo']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['num_caja']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['num_sobre']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['numEncuesta']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['tipo_error']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataEncuesta[$i]['otro_error']);
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataEncuesta[$i]['verificador']);
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Formato Seleccion Revision');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="DatosFormato Seleccion Revision.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
