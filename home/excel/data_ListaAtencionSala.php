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
include_once('../../php/classes/Classes.php');


if ($perfil == "Administrador Sistema")
{
    $query = "SELECT cd.id_core__atencion_sala,ae.nombre as  estadoAtencion,cr.nombre,cr.documento,cr.fecha_parto,cd.fecha_atencion,cd.hora_llegada,cd.hora_salida,cd.atencion_prestada,
    cd.tipo_extraccion,cd.tipoLeche,cd.cantidad,cd.destino_leche,cd.observaciones,gu.nombre as responsableAtencion, cd.accion,ae.nombre as estadoAtencion,cd.responsable_accion,cd.fecha_accion,hosp.nombre_hospital,hosp.id_hospital,DATEDIFF(NOW(),cd.fecha_atencion) as DiasExtraccion
                FROM core__atencion_sala cd 
                LEFT JOIN core__registro_sala cr ON cd.id_core__registro_sala = cr.id_core__registro_sala 
                INNER JOIN atributos__estados ae ON ae.id__estados = cd.fk_atributos__estados 
                INNER JOIN gestion__usuarios gu ON gu.id__usuarios = cd.creado_por
                INNER JOIN aux__hospitales hosp ON gu.fk_aux__hospitales = hosp.id_hospital AND fecha_atencion >= DATE_SUB(NOW(),INTERVAL 1 YEAR)";
}
else
{
    $query = " SELECT cd.id_core__atencion_sala,ae.nombre as  estadoAtencion,cr.nombre,cr.documento,cr.fecha_parto,cd.fecha_atencion,cd.hora_llegada,cd.hora_salida,cd.atencion_prestada,
                cd.tipo_extraccion,cd.tipoLeche,cd.cantidad,cd.destino_leche,cd.observaciones,gu.nombre as responsableAtencion, cd.accion,ae.nombre as estadoAtencion,cd.responsable_accion,cd.fecha_accion,hosp.nombre_hospital,hosp.id_hospital,DATEDIFF(NOW(),cd.fecha_atencion) as DiasExtraccion
                FROM core__atencion_sala cd 
                LEFT JOIN core__registro_sala cr ON cd.id_core__registro_sala = cr.id_core__registro_sala 
                INNER JOIN atributos__estados ae ON ae.id__estados = cd.fk_atributos__estados 
                INNER JOIN gestion__usuarios gu ON gu.id__usuarios = cd.creado_por
                INNER JOIN aux__hospitales hosp ON gu.fk_aux__hospitales = hosp.id_hospital
               WHERE gu.fk_aux__hospitales = '".$hospital."' AND fecha_atencion >= DATE_SUB(NOW(),INTERVAL 1 YEAR)";
}
  //  echo $query;exit();

try{
    $dataAtenciones = Database::ejecutarQuerySelectVerificacion($query);  
}catch(Exception $ex){
    echo  'error generando reporte';
}  
  

//print_r($dataAtenciones);
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
$objPHPExcel->getActiveSheet()->setCellValue('D1','FECHA PARTO');
$objPHPExcel->getActiveSheet()->setCellValue('E1','FECHA DE ATENCION');
$objPHPExcel->getActiveSheet()->setCellValue('F1','HORA DE LLEGADA');
$objPHPExcel->getActiveSheet()->setCellValue('G1','HORA DE SALIDA');
$objPHPExcel->getActiveSheet()->setCellValue('H1','ATENCION PRESTADA');
$objPHPExcel->getActiveSheet()->setCellValue('I1','TIPO DE EXTRACCION');
$objPHPExcel->getActiveSheet()->setCellValue('J1','TIPO DE LECHE');
$objPHPExcel->getActiveSheet()->setCellValue('K1','CANTIDAD');
$objPHPExcel->getActiveSheet()->setCellValue('L1','DESTINO LECHE');
$objPHPExcel->getActiveSheet()->setCellValue('M1','OBSERVACIONES');
$objPHPExcel->getActiveSheet()->setCellValue('N1','RESPONSABLE ATENCION');
$objPHPExcel->getActiveSheet()->setCellValue('O1','ACCION REALIZADA');
$objPHPExcel->getActiveSheet()->setCellValue('P1','DIAS DE EXTRACCION');
$objPHPExcel->getActiveSheet()->setCellValue('Q1','RESPONSABLE ACCION');
$objPHPExcel->getActiveSheet()->setCellValue('R1','FECHA ACCION');
$objPHPExcel->getActiveSheet()->setCellValue('S1','ESTADO ATENCION');
$objPHPExcel->getActiveSheet()->setCellValue('T1','HOSPITAL');



$j=2;
for ($i=0; $i < count($dataAtenciones); $i++) { 

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
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataAtenciones[$i]['id_core__atencion_sala']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataAtenciones[$i]['nombre']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataAtenciones[$i]['documento']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataAtenciones[$i]['fecha_parto']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataAtenciones[$i]['fecha_atencion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataAtenciones[$i]['hora_llegada']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataAtenciones[$i]['hora_salida']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataAtenciones[$i]['atencion_prestada']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataAtenciones[$i]['tipo_extraccion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataAtenciones[$i]['tipoLeche']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataAtenciones[$i]['cantidad']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataAtenciones[$i]['destino_leche']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataAtenciones[$i]['observaciones']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataAtenciones[$i]['responsableAtencion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataAtenciones[$i]['accion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataAtenciones[$i]['DiasExtraccion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataAtenciones[$i]['responsable_accion']);  
    $objPHPExcel->getActiveSheet()->setCellValue($cell18, $dataAtenciones[$i]['fecha_accion']);    
    $objPHPExcel->getActiveSheet()->setCellValue($cell19, $dataAtenciones[$i]['estadoAtencion']);    
    $objPHPExcel->getActiveSheet()->setCellValue($cell20, $dataAtenciones[$i]['nombre_hospital']);  
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Listado Atenciones Sala');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Listado Atenciones Sala.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
