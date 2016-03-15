

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

