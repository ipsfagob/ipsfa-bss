

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
	$('#idmu').material_select('destroy');
	$("#idmu").empty();
	$('#idpa').material_select('destroy');
	$("#idpa").empty();
	$("#idpa").html('<option value="0">----------</option>');
	$('#idpa').material_select();
	$.getJSON( sUrlP + "listarMunicipio", {codigo: $('#ides').val()})
	 .done(function(data) {
		$.each(data, function(indice, valor){
			contenido += '<option value="'+valor['codigo']+'">'+valor['nombre']+'</option>';
		});
		$("#idmu").html(contenido);
		$('#idmu').material_select();
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
	$('#idpa').material_select('destroy');
	$("#idpa").empty();
	$.getJSON( sUrlP + "listarParroquia", {codigoEstado: $('#ides').val(), codigoMunicipio: $('#idmu').val()})
	 .done(function(data) {
		$.each(data, function(indice, valor){
			contenido += '<option value="'+valor['codigo']+'">'+valor['nombre']+'</option>';
		});
		$("#idpa").html(contenido);
		$('#idpa').material_select();
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
function salvarDireccion(){


	$.getJSON( sUrlP + "salvarDireccion", {oid: $('#oid').val(), ides: $('#ides').val(), idmu: $('#idmu').val(),idpa: $('#idpa').val(), dir: $('#direccion').val()})
	 .done(function(data) {		

		
		$('#modal1').openModal();
	})
	 .fail(function(jqXHR, textStatus) {
		//alert(jqXHR.responseText);
		console.log(jqXHR.responseText);
	});	
}

function seleccionarCodigoArea(){
	var contenido = '';
	$('#idpa').material_select('destroy');
	$("#idpa").empty();
	$.getJSON( sUrlP + "seleccionarCodigoArea", {tipo:'x'})
	 .done(function(data) {
		$.each(data, function(indice, valor){
			contenido += '<option value="'+valor['codigo']+'">'+valor['nombre']+'</option>';
		});
		$("#idpa").html(contenido);
		$('#idpa').material_select();
	})
	 .fail(function(jqXHR, textStatus) {
		alert(jqXHR.responseText);
	});	
}