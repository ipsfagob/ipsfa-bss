

/**
* Reportar Anomalias en los campos a DB
*
* @access public
* @return mixed
*/
function Salvar(){
	var bool = false;
	var Anomalia = new Object();
	
	CargarCheckBox();
	Reportar = $( "body" ).data( "Reportar");

	$.each(Reportar, function(indice, valor){
		if(valor == true) {
			bool = true;
			Anomalia[indice] = valor;
		}
	});
	if(bool == true){
		$.post( sUrlP + "SalvarAnomaliaMedia/", Anomalia)
	  		.done(function(data) {
	    		alert( data );
	  		})
	  		.fail(function(jqXHR, textStatus) {
			    alert(jqXHR.responseText);
			});	
	}	
}

/**
* Cargar todos los elementos
*
* @access public
* @return mixed
*/
function CargarCheckBox(){
	$("body").data("Reportar", {
			"nombre" : $('#chNombre').prop('checked'), 
			"sexo" : $('#chSexo').prop('checked'),
			"fecha" : $('#chFecha').prop('checked'),
			"componente" : $('#chComponente').prop('checked'),
			"rango" : $('#chRango').prop('checked')
		});
}

function Cancenlar(){
	
}

/**
* Cargar los municipios de un estado
*
* @access public
* @return mixed
*/
function listarMunicipio(){
	var contenido = '';
	$('#municipio').material_select('destroy');
	$("#municipio").empty();
	$('#parroquia').material_select('destroy');
	$("#parroquia").empty();
	$("#parroquia").html('<option value="0">----------</option>');
	$('#parroquia').material_select();
	$.getJSON( sUrlP + "listarMunicipio", {codigo: $('#estado').val()})
	 .done(function(data) {
		$.each(data, function(indice, valor){
			contenido += '<option value="'+valor['codigo']+'">'+valor['nombre']+'</option>';
		});
		$("#municipio").html(contenido);
		$('#municipio').material_select();
	})
	 .fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});	
}

/**
* Cargar listado de parroquias
*
* @access public
* @return mixed
*/
function listarParroquia(){
	var contenido = '';
	$('#parroquia').material_select('destroy');
	$("#parroquia").empty();
	$.getJSON( sUrlP + "listarParroquia", {codigoEstado: $('#estado').val(), codigoMunicipio: $('#municipio').val()})
	 .done(function(data) {
		$.each(data, function(indice, valor){
			contenido += '<option value="'+valor['codigo']+'">'+valor['nombre']+'</option>';
		});
		$("#parroquia").html(contenido);
		$('#parroquia').material_select();
	})
	 .fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});	
}

/**
* Cargar listado de parroquias
*
* @access public
* @return mixed
*/
function salvarDirecciones(){
		
}