<?php 
session_start();

include_once('../classes/Database.php');
include_once('../classes/Encuesta.php');

$rta = null;
switch ($_REQUEST['command']) {
	case 'listarDepartamentos':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarDepartamentos();
		break;
	case 'listarHospitales':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarHospitales();
		break;
	case 'listarEAPB':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarEAPB();
		break;
	case 'listarHospitalUsuario':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarHospitalUsuario();
		break;
	case 'listarPerfiles':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarPerfiles();
		break;		
	case 'cambiarClaveActual':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->cambiarClaveActual($_REQUEST['nuevaClave'],$_REQUEST['claveActual']);
		break;
	case 'cargarDatosGenerales':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->cargarDatosGenerales($_REQUEST['idHospital']);
		break;		
	case 'actualizarClaveUsuario':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->actualizarClaveUsuario($_REQUEST['id__usuario'],$_REQUEST['clave']);
		break;		
	case 'listarDepartamentosPorSubregion':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarDepartamentosPorSubregion($_REQUEST['idSubregion']);
		break;	
	case 'listarDepartamentosPorSubregion2017':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarDepartamentosPorSubregion2017($_REQUEST['idSubregion']);
		break;				
	case 'listarMunicipiosPorDepartamentos':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarMunicipiosDepartamentos($_REQUEST['idDepartamento']);
		break;				
	case 'listarMunicipiosPorDepartamentos2017':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarMunicipiosPorDepartamentos2017($_REQUEST['idDepartamento']);
		break;
	case 'listarInstitucionesPorMunicipio':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarInstitucionesPorMunicipio($_REQUEST['idMunicipio']);
		break;	
	case 'listarInstitucionesPorMunicipio2017':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);
		$rta = $encuesta->listarInstitucionesPorMunicipio2017($_REQUEST['idMunicipio']);
		break;	
	case 'obtenerUsuarios':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->obtenerUsuarios();
		break;	
	case 'listarDonantesBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDonantesBLH();
		break;
	case 'listarDonantesBLHSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDonantesBLHSala();
		break;		
	case 'listarDonanteUnico':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDonanteUnico($_REQUEST['idDonante']);
		break;
	case 'listarDonanteUnicoBlhSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDonanteUnicoBlhSala($_REQUEST['idDonante']);
		break;
	case 'listarUsuariaSalaUnica':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarUsuariaSalaUnica($_REQUEST['idUsuaria']);
		break;
	case 'listarCurvaUnica':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarCurvaUnica($_REQUEST['idCurva']);
		break;
	case 'listarEquipoUnico':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarEquipoUnico($_REQUEST['idEquipo']);
		break;		
	case 'listarDetalleFrascoPool':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDetalleFrascoPool($_REQUEST['idFrascoPool']);
		break;
	case 'listarDetalleFrascoProcesado':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDetalleFrascoProcesado($_REQUEST['idFrasco']);
		break;
	case 'listarDetalleFrasco':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDetalleFrasco($_REQUEST['idFrasco']);
		break;	
	case 'listarDetallePool':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDetallePool($_REQUEST['id_core__pool_blh']);
		break;
	case 'actualizarEstadoPool':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->actualizarEstadoPool($_REQUEST['id_core__pool_blh'],$_REQUEST['fk_atributos__estados']);
		break;	
	case 'actualizarAccionAtencionSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->actualizarAccionAtencionSala($_REQUEST['id_core__atencion_sala'],$_REQUEST['accion']);
		break;
	case 'actualizarAccionFrascoSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->actualizarAccionFrascoSala($_REQUEST['id_core__donacion_blh'],$_REQUEST['accion']);
		break;
	case 'registrarIndicadoresBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarIndicadoresBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarEquipos':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarEquipos($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonanteBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarDonanteBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonanteBLHSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarDonanteBLHSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarUsuariaSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarUsuariaSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarCurva':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarCurva($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarUsuarioSistema':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarUsuarioSistema($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarBeneficiario':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarBeneficiario($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarFasesCanguro':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarFasesCanguro($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'actualizarBeneficiariosPool':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->actualizarBeneficiariosPool($_REQUEST['id_core__pool_blh'],$_REQUEST['values']);
		break;
	case 'registrarTemperatura':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarTemperatura($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'listarEquipos':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarEquipos();
		break;	
	case 'listarCurvas':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarCurvas();
		break;		
	case 'listarBeneficiarios':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarBeneficiarios();
		break;		
	case 'listarUsuariasSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarUsuariasSala();
		break;		
	case 'registrarAtencionSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarAtencionSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;			
	case 'registrarDonacionBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarDonacionBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;			
	case 'registrarDonacionBLHSala':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarDonacionBLHSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;	
	case 'registrarProcesamientoBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarProcesamientoBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarPoolBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarPoolBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarPasteurizacionBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarPasteurizacionBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registro_pasteurizacionNew':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registro_pasteurizacionNew($_REQUEST['tabla'],$_REQUEST['campos']);
		break;		
	case 'registrarDatosGenerales':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarDatosGenerales($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'listarFrascosBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarFrascosBLH();
		break;	
	case 'listarDonacionFrasco':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarDonacionFrasco();
		break;	
		
	case 'listarProgresoIami':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarProgresoIami($_REQUEST['hospital'],$_REQUEST['trimestre'],$_REQUEST['paso'],$_REQUEST['ano']);
		break;
	case 'listarProgresoCanguro':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarProgresoCanguro($_REQUEST['hospital'],$_REQUEST['mes']);
		break;
	case 'listarFasesCanguro':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarFasesCanguro($_REQUEST['hospital']);
		break;
	case 'listarProgresoBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarProgresoBLH($_REQUEST['hospital'],$_REQUEST['mes']);
		break;
	case 'cumplimientoIami': 
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->cumplimientoIami($_REQUEST['hospital'],$_REQUEST['year']);
		break;
	case 'cumplimientoCanguro':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->cumplimientoCanguro($_REQUEST['hospital']);
		break;
	case 'listarFrascosPasteurizadosBLH':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->listarFrascosPasteurizadosBLH();
		break;
	case 'registrarPasoIami':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarPasoIami($_REQUEST['tabla'],$_REQUEST['campos'],$_REQUEST['paso'],$_REQUEST['ano']);
		break;			
	case 'registrarIndicadorCanguro':
		$encuesta = new Encuesta();
		unset($_REQUEST['command']);		
		$rta = $encuesta->registrarIndicadorCanguro($_REQUEST['tabla'],$_REQUEST['campos']);
		break;	
	case '':
		unset($_REQUEST['command']);
		break;
	
	default:
		# code...
		break;
}
echo json_encode($rta);