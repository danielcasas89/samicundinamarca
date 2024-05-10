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
                $query = "SELECT numEncuesta, a.subregion, a.departamento, a.municipio, nombre_sede, grado, salon, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, p11, p12, p13, p14, p15, p16, p17, p18, p19, p20, p21, p22, p23, p24, p25, p26, p27, p28, p29, p30, p31, p32, p33, p34, p35, p36, p37, p38, p39, p40, p41, p42, p43, p44, p45, p46, p47, p48, p49, p50, p51, p52, p53, p54, p55, p56, p57, p58, p59, p60, p61, p62, p63
                    FROM `core__encuestas` a
                    INNER JOIN `aux__instituciones` b ON a.institucion = b.id_aux__instituciones";
                break;
            default: 
                break;  
        } 


try{

    $dataEncuesta = Database::ejecutarQuerySelectVerificacion($query);  
   
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
$objPHPExcel->getProperties()->setCreator("Ing Daniel Casas Arcila")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");



// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '')
            ->setCellValue('B2', '!')
            ->setCellValue('C1', '')
            ->setCellValue('D2', '');


// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', '');
          

            
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'NUMERO DE ENCUESTA'); 
$objPHPExcel->getActiveSheet()->setCellValue('B1','SUBREGION'); 
$objPHPExcel->getActiveSheet()->setCellValue('C1','DEPARTAMENTO'); 
$objPHPExcel->getActiveSheet()->setCellValue('D1','MUNICIPIO'); 
$objPHPExcel->getActiveSheet()->setCellValue('E1','INSTITUCION'); 
$objPHPExcel->getActiveSheet()->setCellValue('G1','GRADO'); 
$objPHPExcel->getActiveSheet()->setCellValue('H1','SALON'); 
$objPHPExcel->getActiveSheet()->setCellValue('I1','P1');  
$objPHPExcel->getActiveSheet()->setCellValue('J1','P2'); 
$objPHPExcel->getActiveSheet()->setCellValue('K1','P3'); 
$objPHPExcel->getActiveSheet()->setCellValue('L1','P4'); 
$objPHPExcel->getActiveSheet()->setCellValue('M1','P5'); 
$objPHPExcel->getActiveSheet()->setCellValue('N1','P6'); 
$objPHPExcel->getActiveSheet()->setCellValue('O1','P7'); 
$objPHPExcel->getActiveSheet()->setCellValue('P1','P8'); 
$objPHPExcel->getActiveSheet()->setCellValue('Q1','P9'); 
$objPHPExcel->getActiveSheet()->setCellValue('R1','P10'); 
$objPHPExcel->getActiveSheet()->setCellValue('S1','P11'); 
$objPHPExcel->getActiveSheet()->setCellValue('T1','P12'); 
$objPHPExcel->getActiveSheet()->setCellValue('U1','P13'); 
$objPHPExcel->getActiveSheet()->setCellValue('V1','P14'); 
$objPHPExcel->getActiveSheet()->setCellValue('W1','P15'); 
$objPHPExcel->getActiveSheet()->setCellValue('X1','P16'); 
$objPHPExcel->getActiveSheet()->setCellValue('Y1','P17'); 
$objPHPExcel->getActiveSheet()->setCellValue('Z1','P18'); 
$objPHPExcel->getActiveSheet()->setCellValue('AA1','P19'); 
$objPHPExcel->getActiveSheet()->setCellValue('AB1','P20'); 
$objPHPExcel->getActiveSheet()->setCellValue('AC1','P21'); 
$objPHPExcel->getActiveSheet()->setCellValue('AD1','P22'); 
$objPHPExcel->getActiveSheet()->setCellValue('AE1','P23'); 
$objPHPExcel->getActiveSheet()->setCellValue('AF1','P24'); 
$objPHPExcel->getActiveSheet()->setCellValue('AG1','P25'); 
$objPHPExcel->getActiveSheet()->setCellValue('AH1','P26'); 
$objPHPExcel->getActiveSheet()->setCellValue('AI1','P27'); 
$objPHPExcel->getActiveSheet()->setCellValue('AJ1','P28'); 
$objPHPExcel->getActiveSheet()->setCellValue('AK1','P29'); 
$objPHPExcel->getActiveSheet()->setCellValue('AL1','P30'); 
$objPHPExcel->getActiveSheet()->setCellValue('AM1','P31'); 
$objPHPExcel->getActiveSheet()->setCellValue('AN1','P32'); 
$objPHPExcel->getActiveSheet()->setCellValue('AO1','P33'); 
$objPHPExcel->getActiveSheet()->setCellValue('AP1','P34'); 
$objPHPExcel->getActiveSheet()->setCellValue('AQ1','P35'); 
$objPHPExcel->getActiveSheet()->setCellValue('AR1','P36'); 
$objPHPExcel->getActiveSheet()->setCellValue('AS1','P37'); 
$objPHPExcel->getActiveSheet()->setCellValue('AT1','P38'); 
$objPHPExcel->getActiveSheet()->setCellValue('AU1','P39'); 
$objPHPExcel->getActiveSheet()->setCellValue('AV1','P40'); 
$objPHPExcel->getActiveSheet()->setCellValue('AW1','P41'); 
$objPHPExcel->getActiveSheet()->setCellValue('AX1','P42'); 
$objPHPExcel->getActiveSheet()->setCellValue('AY1','P43'); 
$objPHPExcel->getActiveSheet()->setCellValue('AZ1','P44'); 
$objPHPExcel->getActiveSheet()->setCellValue('BA1','P45'); 
$objPHPExcel->getActiveSheet()->setCellValue('BB1','P46'); 
$objPHPExcel->getActiveSheet()->setCellValue('BC1','P47'); 
$objPHPExcel->getActiveSheet()->setCellValue('BD1','P48'); 
$objPHPExcel->getActiveSheet()->setCellValue('BE1','P49'); 
$objPHPExcel->getActiveSheet()->setCellValue('BF1','P50'); 
$objPHPExcel->getActiveSheet()->setCellValue('BG1','P51'); 
$objPHPExcel->getActiveSheet()->setCellValue('BH1','P52'); 
$objPHPExcel->getActiveSheet()->setCellValue('BI1','P53'); 
$objPHPExcel->getActiveSheet()->setCellValue('BJ1','P54'); 
$objPHPExcel->getActiveSheet()->setCellValue('BK1','P55'); 
$objPHPExcel->getActiveSheet()->setCellValue('BL1','P56'); 
$objPHPExcel->getActiveSheet()->setCellValue('BM1','P57'); 
$objPHPExcel->getActiveSheet()->setCellValue('BN1','P58'); 
$objPHPExcel->getActiveSheet()->setCellValue('BO1','P59'); 
$objPHPExcel->getActiveSheet()->setCellValue('BP1','P60'); 
$objPHPExcel->getActiveSheet()->setCellValue('BQ1','P61'); 
$objPHPExcel->getActiveSheet()->setCellValue('BR1','P62'); 
$objPHPExcel->getActiveSheet()->setCellValue('BS1','P63'); 

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
    $cell26 = 'Z'.$j; 
    $cell27 = 'AA'.$j; 
    $cell28 = 'AB'.$j; 
    $cell29 = 'AC'.$j; 
    $cell30 = 'AD'.$j; 
    $cell31 = 'AE'.$j; 
    $cell32 = 'AF'.$j; 
    $cell33 = 'AG'.$j; 
    $cell34 = 'AH'.$j; 
    $cell35 = 'AI'.$j; 
    $cell36 = 'AJ'.$j; 
    $cell37 = 'AK'.$j; 
    $cell38 = 'AL'.$j; 
    $cell39 = 'AM'.$j; 
    $cell40 = 'AN'.$j; 
    $cell41 = 'AO'.$j;
    $cell42 = 'AP'.$j;
    $cell43 = 'AQ'.$j;
    $cell44 = 'AR'.$j;
    $cell45 = 'AS'.$j;
    $cell46 = 'AT'.$j;
    $cell47 = 'AU'.$j;
    $cell48 = 'AV'.$j;
    $cell49 = 'AW'.$j;
    $cell50 = 'AX'.$j;
    $cell51 = 'AY'.$j;
    $cell52 = 'AZ'.$j;
    $cell53 = 'BA'.$j;
    $cell54 = 'BB'.$j;
    $cell55 = 'BC'.$j;
    $cell56 = 'BD'.$j;
    $cell57 = 'BE'.$j;
    $cell58 = 'BF'.$j;
    $cell59 = 'BG'.$j; 
    $cell60 = 'BH'.$j;
    $cell61 = 'BI'.$j;
    $cell62 = 'BJ'.$j;    
    $cell63 = 'BK'.$j;  
    $cell64 = 'BL'.$j;  
    $cell65 = 'BM'.$j;  
    $cell66 = 'BN'.$j;  
    $cell67 = 'BO'.$j;  
    $cell68 = 'BP'.$j;  
    $cell69 = 'BQ'.$j;  
    $cell70 = 'BR'.$j;  
    $cell71 = 'BS'.$j;  
    $objPHPExcel->getActiveSheet()->setCellValue($cell1, $dataEncuesta[$i]['numEncuesta']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell2, $dataEncuesta[$i]['subregion']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell3, $dataEncuesta[$i]['departamento']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell4, $dataEncuesta[$i]['municipio']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell5, $dataEncuesta[$i]['nombre_sede']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell6, $dataEncuesta[$i]['grado']); 
    $objPHPExcel->getActiveSheet()->setCellValue($cell7, $dataEncuesta[$i]['salon']); 	
    $objPHPExcel->getActiveSheet()->setCellValue($cell8, $dataEncuesta[$i]['p1']);   
    $objPHPExcel->getActiveSheet()->setCellValue($cell9, $dataEncuesta[$i]['p2']);    
    $objPHPExcel->getActiveSheet()->setCellValue($cell10, $dataEncuesta[$i]['p3']);        
    $objPHPExcel->getActiveSheet()->setCellValue($cell11, $dataEncuesta[$i]['p4']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell12, $dataEncuesta[$i]['p5']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell13, $dataEncuesta[$i]['p6']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell14, $dataEncuesta[$i]['p7']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell15, $dataEncuesta[$i]['p8']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell16, $dataEncuesta[$i]['p9']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell17, $dataEncuesta[$i]['p10']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell18, $dataEncuesta[$i]['p11']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell19, $dataEncuesta[$i]['p12']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell20, $dataEncuesta[$i]['p13']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell21, $dataEncuesta[$i]['p14']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell22, $dataEncuesta[$i]['p15']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell23, $dataEncuesta[$i]['p16']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell24, $dataEncuesta[$i]['p17']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell25, $dataEncuesta[$i]['p18']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell26, $dataEncuesta[$i]['p19']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell27, $dataEncuesta[$i]['p20']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell28, $dataEncuesta[$i]['p21']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell29, $dataEncuesta[$i]['p22']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell30, $dataEncuesta[$i]['p23']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell31, $dataEncuesta[$i]['p24']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell32, $dataEncuesta[$i]['p25']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell33, $dataEncuesta[$i]['p26']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell34, $dataEncuesta[$i]['p27']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell35, $dataEncuesta[$i]['p28']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell36, $dataEncuesta[$i]['p29']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell37, $dataEncuesta[$i]['p30']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell38, $dataEncuesta[$i]['p31']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell39, $dataEncuesta[$i]['p32']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell40, $dataEncuesta[$i]['p33']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell41, $dataEncuesta[$i]['p34']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell42, $dataEncuesta[$i]['p35']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell43, $dataEncuesta[$i]['p36']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell44, $dataEncuesta[$i]['p37']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell45, $dataEncuesta[$i]['p38']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell46, $dataEncuesta[$i]['p39']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell47, $dataEncuesta[$i]['p40']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell48, $dataEncuesta[$i]['p41']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell49, $dataEncuesta[$i]['p42']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell50, $dataEncuesta[$i]['p43']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell51, $dataEncuesta[$i]['p44']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell52, $dataEncuesta[$i]['p45']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell53, $dataEncuesta[$i]['p46']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell54, $dataEncuesta[$i]['p47']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell55, $dataEncuesta[$i]['p48']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell56, $dataEncuesta[$i]['p49']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell57, $dataEncuesta[$i]['p50']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell58, $dataEncuesta[$i]['p51']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell59, $dataEncuesta[$i]['p52']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell60, $dataEncuesta[$i]['p53']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell61, $dataEncuesta[$i]['p54']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell62, $dataEncuesta[$i]['p55']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell63, $dataEncuesta[$i]['p56']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell64, $dataEncuesta[$i]['p57']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell65, $dataEncuesta[$i]['p58']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell66, $dataEncuesta[$i]['p59']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell67, $dataEncuesta[$i]['p60']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell68, $dataEncuesta[$i]['p61']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell69, $dataEncuesta[$i]['p62']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell70, $dataEncuesta[$i]['p63']);     
    $objPHPExcel->getActiveSheet()->setCellValue($cell71, $dataEncuesta[$i]['p64']);  
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

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('BASE DE DATOS ENSE');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="BASE DE DATOS ENSE.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
