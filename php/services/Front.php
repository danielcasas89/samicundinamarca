<?php
session_start();

include_once('../classes/Database.php');
include_once('../classes/Classes.php');

$rta = null;
$sami = new Sami();
switch ($_REQUEST['command']) {
	case 'listarDepartamentos':
		unset($_REQUEST['command']);
		$rta = $sami->listarDepartamentos();
		break;
	case 'listarHospitales':
		unset($_REQUEST['command']);
		$rta = $sami->listarHospitales();
		break;
	case 'listarEAPB':
		unset($_REQUEST['command']);
		$rta = $sami->listarEAPB();
		break;
	case 'listarHospitalUsuario':
		unset($_REQUEST['command']);
		$rta = $sami->listarHospitalUsuario();
		break;
	case 'listarPerfiles':
		unset($_REQUEST['command']);
		$rta = $sami->listarPerfiles();
		break;
	case 'listarDatosUsuario':
		unset($_REQUEST['command']);
		$rta = $sami->listarDatosUsuario();
		break;
	case 'cambiarClaveActual':
		unset($_REQUEST['command']);
		$rta = $sami->cambiarClaveActual($_REQUEST['nuevaClave'],$_REQUEST['claveActual']);
		break;
	case 'cargarDatosGenerales':
		unset($_REQUEST['command']);
		$rta = $sami->cargarDatosGenerales($_REQUEST['idHospital']);
		break;
	case 'actualizarClaveUsuario':
		unset($_REQUEST['command']);
		$rta = $sami->actualizarClaveUsuario($_REQUEST['id__usuario'],$_REQUEST['clave']);
		break;
	case 'listarDepartamentosPorSubregion':
		unset($_REQUEST['command']);
		$rta = $sami->listarDepartamentosPorSubregion($_REQUEST['idSubregion']);
		break;
	case 'listarTotalDonacionesBLHHospital':
		unset($_REQUEST['command']);
		$rta = $sami->listarTotalDonacionesBLHHospital();
		break;
	case 'listarTotalDonantesBLHHospital':
		unset($_REQUEST['command']);
		$rta = $sami->listarTotalDonantesBLHHospital();
		break;
	case 'listaDonantesPorGrupoEdad':
		unset($_REQUEST['command']);
		$rta = $sami->listaDonantesPorGrupoEdad();
		break;
	case 'listarDepartamentosPorSubregion2017':
		unset($_REQUEST['command']);
		$rta = $sami->listarDepartamentosPorSubregion2017($_REQUEST['idSubregion']);
		break;
	case 'listarMunicipiosPorDepartamentos':
		unset($_REQUEST['command']);
		$rta = $sami->listarMunicipiosDepartamentos($_REQUEST['idDepartamento']);
		break;
	case 'listarMunicipiosPorDepartamentos2017':
		unset($_REQUEST['command']);
		$rta = $sami->listarMunicipiosPorDepartamentos2017($_REQUEST['idDepartamento']);
		break;
	case 'listarInstitucionesPorMunicipio':
		unset($_REQUEST['command']);
		$rta = $sami->listarInstitucionesPorMunicipio($_REQUEST['idMunicipio']);
		break;
	case 'listarInstitucionesPorMunicipio2017':
		unset($_REQUEST['command']);
		$rta = $sami->listarInstitucionesPorMunicipio2017($_REQUEST['idMunicipio']);
		break;
	case 'obtenerUsuarios':
		unset($_REQUEST['command']);
		$rta = $sami->obtenerUsuarios();
		break;
	case 'listarDonantesBLH':
		unset($_REQUEST['command']);
		$rta = $sami->listarDonantesBLH();
		break;
	case 'listarDonantesBLHSala':
		unset($_REQUEST['command']);
		$rta = $sami->listarDonantesBLHSala();
		break;
	case 'listarDonanteUnico':
		unset($_REQUEST['command']);
		$rta = $sami->listarDonanteUnico($_REQUEST['idDonante']);
		break;
	case 'listarDonanteUnicoBlhSala':
		unset($_REQUEST['command']);
		$rta = $sami->listarDonanteUnicoBlhSala($_REQUEST['idDonante']);
		break;
	case 'listarUsuariaSalaUnica':
		unset($_REQUEST['command']);
		$rta = $sami->listarUsuariaSalaUnica($_REQUEST['idUsuaria']);
		break;
	case 'listarCurvaUnica':
		unset($_REQUEST['command']);
		$rta = $sami->listarCurvaUnica($_REQUEST['idCurva']);
		break;
	case 'listarEquipoUnico':
		unset($_REQUEST['command']);
		$rta = $sami->listarEquipoUnico($_REQUEST['idEquipo']);
		break;
	case 'listarDetalleFrascoPool':
		unset($_REQUEST['command']);
		$rta = $sami->listarDetalleFrascoPool($_REQUEST['idFrascoPool']);
		break;
	case 'listarDetalleFrascoProcesado':
		unset($_REQUEST['command']);
		$rta = $sami->listarDetalleFrascoProcesado($_REQUEST['idFrasco']);
		break;
	case 'listarDetalleFrasco':
		unset($_REQUEST['command']);
		$rta = $sami->listarDetalleFrasco($_REQUEST['idFrasco']);
		break;
	case 'listarDetallePool':
		unset($_REQUEST['command']);
		$rta = $sami->listarDetallePool($_REQUEST['id_core__pool_blh']);
		break;
	case 'actualizarEstadoPool':
		unset($_REQUEST['command']);
		$rta = $sami->actualizarEstadoPool($_REQUEST['id_core__pool_blh'],$_REQUEST['fk_atributos__estados']);
		break;
	case 'actualizarAccionAtencionSala':
		unset($_REQUEST['command']);
		$rta = $sami->actualizarAccionAtencionSala($_REQUEST['id_core__atencion_sala'],$_REQUEST['accion']);
		break;
	case 'actualizarAccionFrascoSala':
		unset($_REQUEST['command']);
		$rta = $sami->actualizarAccionFrascoSala($_REQUEST['id_core__donacion_blh'],$_REQUEST['accion']);
		break;
	case 'registrarIndicadoresBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarIndicadoresBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarEquipos':
		unset($_REQUEST['command']);
		$rta = $sami->registrarEquipos($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonanteBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDonanteBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonanteBLHSala':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDonanteBLHSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDatosUsuario':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDatosUsuario($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarUsuariaSala':
		unset($_REQUEST['command']);
		$rta = $sami->registrarUsuariaSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarCurva':
		unset($_REQUEST['command']);
		$rta = $sami->registrarCurva($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarUsuarioSistema':
		unset($_REQUEST['command']);
		$rta = $sami->registrarUsuarioSistema($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarBeneficiario':
		unset($_REQUEST['command']);
		$rta = $sami->registrarBeneficiario($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarFasesCanguro':
		unset($_REQUEST['command']);
		$rta = $sami->registrarFasesCanguro($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'actualizarBeneficiariosPool':
		unset($_REQUEST['command']);
		$rta = $sami->actualizarBeneficiariosPool($_REQUEST['id_core__pool_blh'],$_REQUEST['values']);
		break;
	case 'registrarTemperatura':
		unset($_REQUEST['command']);
		$rta = $sami->registrarTemperatura($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'listarEquipos':
		unset($_REQUEST['command']);
		$rta = $sami->listarEquipos();
		break;
	case 'listarCurvas':
		unset($_REQUEST['command']);
		$rta = $sami->listarCurvas();
		break;
	case 'listarBeneficiarios':
		unset($_REQUEST['command']);
		$rta = $sami->listarBeneficiarios();
		break;
	case 'listarUsuariasSala':
		unset($_REQUEST['command']);
		$rta = $sami->listarUsuariasSala();
		break;
	case 'registrarAtencionSala':
		unset($_REQUEST['command']);
		$rta = $sami->registrarAtencionSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonacionBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDonacionBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDonacionBLHSala':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDonacionBLHSala($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarProcesamientoBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarProcesamientoBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarPoolBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarPoolBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarPasteurizacionBLH':
		unset($_REQUEST['command']);
		$rta = $sami->registrarPasteurizacionBLH($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registro_pasteurizacionNew':
		unset($_REQUEST['command']);
		$rta = $sami->registro_pasteurizacionNew($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'registrarDatosGenerales':
		unset($_REQUEST['command']);
		$rta = $sami->registrarDatosGenerales($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case 'listarFrascosBLH':
		unset($_REQUEST['command']);
		$rta = $sami->listarFrascosBLH();
		break;
	case 'listarDonacionFrasco':
		unset($_REQUEST['command']);
		$rta = $sami->listarDonacionFrasco();
		break;
	case 'listarProgresoIami':
		unset($_REQUEST['command']);
		$rta = $sami->listarProgresoIami($_REQUEST['hospital'],$_REQUEST['trimestre'],$_REQUEST['paso'],$_REQUEST['ano']);
		break;
	case 'listarProgresoCanguro':
		unset($_REQUEST['command']);
		$rta = $sami->listarProgresoCanguro($_REQUEST['hospital'],$_REQUEST['mes']);
		break;
	case 'listarFasesCanguro':
		unset($_REQUEST['command']);
		$rta = $sami->listarFasesCanguro($_REQUEST['hospital']);
		break;
	case 'listarProgresoBLH':
		unset($_REQUEST['command']);
		$rta = $sami->listarProgresoBLH($_REQUEST['hospital'],$_REQUEST['mes']);
		break;
	case 'cumplimientoIami':
		unset($_REQUEST['command']);
		$rta = $sami->cumplimientoIami($_REQUEST['hospital'],$_REQUEST['year']);
		break;
	case 'calcularDiligenciamientoAll':
		unset($_REQUEST['command']);
		$rta = $sami->calcularDiligenciamientoAll();
		break;
	case 'cumplimientoCanguro':
		unset($_REQUEST['command']);
		$rta = $sami->cumplimientoCanguro($_REQUEST['hospital']);
		break;
	case 'listarFrascosPasteurizadosBLH':
		unset($_REQUEST['command']);
		$rta = $sami->listarFrascosPasteurizadosBLH();
		break;
	case 'registrarPasoIami':
		unset($_REQUEST['command']);
		$rta = $sami->registrarPasoIami($_REQUEST['tabla'],$_REQUEST['campos'],$_REQUEST['paso'],$_REQUEST['ano']);
		break;
	case 'registrarIndicadorCanguro':
		unset($_REQUEST['command']);
		$rta = $sami->registrarIndicadorCanguro($_REQUEST['tabla'],$_REQUEST['campos']);
		break;
	case '':
		unset($_REQUEST['command']);
		break;

	default:
		# code...
		break;
}
echo json_encode($rta);