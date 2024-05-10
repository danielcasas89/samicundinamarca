
//VARIABLE CON LA INFORMACION
var infoEncuesta = {};
var idsFormulario = [];
var step = 0;
var numSteps = 7;
var idEncuesta = 0;
var totalCampos = 192;
var posicion = {
	latitud: 0,
	longitud: 0
};

//var context = {};
//var regsContext = {};

var msgErroresAlValidar = null;

var fieldsImgs = ['embarcacionimg01', 'embarcacionimg02', 'embarcacionimg03', 
				'sistadmimg01', 'sistadmimg02', 'sistadmimg03', 
				'alternadorimg01', 'alternadorimg02', 'alternadorimg03'];

/**
 * Funcion que captura las variables pasados por GET
 * http://www.lawebdelprogramador.com/pagina.html?id=10&pos=3
 * Devuelve un array de clave=>valor
 */
function getGET(){
	// capturamos la url
	var loc = document.location.href;
	// si existe el interrogante
	if(loc.indexOf('?')>0)
	{
	    // cogemos la parte de la url que hay despues del interrogante
	    var getString = loc.split('?')[1];
	    // obtenemos un array con cada clave=valor
	    var GET = getString.split('&');
	    var get = {}; 

	    // recorremos todo el array de valores
	    for(var i = 0, l = GET.length; i < l; i++){
	        var tmp = GET[i].split('=');
	        get[tmp[0]] = unescape(decodeURI(tmp[1]));
	    }
	    return get;
	}
}


/* 
 * Valida que los campos sean correctos
 * 
 **/
function validar(){
	obtenerValoresDeForm();
	var numReqs = validarRequeridos();
	if(numReqs==0){
		return true;
	}else{
		return 'Existen campos obligatorios que no se han llenado.';
	}
}
/*
 * Devuelve el valor de el campo especificado
 */
function getValueOfName(name){
	//BUSCAMOS UN RADIO CHECKEADO
	var input = $('input:radio[name='+name+']:checked');
	if(typeof input[0] != 'undefined'){
		return input.val();
	}

	input = $("select[name="+name+"]");
	if(typeof input[0] != 'undefined'){
		return (input.val()==""?null:input.val());
	}

	input = $("input[name="+name+"]");
	if(typeof input[0] != 'undefined'){
		if(input.attr('type') == 'checkbox'){
			return input.prop('checked')?'1':'0';
		} else if(input.attr('type') == 'radio'){
			return null;
		} else if(input.attr('type') == 'file'){
			if(input[0].files.length>0){
				return input[0].files[0];
			}
		}else{

			return (input.val()==""?null:input.val());
		}
	}
	console.warn("input");
	console.warn(input);
	return null;
}


/* 
 * Obtiene los valores del formulario y los almacena en el objeto global infoEncuesta
 * 
 **/
function obtenerValoresDeForm(){
	infoEncuesta = {};
	for(var index in idsFormulario){
		infoEncuesta[idsFormulario[index]] = getValueOfName(idsFormulario[index]);
	}
}

function validarRequeridos(){
	var requeridos = 0;
	$('.required').each(function(indice, elemento){
		var el = $(elemento);
		if(el.val() == ''){
			el.parent().parent().addClass('has-error');
			requeridos++
		}else{
			el.parent().parent().removeClass('has-error');
		}
	});
	return requeridos;
}
/* 
 * Devuelve el path actual de la página.
 * Si la página es http://mipagina.com/una/carpeta/cualquiera.html la salida
 * será http://mipagina.com/una/carpeta/
 * 
 */
function getPath(){
	var pathArray = window.location.pathname.split( '/' );
	var newPathname = "";
	for (i = 1; i < pathArray.length-1; i++) {
	  newPathname += "/";
	  newPathname += pathArray[i];
	}
	return newPathname;
}

function fireMessage(typeMsg, msg, codeError){
	//console.debug('Lanzando Mensaje con fireMessage');
	//alert("Code error:"+codeError+"\nMensaje:"+msg);
	alert(msg);
}


function guardarInfoEstatica(){
	infoEncuesta['latitud'] = posicion.latitud;
	infoEncuesta['longitud'] = posicion.longitud;
	infoEncuesta['step'] = step;
	$.ajax({
		url: getPath()+'/php/updateEncuesta.php',
		type: 'POST',
		async: true,
		dataType: 'json',
		data: infoEncuesta,
		success: function(rta){
			//SI LA RESPUESTA ES OK
			if(rta.type == 'info'){
				//REDIRECCIONAR A DONDE ME DIGA EL SERVIDOR
				window.location = rta.data.address;
			}else{
				//LANZAR MENSAJE DE ERROR
				fireMessage(rta.type, rta.msg, rta.code_error);
			}
		},
		error: function(jqXHR, textStatus, errorThrown ){
			switch(textStatus){
				case 'timeout':
					fireMessage('error', 'Se excedió el tiempo de consulta al servidor', 1001);
				break;
				case 'error':
					fireMessage('error', 'Error: '+errorThrown, 1002);
				break;
				case 'abort':
					fireMessage('error', 'Operación abortada', 1003);
				break;
				case 'parsererror':
					fireMessage('error', 'Mensaje JSON inválido', 1004);
				break;
			}
		}
	});
}

function guardarPosicion(callback){
	window.navigator.geolocation.getCurrentPosition(function (geo){
		posicion.latitud = geo.coords.latitude;
		posicion.longitud = geo.coords.longitude;
		//console.debug(posicion);
		if(typeof callback != 'undefined')
			callback(geo.coords.latitude, geo.coords.longitude);
	});
}

function showThumbnail(id, img){
	//Creo un Reader
	var reader = new FileReader();
	//Antes de cargarle la imagen debo decirle qué hacer cuando haya cargado
	reader.onload = function (e) {
		setThumbnail(id, e.target.result);
	}
	//console.warn('Se va a cargar la image....');
	//Cargo la imagen
	try{
		reader.readAsDataURL(img);	
	}catch(error){
		//console.debug(error);
	}
}
function setThumbnail(id, imgb64){
	//Creo un elemento de imagen IMG
	 var filePreview = document.createElement('img');
	 //Le pasamos un id cualquiera para poder identificarlo
	 filePreview.id = id+'_file_preview';
	 //e.target.result Contiene los datos de la imagen en base 64
	 filePreview.src = imgb64;
	 //console.log(id);
	 //console.log(imgb64);
	 //Obtenemos el elemento que va a tener la imagen
	 var previewZone = document.getElementById(id);
	 //Adicionamos la imagen
	 previewZone.innerHTML = '';
	 previewZone.appendChild(filePreview);
	 $("#"+id+'_file_preview').attr('width', '300px');
}

function setValueOfName(name, value){
	var input = $("input[name="+name+"]");
	if(typeof input[0] == "undefined")
		input = $("select[name="+name+"]");
	if(typeof input[0] == "undefined")
		input = $('input:radio[name='+name+']');

	if(typeof value == "undefined" ){
		value = "";
	}else{
		if(input.attr('type') == 'checkbox' && value == '1'){
			input.prop('checked', 'checked');
		}else if(input.attr('type') == 'radio'){
			input.each(function(){
				var meI = $(this);
				if(meI.val() == value)
					meI.prop('checked', 'checked')
			});

		}else if(input.attr('type') == 'file'){
			if((typeof value) == 'string' ){
				setThumbnail(name+'_thumbnail', value);
			}else{
				input[0].files[0] = value;
				showThumbnail(name+'_thumbnail', value);
				//console.debug(input[0].files);
			}
		}else if(input.attr('type') == 'number'){
			input[0].value = value;
		}
		else{

			$(function() {
			    $('[name='+name+'] option').filter(function() { 
			        return $(this).val(value).text(value); 
			    }).prop('selected', true);
			})


		}
	}
}


/**
 * Cambia el valor de todos los campos del formulario actual
 * con los valores del objeto que se pasa
 * @param object arreglo u objeto cuyas llaves son los id de los campos del formulario y su valor es el que se debe colocar.
 * 
 **/
function setValues(object){

	//console.debug('Seteando con:');
	for(var index in idsFormulario){
		//console.debug('INDEX: '+idsFormulario[index]);
		setValueOfName(idsFormulario[index], object[idsFormulario[index]]);
	}
	//RECORREMOS LOS CONTEXTOS
	if(typeof context != 'undefined')
	for(var nameContext in context){
		if(typeof object[nameContext] != "undefined"){
			regsContext[nameContext]['regs'] = object[nameContext];
		}
		else{
			regsContext[nameContext]['regs'] = [];
		}
		if(typeof setListaInicial != "undefined")
			setListaInicial();
		else
			alert('Existe contexto pero no setListaInicial')
	}

}

/**
 * Actualizaun campo de un objeto de la DB
 * @param id Id del registro que se va a actualizar
 * @param campo Nombre del campo que se va a actualizar
 * @param valor Nuevo valor del campo
 * 
 **/
function setField(id, campo, valor, callback){
	DbOffline.setField(id, campo, valor, callback);
}

/**
 * Valida que los campos que son requeridos de la encuesta estén llenos.
 * @return boolean True si la encuesta está completa, false de lo contrario.
 */
function validarEncuesta(){
	msgErroresAlValidar = 'Error en campo nodo de la sección 3';
	return false;
}

function initStep(registro){
	var fecha = new Date();
	var valores = {};
	if(typeof registro.estado == 'undefined' || registro.estado == null || registro.estado == 'no_iniciada'){
		valores['estado'] = 'en_proceso';
		valores['fecha_inicio'] = fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate()+" "+
										fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
	}

	if(
			typeof registro.latitud == 'undefined' || 
			typeof registro.longitud == 'undefined' ||
			registro.latitud == null ||
			registro.longitud == null 
	){
		guardarPosicion(function(lat, lon){
			valores['latitud'] = lat;
			valores['longitud'] = lon;
			DbOffline.setObject(idEncuesta, valores, function(){});
		});
	}else{
		DbOffline.setObject(idEncuesta, valores, function(){});
	}
}

function finalizar(){
	var fecha = new Date();
	var valores = {
		fecha_fin : fecha.getFullYear()+"-"+(fecha.getMonth()+1)+"-"+fecha.getDate()+" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds(),
		estado: 'finalizada'
	};
	DbOffline.setObject(idEncuesta, valores, function(){
		guardarSeccion('listarEncuestas.html', false);
	});
}

function reactivar(id){
	var valores = {
		fecha_fin : null,
		estado: 'en_proceso'
	};
	DbOffline.setObject(id, valores, function(){
		window.location.reload();
	});
}

/**
 * Almacena en la base de datos la información de la sección.
 */
function guardarSeccion(url, last){
	obtenerValoresDeForm();

	//console.debug('infoEncuesta en guardarSeccion');
	//console.debug(infoEncuesta);
	
	infoEncuesta['id'] = idEncuesta;
	if(last===true)
		infoEncuesta['estado'] = 'finalizada';

	if(typeof context != 'undefined'){
		for(var nameContext in context){
			infoEncuesta[nameContext] = regsContext[nameContext].regs;
		}
	}
	for(var indexImg in fieldsImgs){
		if(infoEncuesta[fieldsImgs[indexImg]] == null){
			delete infoEncuesta[fieldsImgs[indexImg]];
		}
	}

	DbOffline.setObject(idEncuesta, infoEncuesta, function(){
		window.location = url;
	});
}

/**
 * Da formato a un número para su visualización. 
 * Sacada de http://borrame.com/recortes/javascript/formato-numero.html
 *
 * @param {(number|string)} numero Número que se mostrará
 * @param {number} [decimales=null] Nº de decimales (por defecto, auto); admite valores negativos
 * @param {string} [separadorDecimal=","] Separador decimal
 * @param {string} [separadorMiles=""] Separador de miles
 * @returns {string} Número formateado o cadena vacía si no es un número
 *
 * @version 2014-07-18
 */
function formatoNumero(numero, decimales, separadorDecimal, separadorMiles) {
	var partes, array;

	if ( !isFinite(numero) || isNaN(numero = parseFloat(numero)) ) {
		return "";
	}
	if (typeof separadorDecimal==="undefined") {
		separadorDecimal = ",";
	}
	if (typeof separadorMiles==="undefined") {
		separadorMiles = "";
	}

	// Redondeamos
	if ( !isNaN(parseInt(decimales)) ) {
		if (decimales >= 0) {
			numero = numero.toFixed(decimales);
		} else {
			numero = (
				Math.round(numero / Math.pow(10, Math.abs(decimales))) * Math.pow(10, Math.abs(decimales))
			).toFixed();
		}
	} else {
		numero = numero.toString();
	}

	// Damos formato
	partes = numero.split(".", 2);
	array = partes[0].split("");
	for (var i=array.length-3; i>0 && array[i-1]!=="-"; i-=3) {
		array.splice(i, 0, separadorMiles);
	}
	numero = array.join("");

	if (partes.length>1) {
		numero += separadorDecimal + partes[1];
	}

	return numero;
}

function obtenerPorcentajerealizado(registro){
	var arrCuentan = ["salon","grado","subregion","departamento","institucion","municipio","p1","p2","p3","p4","p5","p6","p7","p8","p9","p10","p11","p12","p13","p14","p15","p16","p17","p18","p19","p20","p21","p22","p23","p24","p25","p26","p27","p28","p30","p31","p32","p33","p34","p35","p36","p37","p38","p39","p40","p41","p42","p43","p44","p45","p46","p47","p48","p49","p50","p51","p52","p53","p54","p55","p56","p57","p58","p59","p60","p61","p62","p63"];
	var totalCamposNoNulos = 0;
 
    for(var indice in registro){    	
    	if($.inArray(indice, arrCuentan) != -1){
            if(registro[indice] != null){
                totalCamposNoNulos++;
            }
        }
    }
    
    return  formatoNumero(
                        totalCamposNoNulos*100/arrCuentan.length,
                        0,
                        ".",
                        ","
                    );
}

/*function obtenerPorcentajerealizado(registro){
	var arrNoCuentan = ["id__encuestas", "fecha_inicio", "fecha_fin", "fk_aux__municipios", "estado", "observacion_cancelacion", "encuestador", "latitud", "longitud", "creado_por", "fecha_creacion", "modificado_por", "fecha_modificacion", "vereda", "corregimiento", "observaciones", "nombre", "tipo_identificacion", "numero_identificacion", "telefono", "email", "direccion", "curso_cuales", "curso_lugares", "razones_no_curso", "curso_razon_no_curso_cual", "aprendio_arte_cual", "temas_capacitacion_recibido_admin", "temas_capacitacion_recibido_asoc", "temas_capacitacion_recibido_soci", "temas_capacitacion_recibido_pract", "temas_capacitacion_recibido_otras", "temas_capacitacion_otro", "temas_capacitacion_tiempo", "oferente_capacitacion", "oferente_capacitacion_otro", "utilidad_capacitacion", "razon_no_capacitacion", "razon_no_capacitacion_otro", "temas_gustaria_capacitacion_otro", "capacitacion_mejoramiento_produccion", "capacitacion_buenas_practicas", "capacitacion_procesos_certificacion", "capacitacion_manejo_pos-", "capacitacion_otra", "capacitacion_cual", "uso_saberes_tradicionales_otro", "financiacion_gobierno", "financiacion_cooperacion_internacional", "financiacion_ong", "financiacion_banco", "financiacion_otra", "financiacion_entidad_otra", "ingreso_promedio", "ingreso_pesca_porcentaje", "destino_ingreso_otro_nombre", "credito_libre_inversion", "credito_vivienda", "credito_agropecuario", "credito_educativo", "credito_otros", "entidad_servicio_salud", "entidad_servicio_salud_otra", "nombre_enfermedad_x_pesca", "nombre_sufrimiento_accidente_x_pesca", "servicio_usado_enfermedad_otro", "cuales_especies", "cuales_desembarque", "costo_otro", "vende_otro_cual", "equipos_cuales", "dsllo_cuales", "municipio", "porcentaje", "nombre_municipio", "id"];
	var totalCamposNoNulos = 0;

    for(var indice in registro){
    	if($.inArray(indice, arrNoCuentan) == -1){
            if(registro[indice] != null){
                totalCamposNoNulos++;
            }
        }
    }
    
    return  formatoNumero(
                        totalCamposNoNulos*100/totalCampos,
                        0,
                        ".",
                        ","
                    );
}*/

//
// Para Ocultar y mostrar campos
//

function logicShow(input){
    if(input.attr('type') == 'radio' || input.attr('type') == 'checkbox'){
        input.parent().parent().parent().show(300);
    }else{
        input.parent().show(300);
    }
    input.trigger('change');
}
function logicHide(input){
    if(input.attr('type') == 'radio' || input.attr('type') == 'checkbox'){
        input.parent().parent().parent().hide(300);
        input.removeAttr('checked');
    }else{
        input.parent().hide(300);
        setValueOfName(input.attr('name'), '');
    }
    input.trigger('change');
}
function logic(nameSource, valueForChange, arrayNamesShow, arrayNamesHide){
    var inputSource = $("[name="+nameSource+"]");
    var isHidden = false;
    if(inputSource.attr('type') == 'radio' || inputSource.attr('type') == 'checkbox'){
        isHidden = inputSource.parent().parent().parent().is(':hidden');
    }else{
        isHidden = inputSource.parent().is(':hidden');
    }
    if(isHidden){
        for(var nameHide in arrayNamesHide){
            logicHide($("[name="+arrayNamesHide[nameHide]+"]"));
        }
        for(var nameShow in arrayNamesShow){
            logicHide($("[name="+arrayNamesShow[nameShow]+"]"));
        }
        return;
    }

    if(getValueOfName(nameSource) == valueForChange){
        for(var nameShow in arrayNamesShow){
            logicShow($("[name="+arrayNamesShow[nameShow]+"]"));
        }
        for(var nameHide in arrayNamesHide){
            logicHide($("[name="+arrayNamesHide[nameHide]+"]"));
        }
    }else{
        for(var nameShow in arrayNamesShow){
            logicHide($("[name="+arrayNamesShow[nameShow]+"]"));
        }
        for(var nameHide in arrayNamesHide){
            logicShow($("[name="+arrayNamesHide[nameHide]+"]"));
        }
    }
}

